<?php

require "../../core.php";

$product_id     = $_POST["id"];
$new_price_sale = $_POST["newPrice"];

$query = "UPDATE products 
          SET price_sale = :new_price_sale 
          WHERE id = :product_id";

$stmt = $connect->prepare($query);
$stmt->bindParam(":new_price_sale", $new_price_sale);
$stmt->bindParam(":product_id", $product_id);

if ($stmt->execute()) {
  echo "¡Actualización exitosa!";
} else {
  echo "Error al actualizar el precio de venta: " . $stmt->errorInfo()[2];
}