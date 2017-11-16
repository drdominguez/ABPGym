
<?php 
    session_start(); //solicito trabajar con la session

    include '../model/pago_Model.php';

    include '../view/MESSAGE_View.php';
    include '../Functions/Authentication.php';

    if (!IsAuthenticated()){
        header('Location:../index.php');
    }
    include '../locates/Strings_'.$_SESSION['idioma'].'.php';

    /*Generamos los includes de las diferentes vistas*/
    include '../view/pago_ADD_View.php';
    include '../view/pago_DELETE_View.php';
    include '../view/pago_EDIT_View.php';
    include '../view/pago_SEARCH_View.php';
    include '../view/pago_SHOWCURRENT_View.php';
    include '../view/pago_SHOWALL_View.php';

    function get_data_form(){

    //Recoge la información del formulario

                $idPago = $_REQUEST['idPago'];

         
                $dniDeportista = $_REQUEST['dniDeportista'];

         
                $idActividad = $_REQUEST['idActividad'];

         
                $importe = $_REQUEST['importe'];

         
                $fecha = $_REQUEST['fecha'];

         $accion = $_REQUEST['action'];

    $pago = new pago_Model($idPago,$dniDeportista,$idActividad,$importe,$fecha);

    return $pago;
}

if (!isset($_REQUEST['action'])){
    $_REQUEST['action'] = '';
}
    
    /*A continuación creamos el switch con el cual podremos gestionar las peticiones de ADD, DELETE, EDIT...*/
    switch ($_REQUEST['action']) {
        /*Caso añadir a la BD*/
        case 'ADD': 
                if (!$_POST){
                    new pago_ADD();
                }
                else{
                    $pago = get_data_form();
                    $respuesta = $pago->ADD();
                    new MESSAGE($respuesta, '../controller/pago_Controller.php');
                }
                break;      
        case 'DELETE': //Borrado de actividades
           if (!$_POST){
                    $pago = new pago_Model($_REQUEST['idPago'],'','','','');
                    $valores = $pago->RellenaDatos();
                    new pago_DELETE($valores);
                }
                else{
                    $pago = get_data_form();
                    $respuesta = $pago->DELETE();
                    new MESSAGE($respuesta, '../controller/pago_Controller.php');
                }
                break;
        case 'SHOWCURRENT': //Mostrar información detallada
                $pago = new pago_Model($_REQUEST['idPago'],'','','','');
                $valores = $pago->RellenaDatos();
                new pago_SHOWCURRENT($valores);
                break;
        case 'EDIT': //Modificación de actividades
if (!$_POST){
                    $pago = new pago_Model($_REQUEST['idPago'],'','','','');
                    $valores = $pago->RellenaDatos();
                    new pago_EDIT($valores);
                }
                else{
                    
                    $pago = get_data_form();

                    $respuesta = $pago->EDIT();
                    new MESSAGE($respuesta, '../controller/pago_Controller.php');
                }
                
                break;
        case 'SEARCH': //Consulta de actividades
            if (!$_POST){
                    new pago_SEARCH();
                }
                else{
                    $pago = get_data_form();
                    $datos = $pago->SEARCH();
                     $lista = array('idPago','dniDeportista','idActividad','importe','fecha');
                    new pago_SHOWALL($lista, $datos, '../index.php');
                }
                break;
        default:
           if (!$_POST){
                    $pago = new pago_Model('','','','','');
                }
                else{
                    $pago = get_data_form();
                }
                $datos = $pago->SEARCH();
                $lista = array('idPago','dniDeportista','idActividad','importe','fecha');
                new pago_SHOWALL($lista, $datos,'../controller/pago_Controller.php' );

            }

    

?>
