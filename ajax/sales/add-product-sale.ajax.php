<?php
require "../../core.php";

if (!isset($_SESSION['selected_products_buys'])) {
  $_SESSION['selected_products_buys'] = array();
}

$product_id = $_POST['productId'];

$consulta = "SELECT * FROM products WHERE id = :product_id";
$stmt     = $connect->prepare($consulta);
$stmt->bindParam(":product_id", $product_id);
$stmt->execute();
$product = $stmt->fetch(PDO::FETCH_OBJ);

$product_info = array(
  'product_id'     => $product_id,
  'cantidad'       => 1,
  'precioUnitario' => $product->price_sale,
  'total'          => number_format(1 * $product->price_sale,2)
);

$_SESSION['selected_products_buys'][] = $product_info;

echo "Correcto -> " . $product_id;