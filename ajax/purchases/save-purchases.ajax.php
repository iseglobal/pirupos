<?php

require "../../core.php";

if (isset($_SESSION['selected_products_purchases']) && !empty($_SESSION['selected_products_purchases'])) {
  if (isset($_SESSION['selected_suppliers_purchases']) && !empty($_SESSION['selected_suppliers_purchases'])) {

    $total_payment = 0;
    $cantidadTodal = 0;

    foreach ($_SESSION["selected_products_purchases"] as $product) {
      // $productId = $product["product_id"];
      // $quantity  = $product["quantity"];
      // $priceUnit = $product["priceUnit"];
      $total = $product["total"];

      $total_payment += floatval($total);

    }

    $fecha_actual = date("Y-m-d H:i:s");
    $supplier_id  = $_SESSION["selected_suppliers_purchases"]["suppliers_id"];

    $sql  = "INSERT INTO purchases (date, supplier_id, total) 
          VALUES(:date, :supplier_id, :total)";
    $stmt = $connect->prepare($sql);
    $stmt->bindParam(":date", $fecha_actual);
    $stmt->bindParam(":supplier_id", $supplier_id);
    $stmt->bindParam(":total", $total_payment);
    $stmt->execute();

    $ultimo_id = $connect->lastInsertId();

    $query = "INSERT INTO purchase_items (purchase_id, product_id, quantity, price_buys) VALUES ";

    $values = array();

    foreach ($_SESSION["selected_products_purchases"] as $product) {
      $productId = $product["product_id"];
      $quantity  = $product["quantity"];
      $priceUnit = $product["priceUnit"];

      // Actualizar cantidad en $products
      $sqlSelect  = "SELECT quantity FROM products WHERE id=:id";
      $stmtSelect = $connect->prepare($sqlSelect);
      $stmtSelect->bindParam(":id", $productId);
      $stmtSelect->execute();
      $resultado      = $stmtSelect->fetch(PDO::FETCH_OBJ);
      $cantidad_total = $resultado->quantity;

      $cantidad_total = $cantidad_total + $quantity;

      $sql  = "UPDATE products SET quantity=:quantity WHERE id=:id";
      $stmt = $connect->prepare($sql);
      $stmt->bindParam(":quantity", $cantidad_total);
      $stmt->bindParam(":id", $productId);
      $stmt->execute();

      $values[] = "($ultimo_id, $productId, $quantity, $priceUnit)";
    }

    $query .= implode(", ", $values);

    $stmt = $connect->prepare($query);
    $stmt->execute();

    unset($_SESSION["selected_suppliers_purchases"]);
    unset($_SESSION["selected_products_purchases"]);

    echo json_encode([
      "success" => true,
      "message" => "Se guardo correctamente.",
      "reload"  => APP_URL . "/controllers/purchases/list.php",
      // "body"    => $body
    ]);
  } else {
    echo json_encode(["success" => false, "message" => "No ay proveedor."]);
  }

} else {
  // echo "No ay productos";
  echo json_encode(["success" => false, "message" => "No ay productos."]);
}
