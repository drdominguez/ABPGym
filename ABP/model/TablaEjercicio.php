<?php
class TablaEjercicio
{
    private $idTabla;
    private $idEjercicio;

    function __construct($idTabla=NULL,$idEjercicio=NULL){
    	$this->idTabla = $idTabla;
        $this->idEjercicio = $idEjercicio;
}
	
	public function getIdTabla(){
		return $this->idTabla;
	}
	public function getIdEjercicio(){
		return $this->idEjercicio;
	}
}//fin de clase
?> 
