<?php

require_once(__DIR__."/Ejercicio.php");

class EjercicioEstiramiento extends Ejercicio
{
	Private $idEjercicio;
    Private $tiempo;
    Private $unidad;
    
    function __construct($idEjercicio=NULL, $nombre=NULL, $descripcion=NUKL, $video=NULL, $imagen=NULL, $tiempo=NULL,
    	$unidad=NULL){
        parent::__construct($idEjercicio, $nombre, $descripcion, $video, $imagen);//lamada al contructor padre
        $this->idEjercicio = $idEjercicio;
        $this->tiempo = $tiempo;
        $this->unidad = $unidad;
	}

	public function getTiempo(){
		return $this->tiempo;
	}

	public function getUnidad(){
		return $this->unidad;
	}

	public function setTiempo($tiempo){
		$this->tiempo=$tiempo;
	}

	public function setUnidad($unidad){
		$this->unidad=$unidad;
	}
}//fin de clase
?> 
