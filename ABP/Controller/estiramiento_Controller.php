
<?php 
    session_start(); //solicito trabajar con la session

    include '../Model/estiramiento_Model.php';

    include '../View/MESSAGE_View.php';
    include '../Functions/Authentication.php';

    if (!IsAuthenticated()){
        header('Location:../index.php');
    }
    include '../Locates/Strings_'.$_SESSION['idioma'].'.php';

    /*Generamos los includes de las diferentes vistas*/
    include '../View/estiramiento_ADD_View.php';
    include '../View/estiramiento_DELETE_View.php';
    include '../View/estiramiento_EDIT_View.php';
    include '../View/estiramiento_SEARCH_View.php';
    include '../View/estiramiento_SHOWCURRENT_View.php';
    include '../View/estiramiento_SHOWALL_View.php';

    function get_data_form(){

    //Recoge la información del formulario

                $idEjercicio = $_REQUEST['idEjercicio'];

         
                $tiempo = $_REQUEST['tiempo'];

         
                $unidad = $_REQUEST['unidad'];

         
                $distancia = $_REQUEST['distancia'];

         $accion = $_REQUEST['action'];

    $estiramiento = new estiramiento_Model($idEjercicio,$tiempo,$unidad,$distancia);

    return $estiramiento;
}

if (!isset($_REQUEST['action'])){
    $_REQUEST['action'] = '';
}
    
    /*A continuación creamos el switch con el cual podremos gestionar las peticiones de ADD, DELETE, EDIT...*/
    switch ($_REQUEST['action']) {
        /*Caso añadir a la BD*/
        case 'ADD': 
                if (!$_POST){
                    new estiramiento_ADD();
                }
                else{
                    $estiramiento = get_data_form();
                    $respuesta = $estiramiento->ADD();
                    new MESSAGE($respuesta, '../Controller/estiramiento_Controller.php');
                }
                break;      
        case 'DELETE': //Borrado de actividades
           if (!$_POST){
                    $estiramiento = new estiramiento_Model($_REQUEST['idEjercicio'],'','','');
                    $valores = $estiramiento->RellenaDatos();
                    new estiramiento_DELETE($valores);
                }
                else{
                    $estiramiento = get_data_form();
                    $respuesta = $estiramiento->DELETE();
                    new MESSAGE($respuesta, '../Controller/estiramiento_Controller.php');
                }
                break;
        case 'SHOWCURRENT': //Mostrar información detallada
                $estiramiento = new estiramiento_Model($_REQUEST['idEjercicio'],'','','');
                $valores = $estiramiento->RellenaDatos();
                new estiramiento_SHOWCURRENT($valores);
                break;
        case 'EDIT': //Modificación de actividades
if (!$_POST){
                    $estiramiento = new estiramiento_Model($_REQUEST['idEjercicio'],'','','');
                    $valores = $estiramiento->RellenaDatos();
                    new estiramiento_EDIT($valores);
                }
                else{
                    
                    $estiramiento = get_data_form();

                    $respuesta = $estiramiento->EDIT();
                    new MESSAGE($respuesta, '../Controller/estiramiento_Controller.php');
                }
                
                break;
        case 'SEARCH': //Consulta de actividades
            if (!$_POST){
                    new estiramiento_SEARCH();
                }
                else{
                    $estiramiento = get_data_form();
                    $datos = $estiramiento->SEARCH();
                     $lista = array('idEjercicio','tiempo','unidad','distancia');
                    new estiramiento_SHOWALL($lista, $datos, '../index.php');
                }
                break;
        default:
           if (!$_POST){
                    $estiramiento = new estiramiento_Model('','','','');
                }
                else{
                    $estiramiento = get_data_form();
                }
                $datos = $estiramiento->SEARCH();
                $lista = array('idEjercicio','tiempo','unidad','distancia');
                new estiramiento_SHOWALL($lista, $datos,'../Controller/estiramiento_Controller.php' );

            }

    

?>
