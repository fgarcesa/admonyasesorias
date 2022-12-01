<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Applicativo Web Administración</title>
		<!-- ICONO -->
		<link rel="icon" href="../img/favicon.ico">
		<!-- CUSTOM CSS -->
		<link rel="stylesheet" type="text/css" href="css/styles-panel.css">
		<!-- IMPORTAR OPEN SANS -->
		<link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
		<!-- IMPORTA JQUERY MIN -->
		<script src="js/jquery-3.6.1.min.js"></script>
		<!-- IMPORTA ARCHIVO JS -->
		<script src="js/main.js"></script>
	</head>
	<body>
		<header id="planel-global"></header>
		<main>
			<nav>				
				<ul>
					<?php
				        // Me aseguro que la petición a la base de datos me devuelva los caracteres en UTF-8
				        mysqli_set_charset($mysqli, "utf8mb4");
				        // Quiero una lista de todos los usuarios
				        $query = "SHOW TABLES FROM edificios;";
				        // Ejecuto la petición contra la base de datos y me guardo el resultado en una variable
				        $result = mysqli_query($mysqli, $query);
				        // Ahora quiero obtener los usuarios en pantalla en forma de tabla
				        while ($row = mysqli_fetch_assoc($result)) {
				            echo '<li><a href="?tabla='.$row["Tables_in_edificios"].'">'.$row["Tables_in_edificios"].'</a></li>';				            
				        	}
				        ?>				
				</ul>
			</nav>
			<section>
				<header id="panel-seccion">
					<img src="img/logo.png">
					<h1>Panel de Control Administración</h1>
					<h2>Administraciones y Asesorías Jurídicas S.A.S.</h2>
				</header>