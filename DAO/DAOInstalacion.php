<?php
/**
 * Data Access Object de entrenamiento
 * Operaciones CRUD
 */

require_once(__DIR__.'/DAO.php');

class DAOinstalacion extends DAO{
    public function __construct(){
        parent::__construct();
    }

    public function listarInstalaciones($idPolideportivo){
        $query = "SELECT * FROM instalacion WHERE idPolideportivo = '". $idPolideportivo ."'";
        
        return $this->consultarv2($query);
    }

    public function nombrarInstalacion($idInstalacion){
        $query = "SELECT * FROM instalacion WHERE idInstalacion = '". $idInstalacion ."'";
        
        return $this->consultarv2($query);
    }
    
    public function añadirInstalacion($nombre, $precio, $idInstalacion){

        $query= "INSERT INTO `instalacion` (`Nombre`, `PrecioPorHora`, `idPolideportivo`) VALUES(
        '".$nombre."'
         , 
        '".$precio."'
         ,
       '".$idInstalacion."'
        )";

        $this->consultarv2($query);
    }

    public function eliminarInstalacion($idInstalacion){
        $query= "DELETE FROM instalacion where idInstalacion = '". $idInstalacion."'";

        $this->consultarv2($query);
    }

    public function modificarInstalacion($idInstalacion, $nombre, $precio){
        $query= "UPDATE instalacion SET Nombre = '".$nombre."', PrecioPorHora = '".$precio."' where idInstalacion = '".$idInstalacion."'";

        $this->consultarv2($query);
    }

}