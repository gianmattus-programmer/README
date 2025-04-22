<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CursoCategoria;
use App\Models\CursoListado;
use App\Models\CursoTemario;
use App\Models\CursoModulo;
use App\Models\User;

use Illuminate\Http\Request;

class CursoTemarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        $listados = CursoListado::all();
        $categorias = CursoCategoria::all();
        $temarios = CursoTemario::all();

        return view('admin.cursos.temarios.index', compact('users', 'listados', 'categorias', 'temarios'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.cursos.temarios.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $fileNames = [];
        if($request->file){
            foreach($request->file as $file) {
                $fileName = time() . "." . $file->getClientOriginalName();
                $file->move('panel/cursos/temarios', $fileName);
                $fileNames[] = $fileName;
            }

            $insertData = [];
            for($x = 0; $x < count($request->nombre); $x++){
                $insertData[] = [
                    'nombre' => $request->nombre[$x],
                    'descripcion' => $request->descripcion[$x],
                    'listado_id' => $request->listado_id,
                    'file' => $fileNames[$x],
                    'examen' => 1,
                    'estatus' => $request->estatus,
                ];
            }
        }else{
            $fileNames = "pralemy_default.jpg";

            $insertData = [];
            for($x = 0; $x < count($request->nombre); $x++){
                $insertData[] = [
                    'nombre' => $request->nombre[$x],
                    'descripcion' => $request->descripcion[$x],
                    'listado_id' => $request->listado_id,
                    'file' => $fileNames,
                    'examen' => 1,
                    'estatus' => $request->estatus,
                ];
            }
        }

        CursoTemario::insert($insertData);

        return back()->with('success','Nuevo Temario agregado.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $temario = CursoTemario::find($id);
        // Cargar módulos ordenados por 'ordermod'
        $modulos = CursoModulo::where('temario_id', $temario->id)
            ->where('estatus', 1)
            ->orderBy('ordermod')
            ->get();

        return view('admin.cursos.temarios.show', compact('temario', 'modulos'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $modulos = CursoModulo::all();
        $temario = CursoTemario::find($id);

        return view('admin.cursos.temarios.edit', compact('temario', 'modulos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $in = $request->all();

        $in['nombre']                   = $request->nombre;
        $in['descripcion']              = $request->descripcion;
        $in['listado_id']               = $request->listado_id;
        
        if($imagen = $request->file('file')) {
            $rutaGuardarimg = 'panel/cursos/temarios';
            $imagenProducto = date('YmdHis'). "." . $imagen->getClientOriginalExtension();
            $imagen->move($rutaGuardarimg, $imagenProducto);
            $in['file'] = "$imagenProducto";
        }else{
            unset($in['file']);
        }
        
        $in['examen']       = 1;
        $in['estatus']      = $request->estatus;
        
        $tema = CursoTemario::find($id);
        $tema->update($in);

        return back()->with('success','Temario actualizado.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        CursoTemario::destroy($id);
        return back()->with('success','Temario eliminado.');
    }
}
