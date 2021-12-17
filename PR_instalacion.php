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

		
			if($_POST['tipo']=="procesarModi"){//PROCESAREMOS LA MODIFICACIÓN

				$ctrl->modificarInstalacion($_POST['idInstalacion'], $_POST['nombre'], $_POST['precio']);
			header("Location: instalacion.php?idPolideportivo=".$_POST['idPolideportivo']."&nombre=".urlencode($_POST['nombrePolideportivo'])."");
			}
		      


			if($_POST['tipo']=="añadir"){ //AÑADIR INSTALACIÓN
				$ctrl->añadirInstalacion($_POST['nombre'],$_POST['precio'],$_POST['idPolideportivo']);
				header("Location: instalacion.php?idPolideportivo=".$_POST['idPolideportivo']."&nombre=".urlencode($_POST['nombrePolideportivo'])."");

		     }else if($_POST['tipo']=="modificar"){ //MODIFICAR INSTALACIÓN NUEVO FORMULARIO
		     	$instalacion = $ctrl->nombrarInstalacion($_POST['modInstal']);

		     	 echo '<form name="form1" id="form1" method="post" action="'.$_SERVER['PHP_SELF'].'">';
				      echo '<h5>Modifique la instalacion</h5>';
				      echo '<input type="hidden" name="tipo" value= "procesarModi">';
				      echo '<label>Nombre </label>';
				      echo '<input type="text" name="nombre" value="'.$instalacion[0]['Nombre'].'" required minlength="5" maxlength="50"  pattern="[A-Za-z0-9]+*" title="Solo letras y números. Tamaño minimo 5 y tamaño máximo = 50"><br>';
				      echo '<label>Precio por hora </label>';
				      echo '<input type="number" name="precio" min="1" value="'.$instalacion[0]['PrecioPorHora'].'"required><br>';
				       echo '<input type="hidden" name="idInstalacion" value= "'.$_POST['modInstal'].'">';
				       echo '<input type="hidden" name="idPolideportivo" value= "'.$_POST['idPolideportivo'].'">';
				       echo '<input type="hidden" name="nombrePolideportivo" value= "'.$_POST['nombrePolideportivo'].'">';
				      echo '<input type="submit" value= "Modificar">';
		      echo '</form>';
		     }else{ //ELIMINAR INSTALACION
		     	$ctrl->eliminarInstalacion($_POST['elimInstal']);
		     	header("Location: instalacion.php?idPolideportivo=".$_POST['idPolideportivo']."&nombre=".urlencode($_POST['nombrePolideportivo'])."");
		     }
		      


	?>



</body>
</html>