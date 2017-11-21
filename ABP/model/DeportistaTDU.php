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

    function __construct($dni=NULL, $nombre=NULL, $apellidos=NUKL, $edad=NULL, $contraseña=NULL,
                         $email=NULL, $telefono=NULL, $fechaAlta=NULL, $tarjeta=NULL)
    {
        parent::__construct($dni, $nombre, $apellidos, $edad, $contraseña, $email, $telefono, $fechaAlta);//llamada al contructor padre
        $this->dni = $dni;
        $this->tarjeta = $tarjeta;

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
}//fin de clase

?>