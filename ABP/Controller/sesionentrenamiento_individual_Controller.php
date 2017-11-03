
<?php 
    session_start(); //solicito trabajar con la session

    include '../Model/sesionentrenamiento_individual_Model.php';

    include '../View/MESSAGE_View.php';
    include '../Functions/Authentication.php';

    if (!IsAuthenticated()){
        header('Location:../index.php');
    }
    include '../Locates/Strings_'.$_SESSION['idioma'].'.php';

    /*Generamos los includes de las diferentes vistas*/
    include '../View/sesionentrenamiento_individual_ADD_View.php';
    include '../View/sesionentrenamiento_individual_DELETE_View.php';
    include '../View/sesionentrenamiento_individual_EDIT_View.php';
    include '../View/sesionentrenamiento_individual_SEARCH_View.php';
    include '../View/sesionentrenamiento_individual_SHOWCURRENT_View.php';
    include '../View/sesionentrenamiento_individual_SHOWALL_View.php';

    function get_data_form(){

    //Recoge la información del formulario

                $idActividad = $_REQUEST['idActividad'];

         
                $idSesionEntrenamiento = $_REQUEST['idSesionEntrenamiento'];

         $accion = $_REQUEST['action'];

    $sesionentrenamiento_individual = new sesionentrenamiento_individual_Model($idActividad,$idSesionEntrenamiento);

    return $sesionentrenamiento_individual;
}

if (!isset($_REQUEST['action'])){
    $_REQUEST['action'] = '';
}
    
    /*A continuación creamos el switch con el cual podremos gestionar las peticiones de ADD, DELETE, EDIT...*/
    switch ($_REQUEST['action']) {
        /*Caso añadir a la BD*/
        case 'ADD': 
                if (!$_POST){
                    new sesionentrenamiento_individual_ADD();
                }
                else{
                    $sesionentrenamiento_individual = get_data_form();
                    $respuesta = $sesionentrenamiento_individual->ADD();
                    new MESSAGE($respuesta, '../Controller/sesionentrenamiento_individual_Controller.php');
                }
                break;      
        case 'DELETE': //Borrado de actividades
           if (!$_POST){
                    $sesionentrenamiento_individual = new sesionentrenamiento_individual_Model($_REQUEST['idActividad'], $_REQUEST['idSesionEntrenamiento']);
                    $valores = $sesionentrenamiento_individual->RellenaDatos();
                    new sesionentrenamiento_individual_DELETE($valores);
                }
                else{
                    $sesionentrenamiento_individual = get_data_form();
                    $respuesta = $sesionentrenamiento_individual->DELETE();
                    new MESSAGE($respuesta, '../Controller/sesionentrenamiento_individual_Controller.php');
                }
                break;
        case 'SHOWCURRENT': //Mostrar información detallada
                $sesionentrenamiento_individual = new sesionentrenamiento_individual_Model($_REQUEST['idActividad'], $_REQUEST['idSesionEntrenamiento']);
                $valores = $sesionentrenamiento_individual->RellenaDatos();
                new sesionentrenamiento_individual_SHOWCURRENT($valores);
                break;
        case 'EDIT': //Modificación de actividades
if (!$_POST){
                    $sesionentrenamiento_individual = new sesionentrenamiento_individual_Model($_REQUEST['idActividad'], $_REQUEST['idSesionEntrenamiento']);
                    $valores = $sesionentrenamiento_individual->RellenaDatos();
                    new sesionentrenamiento_individual_EDIT($valores);
                }
                else{
                    
                    $sesionentrenamiento_individual = get_data_form();

                    $respuesta = $sesionentrenamiento_individual->EDIT();
                    new MESSAGE($respuesta, '../Controller/sesionentrenamiento_individual_Controller.php');
                }
                
                break;
        case 'SEARCH': //Consulta de actividades
            if (!$_POST){
                    new sesionentrenamiento_individual_SEARCH();
                }
                else{
                    $sesionentrenamiento_individual = get_data_form();
                    $datos = $sesionentrenamiento_individual->SEARCH();
                     $lista = array('idActividad','idSesionEntrenamiento');
                    new sesionentrenamiento_individual_SHOWALL($lista, $datos, '../index.php');
                }
                break;
        default:
           if (!$_POST){
                    $sesionentrenamiento_individual = new sesionentrenamiento_individual_Model('','');
                }
                else{
                    $sesionentrenamiento_individual = get_data_form();
                }
                $datos = $sesionentrenamiento_individual->SEARCH();
                $lista = array('idActividad','idSesionEntrenamiento');
                new sesionentrenamiento_individual_SHOWALL($lista, $datos,'../Controller/sesionentrenamiento_individual_Controller.php' );

            }

    

?>
