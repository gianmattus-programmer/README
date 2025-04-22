<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CursoCategoria;
use App\Models\CursoListado;
use App\Models\User;

use Illuminate\Http\Request;

class CursoCategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        $listados = CursoListado::all();
        //$categorias = CursoCategoria::all();

        $categorias = CursoCategoria::withCount('cursos')->get();

        return view('admin.cursos.categorias.index', compact('users', 'listados', 'categorias'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.cursos.categorias.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'file'  => 'required|image|mimes:jpeg,png,jpg'
        ]);

        if($imagen = $request->file('file')) {
            $rutaGuardarimg = 'panel/cursos/categorias';
            $imagenProducto = date('YmdHis'). "." . $imagen->getClientOriginalExtension();
            $imagen->move($rutaGuardarimg, $imagenProducto);
            $parkingfile = "$imagenProducto";
        }
        
        CursoCategoria::create([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'file' => $parkingfile,
            'estatus' => $request->estatus,
        ]);

        return redirect()->route('cursoscategorias.index')->with('success','Nueva categoría agregada.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $listados = CursoListado::all();
        $categorias = CursoCategoria::all();

        $curcat = CursoCategoria::find($id);
        return view('admin.cursos.categorias.show', compact('curcat', 'listados ', 'categorias'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $listados = CursoListado::all();
        $categorias = CursoCategoria::all();

        $curcat = CursoCategoria::find($id);
        return view('admin.cursos.categorias.edit', compact('curcat', 'listados ', 'categorias'));
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
            $rutaGuardarimg = 'panel/cursos/categorias';
            $imagenProducto = date('YmdHis'). "." . $imagen->getClientOriginalExtension();
            $imagen->move($rutaGuardarimg, $imagenProducto);
            $in['file'] = "$imagenProducto";
        }else{
            unset($in['file']);
        }
        
        $in['estatus'] = $request->estatus;
        
        $cate = CursoCategoria::find($id);
        $cate->update($in);

        return redirect()->route('cursoscategorias.index')->with('success','Categoría actualizada.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        CursoCategoria::destroy($id);
        return redirect()->route('cursoscategorias.index')->with('success','Categoría eliminada.');
    }
}
