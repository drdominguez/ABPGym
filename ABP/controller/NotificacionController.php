<?php

require_once(__DIR__."/../core/ViewManager.php");
require_once(__DIR__ . "/../controller/BaseController.php");
require_once(__DIR__ . "/../model/NotificacionMapper.php");
require_once(__DIR__ . "/../model/Notificacion.php");
require_once(__DIR__ . "/../model/NotificacionDeportista.php");

class NotificacionController extends BaseController{

    private $notificacionMapper;

    public function __construct() {
        parent::__construct();/*llama al contructor padre 'BaseController de gestion de la sesion*/
        $this->notificacionMapper = new NotificacionMapper();
    }
    
    /*Notificacion ADD
    *Si se llama con un get carga la vista
    *si se llama con un post añade la notificacion
    */
    public function NotificacionADD() {
        if(isset($_POST["Asunto"]) && isset($_POST["contenido"])){//si existen los post añado la notificacion
            $notificacion = new Notificacion();
            $notificacion->setAsunto($_POST["Asunto"]);
            $notificacion->setContenido($_POST["contenido"]);
            $notificacion->setDniAdministrador($_POST["dniAdministrador"]);
            $notificacion->setFecha(date("Y-m-d H:i:s"));
            if($this->notificacionMapper->add($notificacion)){
               $this->view->setFlash("Notificación Añadida Correctamente");

            }else{
                $errors["username"] = "La notificación no se ha añadido corectamente";
                $this->view->setFlash($errors["username"]);
            }
        }
        $this->view->render("notificacion","notificacionADD");
    }

    /*NotificacionListar
    *Muestra una lista con todos las Notificaciones
    */
    public function NotificacionListar() {
       $notificaciones = $this->notificacionMapper->listar();
       $this->view->setVariable("notificaciones",$notificaciones);
       $this->view->render("notificacion","notificacionSHOWALL");
    }


    /*cardioADD
    *Si se llama con un get carga la vista
    *si se llama con un post añade el cardio
    */
    public function NotificacionView() {

        if (!isset($_GET["idNotificacion"])) {
            throw new Exception("El id es obligatorio");
        }

        $idNotificacion = $_GET["idNotificacion"];

        // find the notification object in the database
        $notificacion = $this->notificacionMapper->findById($idNotificacion);


        if ($notificacion == NULL) {
            throw new Exception("No existe notificacion con este id: ".$idNotificacion);
        }

        // put the notification object to the view
        $this->view->setVariable("notificacion", $notificacion);

        // render the view (/view/posts/view.php)
        $this->view->render("notificacion", "notificacionSHOWCURRENT");

    }



}
?>