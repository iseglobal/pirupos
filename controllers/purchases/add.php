<?php

require "../../core.php";

/* ============ Theme config ========== */
$theme_title   = "Agregar compra";
$theme_path    = "add_purchases";
$theme_styles  = [
  "assets/css/sweetalert2.css"
];
$theme_scripts = [
  "assets/js/sweetalert2.js",
  "assets/js/pages/purchases/add.js"
];

include "../../views/partials/header.view.php";
include "../../views/partials/dash-top.view.php";
include "../../views/purchases/add.view.php";
include "../../views/partials/dash-bottom.view.php";
include "../../views/partials/footer.view.php";
/* ================================ */