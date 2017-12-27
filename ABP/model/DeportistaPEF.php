<?php

require_once(__DIR__."/UsuarioMapper.php");
require_once(__DIR__."/Usuario.php");
require_once(__DIR__."/DeportistaMapper.php");
require_once(__DIR__."/Deportista.php");

class DeportistaPEF extends Deportista
{
    //Definimos las variables


    private $dni;
    private $nombre;
    private $apellidos;
    private $edad;
    private $contraseña;
    private $email;
    private $telefono;
    private $fechaAlta;
    private $tarjeta;
    public $comentarioRevision;

    function __construct($dni=NULL, $nombre=NULL, $apellidos=NULL, $edad=NULL, $contraseña=NULL,$email=NULL, $telefono=NULL, $fechaAlta=NULL, $tarjeta=NULL, $comentarioRevision=NULL){
        parent::__construct($dni, $nombre, $apellidos, $edad, $contraseña, $email, $telefono, $fechaAlta);//llamada al contructor padre
        $this->dni = $dni;
        $this->tarjeta = $tarjeta;
        $this->comentarioRevision = $comentarioRevision;

    }

    public function getDni(){
        return $this->dni;
    }

    public function getTarjeta(){
        return $this->tarjeta;
    }

    public function getNombre(){
        return $this->nombre;
    }

    public function getApellidos(){
        return $this->apellidos;
    }

    public function getEdad(){
        return $this->edad;
    }

    public function getContraseña(){
        return $this->contraseña;
    }

    public function getEmail(){
        return $this->email;
    }

    public function getTelefono(){
        return $this->telefono;
    }

    public function getFechaAlta(){
        return $this->fechaAlta;
    }

    public function getComentarioRevision(){
        return $this->comentarioRevision;
    }

    public function setDni($dni){
        $this->dni = $dni;
    }

    public function setNombre($nombre){
        $this->nombre = $nombre;
    }

    public function setApellidos($apellidos){
        $this->apellidos = $apeliidos;
    }

    public function setEdad($edad){
        $this->edad = $edad;
    }

    public function setContraseña($contraseña){
        $this->contraseña = $contraseña;
    }

    public function setEmail($email){
        $this->email = $email;
    }

    public function setTelefono($telefono){
        $this->telefono = $telefono;
    }

    public function setFechaAlta($fechaAlta){
        $this->fechaAlta = $fechaAlta;
    }

    public function setTarjeta($tarjeta){
        $this->tarjeta = $tarjeta;
    }

    public function setComentarioRevision($comentarioRevision){
        $this->comentarioRevision = $comentarioRevision;
    }
}//fin de clase

?>