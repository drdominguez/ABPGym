<?php


class superusuario_tabla_deportista_Model
{
        //Definimos las variables
            var $dniSuperUsuario;
            var $dniDeportista;
            var $idTabla;

        function __construct($dniSuperUsuario, $dniDeportista, $idTabla){

            $this->dniSuperUsuario = $dniSuperUsuario;
            $this->dniDeportista = $dniDeportista;
            $this->idTabla = $idTabla;    
    include_once 'Access_DB.php';
    $this->mysqli = ConnectDB();


}


    //Anadir
    function ADD()
    {
        
     
        $sql = "SELECT * FROM superusuario_tabla_deportista WHERE dniSuperUsuario= '$this->dniSuperUsuario' AND dniDeportista= '$this->dniDeportista' AND idTabla= '$this->idTabla'";

        if (!$result = $this->mysqli->query($sql)){
            return 'No se ha podido conectar con la base de datos'; // error en la consulta (no se ha podido conectar con la bd
        }
        else {
            if ($result->num_rows == 0){
                
                $sql = "INSERT INTO superusuario_tabla_deportista (
                        dniSuperUsuario,
                        dniDeportista,
                        idTabla) 
                        VALUES (
                        '$this->dniSuperUsuario',
                        '$this->dniDeportista',
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
                        dniSuperUsuario,
                        dniDeportista,
                        idTabla
                from superusuario_tabla_deportista 
                where 
                    ((
                        dniSuperUsuario LIKE '%$this->dniSuperUsuario%')&&
                         (dniDeportista LIKE '%$this->dniDeportista%')&&
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
    
    $sql = "SELECT * FROM superusuario_tabla_deportista WHERE dniSuperUsuario= '$this->dniSuperUsuario' AND dniDeportista= '$this->dniDeportista' AND idTabla= '$this->idTabla'";
    $result = $this->mysqli->query($sql);
    if ($result->num_rows == 1)
    {
        $sql = "DELETE FROM superusuario_tabla_deportista WHERE dniSuperUsuario= '$this->dniSuperUsuario' AND dniDeportista= '$this->dniDeportista' AND idTabla= '$this->idTabla'";
        $this->mysqli->query($sql);
        return "Borrado correctamente";
    }
    else
        return "No existe en la base de datos";
}
//Funcion obtener datos de una tabla de la bd
function RellenaDatos()
{
    
    $sql = "SELECT * FROM superusuario_tabla_deportista WHERE dniSuperUsuario = '$this->dniSuperUsuario' AND dniDeportista = '$this->dniDeportista' AND idTabla = '$this->idTabla'";
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


    $sql = "SELECT * FROM superusuario_tabla_deportista WHERE dniSuperUsuario= '$this->dniSuperUsuario' AND dniDeportista= '$this->dniDeportista' AND idTabla= '$this->idTabla'";
    

    $result = $this->mysqli->query($sql);
    
    if ($result->num_rows == 1)
    {
        $sql = "UPDATE superusuario_tabla_deportista SET dniSuperUsuario = '$this->dniSuperUsuario',dniDeportista = '$this->dniDeportista',idTabla = '$this->idTabla' WHERE dniSuperUsuario= '$this->dniSuperUsuario' AND dniDeportista= '$this->dniDeportista' AND idTabla= '$this->idTabla'";
        
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
