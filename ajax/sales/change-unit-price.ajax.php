<?php
require "../../core.php";

$product_id = $_POST['productId'];
$unit_price = $_POST['unitPrice'];

if (isset($_SESSION['selected_products_buys'])) {
  $selected_products = $_SESSION['selected_products_buys'];

  foreach ($selected_products as $key => $product) {
    if ($product['product_id'] === $product_id) {
      $selected_products[$key]["precioUnitario"] = $unit_price;
      $selected_products[$key]["total"] = $unit_price * $selected_products[$key]["cantidad"];
    }
  }

  $_SESSION['selected_products_buys'] = array_values($selected_products);

  echo "Producto cambio precio correctamente.";
} else {
  echo "No se han seleccionado productos.";
}