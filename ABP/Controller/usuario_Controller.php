<meta http-equiv="Content-Type" content="text/html"; charset="utf-8"/> 

<?php 
    session_start(); //solicito trabajar con la session

    include '../Model/usuario_Model.php';

    include '../View/MESSAGE_View.php';
    include '../Functions/Authentication.php';

    if (!IsAuthenticated()){
        header('Location:../index.php');
    }
   //Carga el idioma guardado en la variable de sesión o el Español por defecto

  if(isset($_SESSION['lang'])){
        if(strcmp($_SESSION['lang'],'ENGLISH')==0)
            include("../Locates/Strings_ENGLISH.php"); 
        else if(strcmp($_SESSION['lang'],'SPANISH')==0)
            include("../Locates/Strings_SPANISH.php");
        else if(strcmp($_SESSION['lang'], 'GALICIAN')==0)
        include("../Locates/Strings_GALICIAN.php"); 
    }else{
        include("../Locates/Strings_GALICIAN.php"); 
    }
    /*Generamos los includes de las diferentes vistas*/
    include '../View/usuario_ADD_View.php';
    include '../View/usuario_DELETE_View.php';
    include '../View/usuario_EDIT_View.php';
    include '../View/usuario_SHOWCURRENT_View.php';
    include '../View/usuario_SHOWALL_View.php';

    function get_data_form(){

    //Recoge la informaciÃ³n del formulario

                $dni = $_REQUEST['dni'];

         
                $nombre = $_REQUEST['nombre'];

         
                $apellidos = $_REQUEST['apellidos'];

         
                $edad = $_REQUEST['edad'];

         
                $contraseña = $_REQUEST['contrasena'];

         
                $email = $_REQUEST['email'];

         
                $telefono = $_REQUEST['telefono'];

         
                $fechaAlta = date("Y-m-d");


         $accion = $_REQUEST['action'];

    $usuario = new usuario_Model($dni,$nombre,$apellidos,$edad,$contraseña,$email,$telefono,$fechaAlta);

    return $usuario;
}

if (!isset($_REQUEST['action'])){
    $_REQUEST['action'] = '';
}
    
    /*A continuaciÃ³n creamos el switch con el cual podremos gestionar las peticiones de ADD, DELETE, EDIT...*/
    switch ($_REQUEST['action']) {
        /*Caso aÃ±adir a la BD*/
        case 'ADD': 
                if (!$_POST){
                    new usuario_ADD();
                }
                else{
                    $usuario = get_data_form();
                    $respuesta = $usuario->ADD();
                    new MESSAGE($respuesta, '../Controller/usuario_Controller.php');
                }
                break;      
        case 'DELETE': //Borrado de actividades
           if (!$_POST){
                    $usuario = new usuario_Model($_REQUEST['dni'],'','','','','','','');
                    $valores = $usuario->RellenaDatos2();
                    new usuario_DELETE($valores);
                }
                else{
                    $usuario = get_data_form();
                    $respuesta = $usuario->DELETE();
                    new MESSAGE($respuesta, '../Controller/usuario_Controller.php');
                }
                break;
        case 'SHOWCURRENT': //Mostrar informaciÃ³n detallada
                $usuario = new usuario_Model($_REQUEST['dni'],'','','','','','','');
                $valores = $usuario->RellenaDatos2();
                new usuario_SHOWCURRENT($valores);
                break;
        case 'EDIT': //ModificaciÃ³n de actividades
if (!$_POST){
                    $usuario = new usuario_Model($_REQUEST['dni'],'','','','','','','');
                    $valores = $usuario->RellenaDatos2();
                    new usuario_EDIT($valores);
                }
                else{
                    
                    $usuario = get_data_form();

                    $respuesta = $usuario->EDIT();
                    new MESSAGE($respuesta, '../Controller/usuario_Controller.php');
                }
                
                break;
        default:
           if (!$_POST){
                    $usuario = new usuario_Model('','','','','','','','');
                }
                else{
                    $usuario = get_data_form();
                }
                $datos = $usuario->SEARCH();
                $lista = array('dni','nombre','apellidos','email');
                new usuario_SHOWALL($lista, $datos,'../Controller/usuario_Controller.php' );

            }

    

?>
