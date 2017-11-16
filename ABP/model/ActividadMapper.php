<?php
require_once(__DIR__."/../core/Access_DB.php");
require_once(__DIR__."/Actividad.php");

class ActividadMapper{
    protected $db;
    /**
    *el contructor obtiene la conexion con la base de datos del core
    **/
    public function __construct() {
        $this->db = PDOConnection::getInstance();
    }
    
    //Anadir
    function add($actividad){ 
        $stmt = $this->db->prepare("INSERT INTO actividad values (?,?)");
        if(esAdministrador()){
            $stmt = execute(array($actividad->getIdActividad(), $actividad->getPrecio()));
            return true;
        }
        return false;
    }

    //Funcion borrar un elemento de la BD
    function delete($idActividad){
        $stmt = $this->db->prepare("DELETE from actividad WHERE idActividad=?");
         if(esAdministrador()){
            $stmt->execute(array($actividad->getIdActividad()));
            return true;
        }
        return false;
    }

    //Funcion editar
    function edit($actividad){
        $stmt = $this->db->prepare("UPDATE actividad SET precio=? WHERE idActividad=? ");
        if(esAdministrador()){
            $stmt->execute(array($actividad->getPrecio(),$actividad->getIdActividad()));
            return true;
        }
        return false;
    }
    protected function permisosActividad($idActividad){
        /*Comprobar si el susuario es un administrador*/
        $stmt = $this->db->prepare("SELECT dni FROM administrador WHERE dniAdministrador=?");
        $stmt->execute(array($_SESSION["currentuser"]));
        if ($stmt->fetchColumn() > 0) {
             return true;
        }else{//comprobar si ha creado el usuario actual esa actividad si no no tiene permisos sobre el
            $stmt = $this->db->prepare("SELECT * FROM superusuario_individual WHERE dniSuperUsuario=? AND idActividad=?");
            $stmt->execute(array($_SESSION["currentuser"], $idActividad));
            if ($stmt->fetchColumn() > 0) {
             return true;
            }
        }
        return false;
    }
    protected function esAdministrador(){
        $stmt= $this->db->prepare("SELECT dniAdministrador FROM administrador WHERE dniAdministrador=?");
        $stmt= execute(array($_SESSION["currentuser"]));
        if ($stmt->fetchColumn()>0){
            return true;
        }
        return false;
    }
}//fin de clase
?> 