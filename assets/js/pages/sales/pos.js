function loadTable(page = 1) {
  var search = document.getElementById("search-products").value;
  var selector = document.getElementById("selector-products").value;

  fetch(baseURL + "/ajax/sales/list-products.ajax.php", {
    method: "POST",
    headers: {
      "Content-Type": "application/x-www-form-urlencoded",
    },
    body: "page=" + page + "&search=" + search + "&sort=" + selector,
  })
    .then((response) => response.json())
    .then((data) => {
      document.getElementById("table-container").innerHTML = data.table;
      document.getElementById("pagination-container").innerHTML =
        data.pagination;
    });
}

function addProductSale(productId) {
  // Realizar una solicitud AJAX para obtener detalles del producto
  fetch(baseURL + "/ajax/sales/add-product-sale.ajax.php", {
    method: "POST",
    headers: {
      "Content-Type": "application/x-www-form-urlencoded",
    },
    body: "productId=" + productId,
  })
    .then((response) => response.text())
    .then((html) => {
      // boton.disabled = true;
      // obtenerProductosDeSesion();
      // buscarProductoInput.value = "";
      // manejarBusqueda();
      console.log(html);
      getProductsSale();
      loadTable();
    })
    .catch((error) => {
      console.error("Error:", error);
    });
}

function getProductsSale() {
  const tableSales = document.getElementById("tableSales");
  const totalGlobalElement = document.querySelectorAll(".totalGlobal");
  fetch(baseURL + "/ajax/sales/get-product-sale.ajax.php")
    .then((response) => response.json())
    .then((data) => {
      // console.log(data);
      tableSales.innerHTML = data.html;
      loadTable();

      totalGlobalElement.forEach((element) => {
        element.textContent = data.total_pagar;
      });
    })
    .catch((error) => {
      console.error("Error:", error);
    });
}

function deleteProductSale(productId) {
  fetch(baseURL + "/ajax/sales/delete-product-sale.ajax.php", {
    method: "POST",
    headers: {
      "Content-Type": "application/x-www-form-urlencoded",
    },
    body: "productId=" + productId,
  })
    .then((response) => response.text())
    .then((html) => {
      console.log(html);
      getProductsSale();
      loadTable();
    })
    .catch((error) => {
      console.error("Error:", error);
    });
}

function changeUnitPrice(productId, unitPrice) {
  fetch(baseURL + "/ajax/sales/change-unit-price.ajax.php", {
    method: "POST",
    headers: {
      "Content-Type": "application/x-www-form-urlencoded",
    },
    body: "productId=" + productId + "&unitPrice=" + unitPrice,
  })
    .then((response) => response.text())
    .then((html) => {
      console.log(html);
      getProductsSale();
      // loadTable();
    })
    .catch((error) => {
      console.error("Error:", error);
    });
}

function changeQuantity(productId, quantity) {
  fetch(baseURL + "/ajax/sales/change-quantity.ajax.php", {
    method: "POST",
    headers: {
      "Content-Type": "application/x-www-form-urlencoded",
    },
    body: "productId=" + productId + "&quantity=" + quantity,
  })
    .then((response) => response.text())
    .then((html) => {
      // console.log(html);
      getProductsSale();
      // loadTable();
    })
    .catch((error) => {
      console.error("Error:", error);
    });
}

function paymentMake() {
  // console.log("realizar venta");
  const paymentMakeModal = new bootstrap.Modal(
    document.getElementById("paymentMakeModal")
  );

  paymentMakeModal.show();
}

function calculateReturn(paymentEfective) {
  fetch(baseURL + "/ajax/sales/calculate-return.ajax.php", {
    method: "POST",
    headers: {
      "Content-Type": "application/x-www-form-urlencoded",
    },
    body: "paymentEfective=" + paymentEfective,
  })
    .then((response) => response.json())
    .then((data) => {
      // console.log(data);
      document.getElementById("totalCambio").textContent = data.return;
      const alertContainer = document.getElementById("alertContainer");
      if (data.error != "") {
        alertContainer.style.display = "block";
        alertContainer.textContent = data.error;
      } else {
        alertContainer.style.display = "none";
      }
    })
    .catch((error) => {
      console.error("Error:", error);
    });
}

function saveSale() {
  // console.log("realizar venta");
  Swal.fire({
    title: "¿Agregar venta?",
    text: "Revisa todo antes de realizar una venta.",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Si, vender!",
    cancelButtonText: "Cancelar",
  }).then((result) => {
    if (result.isConfirmed) {
      fetch(baseURL + "/ajax/products/edit.ajax.php", {
        method: "POST",
        headers: {
          "Content-Type": "application/x-www-form-urlencoded",
        },
        body: "deleteProduct=true&id=" + idProduct,
      })
        .then((response) => response.json())
        .then((data) => {
          console.log(data);

          if (data.success == true) {
            Swal.fire({
              title: "Eliminado",
              text: data.message,
              icon: "success",
            });
            loadTable();
          }
        });
    }
  });
}

document.addEventListener("DOMContentLoaded", function () {
  loadTable();
  getProductsSale();

  // Buscar producto
  document
    .getElementById("search-products")
    .addEventListener("keyup", function () {
      loadTable();
    });

  // Selector de productos
  document
    .getElementById("selector-products")
    .addEventListener("change", function () {
      loadTable();
    });
});
