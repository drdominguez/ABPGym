<?php 

require_once(__DIR__."/../core/Access_DB.php");
require_once(__DIR__."/EjercicioMapper.php");
require_once(__DIR__."/Ejercicio.php");
require_once(__DIR__."/EjercicioMuscular.php");

Class EjercicioMuscularMapper extends EjercicioMapper{
	public function __construct(){
		parent::__construct();//inicia el atributo protected $this->db de conexion con la BBDD
	}
	public function addMuscular($ejercicio){
		parent::add($ejercicio);//llama al add de la clase padre
		$stmt = $this->db->prepare("INSERT INTO muscular(idEjercicio, carga, repeticiones) VALUES (?,?,?)");
		if(parent::esSuperusuario()){//guardamos el ejercicio y añadimos el dni y el id en la tabla superusuario_ejercicio para saber que superUsuario creo ese ejercicio y luego tenga permisos sobre el
			$stmt=execute(array($this->idEjercicio,$ejercicio->getCarga(),$ejercicio->getRepeticiones()));//
			return true;
		}
		return false;
	}
	public function editMuscular($ejercicio){
		parent::edit($ejecicio);//se mactualizan los cambios en la tabla ejercicio por si cambiara alguno
		$stmt=$this->db-> prepare("UPDATE muscular SET carga=?, repeticiones=? WHERE idEjercicio=?");
		if(parent::permisoEjercicio($ejercicio->getId())){
			$stmt=execute(array($ejercicio->getCarga(),$ejercicio->geRepeticiones()));
			return true;
		}
		return false;
	}
	public function removeMuscular($idEjercicio){
		$stmt = $this->db->prepare("DELETE FROM muscular WHERE idEjercicio = ?");
		if(parent::permisosEjercicio($idEjercicio)){
			$stmt= execute(array($idEjercicio));
			parent::remove($idEjercicio);
			return true;
		}
		return false;
	}
}
?>