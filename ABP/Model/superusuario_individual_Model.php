<?php


class superusuario_individual_Model
{
        //Definimos las variables
            var $dniSuperUsuario;
            var $idActividad;

        function __construct($dniSuperUsuario, $idActividad){

        include_once '../Locates/Strings_'.$_SESSION['idioma'].'.php';
            $this->dniSuperUsuario = $dniSuperUsuario;
            $this->idActividad = $idActividad;    
    include_once 'Access_DB.php';
    $this->mysqli = ConnectDB();


}


    //Anadir
    function ADD()
    {
        
     
        $sql = "SELECT * FROM superusuario_individual WHERE dniSuperUsuario= '$this->dniSuperUsuario' AND idActividad= '$this->idActividad'";

        if (!$result = $this->mysqli->query($sql)){
            return 'No se ha podido conectar con la base de datos'; // error en la consulta (no se ha podido conectar con la bd
        }
        else {
            if ($result->num_rows == 0){
                
                $sql = "INSERT INTO superusuario_individual (
                        dniSuperUsuario,
                        idActividad) 
                        VALUES (
                        '$this->dniSuperUsuario',
                        '$this->idActividad')";
                
                if (!$this->mysqli->query($sql)) {
                    return 'Error en la inserción';
                }
                else{
                    return 'Inserción realizada con éxito'; //operacion de insertado correcta
                }
                
            }
            else
                return 'Ya existe en la base de datos'; // ya existe
        
    }
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
                        dniSuperUsuario,
                        idActividad
                from superusuario_individual 
                where 
                    ((
                        dniSuperUsuario LIKE '%$this->dniSuperUsuario%')&&
                         (idActividad LIKE '%$this->idActividad%'))";
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
    
    $sql = "SELECT * FROM superusuario_individual WHERE dniSuperUsuario= '$this->dniSuperUsuario' AND idActividad= '$this->idActividad'";
    $result = $this->mysqli->query($sql);
    if ($result->num_rows == 1)
    {
        $sql = "DELETE FROM superusuario_individual WHERE dniSuperUsuario= '$this->dniSuperUsuario' AND idActividad= '$this->idActividad'";
        $this->mysqli->query($sql);
        return "Borrado correctamente";
    }
    else
        return "No existe en la base de datos";
}
//Funcion obtener datos de una tabla de la bd
function RellenaDatos()
{
    
    $sql = "SELECT * FROM superusuario_individual WHERE dniSuperUsuario = '$this->dniSuperUsuario' AND idActividad = '$this->idActividad'";
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


    $sql = "SELECT * FROM superusuario_individual WHERE dniSuperUsuario= '$this->dniSuperUsuario' AND idActividad= '$this->idActividad'";
    

    $result = $this->mysqli->query($sql);
    
    if ($result->num_rows == 1)
    {
        $sql = "UPDATE superusuario_individual SET dniSuperUsuario = '$this->dniSuperUsuario',idActividad = '$this->idActividad' WHERE dniSuperUsuario= '$this->dniSuperUsuario' AND idActividad= '$this->idActividad'";
        
        if (!($resultado = $this->mysqli->query($sql))){
            return 'Error en la modificación'; 
        }
        else{
            return 'Modificado correctamente';
        }
    }
    else
        return 'No existe en la base de datos';
}



}//fin de clase

?> 
