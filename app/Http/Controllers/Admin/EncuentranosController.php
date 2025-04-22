<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Encuentrano;
use App\Models\Popup;

class EncuentranosController extends Controller
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
            $rutaGuardarimg = 'panel/encuentranos';
            $imagenProducto = date('YmdHis'). "." . $imagen->getClientOriginalExtension();
            $imagen->move($rutaGuardarimg, $imagenProducto);
            $parkingfile = "$imagenProducto";
        }
        
        Encuentrano::create([
            'titulo' => $request->titulo,
            'sede' => $request->sede,
            'file' => $parkingfile,
            'estatus' => $request->estatus,
        ]);

        return redirect()->route('adminencuentranos.index')->with('success','Datos de la página encuéntranos agregados.');
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

        $in['titulo'] = $request->titulo;
        $in['sede'] = $request->sede;
        
        if($imagen = $request->file('file')) {
            $rutaGuardarimg = 'panel/encuentranos';
            $imagenProducto = date('YmdHis'). "." . $imagen->getClientOriginalExtension();
            $imagen->move($rutaGuardarimg, $imagenProducto);
            $in['file'] = "$imagenProducto";
        }else{
            unset($in['file']);
        }
        
        $in['estatus'] = $request->estatus;
        
        $cate = Encuentrano::find($id);
        $cate->update($in);

        return redirect()->route('adminencuentranos.index')->with('success','Datos de la página encuéntranos actualizados.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Encuentrano::destroy($id);
        return redirect()->route('adminencuentranos.index')->with('success','Datos de la página encuéntranos eliminados.');
    }
}
