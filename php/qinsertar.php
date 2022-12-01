<?php 
	include "conectabase.php"
?>

<?php
	
	mysqli_set_charset($mysqli, "utf8mb4");
	$query = "
        INSERT INTO copropiedades
        VALUES(
            NULL,
            '".$_POST['nit']."',
            '".$_POST['nombre']."',
            '".$_POST['direccion']."',
            '".$_POST['telefono']."',
            '".$_POST['ciudad']."',
            '".$_POST['iniciocontrato']."'
        )
    ";
    // Ejecuto la petición contra la base de datos y me guardo el resultado en una variable
    mysqli_query($mysqli, $query);
    // Vuelvo a la pantalla anterior
    //var_dump($query)
    header('Location: ../aplicativo.php');

?>
