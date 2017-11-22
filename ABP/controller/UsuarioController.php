<?php

require_once(__DIR__."/../core/ViewManager.php");
require_once(__DIR__ . "/../controller/BaseController.php");
require_once(__DIR__ . "/../model/UsuarioMapper.php");
require_once(__DIR__ . "/../model/Usuario.php");

class UsuarioController extends BaseController
{
    private $usuarioMapper;

    public function __construct() 
    {
        parent::__construct();/*llama al contructor padre 'BaseController de gestion de la sesion*/
        $this->usuarioMapper = new UsuarioMapper();
    }
    


    /*Notificacion ADD
    *Si se llama con un get carga la vista
    *si se llama con un post añade la notificacion
    */
    public function UsuarioADD() 
    {
        if(isset($_POST["Asunto"]) && isset($_POST["contenido"]))
        {//si existen los post añado la notificacion
            $notificacion = new Notificacion();
            $notificacion->setAsunto($_POST["Asunto"]);
            $notificacion->setContenido($_POST["contenido"]);
            $notificacion->setFecha(date("Y-m-d H:i:s"));
            if($this->notificacionMapper->add($notificacion))
            {
               $this->view->setFlash("Notificación Añadida Correctamente");

            }else
            {
                $errors["username"] = "La notificación no se ha añadido corectamente";
                $this->view->setFlash($errors["username"]);
            }
            $this->view->redirect("Notificacion", "NotificacionListar");
        }else
        {
            $this->view->render("notificacion","notificacionADD");
        }
        
    }




    /*NotificacionListar
    *Muestra una lista con todos las Notificaciones
    */
    public function UsuariosListar() 
    {
       $usuarios = $this->usuarioMapper->listar();
       $this->view->setVariable("usuarios",$usuarios);
       $this->view->render("usuario","usuarioSHOWALL");
    }
    



    /*NotificacionListar
    *Muestra una lista con todos las Notificaciones
    */
    public function UsuarioEDIT() 
    {
       $notificaciones = $this->notificacionMapper->listar();
       $this->view->setVariable("notificaciones",$notificaciones);
       $this->view->render("notificacion","notificacionSHOWALL");
    }
    


    /*NotificacionListar
    *Muestra una lista con todos las Notificaciones
    */
    public function UsuariosDELETE() 
    {
       $notificaciones = $this->notificacionMapper->listar();
       $this->view->setVariable("notificaciones",$notificaciones);
       $this->view->render("notificacion","notificacionSHOWALL");
    }
    



    /*Notificacion SHOW CURRENT
    *Si se llama con un get carga la vista
    *si se llama con un post muestra notificacion
    */
    public function UsuarioView() 
    {
        if (!isset($_GET["dni"])) 
        {
            throw new Exception("El dni es obligatorio");
        }
        $dni = $_GET["dni"];
        // find the notification object in the database
        $usuario = $this->usuarioMapper->findById($dni);
        if ($usuario == NULL) 
        {
            throw new Exception("No existe usuario con este dni: ".$dni);
        }
        // put the notification object to the view
        $this->view->setVariable("usuario", $usuario);
        // render the view (/view/posts/view.php)
        $this->view->render("usuario", "usuarioSHOWCURRENT");
    }

}
?>