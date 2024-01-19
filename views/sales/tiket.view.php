<style>
  td,
  th,
  tr,
  table {
    margin: 0px;
    padding: 0px;
    font-size: 10px;
    /* border-top: 1px solid black; */
    width: 100%;
    border-collapse: collapse;
  }


  #cabecera span {
    font-weight: bold;
    padding-right: 5px;
  }

  .customer-address {
    padding-top: 7px;
    display: flex;
    flex-direction: column;
    /* display: none;*/
  }

  #amounts-total span {
    font-weight: bold;
    font-size: 10px;
  }

  #amounts-total label {
    font-size: 11.5px;
  }

  table tr:last-child {
    border-bottom: 1px solid black;
  }


  /* .containerx {
    width: 255px;
    height: 120px;
  } */

  /* Resize images */
  .containerx img {
        width: 100%;
        height: auto;
    }
  /**/


  .title-company {
    font-size: 12px;
    font-weight: bold;
  }

  .title-doc {
    font-size: 12px;
    font-weight: bold;
    padding-bottom: 7px;
  }

  .title-doc-number {
    font-size: 12px;
  }

  td.producto,
  th.producto {
    font-size: 10px;
    width: 75px;
    max-width: 55px;
    text-align: left !important;
  }

  td.producto2,
  th.producto2 {
    font-size: 10px;
    width: 105px;
    max-width: 105px;
    text-align: left !important;
  }

  td.detailHead,
  th.detailHead {
    font-size: 10px;
    width: 250px;
    max-width: 250px;
    text-align: left !important;
  }

  td.detailHeadPe,
  th.detailHeadPe {
    font-size: 10px;
    width: 250px;
    max-width: 250px;
    /*text-align: left !important;*/
    text-align: center;
  }

  td.cantidadHeadPe,
  th.cantidadHeadPe {
    font-size: 10px;
    width: 38px;
    max-width: 38px;
    /*text-align: left !important;*/
    text-align: center;
  }

  td.detail,
  th.detail {
    font-size: 12px;
    width: 250px;
    max-width: 250px;
    text-align: left !important;
  }

  td.detailPe,
  th.detailPe {
    font-size: 16px;
    width: 250px;
    max-width: 250px;
    /*text-align: left !important;*/
    text-align: left;
  }

  td.detailPeAdicional,
  th.detailPeAdicional {
    font-size: 12px;
    width: 220px;
    max-width: 220px;
    /*text-align: left !important;*/
    text-align: left;
  }

  td.crono,
  th.crono {
    font-size: 10px;
    margin: 5px;
    width: 200px;
    max-width: 200px;
    text-align: center !important;
  }

  td.cuota,
  th.cuota {
    font-size: 20px;
    width: 10px !important;
    max-width: 10px !important;

  }

  td.cantidad,
  th.cantidad {
    text-align: center;
    font-size: 10px;
    width: 38px;
    max-width: 38px;
    word-break: break-all;
  }

  td.cantidadPe,
  th.cantidadPe {
    text-align: center;
    font-size: 14px;
    width: 38px;
    max-width: 38px;
    word-break: break-all;
  }

  td.cantidadPeAdicional,
  th.cantidadPeAdicional {
    text-align: center;
    font-size: 12px;
    width: 70px;
    max-width: 70px;
    word-break: break-all;
  }

  td.precio,
  th.precio {
    text-align: left;
    width: 40px;
    font-size: 10px;
    max-width: 40px;
    word-break: break-all;
  }

  td.total,
  th.total {
    text-align: right;
    width: 60px;
    font-size: 10px;
    max-width: 60px;
    word-break: break-all;
  }

  .centrado {
    text-align: center;
    align-content: center;
  }

  .ticket {
    margin: 0px;
    padding: 0px;
    width: 235px;
    max-width: 235px;
    font-size: 10px;
    font-family: Arial, Helvetica, sans-serif;
    margin-left: 6px;
  }



  .mail {
    font-size: 8.42px;
  }

  .oculto-impresion {
    background-color: rgb(66, 171, 153);
    color: white;
    border-radius: 1px;
    border-color: rgb(66, 171, 153);
  }

  /* img {
    max-width: inherit;
    width: inherit;
  } */
  @media print {

    .oculto-impresion,
    .oculto-impresion * {
      display: none !important;
    }
  }

  @page {
    margin: 0;
  }

  /*@media print {
    .ticket {
        margin: 0;
        border: initial;
        border-radius: initial;
        width: initial;
        min-height: initial;
        box-shadow: initial;
        background: initial;
        page-break-after: always;
    }

  }
  */

  @media print {
    .ticket {
      width: 720px;
      height: auto;
    }

    .PedidosR {
      width: 720px;
      height: auto;
    }
  }
</style>

<script>
  function imprimir() {
    window.print();
    //window.close();
  }
</script>

<div class="pcoded-content">
  <div class="pcoded-inner-content">
    <div class="main-body">
      <div class="main-body">
        <div class="page-wrapper">
          <div class="page-body">
            <div class="ticket">

              <div
                style="flex-direction: column;padding-bottom: 10px;text-align: center;justify-items: center;justify-content: center;align-items: center;">
                <!-- height="100%" -->
                <div class="containerx">
                  <img src="<?= BUSSINES_LOGO ?>" width="100%"  alt="Logotipo">
                </div>
              </div>
              <div style="text-align:center">
                <span>
                  <?= BUSSINES_NAME ?>
                </span>
              </div>
              <div style="text-align:center">
                <span>
                  <?= BUSSINES_RUC ?>
                </span>
              </div>
              <section class="title-companyDirtk" style="padding-top: 5px; padding-bottom: 5px; text-align: center;">
                <span></span>
              </section>
              <hr style="border: none;border-top: 0.5px solid black;padding: 0px; margin: 0px;">
              <section id="razonSo" style="text-align:center">

              </section>

              <div style="display:flex; flex-direction: column;justify-content: center;align-items: center;">

                <span class="title-doc">Nota de Venta</span>
                <span class="title-doc-number">
                  <?= $sale->correlative ?>
                </span>
              </div>

              <hr style="border: none;border-top: 0.5px solid black;padding: 0px; margin: 0px;padding-bottom: 2.5px;">


              <div id="cabecera"
                style="display:flex; flex-direction: column;justify-content: center;padding-bottom: 8px;">
                <div style="display:flex; flex-direction: row;padding: 0px;margin:0px;">
                  <span>Fecha de atención:</span>
                  <label>
                    <?= formatearFecha($sale->date) ?>
                  </label>
                  <!-- 07/01/2024 10:59 AM -->
                </div>

                <div style="display:flex; flex-direction: row;padding: 0px;margin:0px;">
                  <span>Moneda:</span>
                  <label style="margin-left:50px;">Soles</label>
                </div>

                <div style="display:flex; flex-direction: row;">
                  <span>Condición de Pago:</span>
                  <label>CONTADO</label>
                </div>

                <span>Cliente:</span>
                <label>Varios</label>

              </div>

              <table>
                <thead>
                  <tr style='border-top:1px solid black'>
                    <th colspan="4" class="detailHead">DESCRIPCION</th>
                  </tr>

                  <tr style='border-bottom: 1px dashed black'>
                    <th class="producto">UNIDAD COMERCIAL</th>
                    <th class="cantidad">CANT</th>
                    <th class="precio">PREC</th>
                    <th class="total">TOTAL</th>
                  </tr>
                </thead>

                <tbody>
                  <?php foreach ($sale_items as $sale_item): ?>
                    <tr>
                      <td colspan="4" class="detail">
                        <?= $sale_item->product_name ?>
                      </td>
                    </tr>
                    <tr>
                      <td class="producto">UND</td>
                      <td class="cantidad">
                        <?= $sale_item->quantity ?>
                      </td>
                      <td class="precio">
                        <?= $sale_item->unit_price ?>
                      </td>
                      <td class="total">
                        <?= number_format($sale_item->quantity * $sale_item->unit_price, 2) ?>
                      </td>
                    </tr>
                  <?php endforeach; ?>

                </tbody>
              </table>


              <div id="amounts-total" style="padding-top: 7px;">

                <div style="display:flex; flex-direction: row;">
                  <DIV STYLE="flex: 1;">
                    <span>TOTAL VENTA</span>
                  </DIV>
                  <DIV STYLE="flex: 1;text-align: end;">
                    <label>
                      <?= $sale->subtotal ?>
                    </label>
                  </DIV>
                </div>

                <div style="display:flex; flex-direction: row;">
                  <DIV STYLE="flex: 1;">
                    <span>EFECTIVO</span>
                  </DIV>
                  <DIV STYLE="flex: 1;text-align: end;">
                    <label>0.00</label>
                  </DIV>
                </div>

                <div style="display:flex; flex-direction: row;">
                  <DIV STYLE="flex: 1;">
                    <span>VUELTO</span>
                  </DIV>
                  <DIV STYLE="flex: 1;text-align: end;">
                    <label>0.00</label>
                  </DIV>
                </div>
              </div>

              <!-- <div style="padding-top:10px;"> -->
                <!-- <strong>Son:</strong>&nbsp;<span><?= convertirNumeroEnPalabras(8.50) ?></span> -->
                <!-- <strong>Son:</strong>&nbsp;<span>OCHO CON 50/100</span> -->
              <!-- </div> -->

              <!-- <div style="padding-top:10px;">
                <table>
                </table>
              </div> -->

              <div style="padding-top:7px;">
                <strong>VENDEDOR:</strong>&nbsp;
                <span>Cajero</span>
              </div>


              <div id="div-financial-acounts"
                style="display: flex; flex-direction: column; padding-bottom: 7px; padding-top: 7px;gap: 4px;">
                <!-- <span style="font-weight:600;text-decoration: underline">CUENTA EN SOLES</span>
                <div style="display:flex; flex-direction:column">
                  <span>BCP 123456</span>
                </div>
                <div style="display:flex; flex-direction:column">
                  <span> BCP 123456</span>
                </div> -->


              </div>

              <!-- <hr style="border: none;border-top: 0.5px dashed black;padding: 0px; margin: 0px;"> -->


              <div style='justify-content: center;text-align: center;'>
                <hr style="border: none;border-top: 0.5px dashed black;padding: 0px; margin: 0px;">
                <span class="centrado" style="padding-bottom: 5px">
                  CANJEAR POR FACTURA O BOLETA DE VENTA
                </span>
              </div>
              <!-- <span class="mail" style="padding-bottom: 5px">
                Consulte su documento electrónico en http://www.github.com/pirulug
              </span> -->


              <hr style="border: none;border-top: 0.5px dashed black;padding: 0px; margin: 0px;">
              <span class="centrado" style="font-size: 13px; font-weight: 600">
                ¡GRACIAS POR SU PREFERENCIA!
              </span>
            </div>
            <div style="margin-left:90px; margin-top:4px;">
              <button class="oculto-impresion" onclick="imprimir()">Imprimir</button>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
</div>