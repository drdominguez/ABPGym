<?php
class Recurso
{
        //Definimos las variables
        private $idRecurso;
        private $nombreRecurso;
        private $observaviones;

        function __construct($idRecurso=NULL,$nombreRecurso=NULL,$observaciones=NULL){
            $this->idRecurso = $idRecurso;
            $this->nombreRecurso = $nombreRecurso;
            $this->observaciones = $observaciones;
        }
        
    public function getIdRecurso() {
        return $this->idRecurso;
    }
    public function getNombreRecurso() {
        return $this->nombreRecurso;
    }
    public function getObservaciones() {
        return $this->observaciones;
    }
    public function setIdRecurso($idRecurso) {
        $this->idRecurso = $idRecurso;
    }
    public function setNombreRecurso($nombreRecurso) {
        $this->nombreRecurso = $nombreRecurso;
    }
    public function setObservaciones($observaciones) {
        $this->observaciones = $observaciones;
    }
}//fin de clase
?> 
