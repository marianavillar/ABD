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

	<?php 
		$arr0 = $ctrl->listarInstalaciones($_GET['idPolideportivo']);
		    if (count($arr0) > 0) {
		    	echo '<h2>'.$_GET['nombre'].'</h2>';
		    	echo '<ul>';
		        foreach ($arr0 as $key => $valor) {
		            echo '<li>';
		            echo '<h4>'.$valor['Nombre'].'</h4>';          
		            echo '<p>'.$valor['PrecioPorHora'].' euros la hora </p>';
		   
		            echo '</li>';
		        }
		        echo '</ul>';
		      }

		      //AÑADIR INSTALACIÓN
		      echo '<form name="form1" id="form1" method="post" action="PR_instalacion.php">';
		      echo '<h5>Nueva instalacion</h5>';
		      echo '<input type="hidden" name="tipo" value= "añadir">';
		      echo '<label>Nombre </label>';
		      echo '<input type="text" name="nombre" required minlength="5" maxlength="50"  pattern="[A-Za-z0-9]+*" title="Solo letras y números. Tamaño minimo 5 y tamaño máximo = 50"><br>';

		      echo '<label>Precio por hora </label>';
		      echo '<input type="number" name="precio" min="1" required><br>';
		       echo '<input type="hidden" name="idPolideportivo" value= "'.$_GET['idPolideportivo'].'">';
		       echo '<input type="hidden" name="nombrePolideportivo" value= "'.$_GET['nombre'].'">';
		      echo '<input type="submit" value= "Añadir">';
		      echo '</form>';

		      //MODIFICAR INSTALACIÓN
		      echo '<form name="form3" id="form3" method="post" action="PR_instalacion.php">';
			    echo '<h5>Modificar instalacion</h5>';
			    echo '<input type="hidden" name="tipo" value= "modificar">';
					echo '<select name="modInstal">';
					foreach ($arr0 as $value) {
						echo '<option value = '.$value['idInstalacion'].'>'.$value['Nombre'].'</option>';
					}
					echo '</select>';
					echo '<input type="hidden" name="idPolideportivo" value= "'.$_GET['idPolideportivo'].'">';
		       		echo '<input type="hidden" name="nombrePolideportivo" value= "'.$_GET['nombre'].'">';
					echo '<input type="submit" value= "Modificar Instalacion">';
				echo '</form>';

		      //ELIMINAR INSTALACION
			    echo '<form name="form3" id="form3" method="post" action="PR_instalacion.php">';
			    echo '<h5>Eliminar instalacion</h5>';
			    echo '<input type="hidden" name="tipo" value= "eliminar">';
					echo '<select name="elimInstal">';
					foreach ($arr0 as $value) {
						echo '<option value = '.$value['idInstalacion'].'>'.$value['Nombre'].'</option>';
					}
					echo '</select>';
					echo '<input type="hidden" name="idPolideportivo" value= "'.$_GET['idPolideportivo'].'">';
		     		echo '<input type="hidden" name="nombrePolideportivo" value= "'.$_GET['nombre'].'">';
					echo '<input type="submit" value= "Eliminar Instalacion">';
				echo '</form>';

		      //HACER UNA RESERVA
				echo '<form name="form4" id="form4" method="post" action="PR_reserva.php">';
			    echo '<h5>Elije tu instalacion y haz tu reserva</h5>';
			    echo '<input type="hidden" name="tipo" value= "añadir">';
					echo '<select name="instalacionReserva">';
					foreach ($arr0 as $value) {
						echo '<option value = '.$value['idInstalacion'].'>'.$value['Nombre'].'</option>';
					}
					echo '</select><br>';
					 echo '<label>Horas:  </label>';
					 echo '<input type="number" min="0" max="5" name="horas" value= "1"><br>';
					 echo '<label>DNI:</label> <input class="control" type="text" name="dni" pattern="[0-9]{8}[A-Za-z]{1}" title="Debe poner 8 números y una letra" required/> <br>';
					 echo '<label>Fecha de la reserva: </label>';
					  echo '<input type="datetime-local" name="fecha" value="'.substr(date("c"),0,16).'" min="'.substr(date("c"),0,16).'" required>';
					echo '<input type="submit" value= "Haz tu reserva">';
				echo '</form>';

	?>
	
	<p> </p>
	<a href= polideportivos.php>Volver Atrás</a>


</body>
</html>