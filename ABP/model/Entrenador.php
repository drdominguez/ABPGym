<?php
require_once(__DIR__."/Usuario.php");
require_once(__DIR__."/SuperUsuario.php");

class Entrenador extends Usuario
{
        //Definimos las variables
        private $dniEntrenador;

        function __construct($dniEntrenador=NULLL,$nombre=NULL,$apellidos=NUL,$edad=NUL,$contraseña=NUL,$email=NUL,$telefono=NUL,$fechaAlta=NUL){
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
