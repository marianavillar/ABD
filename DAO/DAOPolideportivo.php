<?php
/**
 * Data Access Object de entrenamiento
 * Operaciones CRUD
 */

require_once(__DIR__.'/DAO.php');

class DAOPolideportivo extends DAO{
    public function __construct(){
        parent::__construct();
    }

    public function listarPolideportivos(){
		
            $query = "SELECT * FROM polideportivo";

        return $this->consultarv2($query);
    }

    public function nombrarPolideportivo($id){
        $query = "SELECT * FROM polideportivo WHERE id = '". $id ."'";
        
        return $this->consultarv2($query);
    }
    
    public function añadirPolideportivo( $nombre, $ubicacion, $telefono){

        $query= "INSERT INTO `polideportivo` (`Nombre`, `Ubicacion`, `Telefono`) VALUES(
	
        '".$nombre."'
         , 
        '".$ubicacion."'
         ,
       '".$telefono."'
        )";

        $this->consultarv2($query);
    }

    public function eliminarPolideportivo($id){
        $query= "DELETE FROM polideportivo where id = '". $id."'";

        $this->consultarv2($query);
    }

    public function modificarPolideportivo($id, $nombre, $ubicacion, $telefono){
        $query= "UPDATE polideportivo SET Nombre = '".$nombre."', Ubicacion = '".$ubicacion."', Telefono = '".$telefono."' where id = '".$id."'";

        $this->consultarv2($query);
    }
}