
<?php 
    session_start(); //solicito trabajar con la session

    include '../Model/superusuario_tabla_deportista_Model.php';

    include '../View/MESSAGE_View.php';
    include '../Functions/Authentication.php';

    if (!IsAuthenticated()){
        header('Location:../index.php');
    }
    include '../Locates/Strings_'.$_SESSION['idioma'].'.php';

    /*Generamos los includes de las diferentes vistas*/
    include '../View/superusuario_tabla_deportista_ADD_View.php';
    include '../View/superusuario_tabla_deportista_DELETE_View.php';
    include '../View/superusuario_tabla_deportista_EDIT_View.php';
    include '../View/superusuario_tabla_deportista_SEARCH_View.php';
    include '../View/superusuario_tabla_deportista_SHOWCURRENT_View.php';
    include '../View/superusuario_tabla_deportista_SHOWALL_View.php';

    function get_data_form(){

    //Recoge la información del formulario

                $dniSuperUsuario = $_REQUEST['dniSuperUsuario'];

         
                $dniDeportista = $_REQUEST['dniDeportista'];

         
                $idTabla = $_REQUEST['idTabla'];

         $accion = $_REQUEST['action'];

    $superusuario_tabla_deportista = new superusuario_tabla_deportista_Model($dniSuperUsuario,$dniDeportista,$idTabla);

    return $superusuario_tabla_deportista;
}

if (!isset($_REQUEST['action'])){
    $_REQUEST['action'] = '';
}
    
    /*A continuación creamos el switch con el cual podremos gestionar las peticiones de ADD, DELETE, EDIT...*/
    switch ($_REQUEST['action']) {
        /*Caso añadir a la BD*/
        case 'ADD': 
                if (!$_POST){
                    new superusuario_tabla_deportista_ADD();
                }
                else{
                    $superusuario_tabla_deportista = get_data_form();
                    $respuesta = $superusuario_tabla_deportista->ADD();
                    new MESSAGE($respuesta, '../Controller/superusuario_tabla_deportista_Controller.php');
                }
                break;      
        case 'DELETE': //Borrado de actividades
           if (!$_POST){
                    $superusuario_tabla_deportista = new superusuario_tabla_deportista_Model($_REQUEST['dniSuperUsuario'], $_REQUEST['dniDeportista'], $_REQUEST['idTabla']);
                    $valores = $superusuario_tabla_deportista->RellenaDatos();
                    new superusuario_tabla_deportista_DELETE($valores);
                }
                else{
                    $superusuario_tabla_deportista = get_data_form();
                    $respuesta = $superusuario_tabla_deportista->DELETE();
                    new MESSAGE($respuesta, '../Controller/superusuario_tabla_deportista_Controller.php');
                }
                break;
        case 'SHOWCURRENT': //Mostrar información detallada
                $superusuario_tabla_deportista = new superusuario_tabla_deportista_Model($_REQUEST['dniSuperUsuario'], $_REQUEST['dniDeportista'], $_REQUEST['idTabla']);
                $valores = $superusuario_tabla_deportista->RellenaDatos();
                new superusuario_tabla_deportista_SHOWCURRENT($valores);
                break;
        case 'EDIT': //Modificación de actividades
if (!$_POST){
                    $superusuario_tabla_deportista = new superusuario_tabla_deportista_Model($_REQUEST['dniSuperUsuario'], $_REQUEST['dniDeportista'], $_REQUEST['idTabla']);
                    $valores = $superusuario_tabla_deportista->RellenaDatos();
                    new superusuario_tabla_deportista_EDIT($valores);
                }
                else{
                    
                    $superusuario_tabla_deportista = get_data_form();

                    $respuesta = $superusuario_tabla_deportista->EDIT();
                    new MESSAGE($respuesta, '../Controller/superusuario_tabla_deportista_Controller.php');
                }
                
                break;
        case 'SEARCH': //Consulta de actividades
            if (!$_POST){
                    new superusuario_tabla_deportista_SEARCH();
                }
                else{
                    $superusuario_tabla_deportista = get_data_form();
                    $datos = $superusuario_tabla_deportista->SEARCH();
                     $lista = array('dniSuperUsuario','dniDeportista','idTabla');
                    new superusuario_tabla_deportista_SHOWALL($lista, $datos, '../index.php');
                }
                break;
        default:
           if (!$_POST){
                    $superusuario_tabla_deportista = new superusuario_tabla_deportista_Model('','','');
                }
                else{
                    $superusuario_tabla_deportista = get_data_form();
                }
                $datos = $superusuario_tabla_deportista->SEARCH();
                $lista = array('dniSuperUsuario','dniDeportista','idTabla');
                new superusuario_tabla_deportista_SHOWALL($lista, $datos,'../Controller/superusuario_tabla_deportista_Controller.php' );

            }

    

?>
