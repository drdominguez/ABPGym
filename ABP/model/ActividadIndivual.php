<?php

require_once(__DIR__."/Actividad.php");
require_once(__DIR__."/ActividadMapper.php");
require_once(__DIR__."ActividadIndivual.php");

class ActividadIndividual extends Actividad
{
        //Definimos las variables
        private $idActividad;

        function __construct($idActividad=NULL,$precio=NULL,$nombre=NULL){
            parent::__construct($idActividad, $precio,$nombre);/
            $this->idActividad = $idActividad;  
        }
}//fin de clase
?> 
