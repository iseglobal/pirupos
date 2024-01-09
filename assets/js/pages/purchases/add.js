const identProveedor = document.getElementsByName("ruc-proveedor")[0].value;

const btnShareProveedor = document.getElementById("btnShareProveedor");
const btnShareNewProveedor = document.getElementById("btnShareNewProveedor");

// function btnBuscarRucProveedorSunat() {}

btnShareNewProveedor.addEventListener("click", () => {
  console.log("nuevo ruc " + identProveedor);

  fetch(baseURL + "/ajax/purchases/share-new-proveedor.ajax.php", {
    method: "POST",
    headers: {
      "Content-Type": "application/x-www-form-urlencoded",
    },
    body: "identProveedor=" + identProveedor,
  })
    .then((response) => response.text())
    .then((data) => {
      // Manejar la respuesta de la API
      console.log(data);

      // document.getElementById("prov-empresa").value = data.razonSocial;
      // document.getElementById("prov-direccion").value = data.direccion;
    })
    .catch((error) => {
      console.error("Error:", error);
    });
});
