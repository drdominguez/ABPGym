<?php 

require_once(__DIR__."/../core/Access_DB.php");
require_once(__DIR__."/ActividadMapper.php");
require_once(__DIR__."/Actividad.php");
require_once(__DIR__."/ActividadIndividual.php");


Class ActividadIndividualMapper extends ActividadMapper{
	protected $db;
	protected $idActividad;
	protected $idHorario;
	public function __construct(){
		parent::__construct();//inicia el atributo protected $this->db de conexion con la BBDD
	}
	public function addIndividual($actividad){
		parent::add($actividad);//llama al add de la clase padre
		$this->idActividad = $this->db->lastInsertId();
 		if(parent::esAdministrador()){
			$stmt = $this->db->prepare("INSERT INTO individual(idActividad) VALUES (?)");
			$stmt -> execute(array($this->idActividad));	
			$stmt1 = $this->db->prepare("INSERT INTO horario(dia,hora,fechIni,fechFin) values (?,?,?,?)");
            $stmt1 -> execute(array($actividad->getHorario()->getDia(),$actividad->getHorario()->getHora(),$actividad->getHorario()->getFechaInicio(),$actividad->getHorario()->getFechaFin()));
            $this->idHorario = $this->db->lastInsertId();
            $stmt2 =$this->db->prepare("INSERT INTO actividad_horario(idHorario) VALUES (?)");
            $stmt2 -> execute(array($this->idHorario));
			return true;
		}
		return false;
	}
	function editActividad($actividad){
        	return parent::edit($actividad);
    }
	public function deleteIndividual($idActividad){
		parent::delete($actividad);//Borro haciendo en cascada aunque es mejor un borrado lógico
	}
}
?>