
<?php 
    session_start(); //solicito trabajar con la session

    include '../Model/tabla_ejercicios_Model.php';

    include '../View/MESSAGE_View.php';
    include '../Functions/Authentication.php';

    if (!IsAuthenticated()){
        header('Location:../index.php');
    }
    include '../Locates/Strings_'.$_SESSION['idioma'].'.php';

    /*Generamos los includes de las diferentes vistas*/
    include '../View/tabla_ejercicios_ADD_View.php';
    include '../View/tabla_ejercicios_DELETE_View.php';
    include '../View/tabla_ejercicios_EDIT_View.php';
    include '../View/tabla_ejercicios_SEARCH_View.php';
    include '../View/tabla_ejercicios_SHOWCURRENT_View.php';
    include '../View/tabla_ejercicios_SHOWALL_View.php';

    function get_data_form(){

    //Recoge la información del formulario

                $idTabla = $_REQUEST['idTabla'];

         
                $idEjercicio = $_REQUEST['idEjercicio'];

         $accion = $_REQUEST['action'];

    $tabla_ejercicios = new tabla_ejercicios_Model($idTabla,$idEjercicio);

    return $tabla_ejercicios;
}

if (!isset($_REQUEST['action'])){
    $_REQUEST['action'] = '';
}
    
    /*A continuación creamos el switch con el cual podremos gestionar las peticiones de ADD, DELETE, EDIT...*/
    switch ($_REQUEST['action']) {
        /*Caso añadir a la BD*/
        case 'ADD': 
                if (!$_POST){
                    new tabla_ejercicios_ADD();
                }
                else{
                    $tabla_ejercicios = get_data_form();
                    $respuesta = $tabla_ejercicios->ADD();
                    new MESSAGE($respuesta, '../Controller/tabla_ejercicios_Controller.php');
                }
                break;      
        case 'DELETE': //Borrado de actividades
           if (!$_POST){
                    $tabla_ejercicios = new tabla_ejercicios_Model($_REQUEST['idTabla'], $_REQUEST['idEjercicio']);
                    $valores = $tabla_ejercicios->RellenaDatos();
                    new tabla_ejercicios_DELETE($valores);
                }
                else{
                    $tabla_ejercicios = get_data_form();
                    $respuesta = $tabla_ejercicios->DELETE();
                    new MESSAGE($respuesta, '../Controller/tabla_ejercicios_Controller.php');
                }
                break;
        case 'SHOWCURRENT': //Mostrar información detallada
                $tabla_ejercicios = new tabla_ejercicios_Model($_REQUEST['idTabla'], $_REQUEST['idEjercicio']);
                $valores = $tabla_ejercicios->RellenaDatos();
                new tabla_ejercicios_SHOWCURRENT($valores);
                break;
        case 'EDIT': //Modificación de actividades
if (!$_POST){
                    $tabla_ejercicios = new tabla_ejercicios_Model($_REQUEST['idTabla'], $_REQUEST['idEjercicio']);
                    $valores = $tabla_ejercicios->RellenaDatos();
                    new tabla_ejercicios_EDIT($valores);
                }
                else{
                    
                    $tabla_ejercicios = get_data_form();

                    $respuesta = $tabla_ejercicios->EDIT();
                    new MESSAGE($respuesta, '../Controller/tabla_ejercicios_Controller.php');
                }
                
                break;
        case 'SEARCH': //Consulta de actividades
            if (!$_POST){
                    new tabla_ejercicios_SEARCH();
                }
                else{
                    $tabla_ejercicios = get_data_form();
                    $datos = $tabla_ejercicios->SEARCH();
                     $lista = array('idTabla','idEjercicio');
                    new tabla_ejercicios_SHOWALL($lista, $datos, '../index.php');
                }
                break;
        default:
           if (!$_POST){
                    $tabla_ejercicios = new tabla_ejercicios_Model('','');
                }
                else{
                    $tabla_ejercicios = get_data_form();
                }
                $datos = $tabla_ejercicios->SEARCH();
                $lista = array('idTabla','idEjercicio');
                new tabla_ejercicios_SHOWALL($lista, $datos,'../Controller/tabla_ejercicios_Controller.php' );

            }

    

?>
