<?php

require_once(__DIR__."/../core/Access_DB.php");
require_once(__DIR__."/UsuarioMapper.php");
require_once(__DIR__."/Usuario.php");
require_once(__DIR__."/Deportista.php");

Class DeportistaMapper extends UsuarioMapper{
    public function __construct(){
        parent::__construct();//inicia el atributo protected $this->db de conexion con la BBDD
    }

    public function ADD($usuario){
        parent::add($usuario);//llama al add de la clase padre
        $stmt = $this->db->prepare("INSERT INTO deportista(dni) VALUES (?)");
        if(parent::esSuperusuario()){//guardamos el ejercicio y añadimos el dni y el id en la tabla superusuario_ejercicio para saber que superUsuario creo ese ejercicio y luego tenga permisos sobre el
            $stmt->execute(array($usuario->dni));//
            return true;
        }
        return false;
    }
    public function EDIT($deportista){
        parent::edit($deportista);//se mactualizan los cambios en la tabla ejercicio por si cambiara alguno
        $stmt=$this->db-> prepare("UPDATE deportista SET dni=? WHERE dni=?");
        if(parent::permisoDeportista($deportista->getDni())){
            $stmt->execute(array($deportista->getDni()));
            return true;
        }
        return false;
    }
    function DELETE($dni)
    {
        if($this->esAdministrador())
        {
            $stmt = $this->db->prepare("SELECT * FROM deportista WHERE dni=?");
            $stmt-> execute(array($dni));
            $deportista_db = $stmt->fetch(PDO::FETCH_ASSOC);
            if($deportista_db != null)
            {
                $stmt = $this->db->prepare("DELETE from deportista WHERE dni=?");
                $stmt->execute(array($dni));
                return true;
            }
            return false;
        }
        return false;
    }

    public function listar()
    {
        $stmt = $this->db->query("SELECT deportista.*, usuario.nombre, usuario.apellidos FROM `usuario`, `deportista` WHERE deportista.dni = usuario.dni");
        $stmt -> execute();
        $lista = $stmt->fetchAll();
        return $lista;
    }

    public function findById($dni)
    {
        $stmt = $this->db->prepare("SELECT * FROM deportista WHERE dni=?");
        $stmt->execute(array($dni));
        $deportista = $stmt->fetch(PDO::FETCH_ASSOC);
        if($deportista != null)
        {
            $stmt = $this->db->query("SELECT deportista.*, usuario.nombre, usuario.apellidos FROM `usuario`, `deportista` WHERE deportista.dni = usuario.dni AND deportista.dni = '$dni'");
            $stmt -> execute();
            $lista = $stmt->fetchAll();
            return $lista;
        }else
        {
            return NULL;
        }
    }

    public function esSuperusuario(){
        $stmt= $this->db->prepare("SELECT dniSuperUsuario FROM superusuario WHERE dniSuperUsuario=?");
        $stmt-> execute(array($_SESSION["currentuser"]));
        if ($stmt->fetchColumn()>0){
            return true;
        }
        return false;
    }
}
?>