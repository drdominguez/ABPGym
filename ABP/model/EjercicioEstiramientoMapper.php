<?php 

require_once(__DIR__."/../core/Access_DB.php");
require_once(__DIR__."/EjercicioMapper.php");
require_once(__DIR__."/Ejercicio.php");
require_once(__DIR__."/EjercicioEstiramiento.php");

Class EjercicioEstiramientoMapper extends EjercicioMapper{
	public function __construct(){
		parent::__construct();//inicia el atributo protected $this->db de conexion con la BBDD
	}

	/*
	*Obtiene un ejercicio de tipo cardio
	*como la tabla padre de cardio Ejercicio tiene mas atributos a mostrar primero lo obtenemos
	*/
	public function getEstiramientoById($estiramientoId){
		$ejercicio=parent::getEjercicioById($estiramientoId);
		//creamos el estiramiento añadiendole todos los atributos de Ejercicio
		$ejercicioEstiramiento = new EjercicioEstiramiento($ejercicio->getIdEjercicio(),$ejercicio->getNombre(),$ejercicio->getDescripcion(),$ejercicio->getVideo(),$ejercicio->getImagen(),"","");
		$stmt = $this->db->prepare("SELECT * FROM estiramiento WHERE idEjercicio=?");//obtenemos el estiramiento
		$stmt->execute(array($estiramientoId));
		$estiramiento = $stmt->fetch(PDO::FETCH_ASSOC);
		$ejercicioEstiramiento->setTiempo($estiramiento["tiempo"]);
		$ejercicioEstiramiento->setUnidad($estiramiento["unidad"]);
		return $ejercicioEstiramiento;
	}
	
	/*
	*Añade un ejercicio de tipo estiramiento si el usuario actural es superusuario
	*/
	public function addEstiramiento($ejercicio){
		parent::add($ejercicio);//llama al add de la clase padre
		$stmt = $this->db->prepare("INSERT INTO estiramiento(idEjercicio,tiempo,unidad) VALUES (?,?,?)");
		if(parent::esSuperusuario()){//guardamos el ejercicio y añadimos el dni y el id en la tabla superusuario_ejercicio para saber que superUsuario creo ese ejercicio y luego tenga permisos sobre el
			$stmt->execute(array($this->idEjercicio,$ejercicio->getTiempo(),$ejercicio->getUnidad()));//
			return true;
		}
		return false;
	}

	/*
	*Edita un estiramiento en la bbdd
	*para ello lo actualiza en la clase Ejercicio y y luego en la clase estiramiento
	*/
	public function editEstiramiento($ejercicio){
		if(parent::edit($ejercicio)){
			$stmt=$this->db-> prepare("UPDATE estiramiento SET tiempo=?, unidad=? WHERE idEjercicio=?");
			$stmt->execute(array($ejercicio->getTiempo(),$ejercicio->getUnidad(),$ejercicio->getIdEjercicio()));
			return true;
		}
		return false;
	}

	/*
	*Elimina un estiramiento
	*Con que lo borre el padre es suficiente, en la bbdd existe deleteCascade
	*en este caso simplifica mucho el trabajo
	*/
	public function removeEstiramiento($idEjercicio){
		if(parent::remove($idEjercicio)){
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
			$stmt1 = $this->db->prepare("SELECT ejercicio.*, estiramiento.tiempo, estiramiento.unidad FROM ejercicio, estiramiento, superusuario_ejercicio se WHERE se.dniSuperUsuario=? AND se.idEjercicio=estiramiento.idEjercicio AND ejercicio.idEjercicio=estiramiento.idEjercicio");
			$stmt -> execute(array($_SESSION["currentuser"]));
			$lista = $stmt->fetchAll();
		}
		return $lista;
	}

	public function esEstiramiento($idEjercicio){
		$stmt=$this->db->prepare("SELECT idEjercicio FROM estiramiento WHERE estiramiento.idEjercicio=?");
		$stmt->execute(array($idEjercicio));
		if ($stmt->fetchColumn() > 0) {
           	 return true;
		}
		return false;
	}
}
?>