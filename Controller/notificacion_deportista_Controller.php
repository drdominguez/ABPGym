
<?php 
    session_start(); //solicito trabajar con la session

    include '../Model/notificacion_deportista_Model.php';

    include '../View/MESSAGE_View.php';
    include '../Functions/Authentication.php';

    if (!IsAuthenticated()){
        header('Location:../index.php');
    }
    include '../Locates/Strings_'.$_SESSION['idioma'].'.php';

    /*Generamos los includes de las diferentes vistas*/
    include '../View/notificacion_deportista_ADD_View.php';
    include '../View/notificacion_deportista_DELETE_View.php';
    include '../View/notificacion_deportista_EDIT_View.php';
    include '../View/notificacion_deportista_SEARCH_View.php';
    include '../View/notificacion_deportista_SHOWCURRENT_View.php';
    include '../View/notificacion_deportista_SHOWALL_View.php';

    function get_data_form(){

    //Recoge la información del formulario

                $dniAdministrador = $_REQUEST['dniAdministrador'];

         
                $dniDeportista = $_REQUEST['dniDeportista'];

         $accion = $_REQUEST['action'];

    $notificacion_deportista = new notificacion_deportista_Model($dniAdministrador,$dniDeportista);

    return $notificacion_deportista;
}

if (!isset($_REQUEST['action'])){
    $_REQUEST['action'] = '';
}
    
    /*A continuación creamos el switch con el cual podremos gestionar las peticiones de ADD, DELETE, EDIT...*/
    switch ($_REQUEST['action']) {
        /*Caso añadir a la BD*/
        case 'ADD': 
                if (!$_POST){
                    new notificacion_deportista_ADD();
                }
                else{
                    $notificacion_deportista = get_data_form();
                    $respuesta = $notificacion_deportista->ADD();
                    new MESSAGE($respuesta, '../Controller/notificacion_deportista_Controller.php');
                }
                break;      
        case 'DELETE': //Borrado de actividades
           if (!$_POST){
                    $notificacion_deportista = new notificacion_deportista_Model($_REQUEST['dniAdministrador'], $_REQUEST['dniDeportista']);
                    $valores = $notificacion_deportista->RellenaDatos();
                    new notificacion_deportista_DELETE($valores);
                }
                else{
                    $notificacion_deportista = get_data_form();
                    $respuesta = $notificacion_deportista->DELETE();
                    new MESSAGE($respuesta, '../Controller/notificacion_deportista_Controller.php');
                }
                break;
        case 'SHOWCURRENT': //Mostrar información detallada
                $notificacion_deportista = new notificacion_deportista_Model($_REQUEST['dniAdministrador'], $_REQUEST['dniDeportista']);
                $valores = $notificacion_deportista->RellenaDatos();
                new notificacion_deportista_SHOWCURRENT($valores);
                break;
        case 'EDIT': //Modificación de actividades
if (!$_POST){
                    $notificacion_deportista = new notificacion_deportista_Model($_REQUEST['dniAdministrador'], $_REQUEST['dniDeportista']);
                    $valores = $notificacion_deportista->RellenaDatos();
                    new notificacion_deportista_EDIT($valores);
                }
                else{
                    
                    $notificacion_deportista = get_data_form();

                    $respuesta = $notificacion_deportista->EDIT();
                    new MESSAGE($respuesta, '../Controller/notificacion_deportista_Controller.php');
                }
                
                break;
        case 'SEARCH': //Consulta de actividades
            if (!$_POST){
                    new notificacion_deportista_SEARCH();
                }
                else{
                    $notificacion_deportista = get_data_form();
                    $datos = $notificacion_deportista->SEARCH();
                     $lista = array('dniAdministrador','dniDeportista');
                    new notificacion_deportista_SHOWALL($lista, $datos, '../index.php');
                }
                break;
        default:
           if (!$_POST){
                    $notificacion_deportista = new notificacion_deportista_Model('','');
                }
                else{
                    $notificacion_deportista = get_data_form();
                }
                $datos = $notificacion_deportista->SEARCH();
                $lista = array('dniAdministrador','dniDeportista');
                new notificacion_deportista_SHOWALL($lista, $datos,'../Controller/notificacion_deportista_Controller.php' );

            }

    

?>
