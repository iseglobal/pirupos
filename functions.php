<?php

// DB connect
function dbConnect() {
  $database = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS);
  $database->query("set names utf8;");
  $database->setAttribute(PDO::ATTR_EMULATE_PREPARES, FALSE);
  $database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $database->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
  return $database;
}