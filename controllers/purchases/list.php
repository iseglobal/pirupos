<?php

require "../../core.php";

/* ============ Theme config ========== */
$theme_title = "Agregar compras";
$theme_path  = "list_purchases";
// $theme_styles = [
//   "assets/css/sweetalert2.css",
//   "assets/css/toastifyjs.css",
// ];
$theme_scripts = [
//   "assets/js/sweetalert2.js",
//   "assets/js/toastifyjs.js",
  "assets/js/pages/purchases/list.js"
];

include "../../views/partials/header.view.php";
include "../../views/partials/dash-top.view.php";
include "../../views/purchases/list.view.php";
include "../../views/partials/dash-bottom.view.php";
include "../../views/partials/footer.view.php";
/* ================================ */