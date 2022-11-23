<?php

$nit = $_GET["nit"];
$nombre = $_GET["nombre"];
$direccion = $_GET["direccion"];
$telefono = $_GET["telefono"];
$ciudad = $_GET["ciudad"];
$fecha = $_GET["fecha"];

// Me conecto con la base de datos
$mysqli = mysqli_connect("localhost", "admonyasesorias", "xRsJh[sKAxra)PB5", "edificios");
// Preparo una peticion
$query = "INSERT INTO copropiedades VALUES(NULL,$nit,$nombre,$direccion,$telefono,$ciudad,$fecha)";
// Ejecuto la petición contra el servidor
mysqli_query($mysqli, $query);

?>