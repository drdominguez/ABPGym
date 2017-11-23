
<?php 
    session_start(); //solicito trabajar con la session

    include '../model/pef_Model.php';

    include '../view/MESSAGE_View.php';
    include '../Functions/Authentication.php';

    if (!IsAuthenticated()){
        header('Location:../index.php');
    }
    include '../locates/Strings_'.$_SESSION['idioma'].'.php';

    /*Generamos los includes de las diferentes vistas*/
    include '../view/pefADD.php';
    include '../view/pefDELETE.php';
    include '../view/pefEDIT.php';
    include '../view/pef_SEARCH_View.php';
    include '../view/pefSHOWCURRENT.php';
    include '../view/pefSHOWALL.php';

    function get_data_form(){

    //Recoge la información del formulario

                $dni = $_REQUEST['dni'];

         
                $tarjeta = $_REQUEST['tarjeta'];

         
                $comentarioRivision = $_REQUEST['comentarioRivision'];

         $accion = $_REQUEST['action'];

    $pef = new pef_Model($dni,$tarjeta,$comentarioRivision);

    return $pef;
}

if (!isset($_REQUEST['action'])){
    $_REQUEST['action'] = '';
}
    
    /*A continuación creamos el switch con el cual podremos gestionar las peticiones de ADD, DELETE, EDIT...*/
    switch ($_REQUEST['action']) {
        /*Caso añadir a la BD*/
        case 'ADD': 
                if (!$_POST){
                    new pef_ADD();
                }
                else{
                    $pef = get_data_form();
                    $respuesta = $pef->ADD();
                    new MESSAGE($respuesta, '../controller/pef_Controller.php');
                }
                break;      
        case 'DELETE': //Borrado de actividades
           if (!$_POST){
                    $pef = new pef_Model($_REQUEST['dni'],'','');
                    $valores = $pef->RellenaDatos();
                    new pef_DELETE($valores);
                }
                else{
                    $pef = get_data_form();
                    $respuesta = $pef->DELETE();
                    new MESSAGE($respuesta, '../controller/pef_Controller.php');
                }
                break;
        case 'SHOWCURRENT': //Mostrar información detallada
                $pef = new pef_Model($_REQUEST['dni'],'','');
                $valores = $pef->RellenaDatos();
                new pef_SHOWCURRENT($valores);
                break;
        case 'EDIT': //Modificación de actividades
if (!$_POST){
                    $pef = new pef_Model($_REQUEST['dni'],'','');
                    $valores = $pef->RellenaDatos();
                    new pef_EDIT($valores);
                }
                else{
                    
                    $pef = get_data_form();

                    $respuesta = $pef->EDIT();
                    new MESSAGE($respuesta, '../controller/pef_Controller.php');
                }
                
                break;
        case 'SEARCH': //Consulta de actividades
            if (!$_POST){
                    new pef_SEARCH();
                }
                else{
                    $pef = get_data_form();
                    $datos = $pef->SEARCH();
                     $lista = array('dni','tarjeta','comentarioRivision');
                    new pef_SHOWALL($lista, $datos, '../index.php');
                }
                break;
        default:
           if (!$_POST){
                    $pef = new pef_Model('','','');
                }
                else{
                    $pef = get_data_form();
                }
                $datos = $pef->SEARCH();
                $lista = array('dni','tarjeta','comentarioRivision');
                new pef_SHOWALL($lista, $datos,'../controller/pef_Controller.php' );

            }

    

?>
