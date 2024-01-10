<?php

require_once __DIR__ . "/vendor/autoload.php";

use NumberToWords\NumberToWords;

// DB connect
function dbConnect() {
  $database = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS);
  $database->query("set names utf8;");
  $database->setAttribute(PDO::ATTR_EMULATE_PREPARES, FALSE);
  $database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $database->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
  return $database;
}

// Genera Caracteres aleatorios
function generateRandomString($length) {
  $string        = '';
  $characters    = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
  $numCharacters = strlen($characters);

  for ($i = 0; $i < $length; $i++) {
    $index    = random_int(0, $numCharacters - 1);
    $caracter = $characters[$index];
    $string .= $caracter;
  }

  return $string;
}

function formatearFecha($fecha) {
  // Crear un objeto DateTime con la fecha proporcionada
  $dateTime = new DateTime($fecha);

  // Formatear la fecha según el formato deseado
  return $dateTime->format('d/m/Y h:i A');
}

function generarCorrelativo($correlativo) {
  // Extraer el prefijo y el sufijo del correlativo
  preg_match('/([A-Za-z]+)(\d+)-(\d+)/', $correlativo, $matches);

  // Verificar si se encontraron coincidencias
  if (count($matches) === 4) {
    // Extraer las partes relevantes
    $prefijo       = $matches[1];
    $codigoEntidad = $matches[2];
    $numero        = $matches[3];
  } else {
    // Si no se encontraron coincidencias, mostrar un error o manejarlo según sea necesario
    die("Error: El formato del correlativo no es válido");
  }

  // Incrementar el número
  $numero++;

  // Verificar si el número alcanzó el límite de 99999999
  if ($numero > 99999999) {
    // Si sí, cambiar al siguiente código de entidad
    $codigoEntidad++;
    $numero = 1; // Reiniciar el número a 1

    // Verificar si el código de entidad alcanzó el límite de 100
    if ($codigoEntidad > 99) {
      // Cambiar al siguiente prefijo y reiniciar el código de entidad a 1
      $prefijo       = 'F'; // Establecer el prefijo a "F"
      $codigoEntidad = 100;
    }
  }

  // Formatear el nuevo correlativo con el prefijo y el código de entidad actualizado
  $nuevoCorrelativo = sprintf('%s%02d-%08d', $prefijo, $codigoEntidad, $numero);

  return $nuevoCorrelativo;
}

function convertirNumeroEnPalabras($numero) {
  $decimalPart = explode('.', $numero);

  // Parte entera
  $parteEntera = convertirParteEntera($decimalPart[0]);

  // Parte decimal
  $parteDecimal = isset($decimalPart[1]) ? convertirParteDecimal($decimalPart[1]) : '';

  // Construir la representación final
  $resultado = $parteEntera . ' CON ' . $parteDecimal . '/100';

  return strtoupper($resultado);
}

function convertirParteEntera($numero) {
  $unidades = ['', 'UNO', 'DOS', 'TRES', 'CUATRO', 'CINCO', 'SEIS', 'SIETE', 'OCHO', 'NUEVE'];
  $decenas  = ['', 'DIEZ', 'VEINTE', 'TREINTA', 'CUARENTA', 'CINCUENTA', 'SESENTA', 'SETENTA', 'OCHENTA', 'NOVENTA'];

  $resultado = '';

  if ($numero > 0 && $numero < 10) {
    $resultado = $unidades[$numero];
  } elseif ($numero >= 10 && $numero < 20) {
    $resultado = 'DIECI' . $unidades[$numero % 10];
  } elseif ($numero >= 20) {
    $decena = floor($numero / 10);
    $unidad = $numero % 10;

    if ($unidad == 0) {
      $resultado = $decenas[$decena];
    } else {
      $resultado = $decenas[$decena] . ' Y ' . $unidades[$unidad];
    }
  }

  return $resultado;
}

function convertirParteDecimal($numero) {
  $unidades = ['', 'UNO', 'DOS', 'TRES', 'CUATRO', 'CINCO', 'SEIS', 'SIETE', 'OCHO', 'NUEVE'];

  $decena = floor($numero / 10);
  $unidad = $numero % 10;

  if ($numero < 10) {
    return $unidades[$numero];
  } else {
    return 'Y ' . $unidades[$unidad];
  }
}


