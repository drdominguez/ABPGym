<?php

require_once(__DIR__."/../core/ViewManager.php");
require_once(__DIR__ . "/../controller/BaseController.php");
require_once(__DIR__ . "/../model/UsuarioMapper.php");
require_once(__DIR__ . "/../model/Usuario.php");
require_once(__DIR__ . "/../core/permisos.php");

class UsuarioController extends BaseController
{
    private $usuarioMapper;
    private $permisos;

    public function __construct() 
    {
        parent::__construct();/*llama al contructor padre 'BaseController de gestion de la sesion*/
        $this->usuarioMapper = new UsuarioMapper();
        $this->permisos= new Permisos();
    }

    /*Notificacion ADD
    *carga una vista para selecionar el tipo de usuario a añadir
    *si es llamado por un usuario sin permisos carga la vista por defecto
    */
    public function UsuarioADD() 
    {
    	if($this->permisos->esAdministrador()){
    		$this->view->render("usuario","selectAdd");
    	}else{
    		$this->view->redirect("main", "index");
    	}
    }

    /*administradorADD
    *Permite añadir a un nuevo administrador a la bbdd
    *Es necesario ser administrador.
    *Si se llama con un Post Carga añade un nuevo administrador
    *Si es llamado por un get muestra la vista.
    */
    public function administradorADD(){
    	if($this->permisos->esAdministrador()){
    		if(isset($_POST["dni"]) && isset($_POST["nombre"])&& isset($_POST["apellidos"])&& isset($_POST["edad"])&& isset($_POST["contrasena"])&& isset($_POST["email"])&& isset($_POST["telefono"])){

                    $nombreFoto = $_FILES['fotoperfil']['name'];
                    $tipoFoto = $_FILES['fotoperfil']['type'];
                    $nombreTempFoto = $_FILES['fotoperfil']['tmp_name'];

                if($nombreFoto != null){
                    $dir_subida = 'ABP/../View/pictures/usuarios/fotoperfil/';
                    $extension = substr($tipoFoto, 6);
                    $rutaFotoPerfil = $dir_subida . $_POST['dni'] . ".". $extension;
                    move_uploaded_file($nombreTempFoto, $rutaFotoPerfil);
                    
                }


    			$usuario = new Usuario($_POST["dni"],$_POST["nombre"],$_POST["apellidos"],$_POST["edad"],$_POST["contrasena"],$_POST["email"],$_POST["telefono"],date("Y-m-d"),'',$rutaFotoPerfil);
    			if($this->usuarioMapper->administradorADD($usuario)){
    				$this->view->setFlash("Usuario Añadido Correctamente");
    			}else{
    				$errors["username"] = "Administrador No se ha añadido";
		            $this->view->setFlash($errors["username"]);
    			}
    		}
    	}else{
    		$errors["username"] = "No tienes permisos, solo un administrador puede añadir usuarios";
		        $this->view->setFlash($errors["username"]);
    	}
    	$this->view->setVariable("usuarioTipo","Administrador");
    	$this->view->render("usuario", "usuarioADD");
    }

    public function entrenadorADD(){
    	if($this->permisos->esAdministrador()){
    		if(isset($_POST["dni"]) && isset($_POST["nombre"])&& isset($_POST["apellidos"])&& isset($_POST["edad"])&& isset($_POST["contrasena"])&& isset($_POST["email"])&& isset($_POST["telefono"])){

                $nombreFoto = $_FILES['fotoperfil']['name'];
                    $tipoFoto = $_FILES['fotoperfil']['type'];
                    $nombreTempFoto = $_FILES['fotoperfil']['tmp_name'];

                if($nombreFoto != null){
                    $dir_subida = 'ABP/../View/pictures/usuarios/fotoperfil/';
                    $extension = substr($tipoFoto, 6);
                    $rutaFotoPerfil = $dir_subida . $_POST['dni'] . ".". $extension;
                    move_uploaded_file($nombreTempFoto, $rutaFotoPerfil);
                    
                }


    			$usuario = new Usuario($_POST["dni"],$_POST["nombre"],$_POST["apellidos"],$_POST["edad"],$_POST["contrasena"],$_POST["email"],$_POST["telefono"],date("Y-m-d"));
    			if($this->usuarioMapper->entrenadorADD($usuario)){
    				$this->view->setFlash("Usuario Añadido Correctamente");
    			}else{
    				$errors["username"] = "Entrenador añadido corectamente";
		            $this->view->setFlash($errors["username"]);
    			}
    		}
    	}else{
    		$errors["username"] = "No tienes permisos, solo un administrador puede añadir usuarios";
		        $this->view->setFlash($errors["username"]);
    	}
    	$this->view->setVariable("usuarioTipo","entrenador");
    	$this->view->render("usuario", "usuarioADD");
    }

    /*NotificacionListar
    *Muestra una lista con todos las Notificaciones
    */
    public function UsuariosListar() 
    {
    if($this->permisos->esAdministrador())
         {
       $usuarios = $this->usuarioMapper->listar();
       $this->view->setVariable("usuarios",$usuarios);
       $this->view->render("usuario","usuarioSHOWALL");
        }else{
        $this->view->redirect("main", "index");
    	}
    }

    /*NotificacionListar
    *Muestra una lista con todos las Notificaciones
    */
    public function UsuarioEDIT() 
    {
        if($this->permisos->esAdministrador())
         {
       if(isset($_POST["dni"]) && isset($_POST["nombre"]) && isset($_POST["apellidos"]))
        {//si existen los post añado la notificacion
            $usuario = new Usuario();
            $usuario->setDni($_POST["dni"]);
            $usuario->setNombre($_POST["nombre"]);
            $usuario->setApellidos($_POST["apellidos"]);
            $usuario->setEdad($_POST["edad"]);
            $usuario->setEmail($_POST["email"]);
            $usuario->setTelefono($_POST["telefono"]);
            $usuario->setFecha(date("Y-m-d"));
            if($this->usuarioMapper->EDIT($usuario))
            {
               $this->view->setFlash("Usuario Editado Correctamente");
            }else
            {
                $errors["username"] = "El usuario no se ha editado corectamente";
                $this->view->setFlash($errors["username"]);
            }
            $this->view->redirect("Usuario", "UsuariosListar");
        }else
        {
            $dni = $_GET["dni"];
            $usuario = $this->usuarioMapper->findById($dni);
            if ($usuario == NULL) 
            {
                throw new Exception("No existe usuario con este dni: ".$dni);
            }

                $this->view->setVariable("usuario",$usuario);
                $this->view->render("usuario","usuarioEDIT");
            }
             }else{
        $this->view->redirect("main", "index");
    	}
    }

    /*NotificacionListar
    *Muestra una lista con todos las Notificaciones
    */
    public function UsuarioDELETE() 
    {
         if($this->permisos->esAdministrador())
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
         }else{
        $this->view->redirect("main", "index");
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