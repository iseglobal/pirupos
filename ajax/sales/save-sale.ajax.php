<?php

require "../../core.php";

// echo "PAGA CON EFECTIVO";
if (isset($_SESSION['selected_products_buys']) && !empty($_SESSION['selected_products_buys'])) {

  // var_dump($_SESSION["selected_products_buys"]);

  $precioTotal   = 0;
  $cantidadTodal = 0;

  foreach ($_SESSION["selected_products_buys"] as $product) {
    $productId      = $product["product_id"];
    $cantidad       = $product["cantidad"];
    $precioUnitario = $product["precioUnitario"];

    // $query .= "($productId,$cantidad,$precioUnitario)";

    $cantidadTodal = $cantidad + $cantidadTodal;
    $precioTotal   = ($cantidad * $precioUnitario) + $precioTotal;
  }

  $fecha_actual = date("Y-m-d H:i:s");

  $sql  = "INSERT INTO sales (date, subtotal, total_items) 
          VALUES(:date, :subtotal, :total_items)";
  $stmt = $connect->prepare($sql);
  $stmt->bindParam(":date", $fecha_actual);
  $stmt->bindParam(":subtotal", $precioTotal);
  $stmt->bindParam(":total_items", $cantidadTodal);
  $stmt->execute();

  $ultimo_id = $connect->lastInsertId();

  $query = "INSERT INTO sale_items (sale_id, product_id, quantity, unit_price) VALUES ";

  $values = array();
  foreach ($_SESSION["selected_products_buys"] as $product) {
    $productId      = $product["product_id"];
    $cantidad       = $product["cantidad"];
    $precioUnitario = $product["precioUnitario"];

    // Obtener la cantidad actual del producto
    $sqlSelect  = "SELECT quantity FROM products WHERE id=:id";
    $stmtSelect = $connect->prepare($sqlSelect);
    $stmtSelect->bindParam(":id", $productId);
    $stmtSelect->execute();
    $resultado = $stmtSelect->fetch(PDO::FETCH_OBJ);

    // Calcular la nueva cantidad (asegurándose de que no sea negativa)
    $cantidad_total = max(0, $resultado->quantity - $cantidad);

    // Actualizar la cantidad en la base de datos
    $sqlUpdate  = "UPDATE products SET quantity=:quantity WHERE id=:id";
    $stmtUpdate = $connect->prepare($sqlUpdate);
    $stmtUpdate->bindParam(":quantity", $cantidad_total);
    $stmtUpdate->bindParam(":id", $productId);
    $stmtUpdate->execute();

    $values[] = "($ultimo_id, $productId, $cantidad, $precioUnitario)";
  }

  $query .= implode(", ", $values);

  $stmt = $connect->prepare($query);
  $stmt->execute();

  unset($_SESSION["selected_products_buys"]);

  $reload_uri = APP_URL . "/controllers/sales/view.php?id=$ultimo_id";

  echo json_encode(["success" => true, "message" => "Venta exitosa.", 'reload' => $reload_uri]);

} else {
  echo json_encode(["success" => false, "message" => "No ay productos seleccionados."]);
}