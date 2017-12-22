<?php 

require_once(__DIR__."/../core/Access_DB.php");
require_once(__DIR__."/Ejercicio.php");

Class EjercicioMapper{
	protected $db;
	protected $idEjercicio;

	public function __construct(){
		$this->db=PDOConnection::getInstance();
	}

	/*
	*Obtiene un ejercicio de tipo cardio buscado por id
	*Todos los ususarios pueden obtener un ejercicio por id por eso no se comprueban permisos
	*Esta pensado para obtener el ejercicio a partir de su lista de una tabla se supone que el ejercicio existe
	*/
	public function getEjercicioById($idEjercicio){
		$stmt = $this->db->prepare("SELECT * FROM ejercicio WHERE idEjercicio=?");
		$stmt->execute(array($idEjercicio));
		$ejercicio = $stmt->fetch(PDO::FETCH_ASSOC);
		return new Ejercicio($ejercicio["idEjercicio"],$ejercicio["nombre"],$ejercicio["descripcion"],$ejercicio["video"],$ejercicio["imagen"]);
	}
	
	/*
	*Añade un ejercicio si eres un superusuario
	*/
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

	public function addImagen($idEjercicio,$ruta){
		if(self::esSuperusuario()){//guardamos el ejercicio y añadimos el dni y el id en la tabla superusuario_ejercicio
			$stmt=$this->db-> prepare("UPDATE ejercicio SET  imagen=? WHERE idEjercicio=?");
			$stmt->execute(array($ruta,$idEjercicio));
			return true;

		}
		return false;

	}

	public function edit($ejercicio){
		if(self::esSuperusuario()){
			$stmt=$this->db-> prepare("UPDATE ejercicio SET nombre=?, descripcion=?, video=?, imagen=? WHERE idEjercicio=?");
			$stmt->execute(array($ejercicio->getNombre(),$ejercicio->getDescripcion(),$ejercicio->getvideo(),$ejercicio->getImagen(),$ejercicio->getIdEjercicio()));
			return true;
		}
		return false;
	}

	public function remove($idEjercicio){
		if(self::esSuperusuario()){
			$stmt = $this->db->prepare("DELETE FROM ejercicio WHERE idEjercicio = ?");
			$stmt-> execute(array($idEjercicio));
			return true;
		}
		return false;
	}

	/*
	*comprueba si el usuario actual es administrador
	*/
	protected function esAdmin(){
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
	protected function esSuperusuario(){
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
	protected function esEntrenador(){
		$stmt = $this->db->prepare("SELECT dniEntrenador FROM entrenador WHERE dniEntrenador=?");
		$stmt->execute(array($_SESSION["currentuser"]));
		if ($stmt->fetchColumn() > 0) {
           	 return true;
		}
		return false;
	}

}
?>
