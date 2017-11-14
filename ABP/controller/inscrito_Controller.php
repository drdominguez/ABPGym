
<?php 
    session_start(); //solicito trabajar con la session

    include '../model/inscrito_Model.php';

    include '../view/MESSAGE_View.php';
    include '../Functions/Authentication.php';

    if (!IsAuthenticated()){
        header('Location:../index.php');
    }
    include '../locates/Strings_'.$_SESSION['idioma'].'.php';

    /*Generamos los includes de las diferentes vistas*/
    include '../view/inscrito_ADD_View.php';
    include '../view/inscrito_DELETE_View.php';
    include '../view/inscrito_EDIT_View.php';
    include '../view/inscrito_SEARCH_View.php';
    include '../view/inscrito_SHOWCURRENT_View.php';
    include '../view/inscrito_SHOWALL_View.php';

    function get_data_form(){

    //Recoge la información del formulario

                $idGrupo = $_REQUEST['idGrupo'];

         
                $dniDeportista = $_REQUEST['dniDeportista'];

         $accion = $_REQUEST['action'];

    $inscrito = new inscrito_Model($idGrupo,$dniDeportista);

    return $inscrito;
}

if (!isset($_REQUEST['action'])){
    $_REQUEST['action'] = '';
}
    
    /*A continuación creamos el switch con el cual podremos gestionar las peticiones de ADD, DELETE, EDIT...*/
    switch ($_REQUEST['action']) {
        /*Caso añadir a la BD*/
        case 'ADD': 
                if (!$_POST){
                    new inscrito_ADD();
                }
                else{
                    $inscrito = get_data_form();
                    $respuesta = $inscrito->ADD();
                    new MESSAGE($respuesta, '../controller/inscrito_Controller.php');
                }
                break;      
        case 'DELETE': //Borrado de actividades
           if (!$_POST){
                    $inscrito = new inscrito_Model($_REQUEST['idGrupo'], $_REQUEST['dniDeportista']);
                    $valores = $inscrito->RellenaDatos();
                    new inscrito_DELETE($valores);
                }
                else{
                    $inscrito = get_data_form();
                    $respuesta = $inscrito->DELETE();
                    new MESSAGE($respuesta, '../controller/inscrito_Controller.php');
                }
                break;
        case 'SHOWCURRENT': //Mostrar información detallada
                $inscrito = new inscrito_Model($_REQUEST['idGrupo'], $_REQUEST['dniDeportista']);
                $valores = $inscrito->RellenaDatos();
                new inscrito_SHOWCURRENT($valores);
                break;
        case 'EDIT': //Modificación de actividades
if (!$_POST){
                    $inscrito = new inscrito_Model($_REQUEST['idGrupo'], $_REQUEST['dniDeportista']);
                    $valores = $inscrito->RellenaDatos();
                    new inscrito_EDIT($valores);
                }
                else{
                    
                    $inscrito = get_data_form();

                    $respuesta = $inscrito->EDIT();
                    new MESSAGE($respuesta, '../controller/inscrito_Controller.php');
                }
                
                break;
        case 'SEARCH': //Consulta de actividades
            if (!$_POST){
                    new inscrito_SEARCH();
                }
                else{
                    $inscrito = get_data_form();
                    $datos = $inscrito->SEARCH();
                     $lista = array('idGrupo','dniDeportista');
                    new inscrito_SHOWALL($lista, $datos, '../index.php');
                }
                break;
        default:
           if (!$_POST){
                    $inscrito = new inscrito_Model('','');
                }
                else{
                    $inscrito = get_data_form();
                }
                $datos = $inscrito->SEARCH();
                $lista = array('idGrupo','dniDeportista');
                new inscrito_SHOWALL($lista, $datos,'../controller/inscrito_Controller.php' );

            }

    

?>
