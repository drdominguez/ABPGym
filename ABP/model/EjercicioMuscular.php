<?php

require_once(__DIR__."/Ejercicio.php");

class EjercicioMuscular extends Ejercicio{
    
    private $idEjercicio;
    private $carga;
    private$repeticiones;
    
    function __construct($idEjercicio=NULL, $nombre=NULL, $descripcion=NUKL, $video=NULL, $imagen=NULL, $carga=NULL,$repeticiones=NULL){
        parent::__construct($idEjercicio, $nombre, $descripcion, $video, $imagen);//lamada al contructor padre
        $this->idEjercicio = $idEjercicio;
        $this->carga = $carga;
        $this->repeticiones = $repeticiones;
    }

    public function getCarga(){
        return $this->carga;
    }

    public function getRepeticiones(){
        return $this->repeticiones;
    }

    public function setCarga($carga){
        $this->carga=$carga;
    }
    
    public function setRepeticiones($repeticiones){
        $this->repeticiones=$repeticiones;
    }
}//fin de clase
?> 
