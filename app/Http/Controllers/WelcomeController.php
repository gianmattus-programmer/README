<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Models\CursoCategoria;
use App\Models\CursoListado;
use App\Models\CursoPrecio;
use App\Models\User;
use App\Models\Encuentrano;
use App\Models\Popup;
use App\Models\ShoppingCart;
use App\Models\InShoppingCart;
use App\Models\Nosotros;
use App\Models\Libro;
use App\Models\Termino;
use App\Models\Politica;
use App\Models\Cart;
use App\Models\Detalle;
use App\Models\Checkout;
use App\Models\TiendaCategoria;
use App\Models\TiendaListado;
use App\Models\Cupon;

use MercadoPago\SDK;
use MercadoPago\Preference;
use MercadoPago\Item;

class WelcomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function finalizarcompra(Request $request)
    {
        $shopping_cart_id = \Session::get('shopping_cart_id');
        $shopping_cart = ShoppingCart::findOrCreateBySessionID($shopping_cart_id);
        $cursos = $shopping_cart->cursos()->get();
        $total = $shopping_cart->total();

        $cantidades = InShoppingCart::all();
        $listados = CursoListado::all();
        $categorias = CursoCategoria::all();
        $precios = CursoPrecio::all();
        $tlistados = TiendaListado::all();
        $tcategorias = TiendaCategoria::all();
        $cupones = Cupon::all();

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

        return view('finalizarcompra', compact('cupones', 'carts', 'total', 'precios', 'cursos', 'total', 'cantidades', 'shopping_cart_id', 'shopping_cart', 'listados', 'categorias', 'tlistados', 'tcategorias'));
    }

    public function welcome()
    {
        $users = User::all();
        $listados = CursoListado::all();
        $categorias = CursoCategoria::all();
        $tlistados = TiendaListado::all();
        $tcategorias = TiendaCategoria::all();

        return view('welcome', compact('users', 'listados', 'categorias', 'tlistados', 'tcategorias'));
    }

    public function encuentranos()
    {
        $users = User::all();
        $listados = CursoListado::all();
        $categorias = CursoCategoria::all();
        $encuentranos = Encuentrano::all();
        $popups = Popup::all();
        $tlistados = TiendaListado::all();
        $tcategorias = TiendaCategoria::all();

        return view('encuentranos', compact('users', 'listados', 'categorias', 'encuentranos', 'popups', 'tlistados', 'tcategorias'));
    }

    public function nosotros()
    {
        $users = User::all();
        $listados = CursoListado::all();
        $categorias = CursoCategoria::all();
        $nosotros = Nosotros::all();
        $tlistados = TiendaListado::all();
        $tcategorias = TiendaCategoria::all();

        return view('nosotros', compact('users', 'listados', 'categorias', 'nosotros', 'tlistados', 'tcategorias'));
    }

    public function terminos()
    {
        $users = User::all();
        $listados = CursoListado::all();
        $categorias = CursoCategoria::all();
        $terminos = Termino::all();
        $tlistados = TiendaListado::all();
        $tcategorias = TiendaCategoria::all();

        return view('terminos', compact('users', 'listados', 'categorias', 'terminos', 'tlistados', 'tcategorias'));
    }

    public function politicas()
    {
        $users = User::all();
        $listados = CursoListado::all();
        $categorias = CursoCategoria::all();
        $politicas = Politica::all();
        $tlistados = TiendaListado::all();
        $tcategorias = TiendaCategoria::all();

        return view('politicas', compact('users', 'listados', 'categorias', 'politicas', 'tlistados', 'tcategorias'));
    }

    public function libros()
    {
        $users = User::all();
        $listados = CursoListado::all();
        $categorias = CursoCategoria::all();
        $libros = Libro::all();
        $tlistados = TiendaListado::all();
        $tcategorias = TiendaCategoria::all();

        return view('libros', compact('users', 'listados', 'categorias', 'libros', 'tlistados', 'tcategorias'));
    }

    public function gracias()
    {
        $users = User::all();
        $listados = CursoListado::all();
        $categorias = CursoCategoria::all();
        $libros = Libro::all();
        $checkouts = Checkout::all();
        $detalles = Detalle::all();
        $tlistados = TiendaListado::all();
        $tcategorias = TiendaCategoria::all();

        return view('gracias', compact('users', 'listados', 'categorias', 'libros', 'checkouts', 'detalles', 'tlistados', 'tcategorias'));
    }

    public function carrito()
    {
        $shopping_cart_id = \Session::get('shopping_cart_id');
        $shopping_cart = ShoppingCart::findOrCreateBySessionID($shopping_cart_id);
        $cursos = $shopping_cart->cursos()->get();
        $total = $shopping_cart->total();

        $cantidades = InShoppingCart::all();
        $listados = CursoListado::all();
        $categorias = CursoCategoria::all();
        $precios = CursoPrecio::all();
        $tlistados = TiendaListado::all();
        $tcategorias = TiendaCategoria::all();

        return view('carrito', compact('precios', 'cursos', 'total', 'cantidades', 'shopping_cart_id', 'shopping_cart', 'listados', 'categorias', 'tlistados', 'tcategorias'));
    }

    public function verificarCupon(Request $request)
    {
        $codigo = $request->query('codigo');
        $cupon = Cupon::where('codigo', $codigo)->where('estado', 'Activo')->first();

        if ($cupon) {
            return response()->json([
                'existe' => true,
                'porcentaje' => $cupon->porcentaje,
            ]);
        } else {
            return response()->json(['existe' => false]);
        }
    }
}
