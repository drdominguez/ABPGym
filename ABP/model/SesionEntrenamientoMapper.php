<?php

require_once(__DIR__."/../core/Access_DB.php");
require_once(__DIR__."/SesionEntrenamientoMapper.php");
require_once(__DIR__."/SesionEntrenamiento.php");
require_once(__DIR__ . "/../core/permisos.php");

Class SesionEntrenamientoMapper{
	private $permisos;

	public function __construct(){
		$this->db=PDOConnection::getInstance();//obtiene la instancia de la conexion con base de datos
		$this->permisos= new Permisos();
	}

	/*sesionAdd
	* Guarda una sesion de entrenamiento
	*/
	public function sesionAdd($sesion,$idTabla){
		if(self::esDeportista()){
			$stmt = $this->db->prepare("INSERT INTO sesionentrenamiento(comentario,duracion,fecha,dniDeportista) VALUES(?,?,?,?)");
			$stmt->execute(array($sesion->getComentario(),$sesion->getDuracion(),$sesion->getFecha(),$sesion->getDniDeportista()));
			$idSesion = $this->db->lastInsertId();//devuelve el ultimo id insertado
			$stmt=$this->db->prepare("INSERT INTO sesionentrenamiento_tabla values(?,?)");
			$stmt->execute(array($idSesion,$idTabla));
		}
	}

	public function contarSesiones(){
		if($this->permisos->esAdministrador()){
			$stmt = $this->db->query("SELECT COUNT(*) FROM sesionentrenamiento");
		}else{
			if($this->permisos->esDeportista()){
				$stmt = $this->db->prepare("SELECT COUNT(*) FROM sesionentrenamiento WHERE dniDeportista=?");
				$stmt->execute(array($_SESSION['currentuser']));

			}else{
				return false;
			}
		}
		 $sesiones_bd = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $sesiones = array();
        foreach ($sesiones_bd as $sesion) 
        {
            array_push($sesiones, $sesion['COUNT(*)']);
        }
        return $sesiones;
	}
	/*
	*comprueba si el usuario actual es administrador
	*/
	private function esAdmin(){
		$stmt = $this->db->prepare("SELECT dniAdministrador FROM administrador WHERE dniAdministrador=?");
		$stmt->execute(array($_SESSION["currentuser"]));
		if ($stmt->fetchColumn() > 0) {
           	 return true;
		}
		return false;
	}

	/*
	*Comprueba si el usuario actural es un entrenador o administrador
	*/
	private function esSuperusuario(){
		$stmt= $this->db->prepare("SELECT dniSuperUsuario FROM superusuario WHERE dniSuperUsuario=?");
		$stmt-> execute(array($_SESSION["currentuser"]));
		if ($stmt->fetchColumn()>0){
			return true;
		}
		return false;
	}

	/*
	*Comprueba si el usuario actual es un entrenador
	*/
	private function esDeportista(){
		$stmt = $this->db->prepare("SELECT dni  FROM deportista WHERE dni=?");
		$stmt->execute(array($_SESSION["currentuser"]));
		if ($stmt->fetchColumn() > 0) {
           	 return true;
		}
		return false;
	}
}
?>