
<?php 
    session_start(); //solicito trabajar con la session

    include '../model/individual_Model.php';

    include '../view/MESSAGE_View.php';
    include '../Functions/Authentication.php';

    if (!IsAuthenticated()){
        header('Location:../index.php');
    }
    include '../locates/Strings_'.$_SESSION['idioma'].'.php';

    /*Generamos los includes de las diferentes vistas*/
    include '../view/individual_ADD_View.php';
    include '../view/individual_DELETE_View.php';
    include '../view/individual_EDIT_View.php';
    include '../view/individual_SEARCH_View.php';
    include '../view/individual_SHOWCURRENT_View.php';
    include '../view/individual_SHOWALL_View.php';

    function get_data_form(){

    //Recoge la información del formulario

                $idActividad = $_REQUEST['idActividad'];

         $accion = $_REQUEST['action'];

    $individual = new individual_Model($idActividad);

    return $individual;
}

if (!isset($_REQUEST['action'])){
    $_REQUEST['action'] = '';
}
    
    /*A continuación creamos el switch con el cual podremos gestionar las peticiones de ADD, DELETE, EDIT...*/
    switch ($_REQUEST['action']) {
        /*Caso añadir a la BD*/
        case 'ADD': 
                if (!$_POST){
                    new individual_ADD();
                }
                else{
                    $individual = get_data_form();
                    $respuesta = $individual->ADD();
                    new MESSAGE($respuesta, '../controller/individual_Controller.php');
                }
                break;      
        case 'DELETE': //Borrado de actividades
           if (!$_POST){
                    $individual = new individual_Model($_REQUEST['idActividad']);
                    $valores = $individual->RellenaDatos();
                    new individual_DELETE($valores);
                }
                else{
                    $individual = get_data_form();
                    $respuesta = $individual->DELETE();
                    new MESSAGE($respuesta, '../controller/individual_Controller.php');
                }
                break;
        case 'SHOWCURRENT': //Mostrar información detallada
                $individual = new individual_Model($_REQUEST['idActividad']);
                $valores = $individual->RellenaDatos();
                new individual_SHOWCURRENT($valores);
                break;
        case 'EDIT': //Modificación de actividades
if (!$_POST){
                    $individual = new individual_Model($_REQUEST['idActividad']);
                    $valores = $individual->RellenaDatos();
                    new individual_EDIT($valores);
                }
                else{
                    
                    $individual = get_data_form();

                    $respuesta = $individual->EDIT();
                    new MESSAGE($respuesta, '../controller/individual_Controller.php');
                }
                
                break;
        case 'SEARCH': //Consulta de actividades
            if (!$_POST){
                    new individual_SEARCH();
                }
                else{
                    $individual = get_data_form();
                    $datos = $individual->SEARCH();
                     $lista = array('idActividad');
                    new individual_SHOWALL($lista, $datos, '../index.php');
                }
                break;
        default:
           if (!$_POST){
                    $individual = new individual_Model('');
                }
                else{
                    $individual = get_data_form();
                }
                $datos = $individual->SEARCH();
                $lista = array('idActividad');
                new individual_SHOWALL($lista, $datos,'../controller/individual_Controller.php' );

            }

    

?>
