<?php 

require_once(__DIR__."/../core/Access_DB.php");
require_once(__DIR__."/EjercicioMapper.php");
require_once(__DIR__."/Ejercicio.php");
require_once(__DIR__."/EjercicioCardio.php");

Class EjercicioCardioMapper extends EjercicioMapper{
	public function __construct(){
		parent::__construct();//inicia el atributo protected $this->db de conexion con la BBDD
	}

	/*
	*Obtiene un cardio a partir de un id
	*/
	public function getCardioById($cardioId){
		$ejercicio=parent::getEjercicioById($cardioId);
		//creamos el cardio añadiendole todos los atributos de Ejercicio
		$ejercicioCardio = new EjercicioCardio($ejercicio->getIdEjercicio(),$ejercicio->getNombre(),$ejercicio->getDescripcion(),$ejercicio->getVideo(),$ejercicio->getImagen(),"","","");
		$stmt = $this->db->prepare("SELECT * FROM cardio WHERE idEjercicio=?");//obtenemos el estiramiento
		$stmt->execute(array($cardioId));
		$cardio = $stmt->fetch(PDO::FETCH_ASSOC);
		$ejercicioCardio->setTiempo($cardio["tiempo"]);
		$ejercicioCardio->setUnidad($cardio["unidad"]);
		$ejercicioCardio->setDistancia($cardio["distancia"]);
		return $ejercicioCardio;
	}

	public function addCardio($ejercicio){
		parent::add($ejercicio);//llama al add de la clase padre
		$stmt = $this->db->prepare("INSERT INTO cardio(idEjercicio,tiempo,unidad,distancia ) VALUES (?,?,?,?)");
		if(parent::esSuperusuario()){//guardamos el ejercicio y añadimos el dni y el id en la tabla superusuario_ejercicio para saber que superUsuario creo ese ejercicio y luego tenga permisos sobre el
			$stmt -> execute(array($this->idEjercicio,$ejercicio->getTiempo(),$ejercicio->getUnidad(),$ejercicio->getDistancia()));//
			return true;
		}
		return false;
	}
	public function editCardio($ejercicio){
		parent::edit($ejecicio);//se mactualizan los cambios en la tabla ejercicio por si cambiara alguno
		$stmt=$this->db-> prepare("UPDATE cardio SET tiempo=?, unidad=?, distancia=? WHERE idEjercicio=?");
		if(parent::permisoEjercicio($ejercicio->getId())){
			$stmt -> execute(array($ejercicio->getTiempo(),$ejercicio->getUnidad(),$ejercicio->getDistancia(),$ejercicio->getId()));
			return true;
		}
		return false;
	}
	public function removeCardio($idEjercicio){
		if(parent::remove($idEjercicio)){
			$stmt = $this->db->prepare("DELETE FROM cardio WHERE idEjercicio = ?");
			$stmt -> execute(array($idEjercicio));
			return true;
		}
		return false;
	}

	public function listarCardio(){
		if(parent::esAdmin()){//todos los estiramientos del sistema
			$stmt = $this->db->prepare("SELECT ejercicio.*, cardio.tiempo, cardio.unidad, cardio.distancia FROM ejercicio, cardio WHERE ejercicio.idEjercicio = cardio.idEjercicio");
			$stmt -> execute();
			$lista = $stmt->fetchAll();
		}
		if(parent::esEntrenador()){//los ejercicios de cardio de un entrenador concreto
			$stmt1 = $this->db->prepare("SELECT ejercicio.*, cardio.tiempo, cardio.unidad, cardio.distancia FROM ejercicio, cardio, superusuario_ejercicio se WHERE se.dniSuperUsuario=? AND se.idEjercicio=cardio.idEjercicio AND ejercicio.idEjercicio=cardio.idEjercicio");
			$stmt -> execute(array($_SESSION["currentuser"]));
			$lista = $stmt->fetchAll();
		}
		return $lista;
	}
}
?>
