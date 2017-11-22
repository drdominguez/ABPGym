<?php

require_once(__DIR__."/UsuarioMapper.php");
require_once(__DIR__."/Usuario.php");

class SuperUsuario extends Usuario
{
    //Definimos las variables
    private $dniSuperUsuario;

    function __construct($dni=NULL, $nombre=NULL, $apellidos=NULL, $edad=NULL, $contraseña=NULL, $email=NULL, $telefono=NULL, $fechaAlta=NULL)
    {
        parent::__construct($dni, $nombre, $apellidos, $edad, $contraseña, $email, $telefono, $fechaAlta);//lamada al contructor padre
        $this->dniSuperUsuario = $dniSuperUsuario;

    }

    public function getDniSuperUsuario(){
        return $this->dniSuperUsuario;
    }

   public function setDniSuperUsuario($dniSuperUsuario){
        $this->dniSuperUsuario = $dniSuperUsuario;
    }
}//fin de clase

?>