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

  include "../../views/sales/tiket.view.php";
}

?>

