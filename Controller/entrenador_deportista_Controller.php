
<?php 
    session_start(); //solicito trabajar con la session

    include '../Model/entrenador_deportista_Model.php';

    include '../View/MESSAGE_View.php';
    include '../Functions/Authentication.php';

    if (!IsAuthenticated()){
        header('Location:../index.php');
    }
    include '../Locates/Strings_'.$_SESSION['idioma'].'.php';

    /*Generamos los includes de las diferentes vistas*/
    include '../View/entrenador_deportista_ADD_View.php';
    include '../View/entrenador_deportista_DELETE_View.php';
    include '../View/entrenador_deportista_EDIT_View.php';
    include '../View/entrenador_deportista_SEARCH_View.php';
    include '../View/entrenador_deportista_SHOWCURRENT_View.php';
    include '../View/entrenador_deportista_SHOWALL_View.php';

    function get_data_form(){

    //Recoge la información del formulario

                $dniEntrenador = $_REQUEST['dniEntrenador'];

         
                $dniDeportista = $_REQUEST['dniDeportista'];

         $accion = $_REQUEST['action'];

    $entrenador_deportista = new entrenador_deportista_Model($dniEntrenador,$dniDeportista);

    return $entrenador_deportista;
}

if (!isset($_REQUEST['action'])){
    $_REQUEST['action'] = '';
}
    
    /*A continuación creamos el switch con el cual podremos gestionar las peticiones de ADD, DELETE, EDIT...*/
    switch ($_REQUEST['action']) {
        /*Caso añadir a la BD*/
        case 'ADD': 
                if (!$_POST){
                    new entrenador_deportista_ADD();
                }
                else{
                    $entrenador_deportista = get_data_form();
                    $respuesta = $entrenador_deportista->ADD();
                    new MESSAGE($respuesta, '../Controller/entrenador_deportista_Controller.php');
                }
                break;      
        case 'DELETE': //Borrado de actividades
           if (!$_POST){
                    $entrenador_deportista = new entrenador_deportista_Model($_REQUEST['dniEntrenador'], $_REQUEST['dniDeportista']);
                    $valores = $entrenador_deportista->RellenaDatos();
                    new entrenador_deportista_DELETE($valores);
                }
                else{
                    $entrenador_deportista = get_data_form();
                    $respuesta = $entrenador_deportista->DELETE();
                    new MESSAGE($respuesta, '../Controller/entrenador_deportista_Controller.php');
                }
                break;
        case 'SHOWCURRENT': //Mostrar información detallada
                $entrenador_deportista = new entrenador_deportista_Model($_REQUEST['dniEntrenador'], $_REQUEST['dniDeportista']);
                $valores = $entrenador_deportista->RellenaDatos();
                new entrenador_deportista_SHOWCURRENT($valores);
                break;
        case 'EDIT': //Modificación de actividades
if (!$_POST){
                    $entrenador_deportista = new entrenador_deportista_Model($_REQUEST['dniEntrenador'], $_REQUEST['dniDeportista']);
                    $valores = $entrenador_deportista->RellenaDatos();
                    new entrenador_deportista_EDIT($valores);
                }
                else{
                    
                    $entrenador_deportista = get_data_form();

                    $respuesta = $entrenador_deportista->EDIT();
                    new MESSAGE($respuesta, '../Controller/entrenador_deportista_Controller.php');
                }
                
                break;
        case 'SEARCH': //Consulta de actividades
            if (!$_POST){
                    new entrenador_deportista_SEARCH();
                }
                else{
                    $entrenador_deportista = get_data_form();
                    $datos = $entrenador_deportista->SEARCH();
                     $lista = array('dniEntrenador','dniDeportista');
                    new entrenador_deportista_SHOWALL($lista, $datos, '../index.php');
                }
                break;
        default:
           if (!$_POST){
                    $entrenador_deportista = new entrenador_deportista_Model('','');
                }
                else{
                    $entrenador_deportista = get_data_form();
                }
                $datos = $entrenador_deportista->SEARCH();
                $lista = array('dniEntrenador','dniDeportista');
                new entrenador_deportista_SHOWALL($lista, $datos,'../Controller/entrenador_deportista_Controller.php' );

            }

    

?>
