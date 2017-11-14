
<?php 
    session_start(); //solicito trabajar con la session

    include '../model/administrador_Model.php';

    include '../view/MESSAGE_View.php';
    include '../Functions/Authentication.php';

    if (!IsAuthenticated()){
        header('Location:../index.php');
    }
    include '../locates/Strings_'.$_SESSION['idioma'].'.php';

    /*Generamos los includes de las diferentes vistas*/
    include '../view/administrador_ADD_View.php';
    include '../view/administrador_DELETE_View.php';
    include '../view/administrador_EDIT_View.php';
    include '../view/administrador_SEARCH_View.php';
    include '../view/administrador_SHOWCURRENT_View.php';
    include '../view/administrador_SHOWALL_View.php';

    function get_data_form(){

    //Recoge la información del formulario

                $dniAdministrador = $_REQUEST['dniAdministrador'];

         $accion = $_REQUEST['action'];

    $administrador = new administrador_Model($dniAdministrador);

    return $administrador;
}

if (!isset($_REQUEST['action'])){
    $_REQUEST['action'] = '';
}
    
    /*A continuación creamos el switch con el cual podremos gestionar las peticiones de ADD, DELETE, EDIT...*/
    switch ($_REQUEST['action']) {
        /*Caso añadir a la BD*/
        case 'ADD': 
                if (!$_POST){
                    new administrador_ADD();
                }
                else{
                    $administrador = get_data_form();
                    $respuesta = $administrador->ADD();
                    new MESSAGE($respuesta, '../controller/administrador_Controller.php');
                }
                break;      
        case 'DELETE': //Borrado de actividades
           if (!$_POST){
                    $administrador = new administrador_Model($_REQUEST['dniAdministrador']);
                    $valores = $administrador->RellenaDatos();
                    new administrador_DELETE($valores);
                }
                else{
                    $administrador = get_data_form();
                    $respuesta = $administrador->DELETE();
                    new MESSAGE($respuesta, '../controller/administrador_Controller.php');
                }
                break;
        case 'SHOWCURRENT': //Mostrar información detallada
                $administrador = new administrador_Model($_REQUEST['dniAdministrador']);
                $valores = $administrador->RellenaDatos();
                new administrador_SHOWCURRENT($valores);
                break;
        case 'EDIT': //Modificación de actividades
if (!$_POST){
                    $administrador = new administrador_Model($_REQUEST['dniAdministrador']);
                    $valores = $administrador->RellenaDatos();
                    new administrador_EDIT($valores);
                }
                else{
                    
                    $administrador = get_data_form();

                    $respuesta = $administrador->EDIT();
                    new MESSAGE($respuesta, '../controller/administrador_Controller.php');
                }
                
                break;
        case 'SEARCH': //Consulta de actividades
            if (!$_POST){
                    new administrador_SEARCH();
                }
                else{
                    $administrador = get_data_form();
                    $datos = $administrador->SEARCH();
                     $lista = array('dniAdministrador');
                    new administrador_SHOWALL($lista, $datos, '../index.php');
                }
                break;
        default:
           if (!$_POST){
                    $administrador = new administrador_Model('');
                }
                else{
                    $administrador = get_data_form();
                }
                $datos = $administrador->SEARCH();
                $lista = array('dniAdministrador');
                new administrador_SHOWALL($lista, $datos,'../controller/administrador_Controller.php' );

            }

    

?>
