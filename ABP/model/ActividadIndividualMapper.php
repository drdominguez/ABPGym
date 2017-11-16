<?php 

require_once(__DIR__."/../core/Access_DB.php");
require_once(__DIR__."/ActividadMapper.php");
require_once(__DIR__."/Actividad.php");


Class ActividadIndividualMapper extends ActividadMapper{
	protected $db;
	protected $idActividad;
	public function __construct(){
		parent::__construct();//inicia el atributo protected $this->db de conexion con la BBDD
	}
	public function addIndividual($actividad){
		parent::add($actividad);//llama al add de la clase padre
		$this->idActividad = db2_last_insert_id($this->db);
 		if(parent::esAdministrador()){
			$stmt = $this->db->prepare("INSERT INTO individual(idActividad) VALUES (?)");
			$stmt=execute(array($this->idActividad));
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