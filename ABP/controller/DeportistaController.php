
<?php 
    session_start(); //solicito trabajar con la session

    include '../model/deportista_Model.php';

    include '../view/MESSAGE_View.php';
    include '../Functions/Authentication.php';

    if (!IsAuthenticated()){
        header('Location:../index.php');
    }
    include '../locates/Strings_'.$_SESSION['idioma'].'.php';

    /*Generamos los includes de las diferentes vistas*/
    include '../view/deportista_ADD_View.php';
    include '../view/deportista_DELETE_View.php';
    include '../view/deportista_EDIT_View.php';
    include '../view/deportista_SEARCH_View.php';
    include '../view/deportista_SHOWCURRENT_View.php';
    include '../view/deportista_SHOWALL_View.php';

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
                    new MESSAGE($respuesta, '../controller/DeportistaController.php');
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
                    new MESSAGE($respuesta, '../controller/DeportistaController.php');
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
                    new MESSAGE($respuesta, '../controller/DeportistaController.php');
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
                new deportista_SHOWALL($lista, $datos,'../controller/DeportistaController.php' );

            }

    

?>
