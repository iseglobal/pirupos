<?php
require "../../core.php";

$product_id = $_POST['productId'];

// Verificar si la variable de sesión 'selected_products' existe
if (isset($_SESSION['selected_products_buys'])) {
  $selected_products = $_SESSION['selected_products_buys'];

  // Buscar y eliminar el product_id de la variable de sesión
  foreach ($selected_products as $key => $product) {
    if ($product['product_id'] === $product_id) {
      unset($selected_products[$key]);
    }
  }

  // Actualizar la variable de sesión
  $_SESSION['selected_products_buys'] = array_values($selected_products);

  echo "Producto eliminado correctamente.";
} else {
  echo "No se han seleccionado productos.";
}