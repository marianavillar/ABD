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
				$ctrl->modificarPolideportivo($_POST['idPolideportivo'], $_POST['nombre'], $_POST['ubicacion'], $_POST['telefono']);
			header("Location: polideportivos.php");
			}
			
			if($_POST['tipo']=="añadir"){ //AÑADIR POLIDEPORTIVO
				$ctrl->añadirPolideportivo($_POST['nombre'],$_POST['ubicacion'],$_POST['telefono']);
			header("Location: polideportivos.php");
				
		     }else if($_POST['tipo']=="modificar"){ //MODIFICAR POLIDEPORTIVO
			 
				$polideportivo = $ctrl->nombrarPolideportivo($_POST['modPoli']);
				

		     	 echo '<form name="form1" id="form1" method="post" action="'.$_SERVER['PHP_SELF'].'">';
				      echo '<h5>Modifique el polideportivo</h5>';
				      echo '<input type="hidden" name="tipo" value= "procesarModi">';
				      echo '<label>Nombre </label>';
				      echo '<input type="text" name="nombre" value="'.$polideportivo[0]['Nombre'].'" required minlength="5" maxlength="50"  pattern="[A-Za-z0-9]+*" title="Solo letras y números. Tamaño minimo 5 y tamaño máximo = 50"><br>';
				      echo '<label>Ubicación </label>';
					  echo '<input type="text" name="ubicacion" value="'.$polideportivo[0]['Ubicacion'].'" required minlength="5" maxlength="50"  pattern="[A-Za-z0-9]+*" title="Solo letras y números. Tamaño minimo 5 y tamaño máximo = 50"><br>';
				      echo '<label>Teléfono </label>';
				      echo '<input class="control" type="tel" placeholder="&#128231;(Opcional)" name="telefono" pattern="^[9|8|7|6]\d{8}$" value="'.$polideportivo[0]['Telefono'].'"required><br>';
				       echo '<input type="hidden" name="idPolideportivo" value= "'.$_POST['modPoli'].'">';
				   
				      echo '<input type="submit" value= "Modificar">';
		      echo '</form>';
		     }else{ //ELIMINAR POLIDEPORTIVO
		     	$ctrl->eliminarPolideportivo($_POST['elimPoli']);
		     	header("Location: polideportivos.php");
		     }
		      


	?>
	
</body>
</html>