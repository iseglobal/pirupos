<div class="card mb-3">
  <div class="card-body">

    <h5>Proveedor</h5>

    <div id="boxSearchSuppliers" class="mb-3">
      <div class="row">
        <div class="col-10">
          <input class="form-control" type="text" name="search-suppliers" onkeyup="searchSuppliers(this.value)"
            placeholder="Buscar por RUC, DNI o Nombre">
        </div>
        <div class="col-2">
          <button id="add-new-purchases" class="btn btn-info w-100" onclick="newSuppliersModal()">
            <i class="fa fa-plus"></i>
            Nuevo
          </button>
        </div>
      </div>

      <div id="tableSuppliers" class="table-responsive d-none my-3">
        <table class="table table-sm table-bordered table-striped table-hover align-middle">
          <thead>
            <tr>
              <th>RUC / DNI</th>
              <th>Nombre</th>
              <th> </th>
            </tr>
          </thead>
          <tbody id="resultSuppliers">
          </tbody>
        </table>
      </div>
    </div>

    <!-- <div class="mb-3">
      <div class="input-group mb-3">
        <span class="input-group-text" id="basic-addon1">Empresa</span>
        <input id="prov-empresa" type="text" class="form-control">
      </div>

      <div class="input-group mb-3">
        <span class="input-group-text" id="basic-addon1">Nombres</span>
        <input id="prov-nombre" type="text" class="form-control">
      </div>
      
      <div class="input-group mb-3">
        <span class="input-group-text" id="basic-addon1">Telefono</span>
        <input id="prov-telefono" type="text" class="form-control">
      </div>

      <div class="input-group mb-3">
        <span class="input-group-text" id="basic-addon1">Correo</span>
        <input id="prov-correo" type="text" class="form-control">
      </div>

      <div class="input-group mb-3">
        <span class="input-group-text" id="basic-addon1">Fecha de nacimiento</span>
        <input id="prov-fecnac" type="text" class="form-control">
      </div>

      <div class="input-group mb-3">
        <span class="input-group-text" id="basic-addon1">Direccion</span>
        <input id="prov-direccion" type="text" class="form-control" disabled>
      </div>

    </div> -->

    <hr>

    <div class="mb-3">
      <input id="buscarProducto" class="form-control" type="search" placeholder="Buscar producto" autofocus>
    </div>

    <div class="mt-3 d-none table-responsive" id="tableProductos">
      <table class="table table-sm table-bordered table-striped table-hover align-middle">
        <thead>
          <tr>
            <th>Image</th>
            <th>Producto</th>
            <th> </th>
          </tr>
        </thead>
        <tbody id="resultadosProductos">
        </tbody>
      </table>
    </div>

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
        <tbody id="tableVentas">
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

    <div class="d-grid">
      <button id="pagaConEfectivo" class="btn btn-primary mb-1" type="button">Agregar compra</button>
    </div>

  </div>
</div>

<!-- Modal nuevo proveedor -->
<div class="modal fade" id="suppliersNewModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1">
  <div class="modal-dialog modal-lg">
    <form id="form-new-suppliers" method="post" enctype="multipart/form-data">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Nuevo producto</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="mb-3">
            <label class="form-label">Ruc / DNI</label>
            <div class="input-group mb-3">
              <input id="docIdInput" class="form-control" type="number" placeholder="RUC / DNI" name="document_id"
                required>
              <button id="searchApiSuppliers" class="input-group-text btn btn-info" type="button"
                onclick="searchSuppliersApi()">
                <i class="fa fa-search"></i>
              </button>
            </div>
          </div>
          <div class="mb-3">
            <label class="form-label">Empresa</label>
            <input class="form-control" type="text" name="company" required>
          </div>
          <div class="mb-3">
            <label class="form-label">Nombres</label>
            <input class="form-control" type="text" name="names" required>
          </div>
          <div class="mb-3">
            <label class="form-label">Apellidos</label>
            <input class="form-control" type="text" name="lastname" required>
          </div>
          <div class="mb-3">
            <label class="form-label">Telefono</label>
            <input class="form-control" type="text" name="phone">
          </div>
          <div class="mb-3">
            <label class="form-label">Email</label>
            <input class="form-control" type="text" name="email">
          </div>
          <div class="mb-3">
            <label class="form-label">Direccion</label>
            <input class="form-control" type="text" name="address">
          </div>
          <div class="mb-3">
            <label class="form-label">Observación</label>
            <textarea class="form-control" name="observation"></textarea>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
          <button class="btn btn-primary" type="submit">Guardar</button>
        </div>
      </div>
    </form>
  </div>
</div>