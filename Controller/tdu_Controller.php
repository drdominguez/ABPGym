
<?php 
    session_start(); //solicito trabajar con la session

    include '../Model/tdu_Model.php';

    include '../View/MESSAGE_View.php';
    include '../Functions/Authentication.php';

    if (!IsAuthenticated()){
        header('Location:../index.php');
    }
    include '../Locates/Strings_'.$_SESSION['idioma'].'.php';

    /*Generamos los includes de las diferentes vistas*/
    include '../View/tdu_ADD_View.php';
    include '../View/tdu_DELETE_View.php';
    include '../View/tdu_EDIT_View.php';
    include '../View/tdu_SEARCH_View.php';
    include '../View/tdu_SHOWCURRENT_View.php';
    include '../View/tdu_SHOWALL_View.php';

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
                    new MESSAGE($respuesta, '../Controller/tdu_Controller.php');
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
                    new MESSAGE($respuesta, '../Controller/tdu_Controller.php');
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
                    new MESSAGE($respuesta, '../Controller/tdu_Controller.php');
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
                new tdu_SHOWALL($lista, $datos,'../Controller/tdu_Controller.php' );

            }

    

?>
