<?php 
    session_start(); //solicito trabajar con la session

    include '../model/actividad_Model.php';

    include '../view/MESSAGE_View.php';
    include '../Functions/Authentication.php';

    if (!IsAuthenticated()){
        header('Location:../index.php');
    }
    include '../locates/Strings_'.$_SESSION['idioma'].'.php';

    /*Generamos los includes de las diferentes vistas*/
    include '../view/actividad_ADD_View.php';
    include '../view/actividad_DELETE_View.php';
    include '../view/actividad_EDIT_View.php';
    include '../view/actividad_SEARCH_View.php';
    include '../view/actividad_SHOWCURRENT_View.php';
    include '../view/actividad_SHOWALL_View.php';

    function get_data_form(){

    //Recoge la información del formulario

                $idActividad = $_REQUEST['idActividad'];

         
                $precio = $_REQUEST['precio'];

         $accion = $_REQUEST['action'];

    $actividad = new actividad_Model($idActividad,$precio);

    return $actividad;
}

if (!isset($_REQUEST['action'])){
    $_REQUEST['action'] = '';
}
    
    /*A continuación creamos el switch con el cual podremos gestionar las peticiones de ADD, DELETE, EDIT...*/
    switch ($_REQUEST['action']) {
        /*Caso añadir a la BD*/
        case 'ADD': 
                if (!$_POST){
                    new actividad_ADD();
                }
                else{
                    $actividad = get_data_form();
                    $respuesta = $actividad->ADD();
                    new MESSAGE($respuesta, '../controller/actividad_Controller.php');
                }
                break;      
        case 'DELETE': //Borrado de actividades
           if (!$_POST){
                    $actividad = new actividad_Model($_REQUEST['idActividad'],'');
                    $valores = $actividad->RellenaDatos();
                    new actividad_DELETE($valores);
                }
                else{
                    $actividad = get_data_form();
                    $respuesta = $actividad->DELETE();
                    new MESSAGE($respuesta, '../controller/actividad_Controller.php');
                }
                break;
        case 'SHOWCURRENT': //Mostrar información detallada
                $actividad = new actividad_Model($_REQUEST['idActividad'],'');
                $valores = $actividad->RellenaDatos();
                new actividad_SHOWCURRENT($valores);
                break;
        case 'EDIT': //Modificación de actividades
if (!$_POST){
                    $actividad = new actividad_Model($_REQUEST['idActividad'],'');
                    $valores = $actividad->RellenaDatos();
                    new actividad_EDIT($valores);
                }
                else{
                    
                    $actividad = get_data_form();

                    $respuesta = $actividad->EDIT();
                    new MESSAGE($respuesta, '../controller/actividad_Controller.php');
                }
                
                break;
        case 'SEARCH': //Consulta de actividades
            if (!$_POST){
                    new actividad_SEARCH();
                }
                else{
                    $actividad = get_data_form();
                    $datos = $actividad->SEARCH();
                     $lista = array('idActividad','precio');
                    new actividad_SHOWALL($lista, $datos, '../index.php');
                }
                break;
        default:
           if (!$_POST){
                    $actividad = new actividad_Model('','');
                }
                else{
                    $actividad = get_data_form();
                }
                $datos = $actividad->SEARCH();
                $lista = array('idActividad','precio');
                new actividad_SHOWALL($lista, $datos,'../controller/actividad_Controller.php' );

            }

    

?>
