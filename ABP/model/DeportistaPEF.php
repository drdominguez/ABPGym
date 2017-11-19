<?php

require_once(__DIR__."/UsuarioMapper.php");
require_once(__DIR__."/Usuario.php");
require_once(__DIR__."/DeportistaMapper.php");
require_once(__DIR__."/Deportista.php");

class DeportistaTDU extends Deportista
{
    //Definimos las variables
    private $dni;
    private $tarjeta;
    private $comentarioRevision;

    function __construct($dni=NULL, $nombre=NULL, $apellidos=NULL, $edad=NULL, $contraseña=NULL,
                         $email=NULL, $telefono=NULL, $fechaAlta=NULL, $tarjeta=NULL, $comentarioRevision=NULL)
    {
        parent::__construct($dni, $nombre, $apellidos, $edad, $contraseña, $email, $telefono, $fechaAlta);//llamada al contructor padre
        $this->tarjeta = $tarjeta;
        $this->comentarioRevision = $comentarioRevision;

    }

    public function getDni(){
        return $this->dni;
    }

    public function setDni($dni){
        $this->dni = $dni;
    }

    public function getTarjeta(){
        return $this->tarjeta;
    }

    public function setTarjeta($tarjeta){
        $this->tarjeta = $tarjeta;
    }

    public function getComentarioRevision(){
        return $this->comentarioRevision;
    }

    public function setComentario($comentario){
        $this->comentarioRevision = $comentario;
    }
}//fin de clase

?>