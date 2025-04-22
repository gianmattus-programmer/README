<?php
// Cargamos Requests y Culqi PHP
include_once dirname(__FILE__).'../../../../public/Requests/library/Requests.php';
Requests::register_autoloader();
include_once dirname(__FILE__).'../../../../public/culqi-php/lib/culqi.php';


// Configurar tu API Key y autenticación
$SECRET_KEY = "TEST-2702950865077168-081521-514f663bb4f6001e2ed948c7ac15acef-1499738269";
$culqi = new Culqi\Culqi(array('api_key' => $SECRET_KEY));

// Creamos Cargo a una tarjeta
$charge = $culqi->Charges->create(
    array(
      "amount" => 1000,
      "currency_code" => "PEN",
      "description" => "Venta de prueba",
      "email" => "admin@pralemy.com",
      "source_id" => $_POST['token']
    )
);

echo "exitoso";

//Respuesta
/*print_r($charge);*/