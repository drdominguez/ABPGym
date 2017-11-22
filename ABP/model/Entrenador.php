<?php
require_once(__DIR__."/Usuario.php");
require_once(__DIR__."/SuperUsuario.php");

class Entrenador extends Usuario
{
        //Definimos las variables
        private $dniEntrenador;

        function __construct($dniEntrenador=NULL,$nombre=NULL,$apellidos=NULL,$edad=NULL,$contraseña=NULL,$email=NULL,$telefono=NULL,$fechaAlta=NULL){
            parent::__construct($dniEntrenador,$nombre,$apellidos,$edad,$contraseña,$email,$telefono,$fechaAlta);
            $this->dniEntrenador = $dniEntrenador;  
        }
        public function getDniEntrenador(){
		return $this->dniEntrenador;
	}
	public function setDniEntrenador($dniEntrenador){
		$this->dniEntrenador=$dniEntrenador;
	}
}//fin de clase
?> 
