<?php

require "../core.php";

/* ============ Theme config ========== */
$theme_title   = "Panel";
$theme_path    = "dashboard";
// $theme_styles = ["pages/dashboard.css"];
$theme_scripts = ["/assets/js/chartjs.js","assets/js/pages/dashboard.js"];

include "../views/partials/header.view.php";
include "../views/partials/dash-top.view.php";
include "../views/dashboard.view.php";
include "../views/partials/dash-bottom.view.php";
include "../views/partials/footer.view.php";
/* ================================ */