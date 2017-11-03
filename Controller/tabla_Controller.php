
<?php 
    session_start(); //solicito trabajar con la session

    include '../Model/tabla_Model.php';

    include '../View/MESSAGE_View.php';
    include '../Functions/Authentication.php';

    if (!IsAuthenticated()){
        header('Location:../index.php');
    }
    include '../Locates/Strings_'.$_SESSION['idioma'].'.php';

    /*Generamos los includes de las diferentes vistas*/
    include '../View/tabla_ADD_View.php';
    include '../View/tabla_DELETE_View.php';
    include '../View/tabla_EDIT_View.php';
    include '../View/tabla_SEARCH_View.php';
    include '../View/tabla_SHOWCURRENT_View.php';
    include '../View/tabla_SHOWALL_View.php';

    function get_data_form(){

    //Recoge la información del formulario

                $idTabla = $_REQUEST['idTabla'];

         
                $tipo = $_REQUEST['tipo'];

         
                $comentario = $_REQUEST['comentario'];

         $accion = $_REQUEST['action'];

    $tabla = new tabla_Model($idTabla,$tipo,$comentario);

    return $tabla;
}

if (!isset($_REQUEST['action'])){
    $_REQUEST['action'] = '';
}
    
    /*A continuación creamos el switch con el cual podremos gestionar las peticiones de ADD, DELETE, EDIT...*/
    switch ($_REQUEST['action']) {
        /*Caso añadir a la BD*/
        case 'ADD': 
                if (!$_POST){
                    new tabla_ADD();
                }
                else{
                    $tabla = get_data_form();
                    $respuesta = $tabla->ADD();
                    new MESSAGE($respuesta, '../Controller/tabla_Controller.php');
                }
                break;      
        case 'DELETE': //Borrado de actividades
           if (!$_POST){
                    $tabla = new tabla_Model(,'','','');
                    $valores = $tabla->RellenaDatos();
                    new tabla_DELETE($valores);
                }
                else{
                    $tabla = get_data_form();
                    $respuesta = $tabla->DELETE();
                    new MESSAGE($respuesta, '../Controller/tabla_Controller.php');
                }
                break;
        case 'SHOWCURRENT': //Mostrar información detallada
                $tabla = new tabla_Model(,'','','');
                $valores = $tabla->RellenaDatos();
                new tabla_SHOWCURRENT($valores);
                break;
        case 'EDIT': //Modificación de actividades
if (!$_POST){
                    $tabla = new tabla_Model(,'','','');
                    $valores = $tabla->RellenaDatos();
                    new tabla_EDIT($valores);
                }
                else{
                    
                    $tabla = get_data_form();

                    $respuesta = $tabla->EDIT();
                    new MESSAGE($respuesta, '../Controller/tabla_Controller.php');
                }
                
                break;
        case 'SEARCH': //Consulta de actividades
            if (!$_POST){
                    new tabla_SEARCH();
                }
                else{
                    $tabla = get_data_form();
                    $datos = $tabla->SEARCH();
                     $lista = array('idTabla','tipo','comentario');
                    new tabla_SHOWALL($lista, $datos, '../index.php');
                }
                break;
        default:
           if (!$_POST){
                    $tabla = new tabla_Model('','','');
                }
                else{
                    $tabla = get_data_form();
                }
                $datos = $tabla->SEARCH();
                $lista = array('idTabla','tipo','comentario');
                new tabla_SHOWALL($lista, $datos,'../Controller/tabla_Controller.php' );

            }

    

?>
