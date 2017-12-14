<?php
class Actividad
{
        //Definimos las variables
        private $idActividad;
        private $precio;
        private $nombre;
        private $idInstalaciones;
        private $plazas;
        private $horario;

        function __construct($idActividad=NULL,$nombre=NULL,$precio=NULL,$idInstalaciones=NULL,$plazas=NULL,$horario=NULL){
            $this->idActividad = $idActividad;
            $this->nombre = $nombre;
            $this->precio = $precio;
            $this->idInstalaciones = $idInstalaciones;
            $this->plazas = $plazas;
            $this->horario=$horario;
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
    public function getIdInstalaciones() {
        return $this->idInstalaciones;
    }
    public function getPlazas() {
        return $this->plazas;
    }
    public function getHorario(){
        return $this->horario;
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
    public function setPlazas($plazas) {
        $this->plazas = $plazas;
    }
    public function setHorario($horario){
        $this->horario = $horario;
    }

}//fin de clase
?> 
