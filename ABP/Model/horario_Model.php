<?php


class horario_Model
{
        //Definimos las variables
            var $idHorario;
            var $localizacion;
            var $dia;
            var $hora;

        function __construct($idHorario,$localizacion,$dia,$hora){

        include_once '../Locates/Strings_'.$_SESSION['idioma'].'.php';
            $this->idHorario = $idHorario;
            $this->localizacion = $localizacion;
            $this->dia = $dia;
            $this->hora = $hora;    
    include_once 'Access_DB.php';
    $this->mysqli = ConnectDB();


}


    //Anadir
    function ADD()
    {
        
     
        $sql = "SELECT * FROM horario WHERE idHorario= '$this->idHorario'";

        if (!$result = $this->mysqli->query($sql)){
            return 'No se ha podido conectar con la base de datos'; // error en la consulta (no se ha podido conectar con la bd
        }
        else {
            if ($result->num_rows == 0){
                
                $sql = "INSERT INTO horario (
                        idHorario,
                        localizacion,
                        dia,
                        hora) 
                        VALUES (
                        '$this->idHorario',
                        '$this->localizacion',
                        '$this->dia',
                        '$this->hora')";
                
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
                        idHorario,
                        localizacion,
                        dia,
                        hora
                from horario 
                where 
                    ((
                        idHorario LIKE '%$this->idHorario%')&&
                         (localizacion LIKE '%$this->localizacion%')&&
                         (dia LIKE '%$this->dia%')&&
                         (hora LIKE '%$this->hora%'))";
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
    
    $sql = "SELECT * FROM horario WHERE idHorario= '$this->idHorario'";
    $result = $this->mysqli->query($sql);
    if ($result->num_rows == 1)
    {
        $sql = "DELETE FROM horario WHERE idHorario= '$this->idHorario'";
        $this->mysqli->query($sql);
        return "Borrado correctamente";
    }
    else
        return "No existe en la base de datos";
}
//Funcion obtener datos de una tabla de la bd
function RellenaDatos()
{
    
    $sql = "SELECT * FROM horario WHERE idHorario = '$this->idHorario'";
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


    $sql = "SELECT * FROM horario WHERE idHorario= '$this->idHorario'";
    

    $result = $this->mysqli->query($sql);
    
    if ($result->num_rows == 1)
    {
        $sql = "UPDATE horario SET idHorario = '$this->idHorario',localizacion = '$this->localizacion',dia = '$this->dia',hora = '$this->hora' WHERE idHorario= '$this->idHorario'";
        
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
