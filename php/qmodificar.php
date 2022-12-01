<?php 
    include "conectabase.php"
?> 

<?php
    // Me aseguro que la petición a la base de datos me devuelva los caracteres en UTF-8
    mysqli_set_charset($mysqli, "utf8mb4");
    // Quiero una lista de todos los usuarios
    
    $query = "
        UPDATE copropiedades SET
            
            nit  = '".$_POST['nit']."',
            nombre = '".$_POST['nombre']."',
            direccion = '".$_POST['direccion']."',
            telefono = '".$_POST['telefono']."',
            ciudad = '".$_POST['ciudad']."',
            iniciocontrato = '".$_POST['iniciocontrato']."'
            WHERE 
            id = ".$_POST['id']."
       
    ";
    
    //var_dump($query)    
    
    // Ejecuto la petición contra la base de datos y me guardo el resultado en una variable
    mysqli_query($mysqli, $query);
    
    // Vuelvo a la pantalla anterior
    header('Location: ../aplicativo.php');

?>