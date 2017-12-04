<?php
require_once(__DIR__."/../core/Access_DB.php");
require_once(__DIR__."/Actividad.php");
require_once(__DIR__."/Recurso.php");
require_once(__DIR__."/ActividadGrupo.php");

class ActividadMapper{
    protected $db;
    /**
    *el contructor obtiene la conexion con la base de datos del core
    **/
    public function __construct() {
        $this->db = PDOConnection::getInstance();
    }
    
    //Añadir
    function add($actividad){ 
        $stmt = $this->db->prepare("INSERT INTO actividad(nombre,precio,idInstalaciones) values (?,?,?)");
        if(self::esAdministrador()){
            $stmt -> execute(array($actividad->getNombre(),$actividad->getPrecio(),$actividad->getIdInstalaciones()));
            return true;
        }
        return false;
    }

    //Funcion borrar un elemento de la BD
    function delete($idActividad){
        $stmt = $this->db->prepare("DELETE from actividad WHERE idActividad=?");
         if(self::esAdministrador()){
            $stmt -> execute(array($idActividad));
            return true;
        }
        return false;
    }
    function editGrupo($actividad,$idActividad){
       
        if(self::esAdministrador()){
            $stmt = $this->db->prepare("UPDATE actividad SET nombre=?, precio=?, idInstalaciones=? WHERE idActividad=? ");
            $stmt -> execute(array($actividad->getNombre(),$actividad->getPrecio(),$idActividad),$actividad->getIdInstalaciones());
            $stmt1 -> execute(array($actividad->getPlazas(),$idActividad));
            return true;
        }
        return false;
    }

    //Funcion editar
    function edit($actividad,$idActividad){
        
        $stmt = $this->db->prepare("UPDATE actividad SET nombre=?, precio=?, idInstalaciones=? WHERE idActividad=? ");
        if(self::esAdministrador()){
            $stmt -> execute(array($actividad->getNombre(),$actividad->getPrecio(),$actividad->getIdInstalaciones(),$idActividad));
            return true;            
        } 
                    
        return false;
    }
    public function listar(){

            $stmt = $this->db->query("SELECT * from actividad");
            $actividades_db = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $actividades = array();

            foreach ($actividades_db as $actividad) {
                array_push($actividades, new Actividad($actividad['idActividad'],$actividad['nombre'],$actividad['precio'],$actividad['idInstalaciones']));
            
            }
        return $actividades;
        
        }

    public function idRecurso($idActividad){
        $stmt = $this->db->prepare("SELECT idInstalaciones FROM actividad WHERE idActividad=?");
        $stmt->execute(array($idActividad));
        $actividad = $stmt->fetch(PDO::FETCH_ASSOC);
        if($actividad!=null){
            return $actividad['idInstalaciones'];
        }else{
        return null;
        }
    }

    public function findNomIdInstalaciones($idInstalaciones){
        $stmt = $this->db->prepare("SELECT * FROM recursos WHERE idRecurso=?");
        $stmt->execute(array($idInstalaciones));
        $actividad = $stmt->fetch(PDO::FETCH_ASSOC);
        if($actividad!=null){
            return new Recurso($actividad['idRecurso'],$actividad['nombreRecurso']);
        }else{
        return null;
        }
    }
    public function findById($idActividad)
    {
        $stmt = $this->db->prepare("SELECT * FROM actividad WHERE idActividad =?");
        $stmt->execute(array($idActividad));
        $actividad = $stmt->fetch(PDO::FETCH_ASSOC);
        if($actividad != null) 
        {

            $stmt2 = $this->db->prepare("SELECT * FROM  grupo WHERE idActividad =?");
            $stmt2->execute(array($idActividad));

            if($stmt2!=null)
            {
                $actividad2 = $stmt2->fetch(PDO::FETCH_ASSOC);
                return new ActividadGrupo($actividad["idActividad"],$actividad["nombre"],$actividad["precio"],$actividad['idInstalaciones'],$actividad2["plazas"]);
                }else 
                {

                $stmt3 = $this->db->prepare("SELECT * FROM  individual WHERE idActividad =?");
                $stmt3->execute(array($idActividad));
                if($stmt3!=null){
                    $actividad3 = $stmt3->fetch(PDO::FETCH_ASSOC);
                    return new ActividadIndividual($actividad["idActividad"],$actividad["nombre"],$actividad["precio"],$actividad['idInstalaciones']);
                }
            }
        }
        return NULL;
    }
    public function esGrupo($idActividad){
        $stmt= $this->db->prepare("SELECT A.idActividad FROM actividad A, grupo G WHERE A.idActividad=? AND G.idActividad = A.idActividad");
        
        $stmt -> execute(array($idActividad));
        if ($stmt->fetchColumn()>0){
            return true;
        }
        return false;
    }
    public function selectRecurso(){
        $stmt= $this->db->query("SELECT * FROM recursos");
        $recursos_db = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $recursos = array();
        foreach ($recursos_db as $recurso) 
        {
            array_push($recursos, new Recurso($recurso['idRecurso'],$recurso['nombreRecurso']));
        }
        return $recursos;
    }

    protected function permisosActividad($idActividad){
        /*Comprobar si el susuario es un administrador*/
        $stmt = $this->db->prepare("SELECT dni FROM administrador WHERE dniAdministrador=?");
        $stmt -> execute(array($_SESSION["currentuser"]));
        if ($stmt->fetchColumn() > 0) {
             return true;
        }else{//comprobar si ha creado el usuario actual esa actividad si no no tiene permisos sobre el
            $stmt = $this->db->prepare("SELECT * FROM superusuario_individual WHERE dniSuperUsuario=? AND idActividad=?");
            $stmt -> execute(array($_SESSION["currentuser"], $idActividad));
            if ($stmt->fetchColumn() > 0) {
             return true;
            }
        }
        return false;
    }
    protected function esAdministrador(){
        $stmt= $this->db->prepare("SELECT dniAdministrador 
        FROM administrador WHERE dniAdministrador=?");
        
        $stmt -> execute(array($_SESSION["currentuser"]));
        if ($stmt->fetchColumn()>0){
            return true;
        }
        return false;
    }
}//fin de clase
?> 