<?php

require_once(__DIR__."/EjercicioMapper.php")
require_once(__DIR__."/Ejercicio.php");
require_once(__DIR__."/EjercicioEstiramiento.php");

class EjercicioEstiramiento extends Ejercicio
{
	Private $idEjercicio;
    Private $tiempo;
    Private $unidad;
    Private $distancia;
    
        function __construct($idEjercicio=NULL, $nombre=NULL, $descripcion=NUKL, $video=NULL, $imagen=NULL, $tiempo=NULL,$unidad=NULL, $distancia=NULL){
        	parent::__construct($idEjercicio, $nombre, $descripcion, $video, $imagen);//lamada al contructor padre
        	$this->idEjercicio = $idEjercicio;
        	$this->tiempo = $tiempo;
        	$this->unidad = $unidad;
        	$this->distancia = $distancia;
	}
	public function getTiempo(){
		return $this->tiempo;
	}
	public function getUnidad(){
		return $this->unidad;
	}
	public function getDistancia(){
		return $this->distancia;
	}
	public function setTiempo($tiempo){
		$this->tiempo=$tiempo;
	}
	public function setUnidad($unidad){
		$this->unidad=$unidad;
	}
	public function setDistancia($distancia){
		$this->distancia=$distancia;
	}
}//fin de clase
?> 
