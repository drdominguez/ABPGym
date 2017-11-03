
<?php 
    session_start(); //solicito trabajar con la session

    include '../Model/sesionentrenamiento_tabla_Model.php';

    include '../View/MESSAGE_View.php';
    include '../Functions/Authentication.php';

    if (!IsAuthenticated()){
        header('Location:../index.php');
    }
    include '../Locates/Strings_'.$_SESSION['idioma'].'.php';

    /*Generamos los includes de las diferentes vistas*/
    include '../View/sesionentrenamiento_tabla_ADD_View.php';
    include '../View/sesionentrenamiento_tabla_DELETE_View.php';
    include '../View/sesionentrenamiento_tabla_EDIT_View.php';
    include '../View/sesionentrenamiento_tabla_SEARCH_View.php';
    include '../View/sesionentrenamiento_tabla_SHOWCURRENT_View.php';
    include '../View/sesionentrenamiento_tabla_SHOWALL_View.php';

    function get_data_form(){

    //Recoge la información del formulario

                $idSesionEntrenamiento = $_REQUEST['idSesionEntrenamiento'];

         
                $idTabla = $_REQUEST['idTabla'];

         $accion = $_REQUEST['action'];

    $sesionentrenamiento_tabla = new sesionentrenamiento_tabla_Model($idSesionEntrenamiento,$idTabla);

    return $sesionentrenamiento_tabla;
}

if (!isset($_REQUEST['action'])){
    $_REQUEST['action'] = '';
}
    
    /*A continuación creamos el switch con el cual podremos gestionar las peticiones de ADD, DELETE, EDIT...*/
    switch ($_REQUEST['action']) {
        /*Caso añadir a la BD*/
        case 'ADD': 
                if (!$_POST){
                    new sesionentrenamiento_tabla_ADD();
                }
                else{
                    $sesionentrenamiento_tabla = get_data_form();
                    $respuesta = $sesionentrenamiento_tabla->ADD();
                    new MESSAGE($respuesta, '../Controller/sesionentrenamiento_tabla_Controller.php');
                }
                break;      
        case 'DELETE': //Borrado de actividades
           if (!$_POST){
                    $sesionentrenamiento_tabla = new sesionentrenamiento_tabla_Model($_REQUEST['idSesionEntrenamiento'], $_REQUEST['idTabla']);
                    $valores = $sesionentrenamiento_tabla->RellenaDatos();
                    new sesionentrenamiento_tabla_DELETE($valores);
                }
                else{
                    $sesionentrenamiento_tabla = get_data_form();
                    $respuesta = $sesionentrenamiento_tabla->DELETE();
                    new MESSAGE($respuesta, '../Controller/sesionentrenamiento_tabla_Controller.php');
                }
                break;
        case 'SHOWCURRENT': //Mostrar información detallada
                $sesionentrenamiento_tabla = new sesionentrenamiento_tabla_Model($_REQUEST['idSesionEntrenamiento'], $_REQUEST['idTabla']);
                $valores = $sesionentrenamiento_tabla->RellenaDatos();
                new sesionentrenamiento_tabla_SHOWCURRENT($valores);
                break;
        case 'EDIT': //Modificación de actividades
if (!$_POST){
                    $sesionentrenamiento_tabla = new sesionentrenamiento_tabla_Model($_REQUEST['idSesionEntrenamiento'], $_REQUEST['idTabla']);
                    $valores = $sesionentrenamiento_tabla->RellenaDatos();
                    new sesionentrenamiento_tabla_EDIT($valores);
                }
                else{
                    
                    $sesionentrenamiento_tabla = get_data_form();

                    $respuesta = $sesionentrenamiento_tabla->EDIT();
                    new MESSAGE($respuesta, '../Controller/sesionentrenamiento_tabla_Controller.php');
                }
                
                break;
        case 'SEARCH': //Consulta de actividades
            if (!$_POST){
                    new sesionentrenamiento_tabla_SEARCH();
                }
                else{
                    $sesionentrenamiento_tabla = get_data_form();
                    $datos = $sesionentrenamiento_tabla->SEARCH();
                     $lista = array('idSesionEntrenamiento','idTabla');
                    new sesionentrenamiento_tabla_SHOWALL($lista, $datos, '../index.php');
                }
                break;
        default:
           if (!$_POST){
                    $sesionentrenamiento_tabla = new sesionentrenamiento_tabla_Model('','');
                }
                else{
                    $sesionentrenamiento_tabla = get_data_form();
                }
                $datos = $sesionentrenamiento_tabla->SEARCH();
                $lista = array('idSesionEntrenamiento','idTabla');
                new sesionentrenamiento_tabla_SHOWALL($lista, $datos,'../Controller/sesionentrenamiento_tabla_Controller.php' );

            }

    

?>
