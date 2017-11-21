<?php
require_once(__DIR__."/Actividad.php");

class ActividadIndividual extends Actividad
{
        //Definimos las variables
        private $idActividad;

        function __construct($idActividad=NULLL,$nombre=NULL,$precio=NUL){
            parent::__construct($idActividad,$precio,$nombre);
            $this->idActividad = $idActividad;  
        }
}//fin de clase
?> 
