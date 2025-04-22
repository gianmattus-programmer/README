<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\CursoCategoria;
use App\Models\CursoListado;
use App\Models\CursoPrecio;
use App\Models\ShoppingCart;
use App\Models\InShoppingCart;
use App\Models\Checkout;
use App\Models\Detalle;
use App\Models\Yape;
use MercadoPago;
use Image;

use App\Models\Profile;
use App\Models\Role;
use App\Models\User;
use App\Models\RoleUser;
use App\Traits\CaptureIpTrait;
use Auth;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Validator;
use App\Models\TiendaCategoria;
use App\Models\TiendaListado;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
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
        $users = User::all();
        $listados = CursoListado::all();
        $categorias = CursoCategoria::all();
        $tlistados = TiendaListado::all();
        $tcategorias = TiendaCategoria::all();

        $mails = $request->input('email');

        if(User::where('email', $mails)->exists()){
            $email = User::where('email', $mails)->get();

            foreach($email as $email){
                $id_correo = $email->id;
            }

            $checkout = Checkout::create([
                'user_id'          => $id_correo,
                'metodo'           => strip_tags($request->input('metodo')),
                'subtotal'         => strip_tags($request->input('subtotal')),
                'igv'              => strip_tags($request->input('igv')),
                'descuento'        => strip_tags($request->input('descuento')),
                'total'            => strip_tags($request->input('total')),
                'estatus'          => strip_tags($request->input('estatus')),
            ]);

            $checkoutId = $checkout->id;

            $insertData = [];
            for($x = 0; $x < count($request->cursocategorias_id); $x++){
                $insertData[] = [
                    'checkout_id'           => $checkout->id,
                    'cursocategorias_id'    => $request->cursocategorias_id[$x],
                    'listado_id'            => $request->listado_id[$x],
                    'precio_id'             => $request->precio_id[$x],
                    'nombre'                => $request->nombre[$x],
                    'categoria'             => $request->categoria[$x],
                    'precio'                => $request->precio[$x],
                    'descuento'             => $request->desc[$x],
                    'cantidad'              => $request->cantidad[$x],
                    'inicio'                => $request->inicio[$x],
                    'duracion'              => $request->duracion[$x],
                    'horarios'              => $request->horarios[$x],
                    'estatus'               => $request->estatus,
                ];
            }

            $detalle = Detalle::insert($insertData);

            if($request->metodo == "Paga con Yape"){
                Yape::create([
                    'checkout_id'   => $checkout->id,
                    'file'          => 1,
                    'estatus'       => 1,
                ]);
            }

            \Session::forget('shopping_cart_id');
            \Session::forget('cantidad');

            if (auth()->check()) {
                \App\Models\Cart::where('user_id', auth()->id())->delete();
            } else {
                \App\Models\Cart::where('session_id', session()->getId())->delete();
            }
            
            session()->forget('cart_items');

            return redirect()->route('gracias', compact('users', 'listados', 'categorias', 'checkoutId'));
        }else{
            $ipAddress = new CaptureIpTrait();

            $role = Role::where('slug', '=', 'user')->first();
            $activated = true;
    
            $user = User::create([
                'name'             => strip_tags($request->input('first_name')),
                'first_name'       => strip_tags($request->input('first_name')),
                'last_name'        => strip_tags($request->input('last_name')),
                'email'            => strip_tags($request->input('email')),
                'password'         => Hash::make($request->input('email')),
                'token'            => str_random(64),
                'admin_ip_address' => $ipAddress->getClientIp(),
                'activated'        => 2,
                'documento'        => strip_tags($request->input('documento')),
                'celular'          => strip_tags($request->input('celular')),
                'direccion'        => strip_tags($request->input('direccion')),
                'estatus'          => strip_tags($request->input('estatus')),
            ]);
    
            $user->attachRole($role);
    
            $profile = new Profile();
            $user->profile()->save($profile);
            $user->save();
            
            $checkout = Checkout::create([
                'user_id'          => $user->id,
                'metodo'           => strip_tags($request->input('metodo')),
                'subtotal'         => strip_tags($request->input('subtotal')),
                'igv'              => strip_tags($request->input('igv')),
                'descuento'        => strip_tags($request->input('descuento')),
                'total'            => strip_tags($request->input('total')),
                'estatus'          => strip_tags($request->input('estatus')),
            ]);
            
            $checkoutId = $checkout->id;

            $insertData = [];
            for($x = 0; $x < count($request->cursocategorias_id); $x++){
                $insertData[] = [
                    'checkout_id'           => $checkout->id,
                    'cursocategorias_id'    => $request->cursocategorias_id[$x],
                    'listado_id'            => $request->listado_id[$x],
                    'precio_id'             => $request->precio_id[$x],
                    'nombre'                => $request->nombre[$x],
                    'categoria'             => $request->categoria[$x],
                    'precio'                => $request->precio[$x],
                    'descuento'             => $request->desc[$x],
                    'cantidad'              => $request->cantidad[$x],
                    'inicio'                => $request->inicio[$x],
                    'duracion'              => $request->duracion[$x],
                    'horarios'              => $request->horarios[$x],
                    'estatus'               => $request->estatus,
                ];
            }

            $detalle = Detalle::insert($insertData);

            if($request->metodo == "Paga con Yape"){
                Yape::create([
                    'checkout_id'   => $checkout->id,
                    'file'          => 1,
                    'estatus'       => 1,
                ]);
            }

            \Session::forget('shopping_cart_id');
            \Session::forget('cantidad');

            if (auth()->check()) {
                \App\Models\Cart::where('user_id', auth()->id())->delete();
            } else {
                \App\Models\Cart::where('session_id', session()->getId())->delete();
            }
            
            session()->forget('cart_items');

            return redirect()->route('gracias', compact('users', 'listados', 'categorias', 'checkoutId'));
        }
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
