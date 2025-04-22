<?php

return [
    'client_id' => env('MERCADO_PAGO_CLIENT_ID'),
    'client_secret' => env('MERCADO_PAGO_CLIENT_SECRET'),
    'sandbox' => env('MERCADO_PAGO_SANDBOX', false), // Cambia a false en producción
];
