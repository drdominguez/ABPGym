
<?php 
    session_start(); //solicito trabajar con la session

    include '../Model/superusuario_Model.php';

    include '../View/MESSAGE_View.php';
    include '../Functions/Authentication.php';

    if (!IsAuthenticated()){
        header('Location:../index.php');
    }
    include '../Locates/Strings_'.$_SESSION['idioma'].'.php';

    /*Generamos los includes de las diferentes vistas*/
    include '../View/superusuario_ADD_View.php';
    include '../View/superusuario_DELETE_View.php';
    include '../View/superusuario_EDIT_View.php';
    include '../View/superusuario_SEARCH_View.php';
    include '../View/superusuario_SHOWCURRENT_View.php';
    include '../View/superusuario_SHOWALL_View.php';

    function get_data_form(){

    //Recoge la información del formulario

                $dniSuperUsuario = $_REQUEST['dniSuperUsuario'];

         $accion = $_REQUEST['action'];

    $superusuario = new superusuario_Model($dniSuperUsuario);

    return $superusuario;
}

if (!isset($_REQUEST['action'])){
    $_REQUEST['action'] = '';
}
    
    /*A continuación creamos el switch con el cual podremos gestionar las peticiones de ADD, DELETE, EDIT...*/
    switch ($_REQUEST['action']) {
        /*Caso añadir a la BD*/
        case 'ADD': 
                if (!$_POST){
                    new superusuario_ADD();
                }
                else{
                    $superusuario = get_data_form();
                    $respuesta = $superusuario->ADD();
                    new MESSAGE($respuesta, '../Controller/superusuario_Controller.php');
                }
                break;      
        case 'DELETE': //Borrado de actividades
           if (!$_POST){
                    $superusuario = new superusuario_Model($_REQUEST['dniSuperUsuario']);
                    $valores = $superusuario->RellenaDatos();
                    new superusuario_DELETE($valores);
                }
                else{
                    $superusuario = get_data_form();
                    $respuesta = $superusuario->DELETE();
                    new MESSAGE($respuesta, '../Controller/superusuario_Controller.php');
                }
                break;
        case 'SHOWCURRENT': //Mostrar información detallada
                $superusuario = new superusuario_Model($_REQUEST['dniSuperUsuario']);
                $valores = $superusuario->RellenaDatos();
                new superusuario_SHOWCURRENT($valores);
                break;
        case 'EDIT': //Modificación de actividades
if (!$_POST){
                    $superusuario = new superusuario_Model($_REQUEST['dniSuperUsuario']);
                    $valores = $superusuario->RellenaDatos();
                    new superusuario_EDIT($valores);
                }
                else{
                    
                    $superusuario = get_data_form();

                    $respuesta = $superusuario->EDIT();
                    new MESSAGE($respuesta, '../Controller/superusuario_Controller.php');
                }
                
                break;
        case 'SEARCH': //Consulta de actividades
            if (!$_POST){
                    new superusuario_SEARCH();
                }
                else{
                    $superusuario = get_data_form();
                    $datos = $superusuario->SEARCH();
                     $lista = array('dniSuperUsuario');
                    new superusuario_SHOWALL($lista, $datos, '../index.php');
                }
                break;
        default:
           if (!$_POST){
                    $superusuario = new superusuario_Model('');
                }
                else{
                    $superusuario = get_data_form();
                }
                $datos = $superusuario->SEARCH();
                $lista = array('dniSuperUsuario');
                new superusuario_SHOWALL($lista, $datos,'../Controller/superusuario_Controller.php' );

            }

    

?>
