<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\CursoCategoria;
use App\Models\CursoListado;
use App\Models\CursoPrecio;
use App\Models\User;
use App\Models\Cart;
use App\Models\Detalle;
use App\Models\Checkout;
use App\Models\TiendaCategoria;
use App\Models\TiendaListado;
use App\Models\Cupon;

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
        $checkouts = Checkout::all();
        $detalles = Detalle::all();
        $tlistados = TiendaListado::all();
        $tcategorias = TiendaCategoria::all();

        return view('admin.shops.index', compact('users', 'listados', 'categorias', 'checkouts', 'detalles', 'tlistados', 'tcategorias'));
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

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $users = User::all();
        $listados = CursoListado::all();
        $categorias = CursoCategoria::all();
        $detalles = Detalle::all();
        $tlistados = TiendaListado::all();
        $tcategorias = TiendaCategoria::all();

        $checkout = Checkout::find($id);

        return view('admin.shops.show', compact('users', 'listados', 'categorias', 'checkout', 'detalles', 'tlistados', 'tcategorias'));
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
