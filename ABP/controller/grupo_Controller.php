
<?php 
    session_start(); //solicito trabajar con la session

    include '../model/grupo_Model.php';

    include '../view/MESSAGE_View.php';
    include '../Functions/Authentication.php';

    if (!IsAuthenticated()){
        header('Location:../index.php');
    }
    include '../locates/Strings_'.$_SESSION['idioma'].'.php';

    /*Generamos los includes de las diferentes vistas*/
    include '../view/grupo_ADD_View.php';
    include '../view/grupo_DELETE_View.php';
    include '../view/grupo_EDIT_View.php';
    include '../view/grupo_SEARCH_View.php';
    include '../view/grupo_SHOWCURRENT_View.php';
    include '../view/grupo_SHOWALL_View.php';

    function get_data_form(){

    //Recoge la información del formulario

                $idActividad = $_REQUEST['idActividad'];

         
                $instalaciones = $_REQUEST['instalaciones'];

         
                $plazas = $_REQUEST['plazas'];

         $accion = $_REQUEST['action'];

    $grupo = new grupo_Model($idActividad,$instalaciones,$plazas);

    return $grupo;
}

if (!isset($_REQUEST['action'])){
    $_REQUEST['action'] = '';
}
    
    /*A continuación creamos el switch con el cual podremos gestionar las peticiones de ADD, DELETE, EDIT...*/
    switch ($_REQUEST['action']) {
        /*Caso añadir a la BD*/
        case 'ADD': 
                if (!$_POST){
                    new grupo_ADD();
                }
                else{
                    $grupo = get_data_form();
                    $respuesta = $grupo->ADD();
                    new MESSAGE($respuesta, '../controller/grupo_Controller.php');
                }
                break;      
        case 'DELETE': //Borrado de actividades
           if (!$_POST){
                    $grupo = new grupo_Model($_REQUEST['idActividad'],'','');
                    $valores = $grupo->RellenaDatos();
                    new grupo_DELETE($valores);
                }
                else{
                    $grupo = get_data_form();
                    $respuesta = $grupo->DELETE();
                    new MESSAGE($respuesta, '../controller/grupo_Controller.php');
                }
                break;
        case 'SHOWCURRENT': //Mostrar información detallada
                $grupo = new grupo_Model($_REQUEST['idActividad'],'','');
                $valores = $grupo->RellenaDatos();
                new grupo_SHOWCURRENT($valores);
                break;
        case 'EDIT': //Modificación de actividades
if (!$_POST){
                    $grupo = new grupo_Model($_REQUEST['idActividad'],'','');
                    $valores = $grupo->RellenaDatos();
                    new grupo_EDIT($valores);
                }
                else{
                    
                    $grupo = get_data_form();

                    $respuesta = $grupo->EDIT();
                    new MESSAGE($respuesta, '../controller/grupo_Controller.php');
                }
                
                break;
        case 'SEARCH': //Consulta de actividades
            if (!$_POST){
                    new grupo_SEARCH();
                }
                else{
                    $grupo = get_data_form();
                    $datos = $grupo->SEARCH();
                     $lista = array('idActividad','instalaciones','plazas');
                    new grupo_SHOWALL($lista, $datos, '../index.php');
                }
                break;
        default:
           if (!$_POST){
                    $grupo = new grupo_Model('','','');
                }
                else{
                    $grupo = get_data_form();
                }
                $datos = $grupo->SEARCH();
                $lista = array('idActividad','instalaciones','plazas');
                new grupo_SHOWALL($lista, $datos,'../controller/grupo_Controller.php' );

            }

    

?>
