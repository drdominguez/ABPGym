<?php

require_once(__DIR__."/../core/Access_DB.php");
require_once(__DIR__."/UsuarioMapper.php");
require_once(__DIR__."/Usuario.php");
require_once(__DIR__."/SuperUsuario.php");

Class SuperUsuarioMapper extends UsuarioMapper{
    public function __construct(){
        parent::__construct();//inicia el atributo protected $this->db de conexion con la BBDD
    }

    public function addDeportista($deportista){
        parent::add($deportista);//llama al add de la clase padre
        $stmt = $this->db->prepare("INSERT INTO deportista(dni) VALUES (?)");
        if(parent::esSuperusuario()){//guardamos el ejercicio y añadimos el dni y el id en la tabla superusuario_ejercicio para saber que superUsuario creo ese ejercicio y luego tenga permisos sobre el
            $stmt=execute(array($this->dni,$deportista->getDni()));//
            return true;
        }
        return false;
    }
    public function editDeportista($deportista){
        parent::edit($deportista);//se mactualizan los cambios en la tabla ejercicio por si cambiara alguno
        $stmt=$this->db-> prepare("UPDATE deportista SET dni=? WHERE dni=?");
        if(parent::permisoDeportista($deportista->getDni())){
            $stmt=execute(array($deportista->getDni()));
            return true;
        }
        return false;
    }
    public function removeDeportista($dni){
        $stmt = $this->db->prepare("DELETE FROM deportista WHERE dni = ?");
        if(parent::permisosEjercicio($dni)){
            $stmt= execute(array($dni));
            parent::remove($dni);
            return true;
        }
        return false;
    }

    protected function permisosDeportista($dni){
        /*Comprobar si el susuario es un administrador*/
        $stmt = $this->db->prepare("SELECT dni FROM administrador WHERE dniAdministrador=?");
        $stmt->execute(array($_SESSION["currentuser"]));
        if ($stmt->fetchColumn() > 0) {
            return true;
        }else{//comprobar si ha creado el usuario actual ese ejercicio si no no tiene permisos sobre el
            $stmt = $this->db->prepare("SELECT * FROM superusuario_deportista WHERE dniSuperUsuario=? AND $dni=?");
            $stmt->execute(array($_SESSION["currentuser"], $dni));
            if ($stmt->fetchColumn() > 0) {
                return true;
            }
        }
        return false;
    }
    public function esSuperusuario(){
        $stmt= $this->db->prepare("SELECT dniSuperUsuario FROM superusuario WHERE dniSuperUsuario=?");
        $stmt= execute(array($_SESSION["currentuser"]));
        if ($stmt->fetchColumn()>0){
            return true;
        }
        return false;
    }
}
?>