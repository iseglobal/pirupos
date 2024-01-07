<?php
require "../../core.php";

// $paymentEfective = $_POST['paymentEfective'] == "" ? $_POST['paymentEfective'] : 0;


if ($_POST['paymentEfective'] != "") {
  $paymentEfective = $_POST['paymentEfective'];
} else {
  $paymentEfective = 0;
}

if (isset($_SESSION['selected_products_buys'])) {
  $selected_products = $_SESSION['selected_products_buys'];

  $total = 0;
  foreach ($selected_products as $key => $product) {
    $total += $selected_products[$key]["total"];
  }


  if ($paymentEfective < $total) {
    echo json_encode(["return" => $paymentEfective - $total, "error" => "El efectivo no puede ser menor al monto a pagar"]);
  } else {
    echo json_encode(["return" => $paymentEfective - $total, "error" => ""]);
  }
  // echo "Producto cambio cantidad correctamente.";
} else {
  echo json_encode(["error" => "No se han seleccionado productos."]);
}