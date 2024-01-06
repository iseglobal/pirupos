<div class="container-fluid">

  <div class="row">
    <div class="col-7">
      <div class="card mt-3">
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-sm table-bordered table-striped table-hover  align-middle">
              <thead>
                <tr>
                  <th>Img</th>
                  <th>Producto</th>
                  <th>Precio Unitario</th>
                  <th>Cantidad</th>
                  <th>Subtotal</th>
                  <th class="text-center">
                    <i class="fa fa-trash"></i>
                  </th>
                </tr>
              </thead>
              <tbody id="tableSales">
              </tbody>
              <tfoot>
                <tr>
                  <td class="text-center fw-bold fs-5" colspan="4">Total</td>
                  <td class="text-center fw-bold fs-5" colspan="2">
                    S/ <span class="totalGlobal">
                    </span>
                  </td>
                </tr>
              </tfoot>
            </table>
          </div>
        </div>
      </div>
    </div>
    <div class="col-5">
      <div class="card mt-3">
        <div class="card-header">
          <div class="row">
            <div class="col-lg-7">
              <input class="form-control" type="text" id="search-products" placeholder="Buscar por nombre" autofocus>
            </div>
            <div class="col-lg-3">
              <select id="selector-products" class="form-select">
                <option value="nombre_az" <?= (isset($_SESSION['sort']) && $_SESSION['sort'] == 'name_az') ? 'selected' : '' ?>>
                  Nombre A-Z
                </option>
                <option value="nombre_za" <?= (isset($_SESSION['sort']) && $_SESSION['sort'] == 'name_za') ? 'selected' : '' ?>>
                  Nombre Z-A
                </option>
                <option value="stok_mayor" <?= (isset($_SESSION['sort']) && $_SESSION['sort'] == 'stok_major') ? 'selected' : '' ?>>
                  Stok Mayor
                </option>
                <option value="stok_menor" <?= (isset($_SESSION['sort']) && $_SESSION['sort'] == 'stok_minor') ? 'selected' : '' ?>>
                  Stok Menor
                </option>
              </select>
            </div>
            <div class="col-lg-2 text-center">
              <button class="btn btn-primary">
                <i class="fa fa-plus"></i>
              </button>
            </div>
          </div>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover align-middle">
              <thead>
                <tr>
                  <th width="50">Imagen</th>
                  <th>Nombre</th>
                  <th class="text-center" width="50">Cantidad</th>
                  <th width="120">Precio venta</th>
                  <th width="100">Acciones</th>
                </tr>
              </thead>
              <tbody id="table-container">
              </tbody>
            </table>
          </div>
        </div>
        <div class="card-footer">
          <nav id="pagination-container" class="mt-3" aria-label="Paginacion de productos"></nav>
        </div>
      </div>
    </div>
  </div>


</div>

<?php require "../../views/partials/dark-ligth.view.php" ?>