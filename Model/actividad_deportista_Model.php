<?php


class actividad_deportista_Model
{
        //Definimos las variables
            var $idActividad;
            var $dniDeportista;

        function __construct($idActividad, $dniDeportista){

        include_once '../Locates/Strings_'.$_SESSION['idioma'].'.php';
            $this->idActividad = $idActividad;
            $this->dniDeportista = $dniDeportista;    
    include_once 'Access_DB.php';
    $this->mysqli = ConnectDB();


}


    //Anadir
    function ADD()
    {
        
     
        $sql = "SELECT * FROM actividad_deportista WHERE idActividad= '$this->idActividad' AND dniDeportista= '$this->dniDeportista'";

        if (!$result = $this->mysqli->query($sql)){
            return 'No se ha podido conectar con la base de datos'; // error en la consulta (no se ha podido conectar con la bd
        }
        else {
            if ($result->num_rows == 0){
                
                $sql = "INSERT INTO actividad_deportista (
                        idActividad,
                        dniDeportista) 
                        VALUES (
                        '$this->idActividad',
                        '$this->dniDeportista')";
                
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
                        dniDeportista
                from actividad_deportista 
                where 
                    ((
                        idActividad LIKE '%$this->idActividad%')&&
                         (dniDeportista LIKE '%$this->dniDeportista%'))";
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
    
    $sql = "SELECT * FROM actividad_deportista WHERE idActividad= '$this->idActividad' AND dniDeportista= '$this->dniDeportista'";
    $result = $this->mysqli->query($sql);
    if ($result->num_rows == 1)
    {
        $sql = "DELETE FROM actividad_deportista WHERE idActividad= '$this->idActividad' AND dniDeportista= '$this->dniDeportista'";
        $this->mysqli->query($sql);
        return "Borrado correctamente";
    }
    else
        return "No existe en la base de datos";
}
//Funcion obtener datos de una tabla de la bd
function RellenaDatos()
{
    
    $sql = "SELECT * FROM actividad_deportista WHERE idActividad = '$this->idActividad' AND dniDeportista = '$this->dniDeportista'";
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


    $sql = "SELECT * FROM actividad_deportista WHERE idActividad= '$this->idActividad' AND dniDeportista= '$this->dniDeportista'";
    

    $result = $this->mysqli->query($sql);
    
    if ($result->num_rows == 1)
    {
        $sql = "UPDATE actividad_deportista SET idActividad = '$this->idActividad',dniDeportista = '$this->dniDeportista' WHERE idActividad= '$this->idActividad' AND dniDeportista= '$this->dniDeportista'";
        
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
