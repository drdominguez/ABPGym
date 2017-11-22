<?php

require_once(__DIR__."/../core/Access_DB.php");
require_once(__DIR__."/SesionEntrenamientoMapper.php");
require_once(__DIR__."/SesionEntrenamiento.php");

Class SesionEntrenamientoMapper{
	public function __construct(){
		$this->db=PDOConnection::getInstance();//obtiene la instancia de la conexion con base de datos
	}


	/*
	*comprueba si el usuario actual es administrador
	*/
	private function esAdmin(){
		$stmt = $this->db->prepare("SELECT dniAdministrador FROM administrador WHERE dniAdministrador=?");
		$stmt->execute(array($_SESSION["currentuser"]));
		if ($stmt->fetchColumn() > 0) {
           	 return true;
		}
		return false;
	}

	/*
	*Comprueba si el usuario actural es un entrenador o administrador
	*/
	private function esSuperusuario(){
		$stmt= $this->db->prepare("SELECT dniSuperUsuario FROM superusuario WHERE dniSuperUsuario=?");
		$stmt-> execute(array($_SESSION["currentuser"]));
		if ($stmt->fetchColumn()>0){
			return true;
		}
		return false;
	}

	/*
	*Comprueba si el usuario actual es un entrenador
	*/
	private function esEntrenador(){
		$stmt = $this->db->prepare("SELECT dniEntrenador FROM entrenador WHERE dniEntrenador=?");
		$stmt->execute(array($_SESSION["currentuser"]));
		if ($stmt->fetchColumn() > 0) {
           	 return true;
		}
		return false;
	}
}
?>