<?php
class Actividad
{
        //Definimos las variables
        private $idActividad;
        private $precio;
        private $nombre;

        function __construct($idActividad=NULL,$precio=NULL,$nombre=NULL){
            $this->idActividad = $idActividad;
            $this->precio = $precio;
            $this->nombre = $nombre;
        }
        
    public function getIdActividad() {
        return $this->idActividad;
    }
    public function getPrecio() {
        return $this->precio;
    }
    public function getNombre() {
        return $this->nombre;
    }
    public function setIdActividad($idActividad) {
        $this->idActividad = $idActividad;
    }
    public function setPrecio($precio) {
        $this->precio = $precio;
    }
    public function setPrecio($nombre) {
        $this->precio = $nombre;
    }
}//fin de clase
?> 
