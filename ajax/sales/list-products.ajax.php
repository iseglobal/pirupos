<?php
require "../../core.php";

$limit = 8; // Número de registros por página

$page   = isset($_POST['page']) ? $_POST['page'] : 1;
$search = isset($_POST['search']) ? $_POST['search'] : '';

$start = ($page - 1) * $limit;

// Lógica para ordenar
$sort = isset($_POST['sort']) ? $_POST['sort'] : 'nombre_asc';

$orderBy = 'name ASC';

$_SESSION['sort'] = $sort;

if ($sort == 'nombre_za') {
  $orderBy = 'name DESC';
} elseif ($sort == 'stok_mayor') {
  $orderBy = 'quantity DESC';
} elseif ($sort == 'stok_menor') {
  $orderBy = 'quantity ASC';
}

$query     = "SELECT * FROM products WHERE name LIKE :search ORDER BY $orderBy LIMIT :start, :limit";
$statement = $connect->prepare($query);
$statement->bindValue(':search', '%' . $search . '%', PDO::PARAM_STR);
$statement->bindValue(':start', $start, PDO::PARAM_INT);
$statement->bindValue(':limit', $limit, PDO::PARAM_INT);
$statement->execute();
$products = $statement->fetchAll(PDO::FETCH_OBJ);

$table = '';
// width='60' height='60'

if (!empty($products)) {
  foreach ($products as $product) {
    $table .= "<tr>
                <td>
                    <img src='" . APP_URL . "/uploads/images/$product->image'  height='40'>
                </td>";

    $table .= "<td>$product->name</td>";

    if ($product->quantity <= 0) {
      $table .= "<td class=\"text-center\"><span class='badge fs-6 badge-light-danger'>$product->quantity</span></td>";
    } elseif ($product->quantity <= 2) {
      $table .= "<td class=\"text-center\"><span class='badge fs-6 badge-light-warning'>$product->quantity</span></td>";
    } elseif ($product->quantity <= 10) {
      $table .= "<td class=\"text-center\"><span class='badge fs-6 badge-light-info'>$product->quantity</span></td>";
    } else {
      $table .= "<td class=\"text-center\"><span class='badge fs-6 badge-light-success'>$product->quantity</span></td>";
    }

    if ($product->price_sale != 0) {
      $table .= "<td class='fw-bold'>S/. $product->price_sale</td>";
    } else {
      $table .= "<td class='fw-bold'>-</td>";
    }

    if (isset($_SESSION['selected_products_buys'])) {
      $selected_product_ids = array_column($_SESSION['selected_products_buys'], 'product_id');

      if (in_array($product->id, $selected_product_ids)) {
        // Esta
        $table .= "<td class=\"text-center\" >
                      <button class=\"btn btn-light-secondary\" type=\"button\" disabled>
                        <i class=\"fa fa-plus\"></i>
                      </button>
                    </td>";
      } else {
        // No esta
        $table .= "<td class=\"text-center\" >
                      <button class=\"btn btn-light-success\" type=\"button\" onclick=\"addProductSale($product->id)\">
                        <i class=\"fa fa-plus\"></i>
                      </button>
                    </td>";
      }
    } else {
      // No definido
      $table .= "<td class=\"text-center\" >
                    <button class=\"btn btn-light-success\" type=\"button\" onclick=\"addProductSale($product->id)\">
                      <i class=\"fa fa-plus\"></i>
                    </button>
                  </td>";
    }


    $table .= "</tr>";
  }
} else {
  $table .= '<tr><td class="text-center" colspan="8">Producto no encontrado</td></tr>';
}

// Paginación
$queryCount     = "SELECT COUNT(*) as total FROM products WHERE name LIKE :search";
$statementCount = $connect->prepare($queryCount);
$statementCount->bindValue(':search', '%' . $search . '%', PDO::PARAM_STR);
$statementCount->execute();
$totalRecords = $statementCount->fetch(PDO::FETCH_ASSOC)['total'];
$totalPages   = ceil($totalRecords / $limit);

$pagination = '<ul class="pagination justify-content-center">';

$prevPage = $page - 1;
$nextPage = $page + 1;

if ($page > 1) {
  $pagination .= '<li class="page-item"><a class="page-link" role="button" onclick="loadTable(' . $prevPage . ')"><i class="fa-solid fa-chevron-left"></i></a></li>';
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
  $pagination .= '<li class="page-item"><a class="page-link" role="button" onclick="loadTable(' . $nextPage . ')"><i class="fa-solid fa-chevron-right"></i></a></li>';
}

$pagination .= '</ul>';

echo json_encode(['table' => $table, 'pagination' => $pagination]);
