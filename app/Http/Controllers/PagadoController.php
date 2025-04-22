<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CursoCategoria;
use App\Models\CursoListado;
use App\Models\User;
use App\Models\CursoTemario;
use App\Models\CursoModulo;
use App\Models\TiendaCategoria;
use App\Models\TiendaListado;

class PagadoController extends Controller
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
        $tlistados = TiendaListado::all();
        $tcategorias = TiendaCategoria::all();

        return view('pagados.index', compact('users', 'listados', 'categorias', 'temarios', 'tlistados', 'tcategorias'));
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
        //
    }

    public function getCategoryByName($name)
    {
        return CursoCategoria::with('nombre')->where($name)->firstOrFail();
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $listados = CursoListado::all();
        $categorias = CursoCategoria::all();
        $tlistados = TiendaListado::all();
        $tcategorias = TiendaCategoria::all();

        $temario = CursoTemario::find($id);
        $modulos = CursoModulo::where('temario_id', $temario->id)
            ->where('estatus', 1)
            ->orderBy('ordermod', 'asc') // Asegúrate de tener este campo en tu base de datos
            ->get();

        return view('pagados.show', compact('temario', 'categorias', 'listados', 'modulos', 'tlistados', 'tcategorias'));
    }

    public function prodshow($id)
    {
        $listados = CursoListado::all();
        $categorias = CursoCategoria::all();
        $temarios = CursoTemario::all();
        $tlistados = TiendaListado::all();
        $tcategorias = TiendaCategoria::all();

        $listado = CursoListado::find($id);

        return view('pagados.productos', compact('listados', 'listado', 'categorias', 'temarios', 'tlistados', 'tcategorias'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
    }
}
