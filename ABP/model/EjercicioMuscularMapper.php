<?php 

require_once(__DIR__."/../core/Access_DB.php");
require_once(__DIR__."/EjercicioMapper.php");
require_once(__DIR__."/Ejercicio.php");
require_once(__DIR__."/EjercicioMuscular.php");

Class EjercicioMuscularMapper extends EjercicioMapper{
	public function __construct(){
		parent::__construct();//inicia el atributo protected $this->db de conexion con la BBDD
	}

	/*
	*Obtiene un ejercicioMuscular
	*/
	public function getMuscularById($muscularId){
		$ejercicio=parent::getEjercicioById($muscularId);
		//creamos el muscular añadiendole todos los atributos de Ejercicio
		$ejercicioMuscular = new EjercicioMuscular($ejercicio->getIdEjercicio(),$ejercicio->getNombre(),$ejercicio->getDescripcion(),$ejercicio->getVideo(),$ejercicio->getImagen(),"","");
		$stmt = $this->db->prepare("SELECT * FROM muscular WHERE idEjercicio=?");//obtenemos el estiramiento
		$stmt->execute(array($muscularId));
		$muscular = $stmt->fetch(PDO::FETCH_ASSOC);
		$ejercicioMuscular->setCarga($muscular["carga"]);
		$ejercicioMuscular->setRepeticiones($muscular["repeticiones"]);
		return $ejercicioMuscular;
	}

	/*
	*Añade un ejercicio muscular
	*/
	public function addMuscular($ejercicio){
		parent::add($ejercicio);//llama al add de la clase padre
		$stmt = $this->db->prepare("INSERT INTO muscular(idEjercicio, carga, repeticiones) VALUES (?,?,?)");
		if(parent::esSuperusuario()){//guardamos el ejercicio y añadimos el dni y el id en la tabla superusuario_ejercicio para saber que superUsuario creo ese ejercicio y luego tenga permisos sobre el
			$stmt -> execute(array($this->idEjercicio,$ejercicio->getCarga(),$ejercicio->getRepeticiones()));//
			return true;
		}
		return false;
	}

	/*
	*Edita un ejercicio muscular en la base de datos
	*/
	public function editMuscular($ejercicio){
		if(parent::edit($ejercicio)){
			$stmt=$this->db-> prepare("UPDATE muscular SET carga=?, repeticiones=? WHERE idEjercicio=?");
			$stmt -> execute(array($ejercicio->getCarga(),$ejercicio->getRepeticiones(),$ejercicio->getIdEjercicio()));
			return true;
		}
		return false;
	}

	/*
	*Borra de la base se datos un ejercicio muscular
	*/
	public function removeMuscular($idEjercicio){
		if(parent::remove($idEjercicio)){
			return true;
		}
		return false;
	}

	/*
	*Lista todos los ejercicios musculares
	*devuelve una lista con ejercicios musculares
	*/
	public function listarMuscular(){
		if(parent::esAdmin()){//todos los estiramientos del sistema
			$stmt = $this->db->prepare("SELECT ejercicio.*, muscular.carga, muscular.repeticiones FROM ejercicio, muscular WHERE ejercicio.idEjercicio = muscular.idEjercicio");
			$stmt -> execute();
			$lista = $stmt->fetchAll();
		}
		if(parent::esEntrenador()){//los ejercicios de muscular de un entrenador concreto
			$stmt1 = $this->db->prepare("SELECT ejercicio.*, muscular.carga, muscular.repeticiones FROM ejercicio, muscular, superusuario_ejercicio se WHERE se.dniSuperUsuario=? AND se.idEjercicio=muscular.idEjercicio AND ejercicio.idEjercicio=muscular.idEjercicio");
			$stmt -> execute(array($_SESSION["currentuser"]));
			$lista = $stmt->fetchAll();
		}
		return $lista;
	}

	public function esMuscular($idEjercicio){
		$stmt=$this->db->prepare("SELECT idEjercicio FROM muscular WHERE muscular.idEjercicio=?");
		$stmt->execute(array($idEjercicio));
		if ($stmt->fetchColumn() > 0) {
           	 return true;
		}
		return false;
	}
}
?>