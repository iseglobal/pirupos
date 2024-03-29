<!DOCTYPE html>
<html lang="es" data-bs-theme="dark">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">

	<!-- Primary Meta Tags-->
	<title>
		<?= $theme_title ?> |
		<?= APP_NAME ?>
	</title>

	<!-- Favicon-->
	<link rel="apple-touch-icon" sizes="180x180" href="<?= APP_URL ?>/assets/img/favicon/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="<?= APP_URL ?>/assets/img/favicon/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="<?= APP_URL ?>/assets/img/favicon/favicon-16x16.png">
	<link rel="manifest" href="<?= APP_URL ?>/assets/img/favicon/site.webmanifest">

	<!-- Css Bootstrap-->
	<link rel="stylesheet" href="<?= APP_URL ?>/assets/css/fontawesome.css">
	<link rel="stylesheet" href="<?= APP_URL ?>/assets/css/app.css">

	<?php
	if (isset($theme_styles)) {
		foreach ($theme_styles as $style) {
			echo "<link rel=\"stylesheet\" href=\"" . APP_URL ."/". $style . "\">";
		}
	}
	?>
</head>

<body>