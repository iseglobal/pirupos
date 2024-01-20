<?php

require "../../core.php";

if (isset($_SESSION['selected_products_purchases']) && !empty($_SESSION['selected_products_purchases'])) {
  $selected_products = $_SESSION['selected_products_purchases'];

  $html = "";

  foreach ($selected_products as $product_data) {
    $product_id = $product_data['product_id'];
    $cantidad   = $product_data['cantidad'];
    // $precioUnitario = $product_data['precioUnitario'];

    $consulta = "SELECT * FROM products WHERE id = :product_id";
    $stmt     = $connect->prepare($consulta);
    $stmt->bindParam(":product_id", $product_id);
    $stmt->execute();
    $product = $stmt->fetch(PDO::FETCH_OBJ);

    $html .= "<tr>";
    $html .= "<td>
                <img class='' width='50' height='50' src='" . APP_URL . "/uploads/images/$product->image' alt=''>
              </td>";
    $html .= "<td>" . $product->name . "</td>";
    $html .= "<td><input class=\"form-control\" type=\"text\" value=\"1\"></td>";
    $html .= "<td><input class=\"form-control\" type=\"text\" value=\"0.00\"></td>";
    $html .= "<td class='text-center fw-bold'>S/ 0.00</td>";
    $html .= "<td class='text-center'>
                <button class='btn btn-light-danger' onclick=\"deleteProductpurchases($product->id)\">
                  <i class='fa fa-trash'></i>
                </button>
              </td>";
    $html .= "</tr>";
  }

  echo $html;
} else {
  $html = "</tr>";
  $html .= "<td colspan='6' class='text-center'>No se han seleccionado productos.</td>";
  $html .= "</tr>";
  echo $html;
}