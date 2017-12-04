<?php
class Recurso
{
        //Definimos las variables
        private $idRecurso;
        private $nombreRecurso;

        function __construct($idRecurso=NULL,$nombreRecurso=NULL){
            $this->idRecurso = $idRecurso;
            $this->nombreRecurso = $nombreRecurso;
        }
        
    public function getIdRecurso() {
        return $this->idRecurso;
    }
    public function getNombreRecurso() {
        return $this->nombreRecurso;
    }
    public function setIdRecurso($idRecurso) {
        $this->idRecurso = $idRecurso;
    }
    public function setNombreRecurso($nombreRecurso) {
        $this->nombreRecurso = $nombreRecurso;
    }
}//fin de clase
?> 
