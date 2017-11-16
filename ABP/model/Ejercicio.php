<?php
class Ejercicio
{
    private $idEjercicio;
    private $nombre;
    private $descripcion;
    private $video;
    private $imagen;
    function __construct($idEjercicio=NULL,$nombre=NULL,$descripcion=NULL,$video=NULL,$imagen=NULL){
    	$this->idEjercicio = $idEjercicio;
        $this->nombre = $nombre;
        $this->descripcion = $descripcion;
        $this->video = $video;
        $this->imagen = $imagen;   
}
	
	public function getId(){
		return $this->idEjercicio;
	}
	public function getNombre(){
		return $this->nombre;
	}
	public function getDescripcion(){
		return $this->descripcion;
	}
	public function getVideo(){
		return $this->video;
	}
	public function getImagen(){
		return $this->imagen;
	}
	public function seNombre($nombre){
		$this->nombre=$nombre;
	}
	public function setDescripcion($descripcion){
		$this->descripcion=$descripcion;
	}
	public function setVideo($video){
		$this->video=$video;
	}
	public function setImagen($imagen){
		$this->imagen=$imagen;
	}
}//fin de clase
?> 
