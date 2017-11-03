
<?php
        /*Si no ha accedido a la vista registro en el paso anterior, se le muestra la pantalla de registro*/
        session_start();
        if(!isset($_POST['dni'])){
            include '../View/Register_View.php';
            $register = new Register();
        }
        else{
            /*Definimos función para conectarnos a la BD*/
            function ConnectBD(){

                include_once '../Model/config.inc';
                $mysqli = new mysqli("localhost", USER , PASS , DB);
                    
                if ($mysqli->connect_errno) {
                    include '../View/MESSAGE_View.php';
                    new MESSAGE("Error MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error, '../index.php');
                    return false;
                }
                else{
                    return $mysqli;
                }
            }
            //Creamos una función para gestionar el registro de un usuario
            function Register($login){

                $mysqli = ConnectBD();
                $sql = "select * from usuario where dni = '".$login."'";

                $result = $mysqli->query($sql);
                if ($result->num_rows == 1){  // existe el usuario
                        return 'El usuario ya existe';
                    }
                else{
                        return true; //no existe el usuario
                }

            }
            
            $respuesta = Register($_REQUEST['login']);

            /*Si el usuario cumple las condiciones para registrarse, se procede a ello.*/
            if ($respuesta == 'true'){
                
                include_once '../Locates/Strings_'.$_SESSION['idioma'].'.php';
                $_SESSION['login'] = 'nobody';
                session_destroy();
                include './usuario_Controller.php';
                $usuario = get_data_form();
                $respuesta = $usuario->ADD();
                session_start();
                Include '../View/MESSAGE_View.php';
                new MESSAGE($respuesta, '../Controller/Login_Controller.php');
                unset($_SESSION['login']);
            }
            else{//Sino mostramos la vista de error con un mensaje
                include '../View/MESSAGE_View.php';
                new MESSAGE($respuesta, '../Controller/Login_Controller.php');
            }

        }

?>

