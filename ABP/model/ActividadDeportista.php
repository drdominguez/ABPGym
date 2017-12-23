<?php
class ActividadDeportista
{
        //Definimos las variables
        private $id;
        private $idActividad;
        private $dniDeportista;

        function __construct($id=NULL,$idActividad=NULL,$dniDeportista=NULL){
            $this->id = $id;
            $this->idActividad = $idActividad;
            $this->dniDeportista = $dniDeportista;
        }
     
    public function getId() {
        return $this->id;
    }   
    public function getIdActividad() {
        return $this->idActividad;
    }
    public function getDniDeportista() {
        return $this->dniDeportista;
    } 
    public function setId($id) {
        $this->id = $id;
    }
    public function setIdActividad($idActividad) {
        $this->idActividad = $idActividad;
    }
    public function setDniDeportista($dniDeportista) {
        $this->dniDeportista = $dniDeportista;
    }
}