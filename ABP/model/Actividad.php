<?php
class Actividad
{
        //Definimos las variables
        private $idActividad;
        private $precio;
        private $nombre;

        function __construct($idActividad=NULL,$nombre=NULL,$precio=NULL){
            $this->idActividad = $idActividad;
            $this->nombre = $nombre;
            $this->precio = $precio;
        }
        
    public function getIdActividad() {
        return $this->idActividad;
    }
    public function getNombre() {
        return $this->nombre;
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
    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }
}//fin de clase
?> 
