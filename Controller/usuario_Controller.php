
<?php 
    session_start(); //solicito trabajar con la session

    include '../Model/usuario_Model.php';

    include '../View/MESSAGE_View.php';
    include '../Functions/Authentication.php';

    if (!IsAuthenticated()){
        header('Location:../index.php');
    }
    include '../Locates/Strings_'.$_SESSION['idioma'].'.php';

    /*Generamos los includes de las diferentes vistas*/
    include '../View/usuario_ADD_View.php';
    include '../View/usuario_DELETE_View.php';
    include '../View/usuario_EDIT_View.php';
    include '../View/usuario_SHOWCURRENT_View.php';
    include '../View/usuario_SHOWALL_View.php';

    function get_data_form(){

    //Recoge la informaci贸n del formulario

                $dni = $_REQUEST['dni'];

         
                $nombre = $_REQUEST['nombre'];

         
                $apellidos = $_REQUEST['apellidos'];

         
                $edad = $_REQUEST['edad'];

         
                $contrase馻 = $_REQUEST['contrase馻'];

         
                $email = $_REQUEST['email'];

         
                $telefono = $_REQUEST['telefono'];

         
                $fechaAlta = $_REQUEST['fechaAlta'];

         $accion = $_REQUEST['action'];

    $usuario = new usuario_Model($dni,$nombre,$apellidos,$edad,$contrase馻,$email,$telefono,$fechaAlta);

    return $usuario;
}

if (!isset($_REQUEST['action'])){
    $_REQUEST['action'] = '';
}
    
    /*A continuaci贸n creamos el switch con el cual podremos gestionar las peticiones de ADD, DELETE, EDIT...*/
    switch ($_REQUEST['action']) {
        /*Caso a帽adir a la BD*/
        case 'ADD': 
                if (!$_POST){
                    new usuario_ADD();
                }
                else{
                    $usuario = get_data_form();
                    $respuesta = $usuario->ADD();
                    new MESSAGE($respuesta, '../Controller/usuario_Controller.php');
                }
                break;      
        case 'DELETE': //Borrado de actividades
           if (!$_POST){
                    $usuario = new usuario_Model($_REQUEST['dni'],'','','','','','','');
                    $valores = $usuario->RellenaDatos();
                    new usuario_DELETE($valores);
                }
                else{
                    $usuario = get_data_form();
                    $respuesta = $usuario->DELETE();
                    new MESSAGE($respuesta, '../Controller/usuario_Controller.php');
                }
                break;
        case 'SHOWCURRENT': //Mostrar informaci贸n detallada
                $usuario = new usuario_Model($_REQUEST['dni'],'','','','','','','');
                $valores = $usuario->RellenaDatos();
                new usuario_SHOWCURRENT($valores);
                break;
        case 'EDIT': //Modificaci贸n de actividades
if (!$_POST){
                    $usuario = new usuario_Model($_REQUEST['dni'],'','','','','','','');
                    $valores = $usuario->RellenaDatos();
                    new usuario_EDIT($valores);
                }
                else{
                    
                    $usuario = get_data_form();

                    $respuesta = $usuario->EDIT();
                    new MESSAGE($respuesta, '../Controller/usuario_Controller.php');
                }
                
                break;
        case 'SEARCH': //Consulta de actividades
            if (!$_POST){
                    new usuario_SEARCH();
                }
                else{
                    $usuario = get_data_form();
                    $datos = $usuario->SEARCH();
                     $lista = array('dni','nombre','apellidos','edad','contrase馻','email','telefono','fechaAlta');
                    new usuario_SHOWALL($lista, $datos, '../index.php');
                }
                break;
        default:
           if (!$_POST){
                    $usuario = new usuario_Model('','','','','','','','');
                }
                else{
                    $usuario = get_data_form();
                }
                $datos = $usuario->SEARCH();
                $lista = array('dni','nombre','apellidos','edad','contrase馻','email','telefono','fechaAlta');
                new usuario_SHOWALL($lista, $datos,'../Controller/usuario_Controller.php' );

            }

    

?>
