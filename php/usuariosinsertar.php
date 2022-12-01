<?php 
	include "conectabase.php"
?> 

<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Applicativo Web Administración</title>
		<!-- ICONO -->
		<link rel="icon" href="img/favicon.ico">
		<!-- CUSTOM CSS -->
		<link rel="stylesheet" type="text/css" href="../css/styles-panel.css">
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
					<li><a href="">Usuarios</a></li>
					<li><a href="">Copropiedades</a></li>				
				</ul>
			</nav>
			<section>
				<header id="panel-seccion">
					<img src="../img/logo.png">
					<h1>Panel de Control Administración</h1>
					<h2>Administraciones y Asesorías Jurídicas S.A.S.</h2>
				</header>
				<a href="../aplicativo.php"><button id="boton-volver">Volver</button></a>
					
				<form action="qinsertar.php" method="POST">
				    <input type="text" name="nit" placeholder="Indica el NIT" required>
				    <input type="text" name="nombre" placeholder="Indica el nombre" required>
				    <input type="text" name="direccion" placeholder="Indica la dirección" required>
				    <input type="text" name="telefono" placeholder="Indica el telefono" required>
				    <input type="text" name="ciudad" placeholder="Indica la ciudad" required>
				    <input type="date" name="iniciocontrato" required>
				    <input type="submit">
				</form>
			</section>
		</main>
	</body>	
</html>