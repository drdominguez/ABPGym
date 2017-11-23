<?php
require_once(__DIR__."/Actividad.php");

class ActividadIndividual extends Actividad
{
        //Definimos las variables
        private $idActividad;

        function __construct($idActividad=NULL,$nombre=NULL,$precio=NULL){
            parent::__construct($idActividad,$precio,$nombre);
            $this->idActividad = $idActividad;  
        }
}//fin de clase
?> 
