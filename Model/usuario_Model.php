<?php


class usuario_Model
{
        //Definimos las variables
            var $dni;
            var $nombre;
            var $apellidos;
            var $edad;
            var $contrase馻;
            var $email;
            var $telefono;
            var $fechaAlta;

        function __construct($dni,$nombre,$apellidos,$edad,$contrase馻,$email,$telefono,$fechaAlta){

        include_once '../Locates/Strings_'.$_SESSION['idioma'].'.php';
            $this->dni = $dni;
            $this->nombre = $nombre;
            $this->apellidos = $apellidos;
            $this->edad = $edad;
            $this->contrase馻 = $contrase馻;
            $this->email = $email;
            $this->telefono = $telefono;//Comprobamos si es un atributo de tipo fecha o no 
                if($fechaAlta == ''){
                           $this->fechaAlta = $fechaAlta;
                }else{

                       $this->fechaAlta = date_format(date_create($fechaAlta), 'Y-m-d');
                            
                        
                }    
    include_once 'Access_DB.php';
    $this->mysqli = ConnectDB();


}


    //Anadir
    function ADD()
    {
        
     
        $sql = "SELECT * FROM usuario WHERE dni= '$this->dni'";

        if (!$result = $this->mysqli->query($sql)){
            return 'No se ha podido conectar con la base de datos'; // error en la consulta (no se ha podido conectar con la bd
        }
        else {
            if ($result->num_rows == 0){
                
                $sql = "INSERT INTO usuario (
                        dni,
                        nombre,
                        apellidos,
                        edad,
                        contrase馻,
                        email,
                        telefono,
                        fechaAlta) 
                        VALUES (
                        '$this->dni',
                        '$this->nombre',
                        '$this->apellidos',
                        '$this->edad',
                        '$this->contrase馻',
                        '$this->email',
                        '$this->telefono',
                        '$this->fechaAlta')";
                
                if (!$this->mysqli->query($sql)) {
                    return 'Error en la inserci贸n';
                }
                else{
                    return 'Inserci贸n realizada con 茅xito'; //operacion de insertado correcta
                }
                
            }
            else
                return 'Ya existe en la base de datos'; // ya existe
        
    }
}

//funcion de destrucci贸n del objeto: se ejecuta automaticamente
//al finalizar el script
function __destruct()
{

}

   //funcion Consultar: hace una b煤squeda en la tabla con
//los datos proporcionados. Si van vacios devuelve todos
function SEARCH()
{
    
    $sql = "select 
                        dni,
                        nombre,
                        apellidos,
                        edad,
                        contrase馻,
                        email,
                        telefono,
                        fechaAlta
                from usuario 
                where 
                    ((
                        dni LIKE '%$this->dni%')&&
                         (nombre LIKE '%$this->nombre%')&&
                         (apellidos LIKE '%$this->apellidos%')&&
                         (edad LIKE '%$this->edad%')&&
                         (contrase馻 LIKE '%$this->contrase馻%')&&
                         (email LIKE '%$this->email%')&&
                         (telefono LIKE '%$this->telefono%')&&
                         (fechaAlta LIKE '%$this->fechaAlta%'))";
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
    
    $sql = "SELECT * FROM usuario WHERE dni= '$this->dni'";
    $result = $this->mysqli->query($sql);
    if ($result->num_rows == 1)
    {
        $sql = "DELETE FROM usuario WHERE dni= '$this->dni'";
        $this->mysqli->query($sql);
        return "Borrado correctamente";
    }
    else
        return "No existe en la base de datos";
}
//Funcion obtener datos de una tabla de la bd
function RellenaDatos()
{
    
    $sql = "SELECT * FROM usuario WHERE dni = '$this->dni'";
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


    $sql = "SELECT * FROM usuario WHERE dni= '$this->dni'";
    

    $result = $this->mysqli->query($sql);
    
    if ($result->num_rows == 1)
    {
        $sql = "UPDATE usuario SET dni = '$this->dni',nombre = '$this->nombre',apellidos = '$this->apellidos',edad = '$this->edad',contrase馻 = '$this->contrase馻',email = '$this->email',telefono = '$this->telefono',fechaAlta = '$this->fechaAlta' WHERE dni= '$this->dni'";
        
        if (!($resultado = $this->mysqli->query($sql))){
            return 'Error en la modificaci贸n'; 
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
