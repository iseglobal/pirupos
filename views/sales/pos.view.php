<nav class="navbar navbar-expand-lg bg-body">
  <div class="container-fluid">
    <!-- <a class="navbar-brand" href="#">Navbar</a> -->
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="<?= APP_URL ?>/controllers/dashboard.php">
            <i class="align-middle fa fa-dashboard"></i>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">
            <i class="fa fa-cogs"></i>
          </a>
        </li>
      </ul>
      <ul class="navbar-nav me-end mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="#">Detalles de caja</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Ventas de hoy</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Cerrar caja</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" id="bd-theme" type="button" aria-expanded="false"
            data-bs-toggle="dropdown" aria-label="Toggle theme (auto)">
            <span class="theme-icon-active" id="bd-theme-icon">
              <i class="fa fa-sun"></i>
            </span>
            <span class="visually-hidden" id="bd-theme-text">Toggle theme</span>
          </a>
          <ul class="dropdown-menu dropdown-menu-end shadow" aria-labelledby="bd-theme-text">
            <li>
              <button class="dropdown-item d-flex align-items-center" type="button" data-bs-theme-value="light"
                aria-pressed="false">
                <i class="fa fa-sun opacity-50 me-2"></i>Light<i class="pr-check fa fa-check ms-auto d-none"></i>
              </button>
            </li>
            <li>
              <button class="dropdown-item d-flex align-items-center" type="button" data-bs-theme-value="dark"
                aria-pressed="false">
                <i class="fa fa-moon opacity-50 me-2"></i>Dark<i class="pr-check fa fa-check ms-auto d-none"></i>
              </button>
            </li>
            <li>
              <button class="dropdown-item d-flex align-items-center" type="button" data-bs-theme-value="auto"
                aria-pressed="true">
                <i class="fa fa-circle-half-stroke opacity-50 me-2"></i>Auto<i
                  class="pr-check fa fa-check ms-auto d-none"></i>
              </button>
            </li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>

<div class="container-fluid">

  <div class="row mt-3">
    <div class="col-7">
      <div class="card h-100">
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-sm table-bordered table-striped table-hover  align-middle">
              <thead>
                <tr>
                  <th width="50">Img</th>
                  <th>Producto</th>
                  <th width="150">Precio Unitario</th>
                  <th width="150">Cantidad</th>
                  <th width="120">Subtotal</th>
                  <th class="text-center" width="60">
                    <i class="fa fa-trash"></i>
                  </th>
                </tr>
              </thead>
              <tbody id="tableSales">
              </tbody>
              <tfoot>
                <tr>
                  <td class="text-end fw-bold fs-5" colspan="3">Total a pagar:</td>
                  <td class="text-end fw-bold fs-3" colspan="3">
                    S/ <span class="totalGlobal">
                    </span>
                  </td>
                </tr>
              </tfoot>
            </table>
          </div>
        </div>
        <div class="card-footer">
          <div class="row">
            <div class="col-6">
              <div class="d-grid">
                <button class="btn btn-lg btn-primary" onclick="payDeposit()">Pagar Deposito</button>
              </div>
            </div>
            <div class="col-6">
              <div class="d-grid">
                <button class="btn btn-lg btn-primary" onclick="payCash()">Pagar Efectivo</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-5">
      <div class="card position-sticky" style="top: 2rem;">
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
          <nav id="pagination-container" aria-label="Paginacion de productos"></nav>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Modal Payment Cash -->
<div class="modal fade" id="payCash" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Pago con Efectivo</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

        <div id="alertContainer" class="alert alert-danger" style="display: none;"></div>

        <table class="table table-borderless  align-middle mb-3">

          <tr>
            <td>
              Total a pagar
            </td>
            <td class="fs-2 fw-bold">
              S/
              <span id="totalPagar" class="totalGlobal">
              </span>
            </td>
          </tr>
          <tr>
            <td>
              Total pagado
            </td>
            <td class="fs-2 fw-bold">
              <input class="form-control" type="number" onkeyup="calculateReturn(this.value)"
                placeholder="Total Pagado">
            </td>
          </tr>
          <tr>
            <td>
              Cambio
            </td>
            <td class="fs-2 fw-bold">
              S/
              <span id="totalCambio">-</span>
            </td>
          </tr>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button class="btn btn-primary" type="button" onclick="saveSale()">Guardar</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal Paymeny deposit -->
<div class="modal fade" id="payDeposit" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Pago con Efectivo</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!-- Content -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button class="btn btn-primary" type="button" onclick="saveSale()">Guardar</button>
      </div>
    </div>
  </div>
</div>