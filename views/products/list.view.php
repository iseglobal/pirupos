<div class="card">
  <div class="card-header">
    <div class="d-block text-end">
      <button id="btn-new-product" class="btn btn-primary" type="button">
        Agregar producto
      </button>
    </div>
  </div>
  <div class="card-body">

    <div class="row mb-3">
      <div class="col-lg-9">
        <input class="form-control" type="search" id="search-products" placeholder="Buscar por nombre" autofocus>
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
    </div>

    <div class="table-responsive">
      <table class="table table-bordered table-striped table-hover align-middle">
        <thead>
          <tr>
            <th width="50">Imagen</th>
            <th>Nombre</th>
            <th class="text-center" width="50">Cantidad</th>
            <th width="220">Precio venta</th>
            <th width="150">Acciones</th>
          </tr>
        </thead>
        <tbody id="table-container">
          <tr id="loading-row" class="position-relative d-none">
            <td colspan="5" class="text-center">
              <div class="spinner-border" role="status">
                <span class="visually-hidden">Loading...</span>
              </div>
              <span class="ms-2">Cargando...</span>
            </td>
          </tr>
        </tbody>
      </table>
    </div>

    <nav id="pagination-container" class="mt-3" aria-label="Paginacion de productos"></nav>
  </div>
</div>

<!-- Agregar Modal -->
<div class="modal fade" id="productsAddModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1">
  <div class="modal-dialog modal-lg">
    <form id="form-new-products" method="post" enctype="multipart/form-data">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Nuevo producto</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="mb-3">
            <label class="form-label">Nombre</label>
            <input class="form-control" type="text" value="" name="name" required>
          </div>
          <div class="mb-3">
            <label class="form-label">Precio de compra</label>
            <input class="form-control" type="text" value="0.00" name="price_buys">
          </div>
          <div class="mb-3">
            <label class="form-label">Precio de venta</label>
            <input class="form-control" type="text" value="0.00" name="price_sale">
          </div>

          <div class="mb-3">
            <label class="form-label">Cantidad</label>
            <input class="form-control" type="text" value="0" name="quantity">
          </div>
          <div class="mb-3">
            <label class="form-label">Alerta Cantidad</label>
            <input class="form-control" type="text" value="10" name="alert_quantity">
          </div>

          <div class="mb-3">
            <label class="form-label">Imagen</label>
            <input class="form-control" type="file" name="image" accept="image/*" capture="user">
          </div>


        </div>
        <div class="modal-footer">
          <button class="btn btn-primary" type="submit">Guardar</button>
          <!-- <button type="button" class="btn btn-primary">Guardar</button> -->
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        </div>
      </div>
    </form>
  </div>
</div>

<!-- Editar Modal -->
<div class="modal fade" id="productsEditModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1">
  <div class="modal-dialog modal-lg">
    <form id="form-edit-products" method="post" enctype="multipart/form-data">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5">Editar producto</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <input type="hidden" name="id">
          <div class="mb-3">
            <label class="form-label">Nombre</label>
            <input class="form-control" type="text" value="" name="name" required>
          </div>
          <div class="mb-3">
            <label class="form-label">Precio de compra</label>
            <input class="form-control" type="text" value="0.00" name="price_buys">
          </div>
          <div class="mb-3">
            <label class="form-label">Precio de venta</label>
            <input class="form-control" type="text" value="0.00" name="price_sale">
          </div>

          <div class="mb-3">
            <label class="form-label">Cantidad</label>
            <input class="form-control" type="text" value="0" name="quantity">
          </div>
          <div class="mb-3">
            <label class="form-label">Alerta Cantidad</label>
            <input class="form-control" type="text" value="10" name="alert_quantity">
          </div>

          <div class="mb-3">
            <label class="form-label">Imagen</label>
            <img id="image-previw" class="d-block my-2" src="" alt="Imagen actual" style="max-width: 200px;">
            <input id="" class="form-control" type="file" name="image" accept="image/*" capture="user"
              onchange="mostrarNuevaImagen(this)">
          </div>

          
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
          <button class="btn btn-primary" type="submit">Guardar</button>
          <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
        </div>
      </div>
    </form>
  </div>
</div>