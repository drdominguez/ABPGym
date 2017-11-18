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
	public function addGrupo($actividad){
		parent::add($actividad);//llama al add de la clase padre
		$this->idActividad = db2_last_insert_id($this->db);
 		if(parent::esAdministrador()){
			$stmt = $this->db->prepare("INSERT INTO grupo(idActividad,instalaciones,plazas) VALUES (?,?,?)");
			$stmt=execute(array($this->idActividad));
			return true;
		}
		return false;
	}
	function editGrupo($actividad){
        	return parent::edit($actividad);
        	if(parent::esAdministrador()){
        		$stmt = $this->db->prepare("UPDATE grupo SET instalaciones,plazas WHERE idActividad=? ");
        		$stmt->execute(array($actividad->getInstalaciones(),$actividad->getPlazas(),$actividad->getIdActividad()));
        		return true;
        	}
        	return false;
    }
	public function deleteGrupo($idActividad){
		parent::delete($actividad);//Borro haciendo en cascada aunque es mejor un borrado lógico
	}
}
?>