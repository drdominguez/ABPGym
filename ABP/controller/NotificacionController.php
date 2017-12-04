<?php

require_once(__DIR__."/../core/ViewManager.php");
require_once(__DIR__ . "/../controller/BaseController.php");
require_once(__DIR__ . "/../model/NotificacionMapper.php");
require_once(__DIR__ . "/../model/Notificacion.php");
require_once(__DIR__ . "/../core/permisos.php");

class NotificacionController extends BaseController
{
    private $notificacionMapper;
    private $permisos;

    public function __construct() 
    {
        parent::__construct();/*llama al contructor padre 'BaseController de gestion de la sesion*/
        $this->notificacionMapper = new NotificacionMapper();
        $this->permisos= new Permisos();
    }
    


    /*Notificacion ADD
    *Si se llama con un get carga la vista
    *si se llama con un post añade la notificacion
    */
    public function NotificacionADD() 
    {
        if($this->permisos->esAdministrador()){
            if(isset($_POST["Asunto"]) && isset($_POST["contenido"]) && isset($_POST["usuarios"]))
            {//si existen los post añado la notificacion
                $usuarios = $_POST['usuarios'];
                $notificacion = new Notificacion();
                $notificacion->setAsunto($_POST["Asunto"]);
                $notificacion->setContenido($_POST["contenido"]);
                $notificacion->setFecha(date("Y-m-d H:i:s"));
                if($this->notificacionMapper->add($notificacion,$usuarios))
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
                $usuarios = $this->notificacionMapper->listarUsuarios();
                $this->view->setVariable("usuarios",$usuarios);
                $this->view->render("notificacion","notificacionADD");
            }
            
        }else{
                $this->view->redirect("main", "index");
        }
    
        
    }




    /*NotificacionListar
    *Muestra una lista con todos las Notificaciones
    */
    public function NotificacionListar() 
    {
       $notificaciones = $this->notificacionMapper->listar();
       $this->view->setVariable("notificaciones",$notificaciones);
       $this->view->render("notificacion","notificacionSHOWALL");
    }
    




    /*Notificacion SHOW CURRENT
    *Si se llama con un get carga la vista
    *si se llama con un post muestra notificacion
    */
    public function NotificacionView() 
    {
        if (!isset($_GET["idNotificacion"])) 
        {
            throw new Exception("El id es obligatorio");
        }
        $idNotificacion = $_GET["idNotificacion"];
        $tipoUsuario = $this->permisos->comprobarTipo();

        // find the notification object in the database
        $notificacion = $this->notificacionMapper->findById($idNotificacion);
        if($this->permisos->esAdministrador()){
             $usuarios = $this->notificacionMapper->listarUsuariosNotificacion($idNotificacion);
             $this->view->setVariable("usuarios", $usuarios);
        }
        if ($notificacion == NULL) 
        {
            throw new Exception("No existe notificacion con este id: ".$idNotificacion);
        }
        // put the notification object to the view
        $this->view->setVariable("notificacion", $notificacion);
        $this->view->setVariable("tipoUsuario", $tipoUsuario);

        $this->notificacionMapper->visto($notificacion->getIdNotificacion(),$_SESSION['currentuser']);
        // render the view (/view/posts/view.php)
        $this->view->render("notificacion", "notificacionSHOWCURRENT");
    }

}
?>