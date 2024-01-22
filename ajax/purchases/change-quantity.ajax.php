<?php
require "../../core.php";

$product_id = $_POST['productId'];
$quantity   = $_POST['quantity'];

if (isset($_SESSION['selected_products_purchases'])) {
  $selected_products = $_SESSION['selected_products_purchases'];

  foreach ($selected_products as $key => $product) {
    if ($product['product_id'] === $product_id) {
      $selected_products[$key]["quantity"] = $quantity;
      $selected_products[$key]["total"]    = $quantity * $selected_products[$key]["priceUnit"];

      echo $selected_products[$key]["total"] . "\n";
    }
  }

  $_SESSION['selected_products_purchases'] = array_values($selected_products);

  echo "Producto cambio cantidad correctamente.";
} else {
  echo "No se han seleccionado productos.";
}