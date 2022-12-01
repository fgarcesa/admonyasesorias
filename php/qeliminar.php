<?php 
	include "conectabase.php"
 ?>

 <?php 
 	$query = "DELETE FROM copropiedades WHERE id = ".$_GET['id']."";
    echo $query;
    // Ejecuto la petición contra la base de datos
    mysqli_query($mysqli, $query);
    // Vuelvo a la pantalla anterior
    header('Location: ../aplicativo.php');
?>