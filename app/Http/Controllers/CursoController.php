<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CursoCategoria;
use App\Models\CursoListado;
use App\Models\User;
use App\Models\CursoTemario;
use App\Models\CursoPrecio;
use App\Models\TiendaCategoria;
use App\Models\TiendaListado;

class CursoController extends Controller
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
        $precios = CursoPrecio::all();
        $tlistados = TiendaListado::all();
        $tcategorias = TiendaCategoria::all();

        return view('cursos.index', compact('users', 'listados', 'categorias', 'temarios', 'precios', 'tlistados', 'tcategorias'));
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
        $temarios = CursoTemario::all();
        $precios = CursoPrecio::all();
        $tlistados = TiendaListado::all();
        $tcategorias = TiendaCategoria::all();

        //$categoria = $this->getCategoryByName($id);

        $categoria = CursoCategoria::find($id);

        return view('cursos.show', compact('listados', 'categoria', 'categorias', 'temarios', 'precios', 'tlistados', 'tcategorias'));
    }

    public function prodshow($id)
    {
        $listados = CursoListado::all();
        $categorias = CursoCategoria::all();
        $temarios = CursoTemario::all();
        $precios = CursoPrecio::all();
        $tlistados = TiendaListado::all();
        $tcategorias = TiendaCategoria::all();

        //$categoria = $this->getCategoryByName($id);

        $listado = CursoListado::find($id);

        return view('cursos.productos', compact('listados', 'listado', 'categorias', 'temarios', 'precios', 'tlistados', 'tcategorias'));
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
