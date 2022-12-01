<?php 
	include "php/conectabase.php"
?> 

<?php 
	include "php/header-aplicativo.php"
 ?>
 					<?php
        				if(!isset($_GET['operacion'])){
    				?>
            		
            		<a href="?tabla=<?php echo $_GET['tabla']?>&operacion=insertar"><button class="botoninsertar">Insertar</button></a>
            		
            		<table>
                		<tr>
                        	<?php
	                    		// Me aseguro que la petición a la base de datos me devuelva los caracteres en UTF-8
	                    		// Quiero una lista de todos los usuarios
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
	                		// Me aseguro que la petición a la base de datos me devuelva los caracteres en UTF-8
	                		mysqli_set_charset($mysqli, "utf8mb4");
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
			</section>
		</main>
	</body>	
</html>