<?php 

require_once(__DIR__."/../core/Access_DB.php");
require_once(__DIR__."/Ejercicio.php");

Class EjercicioMapper{
	protected $db;
	protected $idEjercicio;

	public function __construct(){
		$this->db=PDOConnection::getInstance();
	}
	
	public function add($ejercicio){
		if(self::esSuperusuario()){//guardamos el ejercicio y añadimos el dni y el id en la tabla superusuario_ejercicio
			$stmt = $this->db->prepare("INSERT INTO ejercicio(nombre,descripcion,video,imagen) VALUES (?,?,?,?)");
			$stmt->execute(array($ejercicio->getNombre(),$ejercicio->getDescripcion(),$ejercicio->getvideo(),$ejercicio->getImagen()));
			$this->idEjercicio = $this->db->lastInsertId();//devuelve el ultimo id insertado
			$stmt = $this->db->prepare("INSERT INTO superusuario_ejercicio(dniSuperUsuario,idEjercicio) VALUES (?,?)");
			$stmt -> execute(array($_SESSION["currentuser"],$this->idEjercicio));
			return true;
		}
		return false;
	}
	public function edit($ejercicio){
		$stmt=$this->db-> prepare("UPDATE ejercicio SET nombre=?, descripcion=?, video=?, imagen=? WHERE idEjercicio=?");
		if(permisoEjercicio($ejercicio->getId())){
			$stmt->execute(array($ejercicio->getNombre(),$ejercicio->getDescripcion(),$ejercicio->getvideo(),$ejercicio->getImagen(),$ejercicio->getId()));
			return true;
		}
		return false;
	}
	public function remove($idEjercicio){
		$stmt = $this->db->prepare("DELETE FROM ejercicio WHERE idEjercicio = ?");
		if(permisosEjercicio($idEjercicio)){
			$stmt-> execute(array($idEjercicio));
			return true;
		}
		return false;
	}
	protected function permisosEjercicio($idEjercicio){
		/*Comprobar si el susuario es un administrador*/
		$stmt = $this->db->prepare("SELECT dni FROM administrador WHERE dniAdministrador=?");
		$stmt->execute(array($_SESSION["currentuser"]));
		if ($stmt->fetchColumn() > 0) {
           	 return true;
		}else{//comprobar si ha creado el usuario actual ese ejercicio si no no tiene permisos sobre el
			$stmt = $this->db->prepare("SELECT * FROM superusuario_ejercicio WHERE dniSuperUsuario=? AND idEjercicio=?");
			$stmt->execute(array($_SESSION["currentuser"], $idEjercicio));
			if ($stmt->fetchColumn() > 0) {
           	 return true;
        	}
		}
		return false;
	}

	protected function esSuperusuario(){
		$stmt= $this->db->prepare("SELECT dniSuperUsuario FROM superusuario WHERE dniSuperUsuario=?");
		$stmt-> execute(array($_SESSION["currentuser"]));
		if ($stmt->fetchColumn()>0){
			return true;
		}
		return false;
	}
}
?>
