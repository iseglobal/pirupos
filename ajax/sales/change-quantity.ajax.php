<?php
require "../../core.php";

$product_id = $_POST['productId'];
$quantity   = $_POST['quantity'];

if (isset($_SESSION['selected_products_buys'])) {
  $selected_products = $_SESSION['selected_products_buys'];

  foreach ($selected_products as $key => $product) {
    if ($product['product_id'] === $product_id) {
      $selected_products[$key]["cantidad"] = $quantity;
      $selected_products[$key]["total"] = $quantity * $selected_products[$key]["precioUnitario"];
    }
  }

  $_SESSION['selected_products_buys'] = array_values($selected_products);

  echo "Producto cambio cantidad correctamente.";
} else {
  echo "No se han seleccionado productos.";
}