<?php


class actividad_horario_Model
{
        //Definimos las variables
            var $idActividad;
            var $idHorario;

        function __construct($idActividad, $idHorario){

        include_once '../Locates/Strings_'.$_SESSION['idioma'].'.php';
            $this->idActividad = $idActividad;
            $this->idHorario = $idHorario;    
    include_once 'Access_DB.php';
    $this->mysqli = ConnectDB();


}


    //Anadir
    function ADD()
    {
        
     
        $sql = "SELECT * FROM actividad_horario WHERE idActividad= '$this->idActividad' AND idHorario= '$this->idHorario'";

        if (!$result = $this->mysqli->query($sql)){
            return 'No se ha podido conectar con la base de datos'; // error en la consulta (no se ha podido conectar con la bd
        }
        else {
            if ($result->num_rows == 0){
                
                $sql = "INSERT INTO actividad_horario (
                        idActividad,
                        idHorario) 
                        VALUES (
                        '$this->idActividad',
                        '$this->idHorario')";
                
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
                        idHorario
                from actividad_horario 
                where 
                    ((
                        idActividad LIKE '%$this->idActividad%')&&
                         (idHorario LIKE '%$this->idHorario%'))";
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
    
    $sql = "SELECT * FROM actividad_horario WHERE idActividad= '$this->idActividad' AND idHorario= '$this->idHorario'";
    $result = $this->mysqli->query($sql);
    if ($result->num_rows == 1)
    {
        $sql = "DELETE FROM actividad_horario WHERE idActividad= '$this->idActividad' AND idHorario= '$this->idHorario'";
        $this->mysqli->query($sql);
        return "Borrado correctamente";
    }
    else
        return "No existe en la base de datos";
}
//Funcion obtener datos de una tabla de la bd
function RellenaDatos()
{
    
    $sql = "SELECT * FROM actividad_horario WHERE idActividad = '$this->idActividad' AND idHorario = '$this->idHorario'";
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


    $sql = "SELECT * FROM actividad_horario WHERE idActividad= '$this->idActividad' AND idHorario= '$this->idHorario'";
    

    $result = $this->mysqli->query($sql);
    
    if ($result->num_rows == 1)
    {
        $sql = "UPDATE actividad_horario SET idActividad = '$this->idActividad',idHorario = '$this->idHorario' WHERE idActividad= '$this->idActividad' AND idHorario= '$this->idHorario'";
        
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
