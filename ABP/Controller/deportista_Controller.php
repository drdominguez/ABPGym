
<?php 
    session_start(); //solicito trabajar con la session

    include '../Model/deportista_Model.php';

    include '../View/MESSAGE_View.php';
    include '../Functions/Authentication.php';

    if (!IsAuthenticated()){
        header('Location:../index.php');
    }
    include '../Locates/Strings_'.$_SESSION['idioma'].'.php';

    /*Generamos los includes de las diferentes vistas*/
    include '../View/deportista_ADD_View.php';
    include '../View/deportista_DELETE_View.php';
    include '../View/deportista_EDIT_View.php';
    include '../View/deportista_SEARCH_View.php';
    include '../View/deportista_SHOWCURRENT_View.php';
    include '../View/deportista_SHOWALL_View.php';

    function get_data_form(){

    //Recoge la información del formulario

                $dni = $_REQUEST['dni'];

         $accion = $_REQUEST['action'];

    $deportista = new deportista_Model($dni);

    return $deportista;
}

if (!isset($_REQUEST['action'])){
    $_REQUEST['action'] = '';
}
    
    /*A continuación creamos el switch con el cual podremos gestionar las peticiones de ADD, DELETE, EDIT...*/
    switch ($_REQUEST['action']) {
        /*Caso añadir a la BD*/
        case 'ADD': 
                if (!$_POST){
                    new deportista_ADD();
                }
                else{
                    $deportista = get_data_form();
                    $respuesta = $deportista->ADD();
                    new MESSAGE($respuesta, '../Controller/deportista_Controller.php');
                }
                break;      
        case 'DELETE': //Borrado de actividades
           if (!$_POST){
                    $deportista = new deportista_Model($_REQUEST['dni']);
                    $valores = $deportista->RellenaDatos();
                    new deportista_DELETE($valores);
                }
                else{
                    $deportista = get_data_form();
                    $respuesta = $deportista->DELETE();
                    new MESSAGE($respuesta, '../Controller/deportista_Controller.php');
                }
                break;
        case 'SHOWCURRENT': //Mostrar información detallada
                $deportista = new deportista_Model($_REQUEST['dni']);
                $valores = $deportista->RellenaDatos();
                new deportista_SHOWCURRENT($valores);
                break;
        case 'EDIT': //Modificación de actividades
if (!$_POST){
                    $deportista = new deportista_Model($_REQUEST['dni']);
                    $valores = $deportista->RellenaDatos();
                    new deportista_EDIT($valores);
                }
                else{
                    
                    $deportista = get_data_form();

                    $respuesta = $deportista->EDIT();
                    new MESSAGE($respuesta, '../Controller/deportista_Controller.php');
                }
                
                break;
        case 'SEARCH': //Consulta de actividades
            if (!$_POST){
                    new deportista_SEARCH();
                }
                else{
                    $deportista = get_data_form();
                    $datos = $deportista->SEARCH();
                     $lista = array('dni');
                    new deportista_SHOWALL($lista, $datos, '../index.php');
                }
                break;
        default:
           if (!$_POST){
                    $deportista = new deportista_Model('');
                }
                else{
                    $deportista = get_data_form();
                }
                $datos = $deportista->SEARCH();
                $lista = array('dni');
                new deportista_SHOWALL($lista, $datos,'../Controller/deportista_Controller.php' );

            }

    

?>
