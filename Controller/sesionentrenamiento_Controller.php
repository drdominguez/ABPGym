
<?php 
    session_start(); //solicito trabajar con la session

    include '../Model/sesionentrenamiento_Model.php';

    include '../View/MESSAGE_View.php';
    include '../Functions/Authentication.php';

    if (!IsAuthenticated()){
        header('Location:../index.php');
    }
    include '../Locates/Strings_'.$_SESSION['idioma'].'.php';

    /*Generamos los includes de las diferentes vistas*/
    include '../View/sesionentrenamiento_ADD_View.php';
    include '../View/sesionentrenamiento_DELETE_View.php';
    include '../View/sesionentrenamiento_EDIT_View.php';
    include '../View/sesionentrenamiento_SEARCH_View.php';
    include '../View/sesionentrenamiento_SHOWCURRENT_View.php';
    include '../View/sesionentrenamiento_SHOWALL_View.php';

    function get_data_form(){

    //Recoge la información del formulario

                $idSesionEntrenamiento = $_REQUEST['idSesionEntrenamiento'];

         
                $idActividad = $_REQUEST['idActividad'];

         
                $comentario = $_REQUEST['comentario'];

         
                $duracion = $_REQUEST['duracion'];

         
                $fecha = $_REQUEST['fecha'];

         $accion = $_REQUEST['action'];

    $sesionentrenamiento = new sesionentrenamiento_Model($idSesionEntrenamiento,$idActividad,$comentario,$duracion,$fecha);

    return $sesionentrenamiento;
}

if (!isset($_REQUEST['action'])){
    $_REQUEST['action'] = '';
}
    
    /*A continuación creamos el switch con el cual podremos gestionar las peticiones de ADD, DELETE, EDIT...*/
    switch ($_REQUEST['action']) {
        /*Caso añadir a la BD*/
        case 'ADD': 
                if (!$_POST){
                    new sesionentrenamiento_ADD();
                }
                else{
                    $sesionentrenamiento = get_data_form();
                    $respuesta = $sesionentrenamiento->ADD();
                    new MESSAGE($respuesta, '../Controller/sesionentrenamiento_Controller.php');
                }
                break;      
        case 'DELETE': //Borrado de actividades
           if (!$_POST){
                    $sesionentrenamiento = new sesionentrenamiento_Model($_REQUEST['idSesionEntrenamiento'],'','','','');
                    $valores = $sesionentrenamiento->RellenaDatos();
                    new sesionentrenamiento_DELETE($valores);
                }
                else{
                    $sesionentrenamiento = get_data_form();
                    $respuesta = $sesionentrenamiento->DELETE();
                    new MESSAGE($respuesta, '../Controller/sesionentrenamiento_Controller.php');
                }
                break;
        case 'SHOWCURRENT': //Mostrar información detallada
                $sesionentrenamiento = new sesionentrenamiento_Model($_REQUEST['idSesionEntrenamiento'],'','','','');
                $valores = $sesionentrenamiento->RellenaDatos();
                new sesionentrenamiento_SHOWCURRENT($valores);
                break;
        case 'EDIT': //Modificación de actividades
if (!$_POST){
                    $sesionentrenamiento = new sesionentrenamiento_Model($_REQUEST['idSesionEntrenamiento'],'','','','');
                    $valores = $sesionentrenamiento->RellenaDatos();
                    new sesionentrenamiento_EDIT($valores);
                }
                else{
                    
                    $sesionentrenamiento = get_data_form();

                    $respuesta = $sesionentrenamiento->EDIT();
                    new MESSAGE($respuesta, '../Controller/sesionentrenamiento_Controller.php');
                }
                
                break;
        case 'SEARCH': //Consulta de actividades
            if (!$_POST){
                    new sesionentrenamiento_SEARCH();
                }
                else{
                    $sesionentrenamiento = get_data_form();
                    $datos = $sesionentrenamiento->SEARCH();
                     $lista = array('idSesionEntrenamiento','idActividad','comentario','duracion','fecha');
                    new sesionentrenamiento_SHOWALL($lista, $datos, '../index.php');
                }
                break;
        default:
           if (!$_POST){
                    $sesionentrenamiento = new sesionentrenamiento_Model('','','','','');
                }
                else{
                    $sesionentrenamiento = get_data_form();
                }
                $datos = $sesionentrenamiento->SEARCH();
                $lista = array('idSesionEntrenamiento','idActividad','comentario','duracion','fecha');
                new sesionentrenamiento_SHOWALL($lista, $datos,'../Controller/sesionentrenamiento_Controller.php' );

            }

    

?>
