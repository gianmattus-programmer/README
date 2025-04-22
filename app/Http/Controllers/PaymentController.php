<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use MercadoPago\SDK;
use MercadoPago\Preference;
use MercadoPago\Item;

class PaymentController extends Controller
{
    public function crearPreferencia(Request $request)
    {
        try {
            // Inicializa el SDK
            SDK::setAccessToken(env('MERCADO_PAGO_CLIENT_SECRET'));
    
            // Crear la preferencia
            $preference = new Preference();
            $item = new Item();
            $item->title = 'Pralemy Fashion School';
            $item->quantity = 1;
            $item->unit_price = 1;
            $preference->items = [$item];
    
            $preference->back_urls = [
                'success' => route('gracias'),
                'failure' => route('payment.error'),
                'pending' => route('payment.pending'),
            ];

            $preference->auto_return = "approved";
            $preference->save();
    
            return response()->json(['success' => true, 'preferenceId' => $preference->id]);
    
        } catch (\Exception $e) {
            // Registrar el error y devolver respuesta JSON de error
            \Log::error("Error al crear preferencia de MercadoPago: " . $e->getMessage());
            return response()->json(['success' => false, 'error' => 'Error al crear la preferencia.'], 500);
        }
    }

    public function show()
    {
        return view('gracias'); // Asegúrate de tener esta vista
    }

    public function gracias()
    {
        return view('gracias'); // Asegúrate de tener esta vista
    }

    public function error()
    {
        return view('payment.error'); // Asegúrate de tener esta vista
    }

    public function pending()
    {
        return view('payment.pending'); // Asegúrate de tener esta vista
    }
}
