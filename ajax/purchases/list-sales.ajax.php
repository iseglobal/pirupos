<?php
require "../../core.php";

$limit = 10; // Número de registros por página

$page   = isset($_POST['page']) ? $_POST['page'] : 1;
$search = isset($_POST['search-date']) ? $_POST['search-date'] : '';

$start = ($page - 1) * $limit;

$query     = "SELECT * FROM purchases WHERE date LIKE :search ORDER BY id DESC LIMIT :start, :limit";
$statement = $connect->prepare($query);
$statement->bindValue(':search', '%' . $search . '%', PDO::PARAM_STR);
$statement->bindValue(':start', $start, PDO::PARAM_INT);
$statement->bindValue(':limit', $limit, PDO::PARAM_INT);
$statement->execute();
$sales = $statement->fetchAll(PDO::FETCH_OBJ);

$table = '';
// width='60' height='60'

if (!empty($sales)) {
  foreach ($sales as $sale) {
    $fechaOriginal = $sale->date;
    $fechaObjeto   = new DateTime($fechaOriginal);

    $fmt = new IntlDateFormatter(
      'es_PE',
      IntlDateFormatter::FULL,
      IntlDateFormatter::MEDIUM,
      'America/Lima',
      IntlDateFormatter::GREGORIAN,
      "EEEE d 'de' MMMM 'de' y hh:mm a"
    );

    $fechaFormateada = strtoupper($fmt->format($fechaObjeto));

    $id_supplier = $sale->supplier_id;

    $sql  = "SELECT * FROM suppliers WHERE id = :id";
    $stmt = $connect->prepare($sql);
    $stmt->bindParam(":id", $id_supplier);
    $stmt->execute();

    $supplier = $stmt->fetch(PDO::FETCH_OBJ);

    $table .= "<tr>";
    $table .= " <td>$fechaFormateada</td>";

    if (strlen($supplier->document_id) == 8) {
      $table .= " <td>$supplier->names $supplier->lastname</td>";
    }elseif(strlen($supplier->document_id) == 11){
      $table .= " <td>$supplier->company</td>";
    }
    $table .= " <td>S/. $sale->total</td>";
    $table .= " <td>";
    $table .= "   <a href=\"" . APP_URL . "/controllers/sales/view.php?id=$sale->id\" class=\"btn btn-sm btn-info\">Ver</a>";
    $table .= "   <a href=\"#\" class=\"btn btn-sm btn-primary\">Editar</a>";
    $table .= " </td>";
    $table .= "</tr>";
  }
} else {
  $table .= '<tr><td class="text-center" colspan="8">Producto no encontrado</td></tr>';
}

// Paginación
$queryCount     = "SELECT COUNT(*) as total FROM purchases WHERE date LIKE :search";
$statementCount = $connect->prepare($queryCount);
$statementCount->bindValue(':search', '%' . $search . '%', PDO::PARAM_STR);
$statementCount->execute();
$totalRecords = $statementCount->fetch(PDO::FETCH_ASSOC)['total'];
$totalPages   = ceil($totalRecords / $limit);

$pagination = '<ul class="pagination justify-content-end">';

$prevPage = $page - 1;
$nextPage = $page + 1;

if ($page > 1) {
  $pagination .= '<li class="page-item"><a class="page-link" role="button" onclick="loadTable(' . $prevPage . ')">Anterior</a></li>';
}

$startPage = max(1, $page - 1);
$endPage   = min($totalPages, $page + 1);

if ($startPage > 1) {
  $pagination .= '<li class="page-item"><a class="page-link" role="button" onclick="loadTable(1)">1</a></li>';
  $pagination .= '<li  class="page-item disabled"><span class="page-link">...</span></li>';
}

for ($i = $startPage; $i <= $endPage; $i++) {
  $active     = ($i == $page) ? 'active' : '';
  $pagination .= '<li class="page-item ' . $active . '"><a class="page-link" role="button" onclick="loadTable(' . $i . ')">' . $i . '</a></li>';
}

if ($endPage < $totalPages) {
  $pagination .= '<li class="page-item disabled   "><span class="page-link">...</span></li>';
  $pagination .= '<li class="page-item"><a class="page-link" role="button" onclick="loadTable(' . $totalPages . ')">' . $totalPages . '</a></li>';
}

if ($page < $totalPages) {
  $pagination .= '<li class="page-item"><a class="page-link" role="button" onclick="loadTable(' . $nextPage . ')">Siguiente</a></li>';
}

$pagination .= '</ul>';

echo json_encode(['table' => $table, 'pagination' => $pagination]);
