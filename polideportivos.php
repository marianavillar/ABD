<?php 
	require_once 'config.php';
?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv=”Content-Type” content=”text/html; charset=UTF-8″ />
	<title>Inicio</title>
</head>
<body>
	<h2>POLIDEPORTIVOS DISPONIBLES</h2>
	<?php 
		$arr0 = $ctrl->listarPolideportivos();
		    if (count($arr0) > 0) {
		    	echo '<ul>';
		        foreach ($arr0 as $key => $valor) {
		            echo '<li>';
		            echo '<h4>'.$valor['Nombre'].'</h4>';          
		            echo $valor['Ubicacion'].'<br>';
		            echo $valor['Telefono'].'<br>';
		            echo "<a href= instalacion.php?idPolideportivo=".$valor['id']."&nombre=".urlencode($valor['Nombre']).">Ver instalaciones</a>";

		            echo '</li>';
		        }
		        echo '</ul>';
		      }

				//AÑADIR POLIDEPORTIVO
		      echo '<form name="form1" id="form1" method="post" action="PR_polideportivo.php">';
		      echo '<h5>Nuevo polideportivo</h5>';
		      echo '<input type="hidden" name="tipo" value= "añadir">';
		      echo '<label>Nombre </label>';
		      echo '<input type="text" name="nombre" required minlength="5" maxlength="50"  pattern="[A-Za-z0-9]+*" title="Solo letras y números. Tamaño minimo 5 y tamaño máximo = 50"><br>';

		      echo '<label>Ubicación </label>';
		      echo '<input type="text" name="ubicacion" required minlength="5" maxlength="50"  pattern="[A-Za-z0-9]+*" title="Solo letras y números. Tamaño minimo 5 y tamaño máximo = 100"><br>';
		      
			  echo '<label>Teléfono </label>';
		      echo '<input class="control" type="tel" placeholder="&#x1f4f1" name="telefono" pattern="^[9|8|7|6]\d{8}$"  required/>';
			  
			  echo '<input type="submit" value= "Añadir">';
		      echo '</form>';

		      //MODIFICAR POLIDEPORTIVO
		      echo '<form name="form3" id="form3" method="post" action="PR_polideportivo.php">';
			    echo '<h5>Modificar polideportivo</h5>';
			    echo '<input type="hidden" name="tipo" value= "modificar">';
					echo '<select name="modPoli">';
					foreach ($arr0 as $value) {
						echo '<option value = '.$value['id'].'>'.$value['Nombre'].'</option>';
					}
					echo '</select>';
					echo '<input type="submit" value= "Modificar Polideportivo">';
				echo '</form>';

		      //ELIMINAR POLIDEPORTIVO
			    echo '<form name="form3" id="form3" method="post" action="PR_polideportivo.php">';
			    echo '<h5>Eliminar polideportivo</h5>';
			    echo '<input type="hidden" name="tipo" value= "eliminar">';
					echo '<select name="elimPoli">';
					foreach ($arr0 as $value) {
						echo '<option value = '.$value['id'].'>'.$value['Nombre'].'</option>';
					}
					echo '</select>';
					echo '<input type="submit" value= "Eliminar Polideportivo">';
				echo '</form>';
	?>
	
	<p> </p>
	<a href= index.php>Volver Atrás</a>
	
</body>
</html>