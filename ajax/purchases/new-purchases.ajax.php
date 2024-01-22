<?php

require "../../core.php";

if (isset($_SESSION['selected_products_purchases']) && !empty($_SESSION['selected_products_purchases'])) {
  if (isset($_SESSION['selected_suppliers_purchases']) && !empty($_SESSION['selected_suppliers_purchases'])) {

    // unset($_SESSION["selected_suppliers_purchases"]);
    // unset($_SESSION["selected_products_purchases"]);

    $body = $_SESSION["selected_suppliers_purchases"];
    $body .= $_SESSION["selected_products_purchases"];

    echo json_encode([
      "success" => true,
      "message" => "Se guardo correctamente.",
      "reload"  => APP_URL . "/controllers/purchases/list.php",
      "body"    => $body
    ]);
  } else {
    $body = $_SESSION["selected_suppliers_purchases"];
    echo json_encode(["success" => false, "message" => "No ay proveedor.","body"    => $body]);
  }
  // var_dump($_SESSION["selected_products_buys"]);

  // $precioTotal   = 0;
  // $cantidadTodal = 0;

  // foreach ($_SESSION["selected_products_buys"] as $product) {
  //   $productId      = $product["product_id"];
  //   $cantidad       = $product["cantidad"];
  //   $precioUnitario = $product["precioUnitario"];

  //   // $cantidadTodal = $cantidad + $cantidadTodal;
  //   $precioTotal = ($cantidad * $precioUnitario) + $precioTotal;
  // }

  // $fecha_actual = date("Y-m-d H:i:s");
  // $supplier     = $_GET["supplier"];

  // $sql  = "INSERT INTO purchases (date, supplier, total) 
  //         VALUES(:date, :supplier, :total)";
  // $stmt = $connect->prepare($sql);
  // $stmt->bindParam(":date", $fecha_actual);
  // $stmt->bindParam(":supplier", $supplier);
  // $stmt->bindParam(":total", $precioTotal);
  // $stmt->execute();

  // $ultimo_id = $connect->lastInsertId();

  // $query = "INSERT INTO purchase_items (purchase_id, product_id, quantity, price_buys) VALUES ";

  // $values = array();

  // foreach ($_SESSION["selected_products_buys"] as $product) {
  //   $productId      = $product["product_id"];
  //   $cantidad       = $product["cantidad"];
  //   $precioUnitario = $product["precioUnitario"];

  //   // Actualizar cantidad en $products
  //   $sqlSelect  = "SELECT quantity FROM products WHERE id=:id";
  //   $stmtSelect = $connect->prepare($sqlSelect);
  //   $stmtSelect->bindParam(":id", $productId);
  //   $stmtSelect->execute();
  //   $resultado      = $stmtSelect->fetch(PDO::FETCH_OBJ);
  //   $cantidad_total = $resultado->quantity;

  //   $cantidad_total = $cantidad_total + $cantidad;

  //   $sql  = "UPDATE products SET quantity=:quantity WHERE id=:id";
  //   $stmt = $connect->prepare($sql);
  //   $stmt->bindParam(":quantity", $cantidad_total);
  //   $stmt->bindParam(":id", $productId);
  //   $stmt->execute();

  //   $values[] = "($ultimo_id, $productId, $cantidad, $precioUnitario)";
  // }

  // $query .= implode(", ", $values);

  // $stmt = $connect->prepare($query);
  // $stmt->execute();


} else {
  // echo "No ay productos";
  echo json_encode(["success" => false, "message" => "No ay productos."]);
}
