<?php

require "../../core.php";

$searchTerm = "%" . $_POST["searchTerm"] . "%";

$sql  = "SELECT * FROM products WHERE name LIKE :searchTerm LIMIT 20";
$stmt = $connect->prepare($sql);
$stmt->bindParam(":searchTerm", $searchTerm);
$stmt->execute();
$products = $stmt->fetchAll(PDO::FETCH_OBJ);

$html = "";

foreach ($products as $product) {
  $html .= "<tr>";
  $html .= "<td><img class='' width='50' height='50' src='" . APP_URL . "/uploads/images/$product->image ' alt=''></td>";
  $html .= "<td>" . $product->name . "</td>";

  if (isset($_SESSION['selected_products_purchases'])) {
    $selected_product_ids = array_column($_SESSION['selected_products_purchases'], 'product_id');

    if (in_array($product->id, $selected_product_ids)) {
      $html .= "<td><button class='btn btn-secondary agregarProductoAVentas' type='button' disabled>Agregar</button></td>";
    } else {
      $html .= "<td><button class='btn btn-success agregarProductoAVentas' onclick=\"addProductsPurchases($product->id)\" type='button'>Agregar</button></td>";
    }
  } else {
    $html .= "<td><button class='btn btn-success agregarProductoAVentas' onclick=\"addProductsPurchases($product->id)\" data-product-id='$product->id' type='button'>Agregar</button></td>";
  }


  $html .= "</tr>";
}

echo $html;