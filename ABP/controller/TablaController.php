<?php

require_once(__DIR__."/../core/ViewManager.php");
require_once(__DIR__ . "/../controller/BaseController.php");
require_once(__DIR__ . "/../model/TablaMapper.php");
require_once(__DIR__ . "/../model/Tabla.php");

class TablaController extends BaseController{

    private $tablaMapper;

    public function __construct() {
        parent::__construct();/*llama al contructor padre 'BaseController de gestion de la sesion*/
        $this->tablaMapper = new TablaMapper();
    }
    
    /*Notificacion ADD
    *Si se llama con un get carga la vista
    *si se llama con un post añade la notificacion
    */
    public function TablaADD() {
        if(isset($_POST["Asunto"]) && isset($_POST["contenido"])){//si existen los post añado la notificacion
            $tabla = new Tabla();
            $tabla->setAsunto($_POST["Asunto"]);
            $tabla->setContenido($_POST["contenido"]);
            $tabla->setFecha(date("Y-m-d H:i:s"));
            if($this->tablaMapper->add($tabla)){
               $this->view->setFlash("Tabla Añadida Correctamente");
            }else{
                $errors["username"] = "La tabla no se ha añadido corectamente";
                $this->view->setFlash($errors["username"]);
            }
        }
        $this->view->render("tabla","tablaADD");
    }

    /*NotificacionListar
    *Muestra una lista con todos las Notificaciones
    */
    public function TablaListar() {
       $tablas = $this->tablaMapper->listar();
       $this->view->setVariable("tablas",$tablas);
       $this->view->render("tabla","tablaSHOWALL");
    }


    /*Notificacion SHOW CURRENT
    *Si se llama con un get carga la vista
    *si se llama con un post muestra notificacion
    */
    public function TablaView() {

        if (!isset($_GET["idTabla"])) {
            throw new Exception("El id es obligatorio");
        }

        $idTabla = $_GET["idTabla"];

        // find the notification object in the database
        $tabla = $this->tablaMapper->findById($idTabla);


        if ($tabla == NULL) {
            throw new Exception("No existe tabla con este id: ".$idTabla);
        }

        // put the notification object to the view
        $this->view->setVariable("tabla", $tabla);
        $this->tablaMapper->visto($tabla->getIdTabla(),$_SESSION['currentuser']);

        // render the view (/view/posts/view.php)
        $this->view->render("tabla", "tablaSHOWCURRENT");
    }



}
?>