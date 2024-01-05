<?php
require "../../core.php";

// Obtener producto
if (isset($_GET["getProdutc"]) && $_GET['getProdutc'] == true) {
  $id = $_GET["id"];

  $query = "SELECT * FROM products WHERE id=:id";
  $stmt  = $connect->prepare($query);
  $stmt->bindParam(":id", $id);
  $stmt->execute();
  $product = $stmt->fetch(PDO::FETCH_OBJ);

  $json = [
    "id"             => $_GET["id"],
    "name"           => $product->name,
    "price_buys"     => $product->price_buys,
    "price_sale"     => $product->price_sale,
    "quantity"       => $product->quantity,
    "alert_quantity" => $product->alert_quantity,
    "image_url"      => APP_URL . "/uploads/images/$product->image",
  ];

  echo json_encode($json);
}

// Actualizar producto
if (isset($_GET["updateProduct"]) && $_GET["updateProduct"] == true) {
  if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $id = isset($_POST["id"]) ? $_POST["id"] : null;

    // Validar y sanear otros campos según tus requisitos
    $name           = isset($_POST["name"]) ? $_POST["name"] : null;
    $price_buys     = isset($_POST["price_buys"]) ? $_POST["price_buys"] : null;
    $price_sale     = isset($_POST["price_sale"]) ? $_POST["price_sale"] : null;
    $quantity       = isset($_POST["quantity"]) ? $_POST["quantity"] : null;
    $alert_quantity = isset($_POST["alert_quantity"]) ? $_POST["alert_quantity"] : null;

    // Procesar la imagen si se sube una nueva
    if (isset($_FILES["image"]) && $_FILES["image"]["error"] == UPLOAD_ERR_OK) {
      $image_path = "no_image.png";
    } else {
      // Si no se sube una nueva imagen, mantén la imagen existente
      $image_path = "no_image.png";
    }

    // Actualizar los datos en la base de datos
    $query = "UPDATE products SET name=:name, price_buys=:price_buys, price_sale=:price_sale, quantity=:quantity, alert_quantity=:alert_quantity, image=:image WHERE id=:id";
    $stmt  = $connect->prepare($query);

    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':price_buys', $price_buys);
    $stmt->bindParam(':price_sale', $price_sale);
    $stmt->bindParam(':quantity', $quantity);
    $stmt->bindParam(':alert_quantity', $alert_quantity);
    $stmt->bindParam(':image', $image_path);
    $stmt->bindParam(':id', $id);

    $stmt->execute();

    // Manejar la respuesta (puedes enviar un JSON de confirmación, por ejemplo)
    $response = [
      "success" => true,
      "message" => "Producto actualizado correctamente"
    ];
    echo json_encode($response);
  } else {
    // Si la solicitud no es POST, devolver un error
    $response = ["success" => false, "message" => "Método de solicitud no válido"];
    echo json_encode($response);
  }
}

// Eliminar producto
if (isset($_POST["deleteProduct"]) && $_POST["deleteProduct"] == true) {
  
  $productId = $_POST["id"];

  $stmt = $connect->prepare('DELETE FROM products WHERE id = :id');
  $stmt->bindParam(':id', $productId);
  $stmt->execute();

  $response = [
    "success" => true,
    "message" => "Producto elimino correctamente"
  ];

  echo json_encode($response);
}