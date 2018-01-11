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
		return $ejercicioCardio;
	}

	/*
	*Añade un ejercicio cardio a la bbdd
	*Siempre y cuando se sea super Usuario
	*/
	public function addCardio($ejercicio){
		if(parent::esSuperusuario() && parent::add($ejercicio)){//guardamos el ejercicio y añadimos el dni y el id en la tabla superusuario_ejercicio para saber que superUsuario creo ese ejercicio y luego tenga permisos sobre el
			$stmt = $this->db->prepare("INSERT INTO cardio(idEjercicio) VALUES (?)");
			$stmt -> execute(array($this->idEjercicio));//
			return $this->idEjercicio;
		}
		return false;
	}

	/*
	*edita un ejercicio de tipo cardio
	*para ello lo edita en la tabla de Ejercicio y luego en la de cardio
	*/
	public function editCardio($ejercicio){
		if(parent::edit($ejercicio)){
			return true;
		}
		return false;
	}

	/*
	*Elimina une cardio
	*como existe un delete cascade con eliminarlo en la tabla padre se borra de las demas
	*/
	public function removeCardio($idEjercicio){
		if(parent::remove($idEjercicio)){
			return true;
		}
		return false;
	}

	/*
	*Lista todos los ejercicios de tipo cardio siempre y cuando se tengan permisos sobre el
	*El administrador podra listar todos los del sistema
	*El entrenador solo los que haya creado el
	*/
	public function listarCardio(){
		if(parent::esSuperusuario()){//todos los estiramientos del sistema
			$stmt = $this->db->prepare("SELECT ejercicio.* FROM ejercicio, cardio WHERE ejercicio.idEjercicio = cardio.idEjercicio");
			$stmt -> execute();
			$lista = $stmt->fetchAll();
		}
		return $lista;
	}

	public function esCardio($idEjercicio){
		$stmt=$this->db->prepare("SELECT idEjercicio FROM cardio WHERE cardio.idEjercicio=?");
		$stmt->execute(array($idEjercicio));
		if ($stmt->fetchColumn() > 0) {
           	 return true;
		}
		return false;
	}
}
?>
