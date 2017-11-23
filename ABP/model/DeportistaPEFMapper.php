<?php

require_once(__DIR__."/../core/Access_DB.php");
require_once(__DIR__."/UsuarioMapper.php");
require_once(__DIR__."/Usuario.php");
require_once(__DIR__."/Deportista.php");
require_once(__DIR__."/DeportistaMapper.php");
require_once(__DIR__."/DeportistaPEF.php");

Class DeportistaPEFMapper extends DeportistaMapper {
    public function __construct(){
        parent::__construct();//inicia el atributo protected $this->db de conexion con la BBDD
    }

    public function addPEF($pef){
        parent::add($pef);//llama al add de la clase padre
        $stmt = $this->db->prepare("INSERT INTO pef(dni,tarjeta,comentarioRevision) VALUES (?,?,?)");
        if(parent::esSuperusuario()){//guardamos el ejercicio y añadimos el dni y el id en la tabla superusuario_ejercicio para saber que superUsuario creo ese ejercicio y luego tenga permisos sobre el
            $stmt->execute(array($pef->getDni(),$pef->getTarjeta(),$pef->getComentario()));//
            return true;
        }
        return false;
    }

    function editPEF($usuario)
    {
        $stmt = $this->db->prepare("SELECT * FROM pef WHERE dni =?");
        $stmt->execute(array($usuario->getDni()));
        $usuario_db = $stmt->fetch(PDO::FETCH_ASSOC);
        if($usuario_db == null){
            return false;
        }else{
            $stmt = $this->db->prepare("UPDATE pef SET nombre=?,tarjeta=?,comentarioRivision=? WHERE dni=?");
            $stmt->execute(array($usuario->getNombre(), $usuario->getTarjeta(),$usuario->getComentario()));
            return true;
        }
    }

    public function deletePEF($dni)
    {
        if($this->esAdministrador())
        {
            $stmt = $this->db->prepare("SELECT * FROM pef WHERE dni=?");
            $stmt-> execute(array($dni));
            $deportistaPEF_db = $stmt->fetch(PDO::FETCH_ASSOC);
            if($deportistaPEF_db != null)
            {
                $stmt = $this->db->prepare("DELETE from pef WHERE dni=?");
                $stmt->execute(array($dni));
                $stmt = $this->db->prepare("DELETE from deportista WHERE dni=?");
                $stmt->execute(array($dni));
                return true;
            }
            return false;
        }
        return false;
    }

    public function listarPEF()
    {
        $stmt = $this->db->query("SELECT pef.*, usuario.nombre, usuario.apellidos FROM `usuario`, `pef` WHERE pef.dni = usuario.dni");
        $stmt -> execute();
        $lista = $stmt->fetchAll();
        return $lista;
    }

    public function findById($dni)
    {
        $stmt = $this->db->prepare("SELECT * FROM pef WHERE dni=?");
        $stmt->execute(array($dni));
        $deportistaPEF = $stmt->fetch(PDO::FETCH_ASSOC);
        if($deportistaPEF != null)
        {
            return new DeportistaPEF($deportistaPEF["dni"],$deportistaPEF["tarjeta"],$deportistaPEF["comentarioRivision"]);
        }else
        {
            return NULL;
        }
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

}
?>