<?php
require "../../core.php";

$identProveedor = $_POST["docId"];

if (strlen($identProveedor) == 8) {
  $apiUrl = "https://dniruc.apisperu.com/api/v1/dni/$identProveedor?token=" . APIPERU_TOKEN;
  $response   = file_get_contents($apiUrl);
  $data = json_decode($response, true);

  echo json_encode(["type" => "DNI", "content" => $data]);
} elseif (strlen($identProveedor) == 11) {
  $apiUrl = "https://dniruc.apisperu.com/api/v1/ruc/$identProveedor?token=" . APIPERU_TOKEN;
  $response   = file_get_contents($apiUrl);
  $data = json_decode($response, true);

  echo json_encode(["type" => "RUC", "content" => $data]);
} else {
  echo json_encode([
    "success" => false,
    "message" => "Numero incorrecto",
  ]);
}


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