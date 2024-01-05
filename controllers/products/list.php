<?php

require "../../core.php";

/* ============ Theme config ========== */
$theme_title   = "Lista de productos";
$theme_path    = "list_products";
$theme_styles = ["assets/css/sweetalert2.css"];
$theme_scripts = [
  "assets/js/sweetalert2.js",
  "assets/js/pages/products/list.js"
];

include "../../views/partials/header.view.php";
include "../../views/partials/dash-top.view.php";
include "../../views/products/list.view.php";
include "../../views/partials/dash-bottom.view.php";
include "../../views/partials/footer.view.php";
/* ================================ */