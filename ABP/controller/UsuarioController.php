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
        if(isset($_POST["dni"]) && isset($_POST["nombre"])&& isset($_POST["apellidos"])&& isset($_POST["edad"])&& isset($_POST["contrasena"])&& isset($_POST["email"])&& isset($_POST["telefono"]))
        {//si existen los post añado la notificacion
            $usuario = new Usuario();
            $usuario->setDni($_POST["dni"]);
            $usuario->setNombre($_POST["nombre"]);
            $usuario->setApellidos($_POST["apellidos"]);
            $usuario->setEdad($_POST["edad"]);
            $usuario->setPassword($_POST["contrasena"]);
            $usuario->setEmail($_POST["email"]);
            $usuario->setTelefono($_POST["telefono"]);
            $usuario->setFecha(date("Y-m-d"));
            if($this->usuarioMapper->ADD($usuario))
            {
               $this->view->setFlash("Usuario Añadido Correctamente");

            }else
            {
                $errors["username"] = "El usuario no se ha añadido corectamente";
                $this->view->setFlash($errors["username"]);
            }
            $this->view->redirect("Usuario", "UsuariosListar");
        }else
        {
            $this->view->render("usuario","usuarioADD");
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
    public function UsuarioDELETE() 
    {
        if(!isset($_POST['borrar']))
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
            $this->view->render("usuario", "usuarioDELETE");
        }else
        {
            $dni = $_POST["dni"];
            if($usuario = $this->usuarioMapper->delete($dni))
            {
               $this->view->setFlash("Usuario Eliminado Correctamente");
            }else
            {
                $errors["username"] = "El usuario no se ha eliminado corectamente";
                $this->view->setFlash($errors["username"]);
            }
            $this->view->redirect("Usuario", "UsuariosListar");
        }
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