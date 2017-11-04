


<?php
        
           if(isset($_SESSION['lang'])){
        if(strcmp($_SESSION['lang'],'ENGLISH')==0)
            include("../Locates/Strings_ENGLISH.php"); 
        else if(strcmp($_SESSION['lang'],'SPANISH')==0)
            include("../Locates/Strings_SPANISH.php"); 
    }else{
        include("../Locates/Strings_SPANISH.php"); 
    }
        if(!isset($_REQUEST['dni']) && !(isset($_REQUEST['contraseña']))){
            include '../View/Login_View.php';
            $login = new Login($mal=false);
        }else{

            include '../Model/Access_DB.php';
    /*Definimos una función que va a ser la encargada de controlar las acciones a realizar en el proceso de login*/
    function Login($login, $contraseña){

        $mysqli = ConnectDB();
        $sql = "select * from usuario where dni = '". $login ."'";//Obtenemos el usuario con el que se intenta acceder a la aplicación

        $result = $mysqli->query($sql);
        if ($result->num_rows == 1){  // existe el usuario
            $tupla = $result->fetch_array();
            $contraseñamd5=md5($contraseña);
            if ($tupla['contrasena'] == $contraseñamd5 ){ //  coinciden las contraseñas
                return true;
            }
            else{
                return 'La contraseña para este usuario es errónea'; //las contraseñas no coinciden
            }
        }
        else{
                return "El usuario no existe"; //no existe el usuario
        }

    }
    
    $respuesta = Login($_REQUEST['dni'], $_REQUEST['contraseña']);

    if ($respuesta == 'true'){ //si el login y el contraseña son correctos, iniciamos sesión y asignamos el login a la variable $_SESSION
        
        $_SESSION['login'] = $_REQUEST['dni'];
        header('Location:../index.php');
    }
    else{//Sino le mostramos un mensaje con el error
         include '../View/Login_View.php';
            $login = new Login($respuesta);
    }

}

?>