<div class="card">
  <div class="card-body m-sm-3 m-md-5">

    <div class="row">
      <div class="col-md-6">
        <div class="text-muted">Payment No.</div>
        <strong>741037024</strong>
      </div>
      <div class="col-md-6 text-md-end">
        <div class="text-muted">Payment Date</div>
        <strong>June 2, 2023 - 03:45 pm</strong>
      </div>
    </div>

    <hr class="my-4">

    <table class="table table-sm">
      <thead>
        <tr>
          <th>Description</th>
          <th>Quantity</th>
          <th>Precio unitario</th>
          <th class="text-end">Sub Total</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($sale_items as $sale_item): ?>
          <tr>
            <td>
              <?= $sale_item->product_name ?>
            </td>
            <td>
              <?= $sale_item->quantity ?>
            </td>
            <td>S/.
              <?= $sale_item->unit_price ?>
            </td>
            <td class="text-end">S/.
              <?= number_format($sale_item->quantity * $sale_item->unit_price, 2) ?>
            </td>
          </tr>
        <?php endforeach; ?>
        <tr>
          <th colspan="3" class="text-end">Total </th>
          <th class="text-end">S/.
            <?= $sale->subtotal ?>
          </th>
        </tr>
      </tbody>
    </table>

    <div class="text-center">
      <a href="javascript:void(0);" class="btn btn-light-success"
        onclick="abrirVentana('<?= APP_URL ?>/controllers/sales/tiket.php?id=<?= $id ?>');">Imprimir boleta</a>
      <!-- <a href="javascript:void(0);" class="btn btn-light-info"  onclick="abrirVentana('<?= APP_URL ?>/controllers/ventas/almacen.php?id=<?= $id ?>');">Imprimir almacen</a> -->
      <script>

      </script>

    </div>
  </div>
</div>