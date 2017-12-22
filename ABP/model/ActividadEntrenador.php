<?php
class ActividadEntrenador
{
        //Definimos las variables
        private $id;
        private $dniEntrenador;
        private $idActividad;

        function __construct($id=NULL,$dniEntrenador=NULL,$idActividad=NULL){
            $this->id = $id;
            $this->dniEntrenador = $dniEntrenador;
            $this->idActividad = $idActividad;
        }
     
    public function getId() {
        return $this->id;
    }
    public function getDniEntrenador() {
        return $this->dniEntrenador;
    }    
    public function getIdActividad() {
        return $this->idActividad;
    }
    public function setId($id) {
        $this->id = $id;
    }
    public function setDniEntrenador($dniEntrenador) {
        $this->dniEntrenador = $dniEntrenador;
    }
    public function setIdActividad($idActividad) {
        $this->idActividad = $idActividad;
    }
}