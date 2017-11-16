<?php


class pago_Model
{
        //Definimos las variables
            var $idPago;
            var $dniDeportista;
            var $idActividad;
            var $importe;
            var $fecha;

        function __construct($idPago,$dniDeportista,$idActividad,$importe,$fecha){

        include_once '../locates/Strings_'.$_SESSION['idioma'].'.php';
            $this->idPago = $idPago;
            $this->dniDeportista = $dniDeportista;
            $this->idActividad = $idActividad;
            $this->importe = $importe;//Comprobamos si es un atributo de tipo fecha o no 
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
        
     
        $sql = "SELECT * FROM pago WHERE idPago= '$this->idPago'";

        if (!$result = $this->mysqli->query($sql)){
            return 'No se ha podido conectar con la base de datos'; // error en la consulta (no se ha podido conectar con la bd
        }
        else {
            if ($result->num_rows == 0){
                
                $sql = "INSERT INTO pago (
                        idPago,
                        dniDeportista,
                        idActividad,
                        importe,
                        fecha) 
                        VALUES (
                        '$this->idPago',
                        '$this->dniDeportista',
                        '$this->idActividad',
                        '$this->importe',
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
                        idPago,
                        dniDeportista,
                        idActividad,
                        importe,
                        fecha
                from pago 
                where 
                    ((
                        idPago LIKE '%$this->idPago%')&&
                         (dniDeportista LIKE '%$this->dniDeportista%')&&
                         (idActividad LIKE '%$this->idActividad%')&&
                         (importe LIKE '%$this->importe%')&&
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
    
    $sql = "SELECT * FROM pago WHERE idPago= '$this->idPago'";
    $result = $this->mysqli->query($sql);
    if ($result->num_rows == 1)
    {
        $sql = "DELETE FROM pago WHERE idPago= '$this->idPago'";
        $this->mysqli->query($sql);
        return "Borrado correctamente";
    }
    else
        return "No existe en la base de datos";
}
//Funcion obtener datos de una tabla de la bd
function RellenaDatos()
{
    
    $sql = "SELECT * FROM pago WHERE idPago = '$this->idPago'";
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


    $sql = "SELECT * FROM pago WHERE idPago= '$this->idPago'";
    

    $result = $this->mysqli->query($sql);
    
    if ($result->num_rows == 1)
    {
        $sql = "UPDATE pago SET idPago = '$this->idPago',dniDeportista = '$this->dniDeportista',idActividad = '$this->idActividad',importe = '$this->importe',fecha = '$this->fecha' WHERE idPago= '$this->idPago'";
        
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
