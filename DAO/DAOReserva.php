<?php
/**
 * Data Access Object de entrenamiento
 * Operaciones CRUD
 */

require_once(__DIR__.'/DAO.php');

class DAOReserva extends DAO{
    public function __construct(){
        parent::__construct();
    }

    public function listarReserva(){
        $query = "SELECT * FROM reserva";
        
        return $this->consultarv2($query);
    }
    public function nombrarReserva($idReserva){
        $query = "SELECT * FROM reserva where idReserva = '".$idReserva."'";

        return $this->consultarv2($query);
    }
    
    public function añadirReserva($idInstalacion, $dni, $horasTotales, $precioTotal, $fecha){
        $query= "INSERT INTO `reserva` (`fecha`,  `idInstalacion`, `horasReservadas`, `precioTotal`, `DNI` ) VALUES(
    
        '".$fecha."'
         , 
		  '".$idInstalacion."'
         ,
         '".$horasTotales."'
         ,
       '".$precioTotal."'
       ,
       '".$dni."'
        
        )";

        $this->consultarv2($query);
    }

     public function eliminarReserva($id){
        $query= "DELETE FROM reserva where idReserva = '". $id."'";

        echo $query;
        $this->consultarv2($query);
    }

    public function modificarReserva($idReserva, $dni, $horasTotales, $precioTotal, $fecha){
        $query= "UPDATE reserva SET fecha = '".$fecha."', 
        horasReservadas = '".$horasTotales."',
        DNI = '".$dni."', 
        precioTotal = '".$precioTotal."'
        where idReserva = '".$idReserva."'";

        $this->consultarv2($query);
    }


    
}