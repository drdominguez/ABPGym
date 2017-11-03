
<?php 
    session_start(); //solicito trabajar con la session

    include '../Model/superusuario_ejercicio_Model.php';

    include '../View/MESSAGE_View.php';
    include '../Functions/Authentication.php';

    if (!IsAuthenticated()){
        header('Location:../index.php');
    }
    include '../Locates/Strings_'.$_SESSION['idioma'].'.php';

    /*Generamos los includes de las diferentes vistas*/
    include '../View/superusuario_ejercicio_ADD_View.php';
    include '../View/superusuario_ejercicio_DELETE_View.php';
    include '../View/superusuario_ejercicio_EDIT_View.php';
    include '../View/superusuario_ejercicio_SEARCH_View.php';
    include '../View/superusuario_ejercicio_SHOWCURRENT_View.php';
    include '../View/superusuario_ejercicio_SHOWALL_View.php';

    function get_data_form(){

    //Recoge la información del formulario

                $dniSuperUsuario = $_REQUEST['dniSuperUsuario'];

         
                $idEjercicio = $_REQUEST['idEjercicio'];

         $accion = $_REQUEST['action'];

    $superusuario_ejercicio = new superusuario_ejercicio_Model($dniSuperUsuario,$idEjercicio);

    return $superusuario_ejercicio;
}

if (!isset($_REQUEST['action'])){
    $_REQUEST['action'] = '';
}
    
    /*A continuación creamos el switch con el cual podremos gestionar las peticiones de ADD, DELETE, EDIT...*/
    switch ($_REQUEST['action']) {
        /*Caso añadir a la BD*/
        case 'ADD': 
                if (!$_POST){
                    new superusuario_ejercicio_ADD();
                }
                else{
                    $superusuario_ejercicio = get_data_form();
                    $respuesta = $superusuario_ejercicio->ADD();
                    new MESSAGE($respuesta, '../Controller/superusuario_ejercicio_Controller.php');
                }
                break;      
        case 'DELETE': //Borrado de actividades
           if (!$_POST){
                    $superusuario_ejercicio = new superusuario_ejercicio_Model($_REQUEST['dniSuperUsuario'], $_REQUEST['idEjercicio']);
                    $valores = $superusuario_ejercicio->RellenaDatos();
                    new superusuario_ejercicio_DELETE($valores);
                }
                else{
                    $superusuario_ejercicio = get_data_form();
                    $respuesta = $superusuario_ejercicio->DELETE();
                    new MESSAGE($respuesta, '../Controller/superusuario_ejercicio_Controller.php');
                }
                break;
        case 'SHOWCURRENT': //Mostrar información detallada
                $superusuario_ejercicio = new superusuario_ejercicio_Model($_REQUEST['dniSuperUsuario'], $_REQUEST['idEjercicio']);
                $valores = $superusuario_ejercicio->RellenaDatos();
                new superusuario_ejercicio_SHOWCURRENT($valores);
                break;
        case 'EDIT': //Modificación de actividades
if (!$_POST){
                    $superusuario_ejercicio = new superusuario_ejercicio_Model($_REQUEST['dniSuperUsuario'], $_REQUEST['idEjercicio']);
                    $valores = $superusuario_ejercicio->RellenaDatos();
                    new superusuario_ejercicio_EDIT($valores);
                }
                else{
                    
                    $superusuario_ejercicio = get_data_form();

                    $respuesta = $superusuario_ejercicio->EDIT();
                    new MESSAGE($respuesta, '../Controller/superusuario_ejercicio_Controller.php');
                }
                
                break;
        case 'SEARCH': //Consulta de actividades
            if (!$_POST){
                    new superusuario_ejercicio_SEARCH();
                }
                else{
                    $superusuario_ejercicio = get_data_form();
                    $datos = $superusuario_ejercicio->SEARCH();
                     $lista = array('dniSuperUsuario','idEjercicio');
                    new superusuario_ejercicio_SHOWALL($lista, $datos, '../index.php');
                }
                break;
        default:
           if (!$_POST){
                    $superusuario_ejercicio = new superusuario_ejercicio_Model('','');
                }
                else{
                    $superusuario_ejercicio = get_data_form();
                }
                $datos = $superusuario_ejercicio->SEARCH();
                $lista = array('dniSuperUsuario','idEjercicio');
                new superusuario_ejercicio_SHOWALL($lista, $datos,'../Controller/superusuario_ejercicio_Controller.php' );

            }

    

?>
