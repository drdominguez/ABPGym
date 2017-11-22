
<?php 
    session_start(); //solicito trabajar con la session

    include '../model/entrenador_Model.php';

    include '../view/MESSAGE_View.php';
    include '../Functions/Authentication.php';

    if (!IsAuthenticated()){
        header('Location:../index.php');
    }
    include '../locates/Strings_'.$_SESSION['idioma'].'.php';

    /*Generamos los includes de las diferentes vistas*/
    include '../view/entrenador_ADD_View.php';
    include '../view/entrenador_DELETE_View.php';
    include '../view/entrenador_EDIT_View.php';
    include '../view/entrenador_SEARCH_View.php';
    include '../view/entrenador_SHOWCURRENT_View.php';
    include '../view/entrenador_SHOWALL_View.php';

    function get_data_form(){

    //Recoge la información del formulario

                $dniEntrenador = $_REQUEST['dniEntrenador'];

         $accion = $_REQUEST['action'];

    $entrenador = new entrenador_Model($dniEntrenador);

    return $entrenador;
}

if (!isset($_REQUEST['action'])){
    $_REQUEST['action'] = '';
}
    
    /*A continuación creamos el switch con el cual podremos gestionar las peticiones de ADD, DELETE, EDIT...*/
    switch ($_REQUEST['action']) {
        /*Caso añadir a la BD*/
        case 'ADD': 
                if (!$_POST){
                    new entrenador_ADD();
                }
                else{
                    $entrenador = get_data_form();
                    $respuesta = $entrenador->ADD();
                    new MESSAGE($respuesta, '../controller/entrenador_Controller.php');
                }
                break;      
        case 'DELETE': //Borrado de actividades
           if (!$_POST){
                    $entrenador = new entrenador_Model($_REQUEST['dniEntrenador']);
                    $valores = $entrenador->RellenaDatos();
                    new entrenador_DELETE($valores);
                }
                else{
                    $entrenador = get_data_form();
                    $respuesta = $entrenador->DELETE();
                    new MESSAGE($respuesta, '../controller/entrenador_Controller.php');
                }
                break;
        case 'SHOWCURRENT': //Mostrar información detallada
                $entrenador = new entrenador_Model($_REQUEST['dniEntrenador']);
                $valores = $entrenador->RellenaDatos();
                new entrenador_SHOWCURRENT($valores);
                break;
        case 'EDIT': //Modificación de actividades
if (!$_POST){
                    $entrenador = new entrenador_Model($_REQUEST['dniEntrenador']);
                    $valores = $entrenador->RellenaDatos();
                    new entrenador_EDIT($valores);
                }
                else{
                    
                    $entrenador = get_data_form();

                    $respuesta = $entrenador->EDIT();
                    new MESSAGE($respuesta, '../controller/entrenador_Controller.php');
                }
                
                break;
        case 'SEARCH': //Consulta de actividades
            if (!$_POST){
                    new entrenador_SEARCH();
                }
                else{
                    $entrenador = get_data_form();
                    $datos = $entrenador->SEARCH();
                     $lista = array('dniEntrenador');
                    new entrenador_SHOWALL($lista, $datos, '../index.php');
                }
                break;
        default:
           if (!$_POST){
                    $entrenador = new entrenador_Model('');
                }
                else{
                    $entrenador = get_data_form();
                }
                $datos = $entrenador->SEARCH();
                $lista = array('dniEntrenador');
                new entrenador_SHOWALL($lista, $datos,'../controller/entrenador_Controller.php' );

            }

    

?>
