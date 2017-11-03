<?php


class sesionentrenamiento_tabla_Model
{
        //Definimos las variables
            var $idSesionEntrenamiento;
            var $idTabla;

        function __construct($idSesionEntrenamiento, $idTabla){

        include_once '../Locates/Strings_'.$_SESSION['idioma'].'.php';
            $this->idSesionEntrenamiento = $idSesionEntrenamiento;
            $this->idTabla = $idTabla;    
    include_once 'Access_DB.php';
    $this->mysqli = ConnectDB();


}


    //Anadir
    function ADD()
    {
        
     
        $sql = "SELECT * FROM sesionentrenamiento_tabla WHERE idSesionEntrenamiento= '$this->idSesionEntrenamiento' AND idTabla= '$this->idTabla'";

        if (!$result = $this->mysqli->query($sql)){
            return 'No se ha podido conectar con la base de datos'; // error en la consulta (no se ha podido conectar con la bd
        }
        else {
            if ($result->num_rows == 0){
                
                $sql = "INSERT INTO sesionentrenamiento_tabla (
                        idSesionEntrenamiento,
                        idTabla) 
                        VALUES (
                        '$this->idSesionEntrenamiento',
                        '$this->idTabla')";
                
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
                        idSesionEntrenamiento,
                        idTabla
                from sesionentrenamiento_tabla 
                where 
                    ((
                        idSesionEntrenamiento LIKE '%$this->idSesionEntrenamiento%')&&
                         (idTabla LIKE '%$this->idTabla%'))";
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
    
    $sql = "SELECT * FROM sesionentrenamiento_tabla WHERE idSesionEntrenamiento= '$this->idSesionEntrenamiento' AND idTabla= '$this->idTabla'";
    $result = $this->mysqli->query($sql);
    if ($result->num_rows == 1)
    {
        $sql = "DELETE FROM sesionentrenamiento_tabla WHERE idSesionEntrenamiento= '$this->idSesionEntrenamiento' AND idTabla= '$this->idTabla'";
        $this->mysqli->query($sql);
        return "Borrado correctamente";
    }
    else
        return "No existe en la base de datos";
}
//Funcion obtener datos de una tabla de la bd
function RellenaDatos()
{
    
    $sql = "SELECT * FROM sesionentrenamiento_tabla WHERE idSesionEntrenamiento = '$this->idSesionEntrenamiento' AND idTabla = '$this->idTabla'";
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


    $sql = "SELECT * FROM sesionentrenamiento_tabla WHERE idSesionEntrenamiento= '$this->idSesionEntrenamiento' AND idTabla= '$this->idTabla'";
    

    $result = $this->mysqli->query($sql);
    
    if ($result->num_rows == 1)
    {
        $sql = "UPDATE sesionentrenamiento_tabla SET idSesionEntrenamiento = '$this->idSesionEntrenamiento',idTabla = '$this->idTabla' WHERE idSesionEntrenamiento= '$this->idSesionEntrenamiento' AND idTabla= '$this->idTabla'";
        
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
