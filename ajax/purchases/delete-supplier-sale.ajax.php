<?php

require "../../core.php";

// Verificar si la variable de sesión 'selected_products' existe
if (isset($_SESSION['selected_suppliers_purchases'])) {
  
  unset($_SESSION['selected_suppliers_purchases']);

  echo json_encode(["success" => true]);
} else {
  echo json_encode(["success" => false]);
}