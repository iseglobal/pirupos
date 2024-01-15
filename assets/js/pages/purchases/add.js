const modalNewSuppliers = new bootstrap.Modal(
  document.getElementById("suppliersNewModal")
);
modalNewSuppliers.show();

function searchSuppliers(search) {
  console.log(search);
}

function newSuppliersModal() {
  console.log("Nuevo proveedor");
  modalNewSuppliers.show();
}

let formNewSuppliers = document.getElementById("form-new-suppliers");

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
        formNewSuppliers.elements["addess"].value = data.content.direccion;
        // formNewSuppliers.elements["observation"].value = data.observation;
      }
      if (data.type == "DNI") {
        formNewSuppliers.elements["company"].value = "-";
        formNewSuppliers.elements["names"].value = data.content.nombres;
        formNewSuppliers.elements["lastname"].value =
          data.content.apellidoPaterno + " " + data.content.apellidoMaterno;
        formNewSuppliers.elements["phone"].value = "-";
        formNewSuppliers.elements["email"].value = "-";
        formNewSuppliers.elements["addess"].value = "-";
        // formNewSuppliers.elements["observation"].value = data.observation;
      }

      console.log(data);
    })
    .catch((error) => {
      // toggleLoading(false);
      console.error("Error:", error);
    });
}

function saveNewSuppliers() {
  console.log("guardando");
}

addEventListener("submit", saveNewSuppliers());
