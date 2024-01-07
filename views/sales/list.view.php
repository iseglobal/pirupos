<div class="card">
  <div class="card-body">
    <!-- <div class="mb-3">
      <input id="search" class="form-control" type="text" placeholder="Buscar ...">
    </div> -->
    <div class="table-responsive">
      <table class="table table-bordered align-middle">
        <thead>
          <tr>
            <th>Fecha</th>
            <!-- <th>Cliente</th> -->
            <th>Total</th>
            <th>Total Articulos</th>
            <th>Acciones</th>
          </tr>
        </thead>
        <tbody id="table-container">
        </tbody>
        <tfoot>
          <tr>
            <td><input type="date" id="search-date" class="form-control" placeholder="Fecha"></td>
            <!-- <td><input type="text" id="search-client" class="form-control" placeholder="Cliente"></td> -->
            <td colspan="3"></td>
          </tr>
        </tfoot>
      </table>
    </div>

    <nav id="pagination-container" aria-label="Paginacion de productos"></nav>
  </div>
</div>