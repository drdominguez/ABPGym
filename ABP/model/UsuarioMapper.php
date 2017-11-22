<?php
require_once(__DIR__."/../core/Access_DB.php");
require_once(__DIR__."/Usuario.php");
require_once(__DIR__ . "/../core/permisos.php");


class UsuarioMapper {
    protected $db;
     private $permisos;
    /**
    *el contructor obtiene la conexion con la base de datos del core
    **/
    public function __construct() 
    {
        $this->db = PDOConnection::getInstance();
         $this->permisos= new Permisos();
    }
    /*Comprueba si existe un susario con ese dni y contraseña*/
    function login($dni,$password)
    {
        $stmt = $this->db->prepare("SELECT count(dni) FROM usuario where dni=? and contrasena=?");
        $stmt->execute(array($dni,md5($password)));//la contraseña se encripta y compara con la guardada
        if ($stmt->fetchColumn() > 0) {
            return true;
        }
        return false;
    }
    //funcion de destrucción del objeto: se ejecuta automaticamente
    //al finalizar el script
    function __destruct()
    {
    }
    //Añadir
    function ADD($usuario)
    {
        if($this->permisos->esAdministrador())
        {
        $stmt = $this->db->prepare("SELECT * FROM usuario WHERE dni=?");
        $stmt-> execute(array($usuario->getDni()));
        $usuario_db = $stmt->fetch(PDO::FETCH_ASSOC);
        if($usuario_db == null)
         {
            $stmt = $this->db->prepare("INSERT INTO usuario values (?,?,?,?,?,?,?,?)");
            $stmt-> execute(array($usuario->getDni(), $usuario->getNombre(), $usuario->getApellidos(),$usuario->getEdad(),$usuario->getPassword(),$usuario->getEmail(), $usuario->getTelefono(), $usuario->getFecha()));
            return true;
        }
        return false;
    }
        return false;
    }

    //Funcion borrar un elemento de la BD
    function DELETE($dni)
    { 
        if($this->permisos->esAdministrador())
        {
        $stmt = $this->db->prepare("SELECT * FROM usuario WHERE dni=?");
        $stmt-> execute(array($dni));
        $usuario_db = $stmt->fetch(PDO::FETCH_ASSOC);
        if($usuario_db != null)
         {
        $stmt = $this->db->prepare("DELETE from usuario WHERE dni=?");
        $stmt->execute(array($dni));
        return true;
    }
    return false;
    }
    return false;
    }



       public function listar()
    {
        $stmt = $this->db->query("SELECT * from usuario");
        $usuarios_db = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $usuarios = array();
        foreach ($usuarios_db as $usuario) 
        {
            array_push($usuarios, new Usuario($usuario['dni'],$usuario['nombre'],$usuario['apellidos'],$usuario['edad'],null,$usuario['email'],$usuario['telefono'],$usuario['fechaAlta']));
        }
        return $usuarios;
    }



      public function findById($dni)
    {
        $stmt = $this->db->prepare("SELECT * FROM usuario WHERE dni=?");
        $stmt->execute(array($dni));
        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
        if($usuario != null)
         {
            return new Usuario($usuario["dni"],$usuario["nombre"],$usuario["apellidos"],$usuario["edad"],null,$usuario["email"],$usuario["telefono"],$usuario["fechaAlta"]);
        }else 
        {
            return NULL;
        }
    }


    //Funcion editar
    function EDIT($usuario)
    {
         $stmt = $this->db->prepare("SELECT * FROM usuario WHERE dni =?");
            $stmt->execute(array($usuario->getDni()));
            $usuario_db = $stmt->fetch(PDO::FETCH_ASSOC);
            if($usuario_db == null){
                return false;
            }else{
                $stmt = $this->db->prepare("UPDATE usuario SET nombre=?,apellidos=?,edad=?,email=?,telefono=?,fechaAlta=? WHERE dni=?");
                $stmt->execute(array($usuario->getNombre(), $usuario->getApellidos(),$usuario->getEdad(),
                        $usuario->getEmail(), $usuario->getTelefono(), $usuario->getFecha(),$usuario->getDni()));
                return true;
            }
    }



}
?>
