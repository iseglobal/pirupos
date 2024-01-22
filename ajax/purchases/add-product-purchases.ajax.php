<?php

require "../../core.php";

if (!isset($_SESSION['selected_products_purchases'])) {
  $_SESSION['selected_products_purchases'] = array();
}

$product_id = $_POST['id'];

$consulta = "SELECT * FROM products WHERE id = :product_id";
$stmt     = $connect->prepare($consulta);
$stmt->bindParam(":product_id", $product_id);
$stmt->execute();
$product = $stmt->fetch(PDO::FETCH_OBJ);

$product_info = array(
  'product_id' => $product_id,
  'quantity'   => 1,
  'priceUnit'  => 0.00,
  'total'      => 0.00
);

$_SESSION['selected_products_purchases'][] = $product_info;

echo "Correcto -> " . $product_id;
