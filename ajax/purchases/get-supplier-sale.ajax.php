<?php

require "../../core.php";

if (isset($_SESSION['selected_suppliers_purchases']) && !empty($_SESSION['selected_suppliers_purchases'])) {
  $selected_supplier = $_SESSION['selected_suppliers_purchases'];

  $html = "";

  foreach ($selected_supplier as $supplier_data) {
    $idSupplier = $supplier_data['suppliers_id'];

    $query = "SELECT * FROM suppliers WHERE id = :id";
    $stmt  = $connect->prepare($query);
    $stmt->bindParam(":id", $idSupplier);
    $stmt->execute();

    $supplier = $stmt->fetch(PDO::FETCH_OBJ);

    if (strlen($supplier->document_id) == 8) {
      $html .= "
          <div class=\"d-flex\">
            <div class=\"py-2 mb-0 w-100\">
              <p class=\"m-0\">$supplier->document_id</p>
              <p class=\"m-0 fw-bold fs-5\">$supplier->names $supplier->lastname</p>
            </div>
            <button class='btn btn-light-danger' onclick=\"deleteSupplierSale($supplier->id)\">
              <i class='fa fa-trash'></i>
            </button>
          </div>";
    } elseif (strlen($supplier->document_id) == 11) {
      $html .= "
          <div class=\"d-flex\">
            <div class=\"py-2 mb-0 w-100\">
              <p class=\"m-0\">$supplier->document_id</p>
              <p class=\"m-0 fw-bold fs-5\">$supplier->company</p>
              <p class=\"m-0\">$supplier->address</p>
            </div>
            <button class='btn btn-light-danger' onclick=\"deleteSupplierSale($supplier->id)\">
              <i class='fa fa-trash'></i>
            </button>
          </div>";
    }
  }

  echo json_encode(["success"=>true, "html" => $html]);
} else {
  echo json_encode(["success"=>false]);
}
