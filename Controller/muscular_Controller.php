
<?php 
    session_start(); //solicito trabajar con la session

    include '../Model/muscular_Model.php';

    include '../View/MESSAGE_View.php';
    include '../Functions/Authentication.php';

    if (!IsAuthenticated()){
        header('Location:../index.php');
    }
    include '../Locates/Strings_'.$_SESSION['idioma'].'.php';

    /*Generamos los includes de las diferentes vistas*/
    include '../View/muscular_ADD_View.php';
    include '../View/muscular_DELETE_View.php';
    include '../View/muscular_EDIT_View.php';
    include '../View/muscular_SEARCH_View.php';
    include '../View/muscular_SHOWCURRENT_View.php';
    include '../View/muscular_SHOWALL_View.php';

    function get_data_form(){

    //Recoge la información del formulario

                $idEjercicio = $_REQUEST['idEjercicio'];

         
                $carga = $_REQUEST['carga'];

         
                $repeticiones = $_REQUEST['repeticiones'];

         $accion = $_REQUEST['action'];

    $muscular = new muscular_Model($idEjercicio,$carga,$repeticiones);

    return $muscular;
}

if (!isset($_REQUEST['action'])){
    $_REQUEST['action'] = '';
}
    
    /*A continuación creamos el switch con el cual podremos gestionar las peticiones de ADD, DELETE, EDIT...*/
    switch ($_REQUEST['action']) {
        /*Caso añadir a la BD*/
        case 'ADD': 
                if (!$_POST){
                    new muscular_ADD();
                }
                else{
                    $muscular = get_data_form();
                    $respuesta = $muscular->ADD();
                    new MESSAGE($respuesta, '../Controller/muscular_Controller.php');
                }
                break;      
        case 'DELETE': //Borrado de actividades
           if (!$_POST){
                    $muscular = new muscular_Model($_REQUEST['idEjercicio'],'','');
                    $valores = $muscular->RellenaDatos();
                    new muscular_DELETE($valores);
                }
                else{
                    $muscular = get_data_form();
                    $respuesta = $muscular->DELETE();
                    new MESSAGE($respuesta, '../Controller/muscular_Controller.php');
                }
                break;
        case 'SHOWCURRENT': //Mostrar información detallada
                $muscular = new muscular_Model($_REQUEST['idEjercicio'],'','');
                $valores = $muscular->RellenaDatos();
                new muscular_SHOWCURRENT($valores);
                break;
        case 'EDIT': //Modificación de actividades
if (!$_POST){
                    $muscular = new muscular_Model($_REQUEST['idEjercicio'],'','');
                    $valores = $muscular->RellenaDatos();
                    new muscular_EDIT($valores);
                }
                else{
                    
                    $muscular = get_data_form();

                    $respuesta = $muscular->EDIT();
                    new MESSAGE($respuesta, '../Controller/muscular_Controller.php');
                }
                
                break;
        case 'SEARCH': //Consulta de actividades
            if (!$_POST){
                    new muscular_SEARCH();
                }
                else{
                    $muscular = get_data_form();
                    $datos = $muscular->SEARCH();
                     $lista = array('idEjercicio','carga','repeticiones');
                    new muscular_SHOWALL($lista, $datos, '../index.php');
                }
                break;
        default:
           if (!$_POST){
                    $muscular = new muscular_Model('','','');
                }
                else{
                    $muscular = get_data_form();
                }
                $datos = $muscular->SEARCH();
                $lista = array('idEjercicio','carga','repeticiones');
                new muscular_SHOWALL($lista, $datos,'../Controller/muscular_Controller.php' );

            }

    

?>
