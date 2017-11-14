
<?php 
    session_start(); //solicito trabajar con la session

    include '../model/tdu_Model.php';

    include '../view/MESSAGE_View.php';
    include '../Functions/Authentication.php';

    if (!IsAuthenticated()){
        header('Location:../index.php');
    }
    include '../locates/Strings_'.$_SESSION['idioma'].'.php';

    /*Generamos los includes de las diferentes vistas*/
    include '../view/tdu_ADD_View.php';
    include '../view/tdu_DELETE_View.php';
    include '../view/tdu_EDIT_View.php';
    include '../view/tdu_SEARCH_View.php';
    include '../view/tdu_SHOWCURRENT_View.php';
    include '../view/tdu_SHOWALL_View.php';

    function get_data_form(){

    //Recoge la información del formulario

                $dni = $_REQUEST['dni'];

         
                $tarjeta = $_REQUEST['tarjeta'];

         $accion = $_REQUEST['action'];

    $tdu = new tdu_Model($dni,$tarjeta);

    return $tdu;
}

if (!isset($_REQUEST['action'])){
    $_REQUEST['action'] = '';
}
    
    /*A continuación creamos el switch con el cual podremos gestionar las peticiones de ADD, DELETE, EDIT...*/
    switch ($_REQUEST['action']) {
        /*Caso añadir a la BD*/
        case 'ADD': 
                if (!$_POST){
                    new tdu_ADD();
                }
                else{
                    $tdu = get_data_form();
                    $respuesta = $tdu->ADD();
                    new MESSAGE($respuesta, '../controller/tdu_Controller.php');
                }
                break;      
        case 'DELETE': //Borrado de actividades
           if (!$_POST){
                    $tdu = new tdu_Model($_REQUEST['dni'],'');
                    $valores = $tdu->RellenaDatos();
                    new tdu_DELETE($valores);
                }
                else{
                    $tdu = get_data_form();
                    $respuesta = $tdu->DELETE();
                    new MESSAGE($respuesta, '../controller/tdu_Controller.php');
                }
                break;
        case 'SHOWCURRENT': //Mostrar información detallada
                $tdu = new tdu_Model($_REQUEST['dni'],'');
                $valores = $tdu->RellenaDatos();
                new tdu_SHOWCURRENT($valores);
                break;
        case 'EDIT': //Modificación de actividades
if (!$_POST){
                    $tdu = new tdu_Model($_REQUEST['dni'],'');
                    $valores = $tdu->RellenaDatos();
                    new tdu_EDIT($valores);
                }
                else{
                    
                    $tdu = get_data_form();

                    $respuesta = $tdu->EDIT();
                    new MESSAGE($respuesta, '../controller/tdu_Controller.php');
                }
                
                break;
        case 'SEARCH': //Consulta de actividades
            if (!$_POST){
                    new tdu_SEARCH();
                }
                else{
                    $tdu = get_data_form();
                    $datos = $tdu->SEARCH();
                     $lista = array('dni','tarjeta');
                    new tdu_SHOWALL($lista, $datos, '../index.php');
                }
                break;
        default:
           if (!$_POST){
                    $tdu = new tdu_Model('','');
                }
                else{
                    $tdu = get_data_form();
                }
                $datos = $tdu->SEARCH();
                $lista = array('dni','tarjeta');
                new tdu_SHOWALL($lista, $datos,'../controller/tdu_Controller.php' );

            }

    

?>
