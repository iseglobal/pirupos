<div class="card mb-3">
  <div class="card-body">

    <h5>Proveedor</h5>

    <div class="mb-3">
      <div class="row">
        <div class="col-8">
          <input class="form-control" type="number" name="ruc-proveedor" placeholder="RUC">
        </div>
        <div class="col-2">
          <button id="btnShareProveedor" class="btn btn-light-primary w-100">Buscar</button>
        </div>
        <div class="col-2">
          <button id="btnShareNewProveedor" class="btn btn-light-primary w-100">Nuevo</button>
        </div>
      </div>
    </div>

    <div class="mb-3">
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

    </div>

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