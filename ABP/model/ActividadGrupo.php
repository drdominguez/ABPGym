<?php
require_once(__DIR__."/Actividad.php");
class ActividadGrupo extends Actividad
{
        //Definimos las variables
        private $idActividad;
        private $plazas;

        function __construct($idActividad=NULL,$nombre=NULL,$precio=NULL,$idInstalaciones=NULL,$plazas=NULL){
            parent::__construct($idActividad,$nombre ,$precio,$idInstalaciones);
            $this->idActividad = $idActividad;
            $this->plazas = $plazas; 
        }
    	public function getPlazas() {
        	return $this->plazas;
    	}
    	public function setPlazas($plazas) {
        	$this->plazas = $plazas;
    	}

}//fin de clase
?> 