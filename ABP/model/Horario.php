<?php
class Horario
{
        //Definimos las variables     
        private $idhorario;
        private $dia;
        private $hora;
        private $fechIni;
        private $fechFin;

        function __construct($idHorario=NULL,$dia=NULL,$hora=NULL,$fechIni=NULL,$fechFin=NULL){
            $this->idHorario = $idHorario;
            $this->dia = $dia;
            $this->hora = $hora;
            $this->fechIni = $fechIni;
            $this->fechFin = $fechFin;
        }
        
    public function getIdHorario() {
        return $this->idHorario;
    }
    public function getDia() {
        return $this->dia;
    }
    public function getHora() {
        return $this->hora;
    }
    public function getFechaInicio() {
        return $this->fetchIni;
    }
    public function getFechaFin() {
        return $this->fechFin;
    }
    public function setIdHorario($idHorario) {
        $this->idHorario = $idHorario;
    }
    public function setDia($dia) {
        $this->dia = $dia;
    }
    public function setHora($hora) {
        $this->hora = $hora;
    }
    public function setFechaInicio($fechIni) {
        $this->fechIni = $fechIni;
    }
    public function setFechaFin($fechFin) {
        $this->fechFin = $fechFin;
    }

}//fin de clase
?> 
