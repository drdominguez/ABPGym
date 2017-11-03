
<?php 
    session_start(); //solicito trabajar con la session

    include '../Model/pef_Model.php';

    include '../View/MESSAGE_View.php';
    include '../Functions/Authentication.php';

    if (!IsAuthenticated()){
        header('Location:../index.php');
    }
    include '../Locates/Strings_'.$_SESSION['idioma'].'.php';

    /*Generamos los includes de las diferentes vistas*/
    include '../View/pef_ADD_View.php';
    include '../View/pef_DELETE_View.php';
    include '../View/pef_EDIT_View.php';
    include '../View/pef_SEARCH_View.php';
    include '../View/pef_SHOWCURRENT_View.php';
    include '../View/pef_SHOWALL_View.php';

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
                    new MESSAGE($respuesta, '../Controller/pef_Controller.php');
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
                    new MESSAGE($respuesta, '../Controller/pef_Controller.php');
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
                    new MESSAGE($respuesta, '../Controller/pef_Controller.php');
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
                new pef_SHOWALL($lista, $datos,'../Controller/pef_Controller.php' );

            }

    

?>
