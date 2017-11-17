<?php


class sesionentrenamiento_Model
{
        //Definimos las variables
            var $idSesionEntrenamiento;
            var $idActividad;
            var $comentario;
            var $duracion;
            var $fecha;

        function __construct($idSesionEntrenamiento,$idActividad,$comentario,$duracion,$fecha){

        include_once '../locates/Strings_'.$_SESSION['idioma'].'.php';
            $this->idSesionEntrenamiento = $idSesionEntrenamiento;
            $this->idActividad = $idActividad;
            $this->comentario = $comentario;
            $this->duracion = $duracion;//Comprobamos si es un atributo de tipo fecha o no 
                if($fecha == ''){
                           $this->fecha = $fecha;
                }else{

                       $this->fecha = date_format(date_create($fecha), 'Y-m-d');
                            
                        
                }    
    include_once 'Access_DB.php';
    $this->mysqli = ConnectDB();


}


    //Añadir
    function ADD()
    {
        
     
        $sql = "SELECT * FROM sesionentrenamiento WHERE idSesionEntrenamiento= '$this->idSesionEntrenamiento'";

        if (!$result = $this->mysqli->query($sql)){
            return 'No se ha podido conectar con la base de datos'; // error en la consulta (no se ha podido conectar con la bd
        }
        else {
            if ($result->num_rows == 0){
                
                $sql = "INSERT INTO sesionentrenamiento (
                        idSesionEntrenamiento,
                        idActividad,
                        comentario,
                        duracion,
                        fecha) 
                        VALUES (
                        '$this->idSesionEntrenamiento',
                        '$this->idActividad',
                        '$this->comentario',
                        '$this->duracion',
                        '$this->fecha')";
                
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
                        idActividad,
                        comentario,
                        duracion,
                        fecha
                from sesionentrenamiento 
                where 
                    ((
                        idSesionEntrenamiento LIKE '%$this->idSesionEntrenamiento%')&&
                         (idActividad LIKE '%$this->idActividad%')&&
                         (comentario LIKE '%$this->comentario%')&&
                         (duracion LIKE '%$this->duracion%')&&
                         (fecha LIKE '%$this->fecha%'))";
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
    
    $sql = "SELECT * FROM sesionentrenamiento WHERE idSesionEntrenamiento= '$this->idSesionEntrenamiento'";
    $result = $this->mysqli->query($sql);
    if ($result->num_rows == 1)
    {
        $sql = "DELETE FROM sesionentrenamiento WHERE idSesionEntrenamiento= '$this->idSesionEntrenamiento'";
        $this->mysqli->query($sql);
        return "Borrado correctamente";
    }
    else
        return "No existe en la base de datos";
}
//Funcion obtener datos de una tabla de la bd
function RellenaDatos()
{
    
    $sql = "SELECT * FROM sesionentrenamiento WHERE idSesionEntrenamiento = '$this->idSesionEntrenamiento'";
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


    $sql = "SELECT * FROM sesionentrenamiento WHERE idSesionEntrenamiento= '$this->idSesionEntrenamiento'";
    

    $result = $this->mysqli->query($sql);
    
    if ($result->num_rows == 1)
    {
        $sql = "UPDATE sesionentrenamiento SET idSesionEntrenamiento = '$this->idSesionEntrenamiento',idActividad = '$this->idActividad',comentario = '$this->comentario',duracion = '$this->duracion',fecha = '$this->fecha' WHERE idSesionEntrenamiento= '$this->idSesionEntrenamiento'";
        
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
