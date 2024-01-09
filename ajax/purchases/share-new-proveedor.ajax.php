<?php
require "../../core.php";

$identProveedor = $_POST["identProveedor"];

echo strlen($identProveedor)."\n";
echo $identProveedor."\n";

if (strlen($identProveedor) == 8) {
  echo "DNI";
}elseif (strlen($identProveedor) == 11) {
  echo "RUC";
}else{
  echo "Numero incorrecto";
}

// URL de la API
// $apiUrl = "https://dniruc.apisperu.com/api/v1/ruc/$identProveedor?token=" . APIPERU_TOKEN;

// Realizar la solicitud a la API utilizando file_get_contents
// $response = file_get_contents($apiUrl);

// Decodificar la respuesta JSON
// $data = json_decode($response, true);

// Manejar la respuesta de la API
// print_r($data);

// echo $response;


// $ruc              = "20604692777";
// $razonSocial      = "NEGOCIACIONES FERTHI SOCIEDAD ANONIMA CERRADA";
// $nombreComercial  = null;
// $telefonos        = [];
// $tipo             = null;
// $estado           = "ACTIVO";
// $condicion        = "HABIDO";
// $direccion        = "AV. FRANCISCA DE LA CALLE NRO. 479 JUNIN HUANCAYO EL TAMBO";
// $departamento     = "JUNIN";
// $provincia        = "HUANCAYO";
// $distrito         = "EL TAMBO";
// $fechaInscripcion = null;
// $sistEmsion       = null;
// $sistContabilidad = null;
// $actExterior      = null;
// $actEconomicas    = [];
// $cpPago           = [];
// $sistElectronica  = [];
// $fechaEmisorFe    = null;
// $cpeElectronico   = [];
// $fechaPle         = null;
// $padrones         = [];
// $fechaBaja        = null;
// $profesion        = null;
// $ubigeo           = "120114";
// $capital          = "EL TAMBO";