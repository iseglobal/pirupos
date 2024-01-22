<?php

require "../../core.php";

if (isset($_SESSION['selected_products_purchases']) && !empty($_SESSION['selected_products_purchases'])) {
  $selected_products = $_SESSION['selected_products_purchases'];

  $html = "";

  $total_payment = 0;

  foreach ($selected_products as $product_data) {
    $product_id = $product_data['product_id'];
    $quantity   = $product_data['quantity'];
    $priceUnit  = number_format($product_data['priceUnit'], 2);
    $total      = number_format($product_data['total'], 2);

    $total_payment += floatval($total);

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
    $html .= "<td><input class=\"form-control\" type=\"text\" value=\"$quantity\" onchange='changeQuantity($product->id, this.value)'></td>";
    $html .= "<td><input class=\"form-control\" type=\"text\" value=\"$priceUnit\" onchange='changeUnitPrice($product->id, this.value)'></td>";
    $html .= "<td class='text-center fw-bold'>S/. $total</td>";
    $html .= "<td class='text-center'>
                <button class='btn btn-light-danger' onclick=\"deleteProductPruchases($product->id)\">
                  <i class='fa fa-trash'></i>
                </button>
              </td>";
    $html .= "</tr>";
  }

  echo json_encode(["html" => $html, "total_payment" => number_format($total_payment, 2)]);
} else {
  $html = "</tr>";
  $html .= "<td colspan='6' class='text-center'>No se han seleccionado productos.</td>";
  $html .= "</tr>";

  echo json_encode(["html" => $html, "total_payment" => 0.00]);
}