const modalNewSuppliers = new bootstrap.Modal(
  document.getElementById("suppliersNewModal")
);

const formNewSuppliers = document.getElementById("form-new-suppliers");

formNewSuppliers.addEventListener("submit", function (event) {
  event.preventDefault();
  saveNewSuppliers();
});

const searchProductsInput = document.getElementById("search-products");
searchProductsInput.addEventListener("input", searchProducts);

const tableProducts = document.getElementById("tableProducts");

// modalNewSuppliers.show();

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

function addsupplierSale() {
  const boxSearchSuppliers = document.getElementById("boxSearchSuppliers");

  boxSearchSuppliers.classList.add("d-none");
}

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

function addProductsPurchases(idProduct) {
  const tablePurchases = document.getElementById("tablePurchases");
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

function getProductPruchases() {
  const tablePurchases = document.getElementById("tablePurchases");
  fetch(baseURL + "/ajax/purchases/get-product-purchases.ajax.php", {
    method: "POST",
  })
    .then((response) => response.text())
    .then((html) => {
      tableProducts.classList.add("d-none");
      tablePurchases.innerHTML = html;
      searchProductsInput.value = "";
      searchProductsInput.autofocus = true;
    })
    .catch((error) => {
      console.error("Error:", error);
    });
}

getProductPruchases();
