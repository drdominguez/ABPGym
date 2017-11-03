
<?php 
    session_start(); //solicito trabajar con la session

    include '../Model/notificacion_Model.php';

    include '../View/MESSAGE_View.php';
    include '../Functions/Authentication.php';

    if (!IsAuthenticated()){
        header('Location:../index.php');
    }
    include '../Locates/Strings_'.$_SESSION['idioma'].'.php';

    /*Generamos los includes de las diferentes vistas*/
    include '../View/notificacion_ADD_View.php';
    include '../View/notificacion_DELETE_View.php';
    include '../View/notificacion_EDIT_View.php';
    include '../View/notificacion_SEARCH_View.php';
    include '../View/notificacion_SHOWCURRENT_View.php';
    include '../View/notificacion_SHOWALL_View.php';

    function get_data_form(){

    //Recoge la información del formulario

                $idNotificacion = $_REQUEST['idNotificacion'];

         
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
                    $notificacion = new notificacion_Model($_REQUEST['idNotificacion'], $_REQUEST['id'],'','','');
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
                $notificacion = new notificacion_Model($_REQUEST['idNotificacion'], $_REQUEST['id'],'','','');
                $valores = $notificacion->RellenaDatos();
                new notificacion_SHOWCURRENT($valores);
                break;
        case 'EDIT': //Modificación de actividades
if (!$_POST){
                    $notificacion = new notificacion_Model($_REQUEST['idNotificacion'], $_REQUEST['id'],'','','');
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
