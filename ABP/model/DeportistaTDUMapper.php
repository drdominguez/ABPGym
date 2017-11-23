<?php

require_once(__DIR__."/../core/Access_DB.php");
require_once(__DIR__."/UsuarioMapper.php");
require_once(__DIR__."/Usuario.php");
require_once(__DIR__."/Deportista.php");
require_once(__DIR__."/DeportistaMapper.php");
require_once(__DIR__."/DeportistaTDU.php");

Class DeportistaTDUMapper extends DeportistaMapper {
    public function __construct(){
        parent::__construct();//inicia el atributo protected $this->db de conexion con la BBDD
    }

    public function addTDU($tdu){
        parent::add($tdu);//llama al add de la clase padre
        $stmt = $this->db->prepare("INSERT INTO tdu(dni,tarjeta) VALUES (?,?)");
        if(parent::esSuperusuario()){//guardamos el ejercicio y añadimos el dni y el id en la tabla superusuario_ejercicio para saber que superUsuario creo ese ejercicio y luego tenga permisos sobre el
            $stmt->execute(array($tdu->getDni(),$tdu->getTarjeta()));//
            return true;
        }
        return false;
    }
    public function editTDU($usuario)
    {
        $stmt = $this->db->prepare("SELECT * FROM tdu WHERE dni =?");
        $stmt->execute(array($usuario->getDni()));
        $usuario_db = $stmt->fetch(PDO::FETCH_ASSOC);
        if($usuario_db == null){
            return false;
        }else{
            $stmt = $this->db->prepare("UPDATE tdu SET nombre=?,tarjeta=? WHERE dni=?");
            $stmt->execute(array($usuario->getNombre(), $usuario->getTarjeta()));
            return true;
        }
    }

    public function deleteTDU($dni)
    {
        if($this->esAdministrador())
        {
            $stmt = $this->db->prepare("SELECT * FROM tdu WHERE dni=?");
            $stmt-> execute(array($dni));
            $deportistaTDU_db = $stmt->fetch(PDO::FETCH_ASSOC);
            if($deportistaTDU_db != null)
            {
                $stmt = $this->db->prepare("DELETE from tdu WHERE dni=?");
                $stmt->execute(array($dni));
                $stmt = $this->db->prepare("DELETE from deportista WHERE dni=?");
                $stmt->execute(array($dni));
                return true;
            }
            return false;
        }
        return false;
    }

    public function listarTDU()
    {
        $stmt = $this->db->query("SELECT tdu.*, usuario.nombre, usuario.apellidos FROM `usuario`, `tdu` WHERE tdu.dni = usuario.dni");
        $stmt -> execute();
        $lista = $stmt->fetchAll();
        return $lista;
    }

    public function findById($dni)
    {
        $stmt = $this->db->prepare("SELECT * FROM tdu WHERE dni=?");
        $stmt->execute(array($dni));
        $deportistaTDU = $stmt->fetch(PDO::FETCH_ASSOC);
        if($deportistaTDU != null)
        {
            return new DeportistaTDU($deportistaTDU["dni"],$deportistaTDU["tarjeta"]);
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