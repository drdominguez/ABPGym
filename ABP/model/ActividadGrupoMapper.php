<?php 

require_once(__DIR__."/../core/Access_DB.php");
require_once(__DIR__."/ActividadMapper.php");
require_once(__DIR__."/Actividad.php");
require_once(__DIR__."/ActividadGrupo.php");

Class ActividadGrupoMapper extends ActividadMapper{
	protected $db;
	protected $idActividad;
	
	public function __construct(){
		parent::__construct();//inicia el atributo protected $this->db de conexion con la BBDD
	}
	public function addGrupo($actividad,$actividadEntrenador){
		
		parent::add($actividad,$actividadEntrenador);//llama al add de la clase padre
		$idActividadEntrenador = $this->db->lastInsertId();
		$idActividad=$this->findIdActividad($idActividadEntrenador);

 		if(parent::esAdministrador()){
			$stmt = $this->db->prepare("INSERT INTO grupo(idActividad) VALUES (?)");
			$stmt -> execute(array($idActividad));
			$stmt1 = $this->db->prepare("INSERT INTO horario(dia,hora,fechIni,fechFin) values (?,?,?,?)");
            $stmt1 -> execute(array($actividad->getHorario()->getDia(),$actividad->getHorario()->getHora(),$actividad->getHorario()->getFechaInicio(),$actividad->getHorario()->getFechaFin()));
            $this->idHorario = $this->db->lastInsertId();
            $stmt2 =$this->db->prepare("INSERT INTO actividad_horario(idActividad,idHorario) VALUES (?,?)");
            $stmt2 -> execute(array($idActividad,$this->idHorario));

			return true;
		}
		return false;
	}
	/*function editGrupo($actividad,$idActividad){
        	return parent::edit($actividad,$idActividad);
        	if(parent::esAdministrador()){
            	$stmt = $this->db->prepare("UPDATE grupo SET plazas=? WHERE idActividad=?");
        		$stmt -> execute(array($actividad->getPlazas(),$actividad->getIdActividad()));
        		return true;
        	}
        	return false;
    }*/
	public function deleteGrupo($idActividad){
		parent::delete($actividad);//Borro haciendo en cascada aunque es mejor un borrado lógico
	}
	public function findIdActividad($idActividadEntrenador){
        $stmt = $this->db->prepare("SELECT idActividad from actividad_entrenador WHERE id=?;");
        $stmt -> execute(array($idActividadEntrenador));
        $actividadentrenador = $stmt->fetch(PDO::FETCH_ASSOC);

        return $actividadentrenador['idActividad'];

    }
}
?>