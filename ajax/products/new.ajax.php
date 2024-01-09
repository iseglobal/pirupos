<?php
require "../../core.php";

$name           = $_POST["name"];
$price_buys     = $_POST["price_buys"];
$price_sale     = $_POST["price_sale"];
$quantity       = $_POST["quantity"];
$alert_quantity = $_POST["alert_quantity"];

if (isset($_FILES['image']) && $_FILES['image']['error'] == UPLOAD_ERR_OK) {
  if ($_FILES['image']['size'] > 0) {
    $carpeta_destino  = '../../uploads/images/';
    $archivo_temporal = $_FILES['image']['tmp_name'];
    $nombre_archivo   = "product_" . generateRandomString(12) . '.' . pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);

    $ruta_destino = $carpeta_destino . $nombre_archivo;

    if (move_uploaded_file($archivo_temporal, $ruta_destino)) {
      // echo "La imagen se ha subido correctamente.";
    } else {
      // echo "Error al subir la imagen.";
    }
  } else {
    // echo "Por favor, selecciona una imagen.";
  }
} else {
  // echo "Error al procesar la imagen.";
  $nombre_archivo = "no_image.png";
}

$query = "INSERT INTO products(name, price_buys, price_sale, quantity, alert_quantity, image) 
                  VALUES (:name, :price_buys, :price_sale, :quantity, :alert_quantity, :image)";
$stmt  = $connect->prepare($query);
$stmt->bindParam(":name", $name);
$stmt->bindParam(":price_buys", $price_buys);
$stmt->bindParam(":price_sale", $price_sale);
$stmt->bindParam(":quantity", $quantity);
$stmt->bindParam(":alert_quantity", $alert_quantity);
$stmt->bindParam(":image", $nombre_archivo);
$stmt->execute();

$response = [
  "success" => true,
  "message" => "Producto nuevo agregado"
];

echo json_encode($response);