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
        $this->notificacionMapper = new NotificacionMapper();
        if(isset($_POST["Asunto"]) && isset($_POST["contenido"])){//si existen los post añado la notificacion
            $notificacion = new Notificacion();
            $notificacion->setAsunto($_POST["Asunto"]);
            $notificacion->setContenido($_POST["contenido"]);
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
       $this->notificacionMapper = new NotificacionMapper();

    }


    /*cardioADD
    *Si se llama con un get carga la vista
    *si se llama con un post añade el cardio
    */
    public function NotificacionConsultar() {
        $this->notificacionMapper = new NotificacionMapper();

    }



}
?>