<?php

require_once(__DIR__."/../core/Access_DB.php");
require_once(__DIR__."/UsuarioMapper.php");
require_once(__DIR__."/Usuario.php");
require_once(__DIR__."/Deportista.php");
require_once(__DIR__."/DeportistaTDU.php");
require_once(__DIR__."/DeportistaPEF.php");
require_once(__DIR__ . "/../core/permisos.php");

Class DeportistaMapper extends UsuarioMapper{

    private $permisos;

    public function __construct(){
        parent::__construct();//inicia el atributo protected $this->db de conexion con la BBDD
        $this->permisos= new Permisos();
    }

    /*ADD
    * Llama a la clase padre para añadir el usuario en la tabla usuarios
    * Añade a un deportista en la tabla deportistas
    * Es necesario der administrador para añadir deportistas
    */
    public function ADD($usuario){
        if($this->permisos->esAdministrador() && parent::usuarioADD($usuario)){
            $stmt = $this->db->prepare("INSERT INTO deportista(dni) VALUES (?)");
            $stmt->execute(array($usuario->getDni()));//
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

    public function getTDU($dni){
        $stmt = $this->db->prepare("SELECT usuario.*,tdu.tarjeta FROM usuario,tdu WHERE tdu.dni=usuario.dni AND usuario.dni=?");
        $stmt->execute(array($dni));
        $tdu=$stmt->fetchAll(PDO::FETCH_ASSOC);
        if($tdu != null){
            return $tdu[0];
        }
        return NULL;
    }

    public function getPEF($dni){
        $stmt = $this->db->prepare("SELECT usuario.*,pef.tarjeta,pef.comentarioRevision FROM usuario,pef WHERE pef.dni=usuario.dni AND usuario.dni=?");
        $stmt->execute(array($dni));
        $pef=$stmt->fetchAll(PDO::FETCH_ASSOC);
        if($tdu != null){
            return $pef[0];
        }
        return NULL;
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