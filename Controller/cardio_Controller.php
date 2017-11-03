
<?php 
    session_start(); //solicito trabajar con la session

    include '../Model/cardio_Model.php';

    include '../View/MESSAGE_View.php';
    include '../Functions/Authentication.php';

    if (!IsAuthenticated()){
        header('Location:../index.php');
    }
    include '../Locates/Strings_'.$_SESSION['idioma'].'.php';

    /*Generamos los includes de las diferentes vistas*/
    include '../View/cardio_ADD_View.php';
    include '../View/cardio_DELETE_View.php';
    include '../View/cardio_EDIT_View.php';
    include '../View/cardio_SEARCH_View.php';
    include '../View/cardio_SHOWCURRENT_View.php';
    include '../View/cardio_SHOWALL_View.php';

    function get_data_form(){

    //Recoge la información del formulario

                $idEjercicio = $_REQUEST['idEjercicio'];

         
                $tiempo = $_REQUEST['tiempo'];

         
                $unidad = $_REQUEST['unidad'];

         
                $distancia = $_REQUEST['distancia'];

         $accion = $_REQUEST['action'];

    $cardio = new cardio_Model($idEjercicio,$tiempo,$unidad,$distancia);

    return $cardio;
}

if (!isset($_REQUEST['action'])){
    $_REQUEST['action'] = '';
}
    
    /*A continuación creamos el switch con el cual podremos gestionar las peticiones de ADD, DELETE, EDIT...*/
    switch ($_REQUEST['action']) {
        /*Caso añadir a la BD*/
        case 'ADD': 
                if (!$_POST){
                    new cardio_ADD();
                }
                else{
                    $cardio = get_data_form();
                    $respuesta = $cardio->ADD();
                    new MESSAGE($respuesta, '../Controller/cardio_Controller.php');
                }
                break;      
        case 'DELETE': //Borrado de actividades
           if (!$_POST){
                    $cardio = new cardio_Model($_REQUEST['idEjercicio'],'','','');
                    $valores = $cardio->RellenaDatos();
                    new cardio_DELETE($valores);
                }
                else{
                    $cardio = get_data_form();
                    $respuesta = $cardio->DELETE();
                    new MESSAGE($respuesta, '../Controller/cardio_Controller.php');
                }
                break;
        case 'SHOWCURRENT': //Mostrar información detallada
                $cardio = new cardio_Model($_REQUEST['idEjercicio'],'','','');
                $valores = $cardio->RellenaDatos();
                new cardio_SHOWCURRENT($valores);
                break;
        case 'EDIT': //Modificación de actividades
if (!$_POST){
                    $cardio = new cardio_Model($_REQUEST['idEjercicio'],'','','');
                    $valores = $cardio->RellenaDatos();
                    new cardio_EDIT($valores);
                }
                else{
                    
                    $cardio = get_data_form();

                    $respuesta = $cardio->EDIT();
                    new MESSAGE($respuesta, '../Controller/cardio_Controller.php');
                }
                
                break;
        case 'SEARCH': //Consulta de actividades
            if (!$_POST){
                    new cardio_SEARCH();
                }
                else{
                    $cardio = get_data_form();
                    $datos = $cardio->SEARCH();
                     $lista = array('idEjercicio','tiempo','unidad','distancia');
                    new cardio_SHOWALL($lista, $datos, '../index.php');
                }
                break;
        default:
           if (!$_POST){
                    $cardio = new cardio_Model('','','','');
                }
                else{
                    $cardio = get_data_form();
                }
                $datos = $cardio->SEARCH();
                $lista = array('idEjercicio','tiempo','unidad','distancia');
                new cardio_SHOWALL($lista, $datos,'../Controller/cardio_Controller.php' );

            }

    

?>
