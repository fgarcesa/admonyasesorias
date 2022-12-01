<?php 
	include "php/conectabase.php"
?> 

<?php 
	include "php/header-aplicativo.php"
 ?>
 					<?php
        				if(!isset($_GET['operacion'])){
    				?>
          			   				
    				<h2 class="titulo-tabla"><?php echo $_GET['tabla'] ?></h2>	

            		<a href="?tabla=<?php echo $_GET['tabla']?>&operacion=insertar"><button class="botoninsertar">Insertar</button></a>
            		
            		<table>
                		<tr>
                        	<?php
	                    		// Quiero una lista de todos las tablas
	                    		$query = "SHOW COLUMNS FROM ".$_GET['tabla'].";";
	                    		// Ejecuto la petición contra la base de datos y me guardo el resultado en una variable
	                    		$result = mysqli_query($mysqli, $query);
	                    		// Ahora quiero obtener los usuarios en pantalla en forma de tabla
	                    		while ($row = mysqli_fetch_assoc($result)) {
	                        		echo '<th>'.$row['Field'].'</th>';
	                        		}
                    		?>
                		</tr>
                        <?php
	                		// Quiero una lista de todos los usuarios
	                		$query = "SELECT * FROM ".$_GET['tabla']."";
			                // Ejecuto la petición contra la base de datos y me guardo el resultado en una variable
			                $result = mysqli_query($mysqli, $query);
			                // Ahora quiero obtener los usuarios en pantalla en forma de tabla
	                		while ($row = mysqli_fetch_assoc($result)) {
			                    echo '<tr>';
			                    	foreach($row as $columna=>$valor){
		                        		echo '<td>'.$valor.'</td>';
	                    				}
	                    	    echo '<td><a href="?tabla='.$_GET['tabla'].'&id='.$row['id'].'&operacion=modificar"><button class="botonmodificar">Modificar</button></a></td>
	                            <td><a href="?tabla='.$_GET['tabla'].'&id='.$row['id'].'&operacion=borrar"><button class="botonborrar">Eliminar</button></a></td>
                        		</tr>
                    			';
                				}
						?>
		                </table>
		        	<?php } ?>

		        	<?php 
            			if(isset($_GET['operacion']) && $_GET['operacion'] == 'insertar'){
        			?>

        			<h2 class="titulo-tabla"><?php echo $_GET['tabla'] ?></h2>

        			<a href="?tabla=<?php echo $_GET['tabla']?>"><button class="botonvolver">Volver</button></a>	

                	<form action="?operacion=procesainsertar" method="POST">
                    	<input type="hidden" name="operacion" value="insertar">
                    	<input type="hidden" name="tabla" value="<?php echo $_GET['tabla']?>">
		                    <?php
		                        // Quiero una lista de todos los datos
		                    	$query = "SHOW COLUMNS FROM ".$_GET['tabla'].";";
		                    	// Ejecuto la petición contra la base de datos y me guardo el resultado en una variable
		                    	$result = mysqli_query($mysqli, $query);
		                    	// Ahora quiero obtener los usuarios en pantalla en forma de tabla
		                    	while ($row = mysqli_fetch_assoc($result)) {
		                        	if ($row['Field'] == 'id') {
		                        		echo '<input type="hidden" name="'.$row['Field'].'" placeholder="Indica tu '.$row['Field'].'">';
		                        	}
		                        	else{
		                        		echo '<input type="text" name="'.$row['Field'].'" placeholder="Indica tu '.$row['Field'].'">';
		                        		}
		                   		}
		                    ?>
                    	<input type="submit">
                	</form>

        		<?php } ?>

        		<?php 
		            if(isset($_GET['operacion']) && $_GET['operacion'] == 'modificar'){
		        ?>
		               
		        	<h2 class="titulo-tabla"><?php echo $_GET['tabla'] ?></h2>

        			<a href="?tabla=<?php echo $_GET['tabla']?>"><button class="botonvolver">Volver</button></a>

		               <form action="?operacion=procesamodificar" method="POST">
		                    <input type="hidden" name="operacion" value="insertar">
		                    <input type="hidden" name="tabla" value="<?php echo $_GET['tabla']?>">
		                    <?php
		                   	$query = "SHOW COLUMNS FROM ".$_GET['tabla'].";";
		                    // Ejecuto la petición contra la base de datos y me guardo el resultado en una variable
		                    $result = mysqli_query($mysqli, $query);
		                    // Ahora quiero obtener los usuarios en pantalla en forma de tabla
		                    while ($row = mysqli_fetch_assoc($result)) {
		                        // Creo un campo de tipo input
		                        echo '<input type="text" name="'.$row['Field'].'" placeholder="Indica tu '.$row['Field'].'" value="';
		                        // Preparo una segunda peticion en la cual quiero ver que es lo que tiene ese campo
		                            $query2 = "
		                            SELECT 
		                            ".$row['Field']." 
		                            FROM 
		                            ".$_GET['tabla']."
		                            WHERE id = ".$_GET['id']."
		                            ;";
		                        // Preparo la peticion
		                            $result2 = mysqli_query($mysqli, $query2);
		                        // Devuelvo el resultado
		                            while ($row2 = mysqli_fetch_assoc($result2)) {
		                               echo $row2[$row['Field']];
		                            }
		                        echo '">';
		                       	}
		                    ?>
		                    <input type="submit">
		                </form>
		        <?php } ?>

        		<?php  
        			// Vamos a ver si estamos insertando
				    if(isset($_GET['operacion']) && $_GET['operacion'] == 'procesainsertar'){
				        
				        $peticion = "INSERT INTO ".$_POST['tabla']." VALUES (NULL,";
				        $contador = 0;
				        foreach($_POST as $campo=>$valor){
				            if($contador > 2){
				                $peticion .= "'".$valor."',";
				            }
				            $contador++;
				        }
				        $peticion = substr($peticion, 0, -1);
				        $peticion .= ")";
				        				    				    
				    	$query = $peticion;
				    	// Ejecuto la petición contra la base de datos y me guardo el resultado en una variable
				    	mysqli_query($mysqli, $query);
				        header('Location: ?tabla='.$_POST['tabla']);
				    }

				    if(isset($_GET['operacion']) && $_GET['operacion'] == 'borrar'){
				        $query = "DELETE FROM ".$_GET['tabla']." WHERE id = ".$_GET['id']."";
				        echo $query;
				        // Ejecuto la petición contra la base de datos
				        mysqli_query($mysqli, $query);
				        header('Location: ?tabla='.$_GET['tabla']);
				    }

				    if(isset($_GET['operacion']) && $_GET['operacion'] == 'procesamodificar'){
				        foreach($_POST as $clave=>$valor){
				            $query = "
				            UPDATE 
				            ".$_POST['tabla']." 
				            SET ".$clave." = '".$valor."'
				            WHERE
				            id = ".$_POST['id']."
				            ";
				            echo $query;
				            // Ejecuto la petición contra la base de datos y me guardo el resultado en una variable
				            mysqli_query($mysqli, $query);
				        }
				        header('Location: ?tabla='.$_POST['tabla']);
				    }	
        		?>
			</section>
		</main>
	</body>	
</html>