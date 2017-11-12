<?php
require_once(__DIR__."/../core/Access_DB.php");

class UsuarioMapper {

    private $db;
    /**
    *el contructor obtiene la conexion con la base de datos del core
    **/
    public function __construct() {
        $this->db = PDOConnection::getInstance();
    }

    /*Comprueba si existe un susario con ese dni y contraseña*/
    function login($dni,$password){
        $stmt = $this->db->prepare("SELECT count(dni) FROM usuario where dni=? and contrasena=?");
        $stmt->execute(array($dni,md5($password)));//la contraseña se encripta y compara con la guardada
        if ($stmt->fetchColumn() > 0) {
            return true;
        }
        return false;
}

    //Anadir
    function ADD()
    {
        $sql = "SELECT * FROM usuario WHERE dni= '$this->dni'";

        if (!$result = $this->mysqli->query($sql)){
            return 'No se ha podido conectar con la base de datos'; // error en la consulta (no se ha podido conectar con la bd
        }
        else {
            if ($result->num_rows == 0){
                
                $sql = "INSERT INTO usuario (
                        dni,
                        nombre,
                        apellidos,
                        edad,
                        contrasena,
                        email,
                        telefono,
                        fechaAlta) 
                        VALUES (
                        '$this->dni',
                        '$this->nombre',
                        '$this->apellidos',
                        '$this->edad',
                        '$this->contraseña',
                        '$this->email',
                        '$this->telefono',
                        '$this->fechaAlta')";
                
                if (!$this->mysqli->query($sql)) {
                    return 'Error en la inserciÃ³n';
                }
                else{
                    return 'Inserción realizada con Éxito'; //operacion de insertado correcta
                }
                
            }
            else
                return 'Ya existe en la base de datos'; // ya existe
        
    }
}

//funcion de destrucciÃ³n del objeto: se ejecuta automaticamente
//al finalizar el script
function __destruct()
{

}

   //funcion Consultar: hace una bÃºsqueda en la tabla con
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
function DELETE()
{
    $sql = "SELECT * FROM usuario WHERE dni= '$this->dni'";

    $result = $this->mysqli->query($sql);
    if ($result->num_rows == 1){
        $sql = "DELETE FROM usuario WHERE dni= '$this->dni'";
        if(!($this->mysqli->query($sql))){
            return "Error borrado";
        }else{
            return "Borrado correctamente";
        }
    }else
        return "No existe en la base de datos";
}

//Funcion obtener datos de una tabla de la bd
function RellenaDatos2()
{
    $sql = "SELECT * FROM usuario WHERE dni = '$this->dni';";
    if (!($resultado = $this->mysqli->query($sql))){
        return 'No existe en la base de datos'; // 
    }
    else{
        $result = $resultado->fetch_array();
        return $result;
    }
}

//Funcion editar
function EDIT()
{
    $sql = "SELECT * FROM usuario WHERE dni= '$this->dni'";
    $result = $this->mysqli->query($sql);
    if ($result->num_rows == 1){
        $sql = "UPDATE usuario SET dni = '$this->dni',nombre = '$this->nombre',apellidos = '$this->apellidos',edad = '$this->edad',email = '$this->email',telefono = '$this->telefono',fechaAlta = '$this->fechaAlta' WHERE dni= '$this->dni'";
        if (!($resultado = $this->mysqli->query($sql))){
            return 'Error en la modificaciÃ³n'; 
        }
        else{
            return 'Modificado correctamente';
        }
    }else
        return 'No existe en la base de datos';
}

}
?>