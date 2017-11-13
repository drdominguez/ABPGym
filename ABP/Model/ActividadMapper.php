<?php
require_once(__DIR__."/../core/Access_DB.php");

class ActividadMapper
{
    private $db;
    /**
    *el contructor obtiene la conexion con la base de datos del core
    **/
    public function __construct() 
    {
        $this->db = PDOConnection::getInstance();
    }
    //funcion de destrucción del objeto: se ejecuta automaticamente
    //al finalizar el script
    function __destruct()
    {

    }
    //Anadir
    function ADD()
    { 
        $stmt = $this->db->prepare("INSERT INTO actividad values (?,?)";
        $stmt = execute(array($actividad->getIdActividad(), $actividad->getNombre()
    }

//funcion de destrucción del objeto: se ejecuta automaticamente
//al finalizar el script
function __destruct()
{

}

//funcion Consultar: hace una búsqueda en la tabla con
//los datos proporcionados. Si van vacios devuelve todos
function SEARCH()
{
    
    $sql = "select 
                        idActividad,
                        precio
                from actividad 
                where 
                    ((
                        idActividad LIKE '%$this->idActividad%')&&
                         (precio LIKE '%$this->precio%'))";
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
    $stmt = $this->db->prepare("DELETE from actividad WHERE idActividad=?");
    $stmt->execute(array($usuario->getIdActividad()));
}
//Funcion obtener datos de una tabla de la bd
function RellenaDatos()
{
    
    $sql = "SELECT * FROM actividad WHERE idActividad = '$this->idActividad'";
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

    $stmt = $this->db->prepare("UPDATE from usuario WHERE idActividad=? and nombre=?");
    $stmt->execute(array($usuario->getIdActividad(), $usuario->getNombre()));
  
}
}//fin de clase

?> 