<?php

require "../../core.php";

// Datos para insertar
$documentId  = $_POST["document_id"];
$company     = $_POST["company"];
$names       = $_POST["names"];
$lastname    = $_POST["lastname"];
$phone       = $_POST["phone"];
$email       = $_POST["email"];
$address     = $_POST["address"];
$observation = $_POST["observation"];
$updated     = date('Y-m-d H:i:s');
$created     = date('Y-m-d H:i:s');

// Verificar si el document_id ya existe
$checkSql       = "SELECT COUNT(*) AS count FROM `suppliers` WHERE `document_id` = :document_id";
$checkStatement = $connect->prepare($checkSql);
$checkStatement->bindParam(':document_id', $documentId);
$checkStatement->execute();
$count = $checkStatement->fetchColumn();

if ($count > 0) {
  $response = [
    "success" => false,
    "message" => "El proveedor ya existe en la base de datos."
  ];
  echo json_encode($response);
} else {
  // Query de inserción con placeholders
  $insertSql = "INSERT INTO `suppliers` 
        (`document_id`, `company`, `names`, `lastname`, `phone`, `email`, `address`, `observation`, `updated`, `created`) 
        VALUES 
        (:document_id, :company, :names, :lastname, :phone, :email, :address, :observation, :updated, :created)";

  // Preparar la declaración de inserción
  $insertStatement = $connect->prepare($insertSql);

  // Bindear parámetros
  $insertStatement->bindParam(':document_id', $documentId);
  $insertStatement->bindParam(':company', $company);
  $insertStatement->bindParam(':names', $names);
  $insertStatement->bindParam(':lastname', $lastname);
  $insertStatement->bindParam(':phone', $phone);
  $insertStatement->bindParam(':email', $email);
  $insertStatement->bindParam(':address', $address);
  $insertStatement->bindParam(':observation', $observation);
  $insertStatement->bindParam(':updated', $updated);
  $insertStatement->bindParam(':created', $created);

  // Ejecutar la declaración de inserción
  $insertResult = $insertStatement->execute();

  // Verificar el resultado de la inserción
  if ($insertResult) {
    $response = [
      "success" => true,
      "message" => "Registro insertado correctamente."
    ];
    echo json_encode($response);
  } else {
    $response = [
      "success" => false,
      "message" => "Error al insertar el registro: " . $insertStatement->errorInfo()[2]
    ];
    echo json_encode($response);
  }
}
