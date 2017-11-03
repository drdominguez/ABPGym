
<?php 
    session_start(); //solicito trabajar con la session

    include '../Model/superusuario_individual_Model.php';

    include '../View/MESSAGE_View.php';
    include '../Functions/Authentication.php';

    if (!IsAuthenticated()){
        header('Location:../index.php');
    }
    include '../Locates/Strings_'.$_SESSION['idioma'].'.php';

    /*Generamos los includes de las diferentes vistas*/
    include '../View/superusuario_individual_ADD_View.php';
    include '../View/superusuario_individual_DELETE_View.php';
    include '../View/superusuario_individual_EDIT_View.php';
    include '../View/superusuario_individual_SEARCH_View.php';
    include '../View/superusuario_individual_SHOWCURRENT_View.php';
    include '../View/superusuario_individual_SHOWALL_View.php';

    function get_data_form(){

    //Recoge la información del formulario

                $dniSuperUsuario = $_REQUEST['dniSuperUsuario'];

         
                $idActividad = $_REQUEST['idActividad'];

         $accion = $_REQUEST['action'];

    $superusuario_individual = new superusuario_individual_Model($dniSuperUsuario,$idActividad);

    return $superusuario_individual;
}

if (!isset($_REQUEST['action'])){
    $_REQUEST['action'] = '';
}
    
    /*A continuación creamos el switch con el cual podremos gestionar las peticiones de ADD, DELETE, EDIT...*/
    switch ($_REQUEST['action']) {
        /*Caso añadir a la BD*/
        case 'ADD': 
                if (!$_POST){
                    new superusuario_individual_ADD();
                }
                else{
                    $superusuario_individual = get_data_form();
                    $respuesta = $superusuario_individual->ADD();
                    new MESSAGE($respuesta, '../Controller/superusuario_individual_Controller.php');
                }
                break;      
        case 'DELETE': //Borrado de actividades
           if (!$_POST){
                    $superusuario_individual = new superusuario_individual_Model($_REQUEST['dniSuperUsuario'], $_REQUEST['idActividad']);
                    $valores = $superusuario_individual->RellenaDatos();
                    new superusuario_individual_DELETE($valores);
                }
                else{
                    $superusuario_individual = get_data_form();
                    $respuesta = $superusuario_individual->DELETE();
                    new MESSAGE($respuesta, '../Controller/superusuario_individual_Controller.php');
                }
                break;
        case 'SHOWCURRENT': //Mostrar información detallada
                $superusuario_individual = new superusuario_individual_Model($_REQUEST['dniSuperUsuario'], $_REQUEST['idActividad']);
                $valores = $superusuario_individual->RellenaDatos();
                new superusuario_individual_SHOWCURRENT($valores);
                break;
        case 'EDIT': //Modificación de actividades
if (!$_POST){
                    $superusuario_individual = new superusuario_individual_Model($_REQUEST['dniSuperUsuario'], $_REQUEST['idActividad']);
                    $valores = $superusuario_individual->RellenaDatos();
                    new superusuario_individual_EDIT($valores);
                }
                else{
                    
                    $superusuario_individual = get_data_form();

                    $respuesta = $superusuario_individual->EDIT();
                    new MESSAGE($respuesta, '../Controller/superusuario_individual_Controller.php');
                }
                
                break;
        case 'SEARCH': //Consulta de actividades
            if (!$_POST){
                    new superusuario_individual_SEARCH();
                }
                else{
                    $superusuario_individual = get_data_form();
                    $datos = $superusuario_individual->SEARCH();
                     $lista = array('dniSuperUsuario','idActividad');
                    new superusuario_individual_SHOWALL($lista, $datos, '../index.php');
                }
                break;
        default:
           if (!$_POST){
                    $superusuario_individual = new superusuario_individual_Model('','');
                }
                else{
                    $superusuario_individual = get_data_form();
                }
                $datos = $superusuario_individual->SEARCH();
                $lista = array('dniSuperUsuario','idActividad');
                new superusuario_individual_SHOWALL($lista, $datos,'../Controller/superusuario_individual_Controller.php' );

            }

    

?>
