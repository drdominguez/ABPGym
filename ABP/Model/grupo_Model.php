<?php


class grupo_Model
{
        //Definimos las variables
            var $idActividad;
            var $instalaciones;
            var $plazas;

        function __construct($idActividad,$instalaciones,$plazas){

        include_once '../Locates/Strings_'.$_SESSION['idioma'].'.php';
            $this->idActividad = $idActividad;
            $this->instalaciones = $instalaciones;
            $this->plazas = $plazas;    
    include_once 'Access_DB.php';
    $this->mysqli = ConnectDB();


}


    //Anadir
    function ADD()
    {
        
     
        $sql = "SELECT * FROM grupo WHERE idActividad= '$this->idActividad'";

        if (!$result = $this->mysqli->query($sql)){
            return 'No se ha podido conectar con la base de datos'; // error en la consulta (no se ha podido conectar con la bd
        }
        else {
            if ($result->num_rows == 0){
                
                $sql = "INSERT INTO grupo (
                        idActividad,
                        instalaciones,
                        plazas) 
                        VALUES (
                        '$this->idActividad',
                        '$this->instalaciones',
                        '$this->plazas')";
                
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
                        idActividad,
                        instalaciones,
                        plazas
                from grupo 
                where 
                    ((
                        idActividad LIKE '%$this->idActividad%')&&
                         (instalaciones LIKE '%$this->instalaciones%')&&
                         (plazas LIKE '%$this->plazas%'))";
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
    
    $sql = "SELECT * FROM grupo WHERE idActividad= '$this->idActividad'";
    $result = $this->mysqli->query($sql);
    if ($result->num_rows == 1)
    {
        $sql = "DELETE FROM grupo WHERE idActividad= '$this->idActividad'";
        $this->mysqli->query($sql);
        return "Borrado correctamente";
    }
    else
        return "No existe en la base de datos";
}
//Funcion obtener datos de una tabla de la bd
function RellenaDatos()
{
    
    $sql = "SELECT * FROM grupo WHERE idActividad = '$this->idActividad'";
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


    $sql = "SELECT * FROM grupo WHERE idActividad= '$this->idActividad'";
    

    $result = $this->mysqli->query($sql);
    
    if ($result->num_rows == 1)
    {
        $sql = "UPDATE grupo SET idActividad = '$this->idActividad',instalaciones = '$this->instalaciones',plazas = '$this->plazas' WHERE idActividad= '$this->idActividad'";
        
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
