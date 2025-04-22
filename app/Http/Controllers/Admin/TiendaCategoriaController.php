<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TiendaCategoria;
use App\Models\TiendaListado;
use App\Models\User;
use Image;

use Illuminate\Http\Request;

class TiendaCategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        $listados = TiendaListado::all();
        $categorias = TiendaCategoria::withCount('productos')->get();

        return view('admin.tienda.categorias.index', compact('users', 'listados', 'categorias'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.tienda.categorias.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'file'  => 'required|image|mimes:jpeg,png,jpg'
        ]);

        /*if($imagen = $request->file('file')) {
            $rutaGuardarimg = 'panel/tienda/categorias';
            $imagenProducto = date('YmdHis'). "." . $imagen->getClientOriginalExtension();
            $imagen->move($rutaGuardarimg, $imagenProducto);
            $parkingfile = "$imagenProducto";
        }*/
        if($imagen = $request->File('file')) {
            $rutaGuardarmg = 'panel/tienda/categorias';
            $nombreOriginal = $imagen->getClientOriginalName();
            $imagenResized = Image::make($imagen)->fit(300, 300);
            $imagenResized->save(($rutaGuardarmg . '/' . $nombreOriginal));
            $parkingfile = "$nombreOriginal";
        }
        
        TiendaCategoria::create([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'file' => $parkingfile,
            'estatus' => $request->estatus,
        ]);

        return redirect()->route('tiendacategorias.index')->with('success','Nueva categoría agregada.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $listados = TiendaListado::all();
        $categorias = TiendaCategoria::all();

        $curcat = TiendaCategoria::find($id);
        return view('admin.tienda.categorias.show', compact('curcat', 'listados ', 'categorias'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $listados = TiendaListado::all();
        $categorias = TiendaCategoria::all();

        $curcat = TiendaCategoria::find($id);
        return view('admin.tienda.categorias.edit', compact('curcat', 'listados ', 'categorias'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $in = $request->all();

        $in['nombre'] = $request->nombre;
        $in['descripcion'] = $request->descripcion;
        
        if($imagen = $request->file('file')) {
            $rutaGuardarmg = 'panel/tienda/categorias';
            $nombreOriginal = $imagen->getClientOriginalName();
            $imagenResized = Image::make($imagen)->fit(300, 300);
            $imagenResized->save(($rutaGuardarmg . '/' . $nombreOriginal));
            $in['file'] = "$imagenProducto";
        }else{
            unset($in['file']);
        }
        
        $in['estatus'] = $request->estatus;
        
        $cate = TiendaCategoria::find($id);
        $cate->update($in);

        return redirect()->route('tiendacategorias.index')->with('success','Categoría actualizada.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        TiendaCategoria::destroy($id);
        return redirect()->route('tiendacategorias.index')->with('success','Categoría eliminada.');
    }
}
