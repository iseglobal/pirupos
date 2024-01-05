<?php

require "../../core.php";

/* ============ Theme config ========== */
$theme_title   = "Iniciar Session";
$theme_path    = "iniciar_session";
// $theme_styles = ["pages/dashboard.css"];
$theme_scripts = ["assets/js/pages/auth/sign-in.js"];

include "../../views/partials/header.view.php";
include "../../views/auth/sign-ing.view.php";
include "../../views/partials/footer.view.php";
/* ================================ */