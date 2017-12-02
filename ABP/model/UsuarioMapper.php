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

    /*login
    *@dni el dni el usuario que intenta logearse
    *@password su contraseña
    * si es correcto devuelve true
    */
    function login($dni,$password)
    {
        $stmt = $this->db->prepare("SELECT count(dni) FROM usuario where dni=? and contrasena=?");
        $stmt->execute(array($dni,md5($password)));//la contraseña se encripta y compara con la guardada
        if ($stmt->fetchColumn() > 0) {
            return true;
        }
        return false;
    }

    /*administradorADD
    *@usuario el usuario a añadir
    * permite añadir a un administrador a la bbdd
    * es necesario tener permiso para añadirlo y que esxista el dni
    */
    public function administradorADD($usuario){
        if($this->permisos->esAdministrador() && !empty($usuario->getDni()) && self::usuarioADD($usuario)){
            $stmt= $this->db->prepare("INSERT INTO superusuario VALUES(?)");
            $stmt->execute(array($usuario->getDni()));
            $stmt=$this->db->prepare("INSERT INTO administrador VALUES(?)");
            $stmt->execute(array($usuario->getDni()));
            return true;
        }
        return false;
    }

    public function entrenadorADD($usuario){
        if($this->permisos->esAdministrador() && !empty($usuario->getDni()) && self::usuarioADD($administrador)){
            $stmt= $this->db->prepare("INSERT INTO superusuario VALUES(?)");
            $stmt->execute(array($usuario->getDni()));
            $stmt=$this->db->prepare("INSERT INTO entrenador VALUES(?)");
            $stmt->execute(array($usuario->getDni()));
            return true;
        }
        return false;
    }

    public function tduADD($usuario){
        if($this->permisos->esAdministrador() && !empty($usuario->getDni()) && self::usuarioADD($administrador)){
            $stmt= $this->db->prepare("INSERT INTO deportista VALUES(?)");
            $stmt->execute(array($usuario->getDni()));
            $stmt=$this->db->prepare("INSERT INTO administrador VALUES(?,?)");
            $stmt->execute(array($usuario->getTarjeta(), $usuario->getDni()));
            return true;
        }
        return false;
    }

    public function pefADD($usuario){
        if($this->permisos->esAdministrador() && !empty($usuario->getDni()) && self::usuarioADD($administrador)){
            $stmt= $this->db->prepare("INSERT INTO deportista VALUES(?)");
            $stmt->execute(array($usuario->getDni));
            $stmt=$this->db->prepare("INSERT INTO deportista VALUES(?,?,?)");
            $stmt->execute(array($usuario->getDni, $usuario->getTarjeta(), $usuario->getComentario()));
            return true;
        }
        return false;
    }

    /*usuarioADD
    *@usuario el usuario a añadir
    *Añade en la tabla de usuarios un nuevo usuario
    *En caso de que se añada devuelve un true
    */
    private function usuarioADD($usuario)
    {
        if($this->permisos->esAdministrador() && !empty($usuario->getDni())){
            $stmt = $this->db->prepare("INSERT INTO usuario values (?,?,?,?,?,?,?,?)");
            $stmt-> execute(array($usuario->getDni(), $usuario->getNombre(), $usuario->getApellidos(),$usuario->getEdad(),$usuario->getPassword(),$usuario->getEmail(), $usuario->getTelefono(), $usuario->getFecha()));
            return true;
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
