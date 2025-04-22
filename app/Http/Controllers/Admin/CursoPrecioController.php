<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CursoPrecio;

use Illuminate\Http\Request;

class CursoPrecioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $precios = CursoPrecio::all();

        return view('admin.cursos.precios.index', compact('precios'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.cursos.precios.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $insertData = [];
        for($x = 0; $x < count($request->precio); $x++){
            $insertData[] = [
                'precio'                    => $request->precio[$x],
                'descuento'                 => $request->descuento[$x],
                'listado_id'                => $request->listado_id,
                'inicio'                    => $request->inicio[$x],
                'duracion'                  => $request->duracion[$x],
                'horarios'                  => $request->horarios[$x],
                'estatus'                   => $request->estatus,
            ];
        }

        CursoPrecio::insert($insertData);

        return back()->with('success','Nuevo Precio agregado.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $precio = CursoPrecio::find($id);

        return view('admin.cursos.precios.show', compact('precio'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $precio = CursoPrecio::find($id);

        return view('admin.cursos.precios.edit', compact('precio'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $in = $request->all();

        $in['precio']                   = $request->precio;
        $in['descuento']                = $request->descuento;
        $in['listado_id']               = $request->listado_id;
        $in['inicio']                   = $request->inicio;
        $in['duracion']                 = $request->duracion;
        $in['horarios']                 = $request->horarios;
        $in['estatus']                  = $request->estatus;
        
        $prec = CursoPrecio::find($id);
        $prec->update($in);

        return back()->with('success','Precio actualizado.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        CursoPrecio::destroy($id);
        return back()->with('success','Precio eliminado.');
    }
}
