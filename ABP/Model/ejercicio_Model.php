<?php


class ejercicio_Model
{
        //Definimos las variables
            var $idEjercicio;
            var $nombre;
            var $descripcion;
            var $video;
            var $imagen;

        function __construct($idEjercicio,$nombre,$descripcion,$video,$imagen){

        include_once '../Locates/Strings_'.$_SESSION['idioma'].'.php';
            $this->idEjercicio = $idEjercicio;
            $this->nombre = $nombre;
            $this->descripcion = $descripcion;
            $this->video = $video;
            $this->imagen = $imagen;    
    include_once 'Access_DB.php';
    $this->mysqli = ConnectDB();


}


    //Anadir
    function ADD()
    {
        
     
        $sql = "SELECT * FROM ejercicio WHERE idEjercicio= '$this->idEjercicio'";

        if (!$result = $this->mysqli->query($sql)){
            return 'No se ha podido conectar con la base de datos'; // error en la consulta (no se ha podido conectar con la bd
        }
        else {
            if ($result->num_rows == 0){
                
                $sql = "INSERT INTO ejercicio (
                        idEjercicio,
                        nombre,
                        descripcion,
                        video,
                        imagen) 
                        VALUES (
                        '$this->idEjercicio',
                        '$this->nombre',
                        '$this->descripcion',
                        '$this->video',
                        '$this->imagen')";
                
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
                        idEjercicio,
                        nombre,
                        descripcion,
                        video,
                        imagen
                from ejercicio 
                where 
                    ((
                        idEjercicio LIKE '%$this->idEjercicio%')&&
                         (nombre LIKE '%$this->nombre%')&&
                         (descripcion LIKE '%$this->descripcion%')&&
                         (video LIKE '%$this->video%')&&
                         (imagen LIKE '%$this->imagen%'))";
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
    
    $sql = "SELECT * FROM ejercicio WHERE idEjercicio= '$this->idEjercicio'";
    $result = $this->mysqli->query($sql);
    if ($result->num_rows == 1)
    {
        $sql = "DELETE FROM ejercicio WHERE idEjercicio= '$this->idEjercicio'";
        $this->mysqli->query($sql);
        return "Borrado correctamente";
    }
    else
        return "No existe en la base de datos";
}
//Funcion obtener datos de una tabla de la bd
function RellenaDatos()
{
    
    $sql = "SELECT * FROM ejercicio WHERE idEjercicio = '$this->idEjercicio'";
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


    $sql = "SELECT * FROM ejercicio WHERE idEjercicio= '$this->idEjercicio'";
    

    $result = $this->mysqli->query($sql);
    
    if ($result->num_rows == 1)
    {
        $sql = "UPDATE ejercicio SET idEjercicio = '$this->idEjercicio',nombre = '$this->nombre',descripcion = '$this->descripcion',video = '$this->video',imagen = '$this->imagen' WHERE idEjercicio= '$this->idEjercicio'";
        
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
