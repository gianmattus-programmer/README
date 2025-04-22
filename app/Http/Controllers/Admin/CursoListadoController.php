<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CursoCategoria;
use App\Models\CursoListado;
use App\Models\CursoTemario;
use App\Models\CursoPrecio;
use App\Models\User;
use App\Models\Role;
use App\Models\RoleUser;

use Illuminate\Http\Request;

class CursoListadoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        $roles = Role::all();
        $rolus = RoleUser::all();
        
        $listados = CursoListado::withCount('temarios')->withCount('precios')->get();

        $categorias = CursoCategoria::all();
        $temarios = CursoTemario::all();

        return view('admin.cursos.listados.index', compact('users', 'roles', 'rolus', 'listados', 'categorias', 'temarios'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.cursos.listados.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'file'          => 'image|mimes:jpeg,png,jpg',
            ///'video'         => 'required|video|mimes:mp4',
            'portada'       => 'required|image|mimes:jpeg,png,jpg',
        ]);

        if($imagen = $request->file('file')) {
            $rutaGuardarimg = 'panel/cursos/listados';
            $imagenProducto = date('YmdHis'). "." . $imagen->getClientOriginalExtension();
            $imagen->move($rutaGuardarimg, $imagenProducto);
            $parkingfile = "$imagenProducto";
        }else{
            $parkingfile = "pralemy_default.jpg";
        }

        /*if($vimagen = $request->file('video')) {
            $rutaGuardarVideo = 'cursos/listados/videos';
            $imagenVideo = date('YmdHis'). "." . $vimagen->getClientOriginalExtension();
            $vimagen->move($rutaGuardarVideo, $imagenVideo);
            $parkingvideo = "$imagenVideo";
        }*/

        if($pimagen = $request->file('portada')) {
            $rutaGuardarPortada = 'panel/cursos/listados/portadas';
            $imagenPortada = date('YmdHis'). "." . $pimagen->getClientOriginalExtension();
            $pimagen->move($rutaGuardarPortada, $imagenPortada);
            $parkingportada = "$imagenPortada";
        }
        
        CursoListado::create([
            'nombre'                    => $request->nombre,
            'descripcion'               => $request->descripcion,
            'cursocategorias_id'        => $request->cursocategorias_id,
            'file'                      => $parkingfile,
            'video'                     => $request->video,
            'portada'                   => $parkingportada,
            'meses'                     => $request->meses,
            'sesiones'                  => $request->sesiones,
            'profesor_id'               => $request->profesor_id,
            'estatus'                   => $request->estatus,
        ]);

        return redirect()->route('cursoslistados.index')->with('success','Nueva producto agregado.');
    }

    /**
     * Display the specified resource.
     */
     
    public function precio($id)
    {
        $precios = CursoPrecio::all();
        $listado = CursoListado::find($id);
 
        return view('admin.cursos.precios.index', compact('listado', 'precios'));
    }
    
    public function show($id)
    {
        $temarios = CursoTemario::withCount('modulos')->get();
        $listado = CursoListado::find($id);
        return view('admin.cursos.listados.show', compact('listado', 'temarios'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $listados = CursoListado::all();
        $categorias = CursoCategoria::all();
        $temarios = CursoTemario::all();

        $listado = CursoListado::find($id);
        return view('admin.cursos.listados.edit', compact('listado', 'listados', 'categorias', 'temarios'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $in = $request->all();

        $in['nombre']                   = $request->nombre;
        $in['descripcion']              = $request->descripcion;
        $in['cursocategorias_id']       = $request->cursocategorias_id;
        
        if($imagen = $request->file('file')) {
            $rutaGuardarimg = 'panel/cursos/listados';
            $imagenProducto = date('YmdHis'). "." . $imagen->getClientOriginalExtension();
            $imagen->move($rutaGuardarimg, $imagenProducto);
            $in['file'] = "$imagenProducto";
        }else{
            unset($in['file']);
        }
        
        /*if($vimagen = $request->file('video')) {
            $rutaGuardarVideo = 'panel/cursos/listados/videos';
            $imagenVideo = date('YmdHis'). "." . $vimagen->getClientOriginalExtension();
            $vimagen->move($rutaGuardarimg, $imagenVideo);
            $in['video'] = "$imagenVideo";
        }else{
            unset($in['video']);
        }*/

        $in['video']        = $request->video;

        if($pimagen = $request->file('portada')) {
            $rutaGuardarPortada = 'panel/cursos/listados/portadas';
            $imagenPortada = date('YmdHis'). "." . $pimagen->getClientOriginalExtension();
            $pimagen->move($rutaGuardarPortada, $imagenPortada);
            $in['portada'] = "$imagenPortada";
        }else{
            unset($in['portada']);
        }
        
        $in['meses']        = $request->meses;
        $in['sesiones']     = $request->sesiones;
        $in['profesor_id']  = $request->profesor_id;
        $in['estatus']      = $request->estatus;
        
        $list = CursoListado::find($id);
        $list->update($in);

        return redirect()->route('cursoslistados.index')->with('success','Producto actualizado.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        CursoListado::destroy($id);
        return redirect()->route('cursoslistados.index')->with('success','Producto eliminado.');
    }
}
