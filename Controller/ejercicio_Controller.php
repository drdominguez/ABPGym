
<?php 
    session_start(); //solicito trabajar con la session

    include '../Model/ejercicio_Model.php';

    include '../View/MESSAGE_View.php';
    include '../Functions/Authentication.php';

    if (!IsAuthenticated()){
        header('Location:../index.php');
    }
    include '../Locates/Strings_'.$_SESSION['idioma'].'.php';

    /*Generamos los includes de las diferentes vistas*/
    include '../View/ejercicio_ADD_View.php';
    include '../View/ejercicio_DELETE_View.php';
    include '../View/ejercicio_EDIT_View.php';
    include '../View/ejercicio_SEARCH_View.php';
    include '../View/ejercicio_SHOWCURRENT_View.php';
    include '../View/ejercicio_SHOWALL_View.php';

    function get_data_form(){

    //Recoge la información del formulario

                $idEjercicio = $_REQUEST['idEjercicio'];

         
                $nombre = $_REQUEST['nombre'];

         
                $descripcion = $_REQUEST['descripcion'];

         
                $video = $_REQUEST['video'];

         
                $imagen = $_REQUEST['imagen'];

         $accion = $_REQUEST['action'];

    $ejercicio = new ejercicio_Model($idEjercicio,$nombre,$descripcion,$video,$imagen);

    return $ejercicio;
}

if (!isset($_REQUEST['action'])){
    $_REQUEST['action'] = '';
}
    
    /*A continuación creamos el switch con el cual podremos gestionar las peticiones de ADD, DELETE, EDIT...*/
    switch ($_REQUEST['action']) {
        /*Caso añadir a la BD*/
        case 'ADD': 
                if (!$_POST){
                    new ejercicio_ADD();
                }
                else{
                    $ejercicio = get_data_form();
                    $respuesta = $ejercicio->ADD();
                    new MESSAGE($respuesta, '../Controller/ejercicio_Controller.php');
                }
                break;      
        case 'DELETE': //Borrado de actividades
           if (!$_POST){
                    $ejercicio = new ejercicio_Model($_REQUEST['idEjercicio'],'','','','');
                    $valores = $ejercicio->RellenaDatos();
                    new ejercicio_DELETE($valores);
                }
                else{
                    $ejercicio = get_data_form();
                    $respuesta = $ejercicio->DELETE();
                    new MESSAGE($respuesta, '../Controller/ejercicio_Controller.php');
                }
                break;
        case 'SHOWCURRENT': //Mostrar información detallada
                $ejercicio = new ejercicio_Model($_REQUEST['idEjercicio'],'','','','');
                $valores = $ejercicio->RellenaDatos();
                new ejercicio_SHOWCURRENT($valores);
                break;
        case 'EDIT': //Modificación de actividades
if (!$_POST){
                    $ejercicio = new ejercicio_Model($_REQUEST['idEjercicio'],'','','','');
                    $valores = $ejercicio->RellenaDatos();
                    new ejercicio_EDIT($valores);
                }
                else{
                    
                    $ejercicio = get_data_form();

                    $respuesta = $ejercicio->EDIT();
                    new MESSAGE($respuesta, '../Controller/ejercicio_Controller.php');
                }
                
                break;
        case 'SEARCH': //Consulta de actividades
            if (!$_POST){
                    new ejercicio_SEARCH();
                }
                else{
                    $ejercicio = get_data_form();
                    $datos = $ejercicio->SEARCH();
                     $lista = array('idEjercicio','nombre','descripcion','video','imagen');
                    new ejercicio_SHOWALL($lista, $datos, '../index.php');
                }
                break;
        default:
           if (!$_POST){
                    $ejercicio = new ejercicio_Model('','','','','');
                }
                else{
                    $ejercicio = get_data_form();
                }
                $datos = $ejercicio->SEARCH();
                $lista = array('idEjercicio','nombre','descripcion','video','imagen');
                new ejercicio_SHOWALL($lista, $datos,'../Controller/ejercicio_Controller.php' );

            }

    

?>
