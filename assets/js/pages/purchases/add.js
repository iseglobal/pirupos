/**
 * Añadir nuevo proveedor
 */

const modalNewSuppliers = new bootstrap.Modal(
  document.getElementById("suppliersNewModal")
);

const formNewSuppliers = document.getElementById("form-new-suppliers");

formNewSuppliers.addEventListener("submit", function (event) {
  event.preventDefault();
  saveNewSuppliers();
});

function newSuppliersModal() {
  modalNewSuppliers.show();
}

function searchSuppliersApi() {
  let docIdValue = document.getElementById("docIdInput").value;

  fetch(baseURL + "/ajax/purchases/share-new-proveedor.ajax.php", {
    method: "POST",
    headers: {
      "Content-Type": "application/x-www-form-urlencoded",
    },
    body: new URLSearchParams({
      docId: parseInt(docIdValue),
    }),
  })
    .then((response) => response.json())
    .then((data) => {
      // toggleLoading(false);

      if (data.type == "RUC") {
        formNewSuppliers.elements["company"].value = data.content.razonSocial;
        formNewSuppliers.elements["names"].value = "-";
        formNewSuppliers.elements["lastname"].value = "-";
        formNewSuppliers.elements["phone"].value = "-";
        formNewSuppliers.elements["email"].value = "-";
        formNewSuppliers.elements["address"].value = data.content.direccion;
        // formNewSuppliers.elements["observation"].value = data.observation;
      }
      if (data.type == "DNI") {
        formNewSuppliers.elements["company"].value = "-";
        formNewSuppliers.elements["names"].value = data.content.nombres;
        formNewSuppliers.elements["lastname"].value =
          data.content.apellidoPaterno + " " + data.content.apellidoMaterno;
        formNewSuppliers.elements["phone"].value = "-";
        formNewSuppliers.elements["email"].value = "-";
        formNewSuppliers.elements["address"].value = "-";
        // formNewSuppliers.elements["observation"].value = data.observation;
      }
    })
    .catch((error) => {
      // toggleLoading(false);
      console.error("Error:", error);
    });
}

function saveNewSuppliers() {
  // console.log("guardando");
  fetch(baseURL + "/ajax/purchases/suppliers-add.ajax.php", {
    method: "POST",
    body: new FormData(formNewSuppliers),
  })
    .then((response) => response.json())
    .then((data) => {
      if (data.success == true) {
        Swal.fire({
          title: "Correcto",
          text: data.message,
          icon: "success",
        }).then((result) => {
          formNewSuppliers.reset();
          modalNewSuppliers.hide();
        });
      } else if (data.success == false) {
        Swal.fire({
          title: "Error",
          text: data.message,
          icon: "error",
        });
      }
    })
    .catch((error) => {
      console.log("Error:", error);
      Swal.fire({
        title: "Error",
        text: error,
        icon: "error",
      });
    });
}

/**
 * Proveedor
 */

const resultGetSuppliers = document.getElementById("resultGetSuppliers");

// Buscar Proveedores
function searchSuppliers(searchTerm) {
  // console.log(search);
  const tableSuppliers = document.getElementById("tableSuppliers");
  const resultSuppliers = document.getElementById("resultSuppliers");

  if (searchTerm.trim() !== "") {
    tableSuppliers.classList.remove("d-none");

    fetch(baseURL + "/ajax/purchases/suppliers-search.ajax.php", {
      method: "POST",
      headers: {
        "Content-Type": "application/x-www-form-urlencoded",
      },
      body: "searchTerm=" + searchTerm,
    })
      .then((response) => response.text())
      .then((html) => {
        resultSuppliers.innerHTML = html;
      })
      .catch((error) => {
        console.error("Error:", error);
      });
  } else {
    tableSuppliers.classList.add("d-none");
  }
}

// Agregar proveedor a compra
function addSupplierSale(idSupplier) {
  fetch(baseURL + "/ajax/purchases/add-supplier-sale.ajax.php", {
    method: "POST",
    headers: {
      "Content-Type": "application/x-www-form-urlencoded",
    },
    body: new URLSearchParams({
      idSupplier: idSupplier,
    }),
  })
    .then((response) => response.text())
    .then((html) => {
      // console.log(html);
      getSupplierSale();
      resultGetSuppliers.classList.remove("d-none");
    })
    .catch((error) => {
      console.error("Error:", error);
    });
}

// Obetener proveedor
function getSupplierSale() {
  const boxSearchSuppliers = document.getElementById("boxSearchSuppliers");

  fetch(baseURL + "/ajax/purchases/get-supplier-sale.ajax.php", {
    method: "POST",
  })
    .then((response) => response.json())
    .then((data) => {
      // console.log("Get: " + data);
      if (data.success == true) {
        resultGetSuppliers.innerHTML = data.html;
        boxSearchSuppliers.classList.add("d-none");
        resultGetSuppliers.classList.remove("d-none");
      } else {
        boxSearchSuppliers.classList.remove("d-none");
        resultGetSuppliers.classList.add("d-none");
      }
    })
    .catch((error) => {
      console.error("Error:", error);
    });
}

// Eliminar Proveedor
function deleteSupplierSale() {
  // const resultGetSuppliers = document.getElementById("resultGetSuppliers");
  const boxSearchSuppliers = document.getElementById("boxSearchSuppliers");

  fetch(baseURL + "/ajax/purchases/delete-supplier-sale.ajax.php", {
    method: "POST",
  })
    .then((response) => response.json())
    .then((data) => {
      // console.log("Delete -> " + data);
      if (data.success == true) {
        // getSupplierSale();
        boxSearchSuppliers.classList.remove("d-none");
        document.getElementById("search-suppliers").value = "";
        searchSuppliers("");
        getSupplierSale();
      } else {
        getSupplierSale();
      }
    })
    .catch((error) => {
      console.error("Error:", error);
    });
}

/**
 * Productos
 */

const searchProductsInput = document.getElementById("search-products");
searchProductsInput.addEventListener("input", searchProducts);

const tableProducts = document.getElementById("tableProducts");

// Buscar productos
function searchProducts() {
  const searchTerm = searchProductsInput.value;
  const resultProducts = document.getElementById("resultProducts");
  if (searchTerm.trim() !== "") {
    tableProducts.classList.remove("d-none");
    fetch(baseURL + "/ajax/purchases/search-products.ajax.php", {
      method: "POST",
      headers: {
        "Content-Type": "application/x-www-form-urlencoded",
      },
      body: "searchTerm=" + searchTerm,
    })
      .then((response) => response.text())
      .then((html) => {
        resultProducts.innerHTML = html;
      })
      .catch((error) => {
        console.error("Error:", error);
      });
  } else {
    tableProducts.classList.add("d-none");
  }
}

// Añadir Productos a compras
function addProductsPurchases(idProduct) {
  // const tablePurchases = document.getElementById("tablePurchases");
  fetch(baseURL + "/ajax/purchases/add-product-purchases.ajax.php", {
    method: "POST",
    headers: {
      "Content-Type": "application/x-www-form-urlencoded",
    },
    body: new URLSearchParams({
      id: idProduct,
    }),
  })
    .then((response) => response.text())
    .then((html) => {
      tableProducts.classList.add("d-none");
      // tablePurchases.innerHTML = html;
      searchProductsInput.value = "";
      searchProductsInput.autofocus = true;

      getProductPruchases();
    })
    .catch((error) => {
      console.error("Error:", error);
    });
}

// Obtener productos de compras
function getProductPruchases() {
  const tablePurchases = document.getElementById("tablePurchases");
  const totalGlobalElement = document.querySelectorAll(".totalGlobal");
  fetch(baseURL + "/ajax/purchases/get-product-purchases.ajax.php", {
    method: "POST",
  })
    .then((response) => response.json())
    .then((data) => {
      tableProducts.classList.add("d-none");
      tablePurchases.innerHTML = data.html;
      searchProductsInput.value = "";
      searchProductsInput.autofocus = true;

      totalGlobalElement.forEach((element) => {
        element.textContent = data.total_payment;
      });
    })
    .catch((error) => {
      console.error("Error:", error);
    });
}

// Eliminar producto de compras
function deleteProductPruchases(idProduct) {
  fetch(baseURL + "/ajax/purchases/delete-product-purchases.ajax.php", {
    method: "POST",
    headers: {
      "Content-Type": "application/x-www-form-urlencoded",
    },
    body: new URLSearchParams({
      idProduct: idProduct,
    }),
  })
    .then((response) => response.text())
    .then((html) => {
      getProductPruchases();
    })
    .catch((error) => {
      console.error("Error:", error);
    });
}

// Cambiar precio
function changeUnitPrice(productId, unitPrice) {
  fetch(baseURL + "/ajax/purchases/change-unit-price.ajax.php", {
    method: "POST",
    headers: {
      "Content-Type": "application/x-www-form-urlencoded",
    },
    body: "productId=" + productId + "&unitPrice=" + unitPrice,
  })
    .then((response) => response.text())
    .then((html) => {
      // console.log(html);
      getProductPruchases();
      // loadTable();
    })
    .catch((error) => {
      console.error("Error:", error);
    });
}

// Cambiar cantidad
function changeQuantity(productId, quantity) {
  fetch(baseURL + "/ajax/purchases/change-quantity.ajax.php", {
    method: "POST",
    headers: {
      "Content-Type": "application/x-www-form-urlencoded",
    },
    body: "productId=" + productId + "&quantity=" + quantity,
  })
    .then((response) => response.text())
    .then((html) => {
      // console.log(html);
      getProductPruchases();
      // loadTable();
    })
    .catch((error) => {
      console.error("Error:", error);
    });
}

/**
 * Guardar compra
 */

const addNewPurchase = document.getElementById("add-new-purchase");

addNewPurchase.addEventListener("click", saveNewPurchase);

// Guardar nueva compra
function saveNewPurchase() {
  Swal.fire({
    title: "¿Agregar compra?",
    text: "Revisa todo antes de registrar una compra.",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Si!",
    cancelButtonText: "Cancelar",
  }).then((result) => {
    if (result.isConfirmed) {
      // console.log("click");
      fetch(baseURL + "/ajax/purchases/new-purchases.ajax.php")
        .then((response) => response.json())
        .then((data) => {
          // getProductPruchases();
          if (data.success == true) {
            Swal.fire({
              title: "Correcto",
              text: data.message,
              icon: "success",
            }).then((result) => {
              if (result.isConfirmed) {
                console.log(data);
                // window.location.href = data.reload;
              }
            });
          } else if (data.success == false) {
            console.log(data.body);
            Swal.fire({
              title: "Error",
              text: data.message,
              icon: "error",
            });
          }
        })
        .catch((error) => {
          console.error("Error:", error);
        });
    }
  });
}

/**
 * Llamadas
 */

getProductPruchases();

getSupplierSale();
