<?php


class administrador_Model
{
        //Definimos las variables
            var $dniAdministrador;

        function __construct($dniAdministrador){

        include_once '../locates/Strings_'.$_SESSION['idioma'].'.php';
            $this->dniAdministrador = $dniAdministrador;    
    include_once 'Access_DB.php';
    $this->mysqli = ConnectDB();


}


    //Añadir
    function ADD()
    {
        
     
        $sql = "SELECT * FROM administrador WHERE dniAdministrador= '$this->dniAdministrador'";

        if (!$result = $this->mysqli->query($sql)){
            return 'No se ha podido conectar con la base de datos'; // error en la consulta (no se ha podido conectar con la bd
        }
        else {
            if ($result->num_rows == 0){
                
                $sql = "INSERT INTO administrador (
                        dniAdministrador) 
                        VALUES (
                        '$this->dniAdministrador')";
                
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
                        dniAdministrador
                from administrador 
                where 
                    ((
                        dniAdministrador LIKE '%$this->dniAdministrador%'))";
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
    
    $sql = "SELECT * FROM administrador WHERE dniAdministrador= '$this->dniAdministrador'";
    $result = $this->mysqli->query($sql);
    if ($result->num_rows == 1)
    {
        $sql = "DELETE FROM administrador WHERE dniAdministrador= '$this->dniAdministrador'";
        $this->mysqli->query($sql);
        return "Borrado correctamente";
    }
    else
        return "No existe en la base de datos";
}
//Funcion obtener datos de una tabla de la bd
function RellenaDatos()
{
    
    $sql = "SELECT * FROM administrador WHERE dniAdministrador = '$this->dniAdministrador'";
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


    $sql = "SELECT * FROM administrador WHERE dniAdministrador= '$this->dniAdministrador'";
    

    $result = $this->mysqli->query($sql);
    
    if ($result->num_rows == 1)
    {
        $sql = "UPDATE administrador SET dniAdministrador = '$this->dniAdministrador' WHERE dniAdministrador= '$this->dniAdministrador'";
        
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
