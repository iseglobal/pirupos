<?php

require "../../core.php";

if (isset($_POST["searchTerm"])) {
  $searchTerm = $_POST["searchTerm"];

  $searchSql = "SELECT * FROM `suppliers` 
                    WHERE 
                      `document_id` LIKE :searchTermDoc OR
                      `company` LIKE :searchTermCompany OR
                      `names` LIKE :searchTermNames OR
                      `lastname` LIKE :searchTermLastname";

  $stmt = $connect->prepare($searchSql);

  $searchTermWildcard = "%$searchTerm%";

  $stmt->bindValue(':searchTermDoc', $searchTermWildcard, PDO::PARAM_STR);
  $stmt->bindValue(':searchTermCompany', $searchTermWildcard, PDO::PARAM_STR);
  $stmt->bindValue(':searchTermNames', $searchTermWildcard, PDO::PARAM_STR);
  $stmt->bindValue(':searchTermLastname', $searchTermWildcard, PDO::PARAM_STR);

  $stmt->execute();
  $suppliers = $stmt->fetchAll(PDO::FETCH_OBJ);

  $html = "";

  if ($suppliers) {
    foreach ($suppliers as $supplier) {
      $html .= "<tr>";
      $html .= "<td>$supplier->document_id</td>";
      if (strlen($supplier->document_id) == 8) {
        $html .= "<td>$supplier->names $supplier->lastname</td>";
      } elseif (strlen($supplier->document_id) == 11) {
        $html .= "<td>$supplier->company</td>";
      }
      $html .= "<td class=\"text-center\" >
                <button class=\"btn btn-light-success\" type=\"button\" onclick=\"addSupplierSale($supplier->id)\">
                  <i class=\"fa fa-plus\"></i>
                </button>
              </td>";
      $html .= "</tr>";
    }
  } else {
    $html .= "<tr>";
    $html .= "<td colspan=\"3\">Proveedor no encontrado agregar nuevo</td>";
    $html .= "</tr>";
  }

  echo $html;
}
