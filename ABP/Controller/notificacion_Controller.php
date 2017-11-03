
<?php 
    session_start(); //solicito trabajar con la session

    include '../Model/notificacion_Model.php';

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
    }else{
        include("../Locates/Strings_SPANISH.php"); 
    }

    /*Generamos los includes de las diferentes vistas*/
    include '../View/notificacion_ADD_View.php';
    include '../View/notificacion_SHOWCURRENT_View.php';
    include '../View/notificacion_SHOWALL_View.php';

    function get_data_form(){

    //Recoge la información del formulario
            if(isset($_REQUEST['idNotificacion'])){
                $idNotificacion = $_REQUEST['idNotificacion'];
                 }else{
                    $idNotificacion = null;
                }

         
                $dniAdministrador = $_REQUEST['dniAdministrador'];

         
                $Asunto = $_REQUEST['Asunto'];

         
                $contenido = $_REQUEST['contenido'];

         
                $fecha = $_REQUEST['fecha'];

         $accion = $_REQUEST['action'];

    $notificacion = new notificacion_Model($idNotificacion,$dniAdministrador,$Asunto,$contenido,$fecha);

    return $notificacion;
}

if (!isset($_REQUEST['action'])){
    $_REQUEST['action'] = '';
}
    
    /*A continuación creamos el switch con el cual podremos gestionar las peticiones de ADD, DELETE, EDIT...*/
    switch ($_REQUEST['action']) {
        /*Caso añadir a la BD*/
        case 'ADD': 
                if (!$_POST){
                    new notificacion_ADD();
                }
                else{
                    $notificacion = get_data_form();
                    $respuesta = $notificacion->ADD();
                    new MESSAGE($respuesta, '../Controller/notificacion_Controller.php');
                }
                break;      
        case 'DELETE': //Borrado de actividades
           if (!$_POST){
                    $notificacion = new notificacion_Model($_REQUEST['idNotificacion'],'','','','');
                    $valores = $notificacion->RellenaDatos();
                    new notificacion_DELETE($valores);
                }
                else{
                    $notificacion = get_data_form();
                    $respuesta = $notificacion->DELETE();
                    new MESSAGE($respuesta, '../Controller/notificacion_Controller.php');
                }
                break;
        case 'SHOWCURRENT': //Mostrar información detallada
                $notificacion = new notificacion_Model($_REQUEST['idNotificacion'], '','','','');
                $valores = $notificacion->selectNotificacion();
                $usuario=$_REQUEST['dni'];
                new notificacion_SHOWCURRENT($valores,$usuario);
                if(strcmp(strtoupper($_SESSION['login']), strtoupper($usuario))==0){
                $notificacion->notificacionVista($usuario);
                }
                break;
        case 'EDIT': //Modificación de actividades
if (!$_POST){
                    $notificacion = new notificacion_Model($_REQUEST['idNotificacion'], '','','','');
                    $valores = $notificacion->RellenaDatos();
                    new notificacion_EDIT($valores);
                }
                else{
                    
                    $notificacion = get_data_form();

                    $respuesta = $notificacion->EDIT();
                    new MESSAGE($respuesta, '../Controller/notificacion_Controller.php');
                }
                
                break;
        case 'SEARCH': //Consulta de actividades
            if (!$_POST){
                    new notificacion_SEARCH();
                }
                else{
                    $notificacion = get_data_form();
                    $datos = $notificacion->SEARCH();
                     $lista = array('idNotificacion','dniAdministrador','Asunto','contenido','fecha');
                    new notificacion_SHOWALL($lista, $datos, '../index.php');
                }
                break;
        default:
           if (!$_POST){
                    $notificacion = new notificacion_Model('','','','','');
                }
                else{
                    $notificacion = get_data_form();
                }
                $datos = $notificacion->SEARCH();
                $lista = array('idNotificacion','dniAdministrador','Asunto','contenido','fecha');
                new notificacion_SHOWALL($lista, $datos,'../Controller/notificacion_Controller.php' );

            }

    

?>
