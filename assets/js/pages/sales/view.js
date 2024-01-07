function abrirVentana(url) {
  const pdfURL = url;
  const ventanaPDF = window.open(
    pdfURL,
    "Nueva Ventana",
    "width=600,height=400"
  );
  if (ventanaPDF) {
    ventanaPDF.onload = function () {
      ventanaPDF.print();
    };
    ventanaPDF.onafterprint = function () {
      setTimeout(function () {
        ventanaPDF.close();
      }, 1000);
    };
  }
}
