<?php

require "../../core.php";

// $nombre = $_POST['nombre'];
// $email = $_POST['email'];

$json = [
  'redirect' => APP_URL."/controllers/dashboard.php"
];

echo json_encode($json);

?>