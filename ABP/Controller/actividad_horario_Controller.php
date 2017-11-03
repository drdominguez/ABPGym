
<?php 
    session_start(); //solicito trabajar con la session

    include '../Model/actividad_horario_Model.php';

    include '../View/MESSAGE_View.php';
    include '../Functions/Authentication.php';

    if (!IsAuthenticated()){
        header('Location:../index.php');
    }
    include '../Locates/Strings_'.$_SESSION['idioma'].'.php';

    /*Generamos los includes de las diferentes vistas*/
    include '../View/actividad_horario_ADD_View.php';
    include '../View/actividad_horario_DELETE_View.php';
    include '../View/actividad_horario_EDIT_View.php';
    include '../View/actividad_horario_SEARCH_View.php';
    include '../View/actividad_horario_SHOWCURRENT_View.php';
    include '../View/actividad_horario_SHOWALL_View.php';

    function get_data_form(){

    //Recoge la información del formulario

                $idActividad = $_REQUEST['idActividad'];

         
                $idHorario = $_REQUEST['idHorario'];

         $accion = $_REQUEST['action'];

    $actividad_horario = new actividad_horario_Model($idActividad,$idHorario);

    return $actividad_horario;
}

if (!isset($_REQUEST['action'])){
    $_REQUEST['action'] = '';
}
    
    /*A continuación creamos el switch con el cual podremos gestionar las peticiones de ADD, DELETE, EDIT...*/
    switch ($_REQUEST['action']) {
        /*Caso añadir a la BD*/
        case 'ADD': 
                if (!$_POST){
                    new actividad_horario_ADD();
                }
                else{
                    $actividad_horario = get_data_form();
                    $respuesta = $actividad_horario->ADD();
                    new MESSAGE($respuesta, '../Controller/actividad_horario_Controller.php');
                }
                break;      
        case 'DELETE': //Borrado de actividades
           if (!$_POST){
                    $actividad_horario = new actividad_horario_Model($_REQUEST['idActividad'], $_REQUEST['idHorario']);
                    $valores = $actividad_horario->RellenaDatos();
                    new actividad_horario_DELETE($valores);
                }
                else{
                    $actividad_horario = get_data_form();
                    $respuesta = $actividad_horario->DELETE();
                    new MESSAGE($respuesta, '../Controller/actividad_horario_Controller.php');
                }
                break;
        case 'SHOWCURRENT': //Mostrar información detallada
                $actividad_horario = new actividad_horario_Model($_REQUEST['idActividad'], $_REQUEST['idHorario']);
                $valores = $actividad_horario->RellenaDatos();
                new actividad_horario_SHOWCURRENT($valores);
                break;
        case 'EDIT': //Modificación de actividades
if (!$_POST){
                    $actividad_horario = new actividad_horario_Model($_REQUEST['idActividad'], $_REQUEST['idHorario']);
                    $valores = $actividad_horario->RellenaDatos();
                    new actividad_horario_EDIT($valores);
                }
                else{
                    
                    $actividad_horario = get_data_form();

                    $respuesta = $actividad_horario->EDIT();
                    new MESSAGE($respuesta, '../Controller/actividad_horario_Controller.php');
                }
                
                break;
        case 'SEARCH': //Consulta de actividades
            if (!$_POST){
                    new actividad_horario_SEARCH();
                }
                else{
                    $actividad_horario = get_data_form();
                    $datos = $actividad_horario->SEARCH();
                     $lista = array('idActividad','idHorario');
                    new actividad_horario_SHOWALL($lista, $datos, '../index.php');
                }
                break;
        default:
           if (!$_POST){
                    $actividad_horario = new actividad_horario_Model('','');
                }
                else{
                    $actividad_horario = get_data_form();
                }
                $datos = $actividad_horario->SEARCH();
                $lista = array('idActividad','idHorario');
                new actividad_horario_SHOWALL($lista, $datos,'../Controller/actividad_horario_Controller.php' );

            }

    

?>
