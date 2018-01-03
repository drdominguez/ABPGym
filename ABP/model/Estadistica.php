<?php
class Estadistica
{
    private $idTabla;
    private $idSes;
    private $nombre;
    private $tipo;
    private $descripcion;
    private $comentario;
    private $duracion;
    private $fecha;

    function __construct($idTabla=NULL,$idSes=NULL,$nombre=NULL,$tipo=NULL,$descripcion=NULL,$comentario=NULL,$duracion=NULL,$fecha=NULL)
    {
        $this->idTabla = $idTabla;
        $this->idSes = $idSes;
        $this->nombre = $nombre;
        $this->tipo = $tipo;
        $this->descripcion = $descripcion;
        $this->comentario = $comentario;
        $this->duracion = $duracion;
        $this->fecha = $fecha;
    }


    public function getIdTabla()
    {
        return $this->idTabla;
    }

    public function getIdSesion(){
        return $this->idSes;
    }
    public function getNombre()
    {
        return $this->nombre;
    }
    public function getTipo()
    {
        return $this->tipo;
    }
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    public function getComentario(){
        return $this->comentario;
    }
    public function getDuracion(){
        return $this->duracion;
    }
    public function getFecha(){
        return $this->fecha;
    }

    public function setNombre($nombre)
    {
        $this->nombre=$nombre;
    }
    public function setTipo($tipo)
    {
        $this->tipo=$tipo;
    }
    public function setDescripcion($descripcion)
    {
        $this->descripcion=$descripcion;
    }

    public function setComentario($comentario){
        $this->comentario=$comentario;
    }
    public function setDuracion($duracion){
        $this->duracion=$duracion;
    }
    public function setFecha($fecha){
        $this->fecha=$fecha;
    }

}//fin de clase
?>
