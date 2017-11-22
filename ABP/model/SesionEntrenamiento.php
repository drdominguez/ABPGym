<?php
class Sesion
{
    private $idSesion;
    private $comentario;
    private $duracion;
    private $fecha;
    
    function __construct($idSesion=NULL,$comentario=NULL,$duracion=NULL,$fecha=NULL){
    	$this->idSesion = $idSesion;
        $this->comenario = $comentario;
        $this->duracion = $duracion;
        $this->fecha = $fecha; 
}
	
	public function getIdSesion(){
		return $this->idEjercicio;
	}
	public function getComentario(){
		return $this->comentario;
	}
	public function getDuracion(){
		return $this->duracion;
	}
	public function getFecha(){
		return $this->fecha;
	}
	
	public function setIdSesion($idSesion){
		$this->idSesion=$idSesion;
	}
	public function setComentario($comentario){
		$this->comentario=$comentario;
	}
	public function setDuracion($duracion){
		$this->duracion=$duracion;
	}
	public function setFecha($fecha){
		$this->fecha=$fecha;
	}
}//fin de clase

?>