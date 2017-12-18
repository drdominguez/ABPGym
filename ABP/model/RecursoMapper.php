<?php
require_once(__DIR__."/../core/Access_DB.php");
require_once(__DIR__."/Recurso.php");

class RecursoMapper{
    protected $db;
    /**
    *el contructor obtiene la conexion con la base de datos del core
    **/
    public function __construct() {
        $this->db = PDOConnection::getInstance();
    }
    
    //Añadir
    function add($recurso){ 
        $stmt = $this->db->prepare("INSERT INTO recursos(nombreRecurso,observaciones) values (?,?)");
        if(self::esAdministrador()){
            $stmt->execute(array($recurso->getNombreRecurso(),$recurso->getObservaciones()));
            return true;
        }
        return false;
    }

    //Funcion borrar un elemento de la BD
    function delete($idRecurso){
        $stmt = $this->db->prepare("DELETE from recursos WHERE idRecurso=?");
         if(self::esAdministrador()){
            $stmt -> execute(array($idRecurso));
            return true;
        }
        return false;
    }
    function edit($recurso,$idRecurso){
       
        if(self::esAdministrador()){
            $stmt = $this->db->prepare("UPDATE recursos SET nombreRecurso=?,observaciones=? WHERE idRecurso=? ");
            $stmt->execute(array($recurso->getNombreRecurso(),$recurso->getObservaciones(),$idRecurso));
            return true;
        }
        return false;
    }

    public function listar(){

            $stmt = $this->db->query("SELECT * from recursos");
            $recursos_db = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $recursos = array();

            foreach ($recursos_db as $recurso) {
                array_push($recursos, new Recurso($recurso['idRecurso'],$recurso['nombreRecurso'],$recurso['observaciones']));            
            }
        return $recursos;
        
        }


    public function findById($idRecurso)
    {
        $stmt = $this->db->prepare("SELECT * FROM recursos WHERE idRecurso =?");
        $stmt->execute(array($idRecurso));
        $recurso = $stmt->fetch(PDO::FETCH_ASSOC);
        if($recurso != null) 
            {
            return new Recurso($idRecurso,$recurso['nombreRecurso'],$recurso['observaciones']);
        }
        return NULL;
    }
    
    public function selectRecurso(){
        $stmt= $this->db->query("SELECT * FROM recursos");
        $recursos_db = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $recursos = array();
        foreach ($recursos_db as $recurso) 
        {
            array_push($recursos, new Recurso($recurso['idRecurso'],$recurso['nombreRecurso'],$recurso['observaciones']));
        }
        return $recursos;
    }

    protected function permisosRecurso($idRecurso){
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