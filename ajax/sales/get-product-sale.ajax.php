<?php
require "../../core.php";


// Verificar si la variable de sesión 'selected_products' existe
if (isset($_SESSION['selected_products_buys']) && !empty($_SESSION['selected_products_buys'])) {
  $selected_products = $_SESSION['selected_products_buys'];

  $html = "";

  $total_pagar = 0;

  foreach ($selected_products as $product_data) {
    $product_id     = $product_data['product_id'];
    $cantidad       = $product_data['cantidad'];
    $precioUnitario = $product_data['precioUnitario'];
    $total          = number_format($product_data['total'], 2);

    $total_pagar += $total;

    $consulta = "SELECT * FROM products WHERE id = :product_id";
    $stmt     = $connect->prepare($consulta);
    $stmt->bindParam(":product_id", $product_id);
    $stmt->execute();
    $product = $stmt->fetch(PDO::FETCH_OBJ);

    $html .= "<tr>";
    $html .= "<td><img class='' width='50' height='50' src='" . APP_URL . "/uploads/images/$product->image' alt=''></td>";
    $html .= "<td>" . $product->name . "</td>";
    $html .= "<td>
                <input type=\"text\" class=\"form-control\" value='$precioUnitario' onchange='changeUnitPrice($product->id, this.value)'>
              </td>";
    $html .= "<td>
                <input type=\"number\" class=\"form-control\" value='$cantidad' onchange='changeQuantity($product->id, this.value)'>
              </td>";
    $html .= "<td>
                <span class=\"precioSubTotal\">$total</span>
              </td>";
    $html .= "<td>
                <button class='btn btn-danger' onclick=\"deleteProductSale($product->id)\">
                  <i class='fa fa-trash'></i>
                </button>
              </td>";
    $html .= "</tr>";
  }



  echo json_encode(["html" => $html, "total_pagar" => number_format($total_pagar,2)]);
} else {
  $html = "</tr>";
  $html .= "<td colspan='6' class='text-center'>No se han seleccionado productos.</td>";
  $html .= "</tr>";

  echo json_encode(["html" => $html, "total_pagar" => 0.00]);
}