<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CursoCategoria;
use App\Models\CursoListado;
use App\Models\User;
use App\Models\CursoTemario;
use App\Models\TiendaCategoria;
use App\Models\TiendaListado;

class ShopController extends Controller
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

        return view('shop.index', compact('users', 'listados', 'categorias', 'temarios', 'listados', 'categorias', 'tlistados', 'tcategorias'));
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
        return TiendaCategoria::with('nombre')->where($name)->firstOrFail();
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

        $categoria = TiendaCategoria::find($id);

        return view('shop.show', compact('listados', 'categoria', 'categorias', 'tlistados', 'tcategorias'));
    }

    public function prodshow($id)
    {
        $listados = CursoListado::all();
        $categorias = CursoCategoria::all();
        $tlistados = TiendaListado::all();
        $tcategorias = TiendaCategoria::all();

        $listado = TiendaListado::find($id);

        return view('shop.productos', compact('listados', 'listado', 'categorias', 'tlistados', 'tcategorias'));
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
