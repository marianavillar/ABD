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
		$arr0 = $ctrl->listarReservas();

		    if (count($arr0) > 0) {

		    	echo '<h2>Reservas</h2>';
		    	echo '<ul>';
		    	$instalacion = array();
		    	$polideportivo = array();
		        foreach ($arr0 as $key => $valor) {
		        	$instalacion = $ctrl->nombrarInstalacion($valor['idInstalacion']);
		        	$polideportivo = $ctrl->listarPolideportivos($instalacion[0]['idPolideportivo']);

	        		echo '<li>';
		            echo '<h4>DNI del reservante: '.$valor['DNI'].'</h4>';  
		            echo '<p>Para la fecha y hora: '.$valor['fecha'].' en el polideportivo '.$polideportivo[0]['Nombre'].' el espacio reservado es '.$instalacion[0]['Nombre'].'</p>';
		            echo '<p>Horas reservadas: '.$valor['horasReservadas'].'</p>';
		            echo '<p>Precio total: '.$valor['precioTotal'].' euros</p>';
		   
		           echo '</li>';
		        }
		          echo '</ul>';
		      }

		//MODIFICAR UNA RESERVA
		      echo '<form name="form2" id="form2" method="post" action="PR_reserva.php">';
			    echo '<h5>Modificar reserva</h5>';
			    echo '<input type="hidden" name="tipo" value= "modificar">';
					echo '<select name="modiRes">';
					foreach ($arr0 as $key => $valor) {
						$instalacion = $ctrl->nombrarInstalacion($valor['idInstalacion']);
		        		$polideportivo = $ctrl->listarPolideportivos($instalacion[0]['idPolideportivo']);
						
						echo '<option value = '.$valor['idReserva'].'>Reserva de '.$valor['DNI'].' para esta fecha '.$valor['fecha'].' de la instalacion '.$instalacion[0]['Nombre'].' del polideportivo '.$polideportivo[0]['Nombre'].'</option>';
						
					}
					echo '</select>';
						
					echo '<input type="submit" value= "Modificar reserva">';
					
				echo '</form>';
		       
		//ELIMINAR UNA RESERVA 
		      echo '<form name="form3" id="form3" method="post" action="PR_reserva.php">';
			    echo '<h5>Eliminar reserva</h5>';
			    echo '<input type="hidden" name="tipo" value= "eliminar">';
					echo '<select name="elimRes">';
					foreach ($arr0 as $key => $valor) {
						$instalacion = $ctrl->nombrarInstalacion($valor['idInstalacion']);
		        		$polideportivo = $ctrl->listarPolideportivos($instalacion[0]['idPolideportivo']);

						echo '<option value = '.$valor['idReserva'].'>Reserva de '.$valor['DNI'].' para esta fecha '.$valor['fecha'].' de la instalacion '.$instalacion[0]['Nombre'].'  del polideportivo '.$polideportivo[0]['Nombre'].'</option>';
					}
					echo '</select>';
					echo '<input type="submit" value= "Eliminar reserva">';
				echo '</form>';
	?>
	
	<p> </p>
	<a href= index.php>Volver Atrás</a>
	
</body>
</html>