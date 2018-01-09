<?php
require_once(__DIR__."/Actividad.php");
class ActividadGrupo extends Actividad
{
        //Definimos las variables
        private $idActividad;

        function __construct($idActividad=NULL,$nombre=NULL,$precio=NULL,$idInstalaciones=NULL,$plazas=NULL,$contador=NULL,$horario=NULL){
            parent::__construct($idActividad,$nombre,$precio,$idInstalaciones,$plazas,$contador,$horario);
            $this->idActividad = $idActividad;
        }

}//fin de clase
?> 