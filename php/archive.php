<?php

	//DECLARO LAS VARIABLES PARA AGREGAR A LA BASE DE DATOS
	$nit = $_GET["nit"];
	$nombre = $_GET["nombre"];
	$direccion = $_GET["direccion"];
	$telefono = $_GET["telefono"];
	$ciudad = $_GET["ciudad"];
	$fecha = $_GET["fecha"];

	// Me conecto con la base de datos
	$mysqli = mysqli_connect("localhost", "admonyasesorias", "xRsJh[sKAxra)PB5", "edificios");
	// AGREGA DATOS A LA BASE DE DATOS
	$query = "INSERT INTO copropiedades VALUES(NULL,$nit,$nombre,$direccion,$telefono,$ciudad,$fecha)";

	// Ejecuto la petición contra el servidor
	mysqli_query($mysqli, $query);

?>