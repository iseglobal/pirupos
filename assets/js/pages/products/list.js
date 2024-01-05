function loadTable(page = 1) {
  var search = document.getElementById("search-products").value;
  var selector = document.getElementById("selector-products").value;

  fetch(baseURL + "/ajax/products/list.ajax.php", {
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

function mostrarNuevaImagen(input) {
  let imagenPrevia = document.getElementById("image-previw");

  if (input.files && input.files[0]) {
    let reader = new FileReader();

    reader.onload = function (e) {
      imagenPrevia.src = e.target.result;
    };

    reader.readAsDataURL(input.files[0]);
  }
}

function edithProduct(idProduct) {
  console.log("Editar: " + idProduct);

  const formEditProduct = document.getElementById("form-edit-products");

  const myModal = new bootstrap.Modal(
    document.getElementById("productsEditModal")
  );

  formEditProduct.reset();

  // Cuando el formulario se envía
  formEditProduct.addEventListener("submit", function (event) {
    event.preventDefault();

    fetch(
      baseURL +
        "/ajax/products/edit.ajax.php?updateProduct=true&id=" +
        idProduct,
      {
        method: "POST",
        body: new FormData(formEditProduct),
      }
    )
      .then((response) => response.json())
      .then((data) => {
        console.log(data);

        if (data.success == true) {
          myModal.hide();
          loadTable();
          Swal.fire({
            title: "Correcto",
            text: data.message,
            icon: "success",
          });
        } else {
          Swal.fire({
            title: "Error",
            text: "Error",
            icon: "error",
          });
        }
      })
      .catch((error) => {
        console.error("Error:", error);
        if (data.success != true) {
          Swal.fire({
            title: "Error",
            text: "Error",
            icon: "error",
          });
        }
      });
  });

  // Obtener datos del servidor
  fetch(
    baseURL + "/ajax/products/edit.ajax.php?getProdutc=true&id=" + idProduct
  )
    .then((response) => response.json())
    .then((data) => {
      formEditProduct.elements["id"].value = data.id;
      formEditProduct.elements["name"].value = data.name;
      formEditProduct.elements["price_buys"].value = data.price_buys;
      formEditProduct.elements["price_sale"].value = data.price_sale;
      formEditProduct.elements["quantity"].value = data.quantity;
      formEditProduct.elements["alert_quantity"].value = data.alert_quantity;

      const imagePreviw = document.getElementById("image-previw");
      imagePreviw.src = data.image_url;
    })
    .catch((error) => console.error("Error:", error));

  myModal.show();
}

function deleteProduct(idProduct) {
  console.log("Eliminar: " + idProduct);

  Swal.fire({
    title: "¿Quieres eliminarlo?",
    text: "Al eliminar este producto no podras recuperarlo.",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Si, eliminar!",
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
