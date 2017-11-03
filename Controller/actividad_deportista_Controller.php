
<?php 
    session_start(); //solicito trabajar con la session

    include '../Model/actividad_deportista_Model.php';

    include '../View/MESSAGE_View.php';
    include '../Functions/Authentication.php';

    if (!IsAuthenticated()){
        header('Location:../index.php');
    }
    include '../Locates/Strings_'.$_SESSION['idioma'].'.php';

    /*Generamos los includes de las diferentes vistas*/
    include '../View/actividad_deportista_ADD_View.php';
    include '../View/actividad_deportista_DELETE_View.php';
    include '../View/actividad_deportista_EDIT_View.php';
    include '../View/actividad_deportista_SEARCH_View.php';
    include '../View/actividad_deportista_SHOWCURRENT_View.php';
    include '../View/actividad_deportista_SHOWALL_View.php';

    function get_data_form(){

    //Recoge la información del formulario

                $idActividad = $_REQUEST['idActividad'];

         
                $dniDeportista = $_REQUEST['dniDeportista'];

         $accion = $_REQUEST['action'];

    $actividad_deportista = new actividad_deportista_Model($idActividad,$dniDeportista);

    return $actividad_deportista;
}

if (!isset($_REQUEST['action'])){
    $_REQUEST['action'] = '';
}
    
    /*A continuación creamos el switch con el cual podremos gestionar las peticiones de ADD, DELETE, EDIT...*/
    switch ($_REQUEST['action']) {
        /*Caso añadir a la BD*/
        case 'ADD': 
                if (!$_POST){
                    new actividad_deportista_ADD();
                }
                else{
                    $actividad_deportista = get_data_form();
                    $respuesta = $actividad_deportista->ADD();
                    new MESSAGE($respuesta, '../Controller/actividad_deportista_Controller.php');
                }
                break;      
        case 'DELETE': //Borrado de actividades
           if (!$_POST){
                    $actividad_deportista = new actividad_deportista_Model($_REQUEST['idActividad'], $_REQUEST['dniDeportista']);
                    $valores = $actividad_deportista->RellenaDatos();
                    new actividad_deportista_DELETE($valores);
                }
                else{
                    $actividad_deportista = get_data_form();
                    $respuesta = $actividad_deportista->DELETE();
                    new MESSAGE($respuesta, '../Controller/actividad_deportista_Controller.php');
                }
                break;
        case 'SHOWCURRENT': //Mostrar información detallada
                $actividad_deportista = new actividad_deportista_Model($_REQUEST['idActividad'], $_REQUEST['dniDeportista']);
                $valores = $actividad_deportista->RellenaDatos();
                new actividad_deportista_SHOWCURRENT($valores);
                break;
        case 'EDIT': //Modificación de actividades
if (!$_POST){
                    $actividad_deportista = new actividad_deportista_Model($_REQUEST['idActividad'], $_REQUEST['dniDeportista']);
                    $valores = $actividad_deportista->RellenaDatos();
                    new actividad_deportista_EDIT($valores);
                }
                else{
                    
                    $actividad_deportista = get_data_form();

                    $respuesta = $actividad_deportista->EDIT();
                    new MESSAGE($respuesta, '../Controller/actividad_deportista_Controller.php');
                }
                
                break;
        case 'SEARCH': //Consulta de actividades
            if (!$_POST){
                    new actividad_deportista_SEARCH();
                }
                else{
                    $actividad_deportista = get_data_form();
                    $datos = $actividad_deportista->SEARCH();
                     $lista = array('idActividad','dniDeportista');
                    new actividad_deportista_SHOWALL($lista, $datos, '../index.php');
                }
                break;
        default:
           if (!$_POST){
                    $actividad_deportista = new actividad_deportista_Model('','');
                }
                else{
                    $actividad_deportista = get_data_form();
                }
                $datos = $actividad_deportista->SEARCH();
                $lista = array('idActividad','dniDeportista');
                new actividad_deportista_SHOWALL($lista, $datos,'../Controller/actividad_deportista_Controller.php' );

            }

    

?>
