<?php

require_once(__DIR__."/../core/Access_DB.php");

Class Permisos {

    
     protected $db;


     public function __construct()
    {
        $this->db=PDOConnection::getInstance();
    }
    

    public function esAdministrador()
    {
        $stmt= $this->db->prepare("SELECT dniAdministrador FROM administrador WHERE dniAdministrador=?");
        $stmt->execute(array($_SESSION["currentuser"]));
        if ($stmt->fetchColumn()>0)
        {
            return true;
        }
        return false;
    }



    public function esSuperusuario()
    {
        $stmt= $this->db->prepare("SELECT dniSuperUsuario FROM superusuario WHERE dniSuperUsuario=?");
        $stmt-> execute(array($_SESSION["currentuser"]));
        if ($stmt->fetchColumn()>0)
        {
            return true;
        }
        return false;
    }


    public function esEntrenador(){
        $stmt = $this->db->prepare("SELECT dniEntrenador FROM entrenador WHERE dniEntrenador=?");
        $stmt->execute(array($_SESSION["currentuser"]));
        if ($stmt->fetchColumn() > 0) {
             return true;
        }
        return false;
    }


        public function esDeportista(){
        $stmt = $this->db->prepare("SELECT dni FROM deportista WHERE dni=?");
        $stmt->execute(array($_SESSION["currentuser"]));
        if ($stmt->fetchColumn() > 0) {
             return true;
        }
        return false;
    }

        public function esDeportista2($dni){
        $stmt = $this->db->prepare("SELECT dni FROM deportista WHERE dni=?");
        $stmt->execute(array($dni));
        if ($stmt->fetchColumn() > 0) {
             return true;
        }
        return false;
    }

}

    ?>