<?php


class muscular_Model
{
        //Definimos las variables
            var $idEjercicio;
            var $carga;
            var $repeticiones;

        function __construct($idEjercicio,$carga,$repeticiones){

        include_once '../Locates/Strings_'.$_SESSION['idioma'].'.php';
            $this->idEjercicio = $idEjercicio;
            $this->carga = $carga;
            $this->repeticiones = $repeticiones;    
    include_once 'Access_DB.php';
    $this->mysqli = ConnectDB();


}


    //Anadir
    function ADD()
    {
        
     
        $sql = "SELECT * FROM muscular WHERE idEjercicio= '$this->idEjercicio'";

        if (!$result = $this->mysqli->query($sql)){
            return 'No se ha podido conectar con la base de datos'; // error en la consulta (no se ha podido conectar con la bd
        }
        else {
            if ($result->num_rows == 0){
                
                $sql = "INSERT INTO muscular (
                        idEjercicio,
                        carga,
                        repeticiones) 
                        VALUES (
                        '$this->idEjercicio',
                        '$this->carga',
                        '$this->repeticiones')";
                
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
                        carga,
                        repeticiones
                from muscular 
                where 
                    ((
                        idEjercicio LIKE '%$this->idEjercicio%')&&
                         (carga LIKE '%$this->carga%')&&
                         (repeticiones LIKE '%$this->repeticiones%'))";
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
    
    $sql = "SELECT * FROM muscular WHERE idEjercicio= '$this->idEjercicio'";
    $result = $this->mysqli->query($sql);
    if ($result->num_rows == 1)
    {
        $sql = "DELETE FROM muscular WHERE idEjercicio= '$this->idEjercicio'";
        $this->mysqli->query($sql);
        return "Borrado correctamente";
    }
    else
        return "No existe en la base de datos";
}
//Funcion obtener datos de una tabla de la bd
function RellenaDatos()
{
    
    $sql = "SELECT * FROM muscular WHERE idEjercicio = '$this->idEjercicio'";
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


    $sql = "SELECT * FROM muscular WHERE idEjercicio= '$this->idEjercicio'";
    

    $result = $this->mysqli->query($sql);
    
    if ($result->num_rows == 1)
    {
        $sql = "UPDATE muscular SET idEjercicio = '$this->idEjercicio',carga = '$this->carga',repeticiones = '$this->repeticiones' WHERE idEjercicio= '$this->idEjercicio'";
        
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
