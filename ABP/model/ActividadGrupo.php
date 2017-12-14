<?php
require_once(__DIR__."/Actividad.php");
class ActividadGrupo extends Actividad
{
        //Definimos las variables
        private $idActividad;

        function __construct($idActividad=NULL,$nombre=NULL,$precio=NULL,$idInstalaciones=NULL,$plazas=NULL,$horario=NULL){
            parent::__construct($idActividad,$nombre,$precio,$idInstalaciones,$plazas,$horario);
            $this->idActividad = $idActividad;
        }

}//fin de clase
?> 