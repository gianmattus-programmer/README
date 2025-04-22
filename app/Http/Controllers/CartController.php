<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\CursoCategoria;
use App\Models\CursoListado;
use App\Models\User;
use App\Models\CursoTemario;
use App\Models\CursoPrecio;
use App\Models\TiendaCategoria;
use App\Models\TiendaListado;

class CartController extends Controller
{
    public function addToCart(Request $request, $productId)
    {
        $request->validate([
            'quantity' => 'required|integer|min:1',
        ]);

        $cart = new Cart();

        if (auth()->check()) {
            $cart->user_id = auth()->id();
        } else {
            $cart->session_id = $request->session()->getId();
        }

        $cart->product_id = $productId;
        $cart->quantity = $request->input('quantity', 1);
        $cart->categoria = $request->input('categoria');
        $cart->categoria_id = $request->input('categoria_id');
        $cart->precio = $request->input('precio');
        $cart->descuento = $request->input('descuento');
        $cart->precio_id = $request->input('precio_id');
        $cart->save();

        return redirect()->back()->with('success', 'Producto añadido al carrito');
    }

    public function viewCart(Request $request)
    {
        if (auth()->check()) {
            // Si el usuario está autenticado
            $carts = Cart::where('user_id', auth()->id())->get();
        } else {
            // Si el usuario no está autenticado
            $carts = Cart::where('session_id', $request->session()->getId())->get();
        }

        $total = $carts->sum(function($cart) {
            if($cart->descuento){
                return $cart->descuento * $cart->quantity;
            }else{
                return $cart->precio * $cart->quantity;
            }
        });

        $users = User::all();
        $listados = CursoListado::all();
        $categorias = CursoCategoria::all();
        $temarios = CursoTemario::all();
        $precios = CursoPrecio::all();
        $tlistados = TiendaListado::all();
        $tcategorias = TiendaCategoria::all();

        return view('carrito.index', compact('carts', 'total', 'users', 'listados', 'categorias', 'temarios', 'precios', 'tlistados', 'tcategorias'));
    }

    public function updateCart(Request $request, $cartId)
    {
        $cart = Cart::find($cartId);

        $cart->quantity = $request->input('quantity');
        $cart->save();

        return back()->with('success', 'Carrito actualizado');
    }

    public function removeCartItem($cartId)
    {
        $cart = Cart::find($cartId);
        $cart->delete();

        return back()->with('success', 'Producto eliminado del carrito');
    }

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
        //
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
