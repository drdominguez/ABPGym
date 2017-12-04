<?php
class Actividad
{
        //Definimos las variables
        private $idActividad;
        private $precio;
        private $nombre;
        private $idInstalaciones;

        function __construct($idActividad=NULL,$nombre=NULL,$precio=NULL,$idInstalaciones){
            $this->idActividad = $idActividad;
            $this->nombre = $nombre;
            $this->precio = $precio;
            $this->idInstalaciones = $idInstalaciones;
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
    public function getIdIdInstalaciones() {
        return $this->idInstalaciones;
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
    public function setIdInstalaciones($idInstalaciones) {
        $this->idInstalaciones = $idInstalaciones;
    }
}//fin de clase
?> 
