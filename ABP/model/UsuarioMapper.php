<?php
require_once(__DIR__."/../core/Access_DB.php");
class UsuarioMapper {
    private $db;
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
        $stmt = execute(array($usuario->getDni(), $usuario->getNombre(), $usuarios->getApellidos(),$usuario->getEdad(),
            $usuario->getPassword(),$usuario->getEmail(), $usuario->getTelefono(), $usuario->getFecha()));
    }
    //funcion Consultar: hace una búsqueda en la tabla con
    //los datos proporcionados. Si van vacios devuelve todos
    function SEARCH()
    {
        $sql = "select 
                        dni,
                        nombre,
                        apellidos,
                        edad,
                        email,
                        telefono,
                        fechaAlta
                from usuario 
                where 
                    ((
                        dni LIKE '%$this->dni%')&&
                         (nombre LIKE '%$this->nombre%')&&
                         (apellidos LIKE '%$this->apellidos%')&&
                         (edad LIKE '%$this->edad%')&&
                         (email LIKE '%$this->email%')&&
                         (telefono LIKE '%$this->telefono%')&&
                         (fechaAlta LIKE '%$this->fechaAlta%'))";
        if (!($resultado = $this->mysqli->query($sql))){
            return 'Error en la consulta sobre la base de datos';
        }
        else{
            return $resultado;
        }
    }
    //Funcion borrar un elemento de la BD
    function DELETE($dni)
    {
        $stmt = $this->db->prepare("DELETE from usuario WHERE dni=?");
        $stmt->execute(array($usuario->getDni()));
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
    function EDIT()
    {
        $stmt = $this->db->prepare("UPDATE from usuario WHERE dni=? and nombre=? and appellidos=? and edad=? and email=? and telefono=? and fechaAlta=?");
        $stmt->execute(array($usuario->getDni(), $usuario->getNombre(), $usuarios->getApellidos(),$usuario->getEdad(),
            $usuario->getPassword(),$usuario->getEmail(), $usuario->getTelefono(), $usuario->getFecha()));
    }
}
?>
