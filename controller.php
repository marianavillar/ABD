<?php


require_once(__DIR__ . '/DAO/DAOPolideportivo.php');
require_once(__DIR__ . '/DAO/DAOInstalacion.php');
require_once(__DIR__ . '/DAO/DAOReserva.php');

class controller{

    private $polideportivoDAO;
    private $instalacionDAO;
    private $reservaDAO;

    private static $instance = null;

    public function __construct(){
        $this->polideportivoDAO = new DAOPolideportivo();
        $this->instalacionDAO = new DAOInstalacion();
        $this->reservaDAO = new DAOReserva();
  
    }

     public static function getInstance() {
        if (null === self::$instance) {
            self::$instance = new self();
        }

        return self::$instance;
    }
    
    
    //FUNCIONES POLIDEPORTIVODAO     /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /  
    
    public function listarPolideportivos(){
        return $this->polideportivoDAO->listarPolideportivos();
    }
	public function nombrarPolideportivo($id){
        return $this->polideportivoDAO->nombrarPolideportivo($id);
    }
    public function eliminarPolideportivo($id){
         $this->polideportivoDAO->eliminarPolideportivo($id);
    }
    public function añadirPolideportivo($nombre, $ubicacion, $telefono){
         $this->polideportivoDAO->añadirPolideportivo($nombre, $ubicacion, $telefono);
    }
    public function modificarPolideportivo($id, $nombre, $ubicacion, $telefono){
        $this->polideportivoDAO->modificarPolideportivo($id, $nombre, $ubicacion, $telefono);
    }
    

     //FUNCIONES INSTALACIONDAO     /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   / 
    public function listarInstalaciones($idPolideportivo){
        return $this->instalacionDAO->listarInstalaciones($idPolideportivo);
    }
     public function nombrarInstalacion($idInstalacion){
        return $this->instalacionDAO->nombrarInstalacion($idInstalacion);
    }
    public function eliminarInstalacion($idInstalacion){
         $this->instalacionDAO->eliminarInstalacion($idInstalacion);
    }
    public function añadirInstalacion($nombre, $precio, $idInstalacion){
         $this->instalacionDAO->añadirInstalacion($nombre, $precio, $idInstalacion);
    }
    public function modificarInstalacion($idInstalacion, $nombre, $precio){
        $this->instalacionDAO->modificarInstalacion($idInstalacion, $nombre, $precio);
    }
	
       //FUNCIONES RESERVADAO     /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   / 
    public function listarReservas(){
        return $this->reservaDAO->listarReserva();
    }

     public function nombrarReserva($idReserva){
        return $this->reservaDAO->nombrarReserva($idReserva);
    }
    public function añadirReserva($idInstalacion, $dni, $horasTotales, $precioTotal, $fecha ){
        $this->reservaDAO->añadirReserva($idInstalacion, $dni, $horasTotales, $precioTotal, $fecha);
    }
    public function eliminarReserva($idReserva){
         $this->reservaDAO->eliminarReserva($idReserva);
    }
    public function modificarReserva($idReserva, $dni, $horasTotales, $precioTotal, $fecha ){
        $this->reservaDAO->modificarReserva($idReserva, $dni, $horasTotales, $precioTotal, $fecha );
    }
}

