<?php
require_once(__DIR__."/Actividad.php");
class ActividadGrupo extends Actividad
{
        //Definimos las variables
        private $idActividad;
        private $instalaciones;
        private $plazas;

        function __construct($idActividad=NULL,$nombre=NULL,$precio=NULL,$instalaciones=NULL,$plazas=NULL){
            parent::__construct($idActividad,$nombre ,$precio);
            $this->idActividad = $idActividad;  
            $this->instalaciones = $instalaciones; 
            $this->plazas = $plazas; 
        }
        public function getInstalaciones() {
        return $this->instalaciones;
   		}
    	public function getPlazas() {
        	return $this->plazas;
    	}
    	public function setInstalaciones($instalaciones) {
    	    $this->instalaciones = $instalaciones;
    	}
    	public function setPlazas($plazas) {
        	$this->plazas = $plazas;
    	}

}//fin de clase
?> 