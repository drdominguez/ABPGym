<?php
class Actividad
{
        //Definimos las variables
        private $idActividad;
        private $precio;

        function __construct($idActividad=NULL,$precio=NULL){
            $this->idActividad = $idActividad;
            $this->precio = $precio;  
        }
        
    public function getIdActividad() {
        return $this->idActividad;
    }
    public function getPrecio() {
        return $this->precio;
    }
    public function setIdActividad($idActividad) {
        $this->idActividad = $idActividad;
    }
    public function setPrecio($precio) {
        $this->precio = $precio;
    }
}//fin de clase
?> 
