<?php

namespace App\Http\Controllers;
use App\Models\InShoppingCart;
use App\Models\ShoppingCart;
use App\Models\CursoCategoria;
use App\Models\CursoListado;
use App\Models\CursoTemario;
use App\Models\CursoPrecio;

use Illuminate\Http\Request;

class InShoppingCartsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        $shopping_cart_id = \Session::get('shopping_cart_id');
        $shopping_cart = ShoppingCart::findOrCreateBySessionID($shopping_cart_id);

        $response = InShoppingCart::create([
            "listado_id" => $request->listado_id,
            "precio_id" => $request->precio_id,
            "shopping_cart_id" => $shopping_cart->id,
            "cantidad" => $request->cantidad
        ]);

        $listados = CursoListado::all();
        $categorias = CursoCategoria::all();

        if($response){
            return back()->with('success','Curso agregado al carrito');
        }else{
            return back();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
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
        $shopping_cart_id = \Session::get('shopping_cart_id');
        $shopping_cart = ShoppingCart::findOrCreateBySessionID($shopping_cart_id);

        $response = $product = InShoppingCart::find($id);

        $product->listado_id = $request->listado_id;
        $product->precio_id = $request->precio_id;
        $product->shopping_cart_id = $request->shopping_cart_id;
        $product->cantidad = $request->cantidad;

        $product->save();

        $listados = CursoListado::all();
        $categorias = CursoCategoria::all();

        if($response){
            return back()->with('success','Curso agregado al carrito');
        }else{
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        InShoppingCart::destroy($id);

        $listados = CursoListado::all();
        $categorias = CursoCategoria::all();

        return back()->with('danger','Curso eliminado del carrito');
    }
}
