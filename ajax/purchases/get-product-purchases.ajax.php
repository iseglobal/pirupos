<?php

require "../../core.php";

if (isset($_SESSION['selected_products_purchases']) && !empty($_SESSION['selected_products_purchases'])) {
  $selected_products = $_SESSION['selected_products_purchases'];

  $html = "";

  foreach ($selected_products as $product_data) {
    $product_id     = $product_data['product_id'];
    $cantidad       = $product_data['cantidad'];
    // $precioUnitario = $product_data['precioUnitario'];

    $consulta = "SELECT * FROM products WHERE id = :product_id";
    $stmt     = $connect->prepare($consulta);
    $stmt->bindParam(":product_id", $product_id);
    $stmt->execute();
    $product = $stmt->fetch(PDO::FETCH_OBJ);

    $html .= "<tr>";
    $html .= "<td><img class='' width='50' height='50' src='" . APP_URL . "/uploads/images/$product->image' alt=''></td>";
    $html .= "<td>" . $product->name . "</td>";
    // $html .= "<td>
    //       <input class='idProducto' type='hidden' value='$product_id' name='id-producto[]'>
    //       <input type=\"text\" class=\"form-control precioUnitario\" name='precio-unitario[]' value='$precioUnitario'>
    //     </td>";
    $html .= "<td><input type=\"number\" class=\"form-control productCantidad\" name='producto-cantidad[]' value='$cantidad'></td>";
    // $html .= "<td>
    //       <span class=\"precioSubTotal\">" . ($precioUnitario * $cantidad) . "</span>
    //     </td>";
    $html .= "<td>
    <button class='btn btn-danger eliminarProductoDeVenta' data-product-id='$product->id'>
      Eliminar
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