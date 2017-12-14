<?php
require_once(__DIR__."/Actividad.php");
class ActividadGrupo extends Actividad
{
        //Definimos las variables
        private $idActividad;

        function __construct($idActividad=NULL,$nombre=NULL,$precio=NULL,$idInstalaciones=NULL,$plazas=NULL){
            parent::__construct($idActividad,$nombre ,$precio,$idInstalaciones,$plazas);
            $this->idActividad = $idActividad;
        }

}//fin de clase
?> 