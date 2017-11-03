<?php


class superusuario_ejercicio_Model
{
        //Definimos las variables
            var $dniSuperUsuario;
            var $idEjercicio;

        function __construct($dniSuperUsuario, $idEjercicio){

        include_once '../Locates/Strings_'.$_SESSION['idioma'].'.php';
            $this->dniSuperUsuario = $dniSuperUsuario;
            $this->idEjercicio = $idEjercicio;    
    include_once 'Access_DB.php';
    $this->mysqli = ConnectDB();


}


    //Anadir
    function ADD()
    {
        
     
        $sql = "SELECT * FROM superusuario_ejercicio WHERE dniSuperUsuario= '$this->dniSuperUsuario' AND idEjercicio= '$this->idEjercicio'";

        if (!$result = $this->mysqli->query($sql)){
            return 'No se ha podido conectar con la base de datos'; // error en la consulta (no se ha podido conectar con la bd
        }
        else {
            if ($result->num_rows == 0){
                
                $sql = "INSERT INTO superusuario_ejercicio (
                        dniSuperUsuario,
                        idEjercicio) 
                        VALUES (
                        '$this->dniSuperUsuario',
                        '$this->idEjercicio')";
                
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
                        idEjercicio
                from superusuario_ejercicio 
                where 
                    ((
                        dniSuperUsuario LIKE '%$this->dniSuperUsuario%')&&
                         (idEjercicio LIKE '%$this->idEjercicio%'))";
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
    
    $sql = "SELECT * FROM superusuario_ejercicio WHERE dniSuperUsuario= '$this->dniSuperUsuario' AND idEjercicio= '$this->idEjercicio'";
    $result = $this->mysqli->query($sql);
    if ($result->num_rows == 1)
    {
        $sql = "DELETE FROM superusuario_ejercicio WHERE dniSuperUsuario= '$this->dniSuperUsuario' AND idEjercicio= '$this->idEjercicio'";
        $this->mysqli->query($sql);
        return "Borrado correctamente";
    }
    else
        return "No existe en la base de datos";
}
//Funcion obtener datos de una tabla de la bd
function RellenaDatos()
{
    
    $sql = "SELECT * FROM superusuario_ejercicio WHERE dniSuperUsuario = '$this->dniSuperUsuario' AND idEjercicio = '$this->idEjercicio'";
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


    $sql = "SELECT * FROM superusuario_ejercicio WHERE dniSuperUsuario= '$this->dniSuperUsuario' AND idEjercicio= '$this->idEjercicio'";
    

    $result = $this->mysqli->query($sql);
    
    if ($result->num_rows == 1)
    {
        $sql = "UPDATE superusuario_ejercicio SET dniSuperUsuario = '$this->dniSuperUsuario',idEjercicio = '$this->idEjercicio' WHERE dniSuperUsuario= '$this->dniSuperUsuario' AND idEjercicio= '$this->idEjercicio'";
        
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
