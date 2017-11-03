<?php


class pef_Model
{
        //Definimos las variables
            var $dni;
            var $tarjeta;
            var $comentarioRivision;

        function __construct($dni,$tarjeta,$comentarioRivision){

        include_once '../Locates/Strings_'.$_SESSION['idioma'].'.php';
            $this->dni = $dni;
            $this->tarjeta = $tarjeta;
            $this->comentarioRivision = $comentarioRivision;    
    include_once 'Access_DB.php';
    $this->mysqli = ConnectDB();


}


    //Anadir
    function ADD()
    {
        
     
        $sql = "SELECT * FROM pef WHERE dni= '$this->dni'";

        if (!$result = $this->mysqli->query($sql)){
            return 'No se ha podido conectar con la base de datos'; // error en la consulta (no se ha podido conectar con la bd
        }
        else {
            if ($result->num_rows == 0){
                
                $sql = "INSERT INTO pef (
                        dni,
                        tarjeta,
                        comentarioRivision) 
                        VALUES (
                        '$this->dni',
                        '$this->tarjeta',
                        '$this->comentarioRivision')";
                
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
                        dni,
                        tarjeta,
                        comentarioRivision
                from pef 
                where 
                    ((
                        dni LIKE '%$this->dni%')&&
                         (tarjeta LIKE '%$this->tarjeta%')&&
                         (comentarioRivision LIKE '%$this->comentarioRivision%'))";
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
    
    $sql = "SELECT * FROM pef WHERE dni= '$this->dni'";
    $result = $this->mysqli->query($sql);
    if ($result->num_rows == 1)
    {
        $sql = "DELETE FROM pef WHERE dni= '$this->dni'";
        $this->mysqli->query($sql);
        return "Borrado correctamente";
    }
    else
        return "No existe en la base de datos";
}
//Funcion obtener datos de una tabla de la bd
function RellenaDatos()
{
    
    $sql = "SELECT * FROM pef WHERE dni = '$this->dni'";
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


    $sql = "SELECT * FROM pef WHERE dni= '$this->dni'";
    

    $result = $this->mysqli->query($sql);
    
    if ($result->num_rows == 1)
    {
        $sql = "UPDATE pef SET dni = '$this->dni',tarjeta = '$this->tarjeta',comentarioRivision = '$this->comentarioRivision' WHERE dni= '$this->dni'";
        
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
