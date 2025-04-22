<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cupon;
use App\Models\CursoListado;

use Illuminate\Http\Request;

class CuponController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cupones = Cupon::all();
        $cursos = CursoListado::all();

        return view('admin.cupones.index', compact('cupones', 'cursos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.cupones.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Cupon::create([
            'porcentaje'                => $request->porcentaje,
            'codigo'                    => $request->codigo,
            'estado'                    => $request->estado,
            'estatus'                   => $request->estatus,
        ]);

        return redirect()->route('admincupones.index')->with('success','Nueva Cupón agregado');
    }

    /**
     * Display the specified resource.
     */
    
     public function show($id)
    {
        $cupon = Cupon::find($id);

        return view('admin.cupones.show', compact('cupon'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $cupon = Cupon::find($id);

        return view('admin.cupones.edit', compact('cupon'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $in = $request->all();

        $in['porcentaje']   = $request->porcentaje;
        $in['codigo']       = $request->codigo;
        $in['estado']       = $request->estado;
        $in['estatus']      = $request->estatus;
        
        $list = Cupon::find($id);
        $list->update($in);

        return redirect()->route('admincupones.index')->with('success','Cupón actualizado');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Cupon::destroy($id);
        return redirect()->route('admincupones.index')->with('success','Cupón eliminado');
    }
}
