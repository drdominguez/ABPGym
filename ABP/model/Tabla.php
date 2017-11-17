<?php
class Tabla
{
    private $idTabla;
    private $tipo;
    private $comentario;
    private $nombre;

    function __construct($idTabla=NULL,$tipo=NULL,$comentario=NULL,$nombre=NULL){
    	$this->idTabla = $idTabla;
        $this->tipo = $tipo;
        $this->comentario = $comentario;
        $this->nombre = $nombre;  
}
	
	public function getIdTabla(){
		return $this->idTabla;
	}
	public function getNombre(){
		return $this->nombre;
	}
	public function getTipo(){
		return $this->tipo;
	}
	public function getComentario(){
		return $this->comentario;
	}
	public function seNombre($nombre){
		$this->nombre=$nombre;
	}
	public function setTipo($tipo){
		$this->tipo=$tipo;
	}
	public function setComentario($comentario){
		$this->comentario=$comentario;
	}
}//fin de clase
?> 
