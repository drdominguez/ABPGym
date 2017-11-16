
<?php 
    session_start(); //solicito trabajar con la session

    include '../model/horario_Model.php';

    include '../view/MESSAGE_View.php';
    include '../Functions/Authentication.php';

    if (!IsAuthenticated()){
        header('Location:../index.php');
    }
    include '../locates/Strings_'.$_SESSION['idioma'].'.php';

    /*Generamos los includes de las diferentes vistas*/
    include '../view/horario_ADD_View.php';
    include '../view/horario_DELETE_View.php';
    include '../view/horario_EDIT_View.php';
    include '../view/horario_SEARCH_View.php';
    include '../view/horario_SHOWCURRENT_View.php';
    include '../view/horario_SHOWALL_View.php';

    function get_data_form(){

    //Recoge la información del formulario

                $idHorario = $_REQUEST['idHorario'];

         
                $localizacion = $_REQUEST['localizacion'];

         
                $dia = $_REQUEST['dia'];

         
                $hora = $_REQUEST['hora'];

         $accion = $_REQUEST['action'];

    $horario = new horario_Model($idHorario,$localizacion,$dia,$hora);

    return $horario;
}

if (!isset($_REQUEST['action'])){
    $_REQUEST['action'] = '';
}
    
    /*A continuación creamos el switch con el cual podremos gestionar las peticiones de ADD, DELETE, EDIT...*/
    switch ($_REQUEST['action']) {
        /*Caso añadir a la BD*/
        case 'ADD': 
                if (!$_POST){
                    new horario_ADD();
                }
                else{
                    $horario = get_data_form();
                    $respuesta = $horario->ADD();
                    new MESSAGE($respuesta, '../controller/horario_Controller.php');
                }
                break;      
        case 'DELETE': //Borrado de actividades
           if (!$_POST){
                    $horario = new horario_Model($_REQUEST['idHorario'],'','','');
                    $valores = $horario->RellenaDatos();
                    new horario_DELETE($valores);
                }
                else{
                    $horario = get_data_form();
                    $respuesta = $horario->DELETE();
                    new MESSAGE($respuesta, '../controller/horario_Controller.php');
                }
                break;
        case 'SHOWCURRENT': //Mostrar información detallada
                $horario = new horario_Model($_REQUEST['idHorario'],'','','');
                $valores = $horario->RellenaDatos();
                new horario_SHOWCURRENT($valores);
                break;
        case 'EDIT': //Modificación de actividades
if (!$_POST){
                    $horario = new horario_Model($_REQUEST['idHorario'],'','','');
                    $valores = $horario->RellenaDatos();
                    new horario_EDIT($valores);
                }
                else{
                    
                    $horario = get_data_form();

                    $respuesta = $horario->EDIT();
                    new MESSAGE($respuesta, '../controller/horario_Controller.php');
                }
                
                break;
        case 'SEARCH': //Consulta de actividades
            if (!$_POST){
                    new horario_SEARCH();
                }
                else{
                    $horario = get_data_form();
                    $datos = $horario->SEARCH();
                     $lista = array('idHorario','localizacion','dia','hora');
                    new horario_SHOWALL($lista, $datos, '../index.php');
                }
                break;
        default:
           if (!$_POST){
                    $horario = new horario_Model('','','','');
                }
                else{
                    $horario = get_data_form();
                }
                $datos = $horario->SEARCH();
                $lista = array('idHorario','localizacion','dia','hora');
                new horario_SHOWALL($lista, $datos,'../controller/horario_Controller.php' );

            }

    

?>
