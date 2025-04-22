<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Encuentrano;
use App\Models\Popup;

class PopupController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $encuentranos = Encuentrano::all();
        $popups = Popup::all();

        return view('admin.encuentranos.index', compact('encuentranos', 'popups'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
            $rutaGuardarimg = 'panel/popups/';
            $imagenProducto = date('YmdHis'). "." . $imagen->getClientOriginalExtension();
            $imagen->move($rutaGuardarimg, $imagenProducto);
            $parkingfile = "$imagenProducto";
        }
        
        Popup::create([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'encuentranos_id' => $request->encuentranos_id,
            'enlace' => $request->enlace,
            'file' => $parkingfile,
            'estatus' => $request->estatus,
        ]);

        return redirect()->route('adminencuentranos.index')->with('success','Popup agregados.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $in = $request->all();

        $in['nombre'] = $request->nombre;
        $in['descripcion'] = $request->descripcion;
        $in['encuentranos_id'] = $request->encuentranos_id;
        $in['enlace'] = $request->enlace;
        
        if($imagen = $request->file('file')) {
            $rutaGuardarimg = 'panel/popups';
            $imagenProducto = date('YmdHis'). "." . $imagen->getClientOriginalExtension();
            $imagen->move($rutaGuardarimg, $imagenProducto);
            $in['file'] = "$imagenProducto";
        }else{
            unset($in['file']);
        }
        
        $in['estatus'] = $request->estatus;
        
        $cate = Popup::find($id);
        $cate->update($in);

        return redirect()->route('adminencuentranos.index')->with('success','Popup actualizado.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Popup::destroy($id);
        return redirect()->route('adminencuentranos.index')->with('success','Popup eliminado.');
    }
}
