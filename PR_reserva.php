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
		if($_POST['tipo']=="procesarRes"){//PROCESAREMOS LA MODIFICACIÓN
		
			$ctrl->modificarReserva($_POST['idReserva'], $_POST['dni'], $_POST['horas'], $_POST['horas'] * $_POST['precio'] , $_POST['fecha']);
			header("Location: reservas.php");
			
		}
    
			if($_POST['tipo']=="añadir"){ //AÑADIR RESERVA

				
				$instalacion = $ctrl->nombrarInstalacion($_POST['instalacionReserva']);
				$precio = $instalacion[0]['PrecioPorHora'];
				$ctrl->añadirReserva($_POST['instalacionReserva'], $_POST['dni'], $_POST['horas'], $_POST['horas']*$precio, $_POST['fecha'] );	
				header("Location: reservas.php");
				

				
		     }else if($_POST['tipo']=="modificar"){ //MODIFICAR RESERVA
		     	$reserva = $ctrl->nombrarReserva($_POST['modiRes']);
				$instalacion = $ctrl->nombrarInstalacion($reserva[0]['idInstalacion']);
		     	echo '<form name="form4" id="form4" method="post" action="PR_reserva.php">';
			    echo '<h5>Modifica tu reserva</h5>';
			    echo '<input type="hidden" name="tipo" value= "procesarRes">';
					 echo '<input type="hidden" name="precio" value= "'.$instalacion[0]['PrecioPorHora'].'">';
					 echo '<label>Horas:  </label>';
					 echo '<input type="number" min="0" max="5" name="horas" value= "'.$reserva[0]['horasReservadas'].'"><br>';
					 echo '<label>DNI:</label> <input class="control" type="text" name="dni" pattern="[0-9]{8}[A-Za-z]{1}" value= "'.$reserva[0]['DNI'].'"title="Debe poner 8 números y una letra" required/> <br>';
					 echo '<label>Fecha de la reserva: </label>';
					  echo '<input type="datetime-local" name="fecha" value="'.substr(date($reserva[0]['fecha']), 0, 10).'T'.substr(date($reserva[0]['fecha']), 11, 16).'" min="'.substr(date("c"),0,16).'">';
					  echo '<input type="hidden" name="idReserva" value= "'.$_POST['modiRes'].'">';
					echo '<input type="submit" value= "Modifica tu reserva">';
				echo '</form>';
		     }else{ //ELIMINAR RESERVA
		     	$ctrl->eliminarReserva($_POST['elimRes']);
		     	header("Location: reservas.php");
		     }
		      


	?>

	<p> </p>
	<a href= reservas.php>Volver Atrás</a>


	


</body>
</html>