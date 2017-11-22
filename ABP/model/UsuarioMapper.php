<?php
require_once(__DIR__."/../core/Access_DB.php");
class UsuarioMapper {
    protected $db;
    /**
    *el contructor obtiene la conexion con la base de datos del core
    **/
    public function __construct() 
    {
        $this->db = PDOConnection::getInstance();
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
        $stmt = $this->db->prepare("INSERT INTO usuario values (?,?,?,?,?,?,?,?)");
        $stmt = execute(array($usuario->getDni(), $usuario->getNombre(), $usuario->getApellidos(),$usuario->getEdad(),
            $usuario->getPassword(),$usuario->getEmail(), $usuario->getTelefono(), $usuario->getFecha()));
    }

    //Funcion borrar un elemento de la BD
    function DELETE($dni)
    {
        $stmt = $this->db->prepare("DELETE from usuario WHERE dni=?");
        $stmt->execute(array($dni()));
    }
    //Funcion obtener datos de una tabla de la bd
    function RellenaDatos2()
    {
    $sql = "SELECT * FROM usuario WHERE dni = '$this->dni';";
        if (!($resultado = $this->mysqli->query($sql)))
        {
            return 'No existe en la base de datos'; // 
        }else{
            $result = $resultado->fetch_array();
            return $result;
        }
    }
    //Funcion editar
    function EDIT($usuario)
    {
    $stmt = $this->db->prepare("UPDATE from usuario WHERE dni=? and nombre=? and appellidos=? and edad=? and email=? and telefono=? and fechaAlta=?");
    $stmt->execute(array($usuario->getDni(), $usuario->getNombre(), $usuario->getApellidos(),$usuario->getEdad(),
            $usuario->getPassword(),$usuario->getEmail(), $usuario->getTelefono(), $usuario->getFecha()));
    }
}
?>
