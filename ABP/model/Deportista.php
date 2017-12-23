<?php

require_once(__DIR__."/UsuarioMapper.php");
require_once(__DIR__."/Usuario.php");

class Deportista extends Usuario
{
    //Definimos las variables
    private $dni;

    function __construct($dni=NULL, $nombre=NULL, $apellidos=NULL, $edad=NULL, $contraseña=NULL, $email=NULL, $telefono=NULL, $fechaAlta=NULL)
    {
        parent::__construct($dni, $nombre, $apellidos, $edad, $contraseña, $email, $telefono, $fechaAlta);//lamada al contructor padre
        $this->dni = $dni;
    }

    public function getDni(){
        return $this->dni;
    }

   public function setDni($dni){
        $this->dni = $dni;
    }
}//fin de clase

?>