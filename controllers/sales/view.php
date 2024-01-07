<?php

require "../../core.php";

$id = $_GET['id'];

$query = "SELECT
            sale.*,
            sale_item.*,
            product.name AS product_name
          FROM
            sales sale
          INNER JOIN
            sale_items sale_item ON sale.id = sale_item.sale_id
          INNER JOIN
            products product ON sale_item.product_id = product.id
          WHERE
            sale.id = :id";
$stmt  = $connect->prepare($query);
$stmt->bindParam(":id", $id);
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_OBJ);

if (count($result) > 0) {
  $sale       = $result[0];
  $sale_items = $result;

  /* ============ Theme config ========== */
  $theme_title   = "Lista de productos";
  $theme_path    = "list_products";
  // $theme_styles  = ["assets/css/sweetalert2.css"];
  $theme_scripts = [
    // "assets/js/sweetalert2.js",
    "assets/js/pages/sales/view.js"
  ];

  include "../../views/partials/header.view.php";
  include "../../views/partials/dash-top.view.php";
  include "../../views/sales/view.view.php";
  include "../../views/partials/dash-bottom.view.php";
  include "../../views/partials/footer.view.php";
  /* ================================ */

} else {
  echo "No se encontraron datos para la venta con ID: $id";
}