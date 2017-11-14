<?php 
require_once(__DIR__."/../core/Access_DB.php");
require_once(__DIR__."/EjercicioMapper.php");
Class EjercicioCardioMapper extends EjercicioMapper{
	public function __construct(){
		parent::__construct();//inicia el atributo protected $this->db de conexion con la BBDD
	}
	public function addCardio($ejercicio){
		parent::add($ejercicio);//llama al add de la clase padre
		$stmt = $this->db->prepare("INSERT INTO cardio(idEjercicio,tiempo,unidad,distancia ) VALUES (?,?,?,?)");
		if(parent::esSuperusuario()){//guardamos el ejercicio y añadimos el dni y el id en la tabla superusuario_ejercicio
			$stmt=execute(array($this->idEjercicio,$ejercicio->getTiempo(),$ejercicio->getUnidad(),$ejercicio->getDistancia()));//
			return true;
		}
		return false;
	}
	public function editCardio($ejercicio){
		parent::edit($ejecicio);//se mactualizan los cambios en la tabla ejercicio por si cambiara alguno
		$stmt=$this->db-> prepare("UPDATE cardio SET tiempo=?, unidad=?, distancia=? WHERE idEjercicio=?");
		if(parent::permisoEjercicio($ejercicio->getId())){
			$stmt=execute(array($ejercicio->getTiempo(),$ejercicio->getUnidad(),$ejercicio->getDistancia(),$ejercicio->getId()));
			return true;
		}
		return false;
	}
	public function remove($idEjercicio){
		$stmt = $this->db->prepare("DELETE FROM cardio WHERE idEjercicio = ?");
		if(permisosEjercicio($idEjercicio)){
			$stmt= execute(array($idEjercicio));
			parent::remove($idEjercicio);
			return true;
		}
		return false;
	}
}
?>
