<?php 

require_once(__DIR__."/../core/Access_DB.php");
require_once(__DIR__."/EjercicioMapper.php");
require_once(__DIR__."/Ejercicio.php");
require_once(__DIR__."/EjercicioEstiramiento.php");

Class EjercicioEstiramientoMapper extends EjercicioMapper{
	public function __construct(){
		parent::__construct();//inicia el atributo protected $this->db de conexion con la BBDD
	}
	
	public function addEstiramiento($ejercicio){
		parent::add($ejercicio);//llama al add de la clase padre
		$stmt = $this->db->prepare("INSERT INTO estiramiento(idEjercicio,tiempo,unidad) VALUES (?,?,?)");
		if(parent::esSuperusuario()){//guardamos el ejercicio y añadimos el dni y el id en la tabla superusuario_ejercicio para saber que superUsuario creo ese ejercicio y luego tenga permisos sobre el
			$stmt->execute(array($this->idEjercicio,$ejercicio->getTiempo(),$ejercicio->getUnidad()));//
			return true;
		}
		return false;
	}

	public function editEstiramiento($ejercicio){
		parent::edit($ejecicio);//se mactualizan los cambios en la tabla ejercicio por si cambiara alguno
		$stmt=$this->db-> prepare("UPDATE estiramiento SET tiempo=?, unidad=? WHERE idEjercicio=?");
		if(parent::permisoEjercicio($ejercicio->getId())){
			$stmt->execute(array($ejercicio->getTiempo(),$ejercicio->getUnidad(),$ejercicio->getId()));
			return true;
		}
		return false;
	}

	public function removeEstiramiento($idEjercicio){
		$stmt = $this->db->prepare("DELETE FROM estiramiento WHERE idEjercicio = ?");
		if(parent::permisosEjercicio($idEjercicio)){
			$stmt-> execute(array($idEjercicio));
			parent::remove($idEjercicio);
			return true;
		}
		return false;
	}

	/*lista todos los estiramientos del sistema si es administrador si no todos los del usuario actual*/
	public function listarEstiramiento(){
		if(parent::esAdmin()){//todos los estiramientos del sistema
			$stmt = $this->db->prepare("SELECT ejercicio.*, estiramiento.tiempo, estiramiento.unidad FROM ejercicio, estiramiento WHERE ejercicio.idEjercicio = estiramiento.idEjercicio");
			$stmt -> execute();
			$lista = $stmt->fetchAll();
		}
		if(parent::esEntrenador()){//los ejercicios de estiramiento de un entrenador concreto
			$stmt1 = $this->db->prepare("SELECT ejercicio.*, estiramiento.tiempo, estiramiento.unidad FROM ejercicio,estiramiento,superusuario_ejercicio se WHERE se.dniSuperUsuario=$_SESSION["currentuser"] AND se.idEjercicio=estiramiento.idEjercicio AND ejercicio.idEjercicio=estiramiento.idEjercicio");
			$lista = $stmt->fetchAll();
		}
		return $lista;
	}
}
?>