document.addEventListener("DOMContentLoaded", function () {
  // const initialPage = parseInt(getCookie("currentPage")) || 1;
  // loadTable(initialPage);

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

  // New products
  document
    .getElementById("btn-new-product")
    .addEventListener("click", function () {
      newProduct();
    });

  // Guardar
  document
    .getElementById("form-new-products")
    .addEventListener("submit", function (event) {
      event.preventDefault();
      saveNewProcuct();
    });
});

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

      // setCookie("currentPage", page, 1);
      // window.history.replaceState({}, "", "?page=" + page);
    });
}

// Función para obtener el valor de una cookie
function getCookie(name) {
  const value = `; ${document.cookie}`;
  const parts = value.split(`; ${name}=`);
  if (parts.length === 2) return parts.pop().split(";").shift();
}

// Función para establecer el valor de una cookie
function setCookie(name, value, days) {
  const date = new Date();
  date.setTime(date.getTime() + days * 24 * 60 * 60 * 1000);
  const expires = `expires=${date.toUTCString()}`;
  document.cookie = `${name}=${value}; ${expires}; path=/`;
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
  // console.log("Eliminar: " + idProduct);

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
          if (data.success == true) {
            Swal.fire({
              title: "Eliminado",
              text: data.message,
              icon: "success",
            });
            // console.log(data);
            loadTable();
          }
        });
    }
  });
}

const modalNewProduct = new bootstrap.Modal(
  document.getElementById("productsAddModal")
);

function newProduct() {
  modalNewProduct.show();
}

function saveNewProcuct() {
  const newProductForm = document.getElementById("form-new-products");

  fetch(baseURL + "/ajax/products/new.ajax.php", {
    method: "POST",
    body: new FormData(newProductForm),
  })
    .then((response) => response.json())
    .then((data) => {
      if (data.success == true) {
        Swal.fire({
          title: "Correcto",
          text: data.message,
          icon: "success",
        }).then((result) => {
          newProductForm.reset();
          loadTable();
          modalNewProduct.hide();
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
      Swal.fire({
        title: "Error",
        text: "Error",
        icon: "error",
      });
    });
}

function updatePriceProduct(event, idProduct) {
  const boton = event.target;
  const input = boton.previousElementSibling;
  const valorInput = input.value;

  console.log("Valor del input: ", valorInput, "ID del producto: " + idProduct);

  fetch(baseURL + "/ajax/products/update-price.ajax.php", {
    method: "POST",
    headers: {
      "Content-Type": "application/x-www-form-urlencoded",
    },
    body: "id=" + idProduct + "&newPrice=" + valorInput,
  })
    .then((response) => response.text())
    .then((data) => {
      console.log(data);

      Toastify({
        text: "Se actualizó el precio.",
        className: "info",
        close: true,
        gravity: "bottom",
        style: {
          background: "linear-gradient(to right, #00b09b, #96c93d)",
        },
      }).showToast();

      loadTable();
    });
}
