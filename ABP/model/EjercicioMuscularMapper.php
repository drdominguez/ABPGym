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
		return $ejercicioMuscular;
	}

	/*
	*Añade un ejercicio muscular
	*/
	public function addMuscular($ejercicio){
		if(parent::esSuperusuario() && parent::add($ejercicio)){//guardamos el ejercicio y añadimos el dni y el id en la tabla superusuario_ejercicio para saber que superUsuario creo ese ejercicio y luego tenga permisos sobre el
			$stmt = $this->db->prepare("INSERT INTO muscular(idEjercicio) VALUES (?)");
			$stmt -> execute(array($this->idEjercicio));//
			return $this->idEjercicio;
		}
		return false;
	}

	/*
	*Edita un ejercicio muscular en la base de datos
	*/
	public function editMuscular($ejercicio){
		if(parent::edit($ejercicio)){
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
		if(parent::esSuperusuario()){//todos los estiramientos del sistema
			$stmt = $this->db->prepare("SELECT ejercicio.* FROM ejercicio, muscular WHERE ejercicio.idEjercicio = muscular.idEjercicio");
			$stmt -> execute();
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