// Enviar formulario
document
  .getElementById("frm-sign-in")
  .addEventListener("submit", function (event) {
    event.preventDefault();
    const formulario = event.target;
    const datos = new FormData(formulario);

    fetch("/ajax/auth/sign-in.ajax.php", {
      method: "POST",
      body: datos,
    })
      .then((response) => response.json())
      .then((data) => {
        console.log(data.redirect);
        window.location.href = data.redirect;
      })
      .catch((error) => {
        console.error("Error al enviar el formulario:", error);
      });
  });
