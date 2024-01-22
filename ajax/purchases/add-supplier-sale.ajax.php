<?php

require "../../core.php";

if (!isset($_SESSION['selected_suppliers_purchases'])) {
  $_SESSION['selected_suppliers_purchases'] = array();
}

$idSupplier = $_POST['idSupplier'];

$query = "SELECT * FROM suppliers WHERE id = :id";
$stmt  = $connect->prepare($query);
$stmt->bindParam(":id", $idSupplier);
$stmt->execute();

$supplier = $stmt->fetch(PDO::FETCH_OBJ);

$suppliers_info = array(
  'suppliers_id' => $supplier->id,
);

$_SESSION['selected_suppliers_purchases'] = $suppliers_info;
