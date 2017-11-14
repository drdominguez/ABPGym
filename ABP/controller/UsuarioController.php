<?php
    
class UsuarioController extends BaseController{

    private $UsuarioMapper;

    public function __construct() {
        parent::__construct();/*llama al contructor padre 'BaseController de gestion de la sesion*/
        $this->UsuarioMapper = new UsuarioMapper();
    }

    function get_data_form(){

    //Recoge la informaciÃ³n del formulario

                $dni = $_REQUEST['dni'];

         
                $nombre = $_REQUEST['nombre'];

         
                $apellidos = $_REQUEST['apellidos'];

         
                $edad = $_REQUEST['edad'];

                if(isset($_REQUEST['contrasena'])){
                    $contraseña = $_REQUEST['contrasena'];
                }else{
                    $contrasena = null;
                }
                

         
                $email = $_REQUEST['email'];

         
                $telefono = $_REQUEST['telefono'];

         if(isset($_REQUEST['fechaAlta'])){
                   $fechaAlta = $_REQUEST['fechaAlta'];
                }else{
                    $fechaAlta = date("Y-m-d");
                }
                


         $accion = $_REQUEST['action'];

    $usuario = new usuario_Model($dni,$nombre,$apellidos,$edad,$contraseña,$email,$telefono,$fechaAlta);

    return $usuario;
}

if (!isset($_REQUEST['action'])){
    $_REQUEST['action'] = '';
}
    
    /*A continuaciÃ³n creamos el switch con el cual podremos gestionar las peticiones de ADD, DELETE, EDIT...*/
    switch ($_REQUEST['action']) {
        /*Caso aÃ±adir a la BD*/
        case 'ADD': 
                if (!$_POST){
                    new usuario_ADD();
                }
                else{
                    $usuario = get_data_form();
                    $respuesta = $usuario->ADD();
                    new MESSAGE($respuesta, '../controller/usuario_Controller.php');
                }
                break;      
        case 'DELETE': //Borrado de actividades
           if (!$_POST){
                    $usuario = new usuario_Model($_REQUEST['dni'],'','','','','','','');
                    $valores = $usuario->RellenaDatos2();
                    new usuario_DELETE($valores);
                }
                else{
                    $usuario = get_data_form();
                    $respuesta = $usuario->DELETE();
                    new MESSAGE($respuesta, '../controller/usuario_Controller.php');
                }
                break;
        case 'SHOWCURRENT': //Mostrar informaciÃ³n detallada
                $usuario = new usuario_Model($_REQUEST['dni'],'','','','','','','');
                $valores = $usuario->RellenaDatos2();
                new usuario_SHOWCURRENT($valores);
                break;
        case 'EDIT': //ModificaciÃ³n de actividades
if (!$_POST){
                    $usuario = new usuario_Model($_REQUEST['dni'],'','','','','','','');
                    $valores = $usuario->RellenaDatos2();
                    new usuario_EDIT($valores);
                }
                else{
                    
                    $usuario = get_data_form();

                    $respuesta = $usuario->EDIT();
                    new MESSAGE($respuesta, '../controller/usuario_Controller.php');
                }
                
                break;
        default:
           if (!$_POST){
                    $usuario = new usuario_Model('','','','','','','','');
                }
                else{
                    $usuario = get_data_form();
                }
                $datos = $usuario->SEARCH();
                $lista = array('dni','nombre','apellidos','email');
                new usuario_SHOWALL($lista, $datos,'../controller/usuario_Controller.php' );

            }

    
}
?>
