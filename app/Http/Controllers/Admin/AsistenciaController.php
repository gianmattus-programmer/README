<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CursoListado;
use App\Models\Asistencia;
use App\Models\User;
use App\Models\Role;
use App\Models\RoleUser;

use Illuminate\Http\Request;

class AsistenciaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $profesores = User::whereHas('roles', function($query) {
            $query->where('role_id', 3);
        })->get();

        $alumnos = User::whereHas('roles', function($query) {
            $query->where('role_id', 2);
        })->get();

        $users = User::all();
        $asistencias = Asistencia::all();
        $cursos = CursoListado::all();

        return view('admin.asistencias.index', compact('profesores', 'asistencias', 'alumnos', 'users', 'cursos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.asistencias.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Asistencia::create([
            'profesor_id'               => $request->profesor_id,
            'user_id'                   => $request->user_id,
            'listado_id'                => $request->listado_id,
            'fecha'                     => $request->fecha,
            'hora'                      => $request->hora,
            'estatus'                   => $request->estatus,
        ]);

        return redirect()->route('adminasistencias.index')->with('success','Nueva Asistencia agregada.');
    }

    /**
     * Display the specified resource.
     */
    
     public function show($id)
    {
        $asistencia = Asistencia::find($id);

        return view('admin.asistencias.show', compact('asistencia'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $asistencia = Asistencia::find($id);

        return view('admin.asistencias.edit', compact('asistencia'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $in = $request->all();

        $in['profesor_id']  = $request->profesor_id;
        $in['user_id']      = $request->user_id;
        $in['listado_id']   = $request->listado_id;
        $in['fecha']        = $request->fecha;
        $in['hora']         = $request->hora;
        $in['estatus']      = $request->estatus;
        
        $list = Asistencia::find($id);
        $list->update($in);

        return redirect()->route('adminasistencias.index')->with('success','Asistencia actualizada.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Asistencia::destroy($id);
        return redirect()->route('adminasistencias.index')->with('success','Asistencia eliminada.');
    }
}
