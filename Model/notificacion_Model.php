<?php


class notificacion_Model
{
        //Definimos las variables
            var $idNotificacion;
            var $dniAdministrador;
            var $Asunto;
            var $contenido;
            var $fecha;

        function __construct($idNotificacion, $id,$dniAdministrador,$Asunto,$contenido,$fecha){

        include_once '../Locates/Strings_'.$_SESSION['idioma'].'.php';
            $this->idNotificacion = $idNotificacion;
            $this->dniAdministrador = $dniAdministrador;
            $this->Asunto = $Asunto;
            $this->contenido = $contenido;//Comprobamos si es un atributo de tipo fecha o no 
                if($fecha == ''){
                           $this->fecha = $fecha;
                }else{

                       $this->fecha = date_format(date_create($fecha), 'Y-m-d');
                            
                        
                }    
    include_once 'Access_DB.php';
    $this->mysqli = ConnectDB();


}


    //Anadir
    function ADD()
    {
        
     
        $sql = "SELECT * FROM notificacion WHERE idNotificacion= '$this->idNotificacion' AND id= '$this->id'";

        if (!$result = $this->mysqli->query($sql)){
            return 'No se ha podido conectar con la base de datos'; // error en la consulta (no se ha podido conectar con la bd
        }
        else {
            if ($result->num_rows == 0){
                
                $sql = "INSERT INTO notificacion (
                        idNotificacion,
                        dniAdministrador,
                        Asunto,
                        contenido,
                        fecha) 
                        VALUES (
                        '$this->idNotificacion',
                        '$this->dniAdministrador',
                        '$this->Asunto',
                        '$this->contenido',
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
                        idNotificacion,
                        dniAdministrador,
                        Asunto,
                        contenido,
                        fecha
                from notificacion 
                where 
                    ((
                        idNotificacion LIKE '%$this->idNotificacion%')&&
                         (dniAdministrador LIKE '%$this->dniAdministrador%')&&
                         (Asunto LIKE '%$this->Asunto%')&&
                         (contenido LIKE '%$this->contenido%')&&
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
    
    $sql = "SELECT * FROM notificacion WHERE idNotificacion= '$this->idNotificacion' AND id= '$this->id'";
    $result = $this->mysqli->query($sql);
    if ($result->num_rows == 1)
    {
        $sql = "DELETE FROM notificacion WHERE idNotificacion= '$this->idNotificacion' AND id= '$this->id'";
        $this->mysqli->query($sql);
        return "Borrado correctamente";
    }
    else
        return "No existe en la base de datos";
}
//Funcion obtener datos de una tabla de la bd
function RellenaDatos()
{
    
    $sql = "SELECT * FROM notificacion WHERE idNotificacion = '$this->idNotificacion' AND id = '$this->id'";
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


    $sql = "SELECT * FROM notificacion WHERE idNotificacion= '$this->idNotificacion' AND id= '$this->id'";
    

    $result = $this->mysqli->query($sql);
    
    if ($result->num_rows == 1)
    {
        $sql = "UPDATE notificacion SET idNotificacion = '$this->idNotificacion',dniAdministrador = '$this->dniAdministrador',Asunto = '$this->Asunto',contenido = '$this->contenido',fecha = '$this->fecha' WHERE idNotificacion= '$this->idNotificacion' AND id= '$this->id'";
        
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
