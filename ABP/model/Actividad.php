<?php
require_once(__DIR__."/../core/ValidationException.php");
class Actividad
{
        //Definimos las variables
            private $idActividad;
            private $precio;

        function __construct($idActividad=NULL,$nombre=precio){
            $this->idActividad = $idActividad;
            $this->precio = $precio;  
        }
    public function getIdActividad() {
        return $this->idActividad;
    }
    
    public function getNombre() {
        return $this->nombre;
    }
    public function setIdActividad($idActividad) {
        $this->idActividad = $idActividad;
    }
    
    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }
}//fin de clase
?> 
