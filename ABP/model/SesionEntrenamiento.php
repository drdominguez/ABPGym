<?php
class SesionEntrenamiento
{
    private $idSesion;
    private $comentario;
    private $duracion;
    private $fecha;
    private $dniDeportista;

    function __construct($idSesion=NULL,$comentario=NULL,$duracion=NULL,$fecha=NULL,$dniDeportista=NULL){
    	$this->idSesion = $idSesion;
        $this->comentario = $comentario;
        $this->duracion = $duracion;
        $this->fecha = $fecha;
        $this->dniDeportista=$dniDeportista; 
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

	public function getDniDeportista(){
		return $this->dniDeportista;
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

	public function setDniDeportista($dni){
		$this->dniDeportista=$dni;
	}
}//fin de clase

?>