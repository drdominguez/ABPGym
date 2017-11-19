<?php

require_once(__DIR__."/../core/ViewManager.php");
require_once(__DIR__ . "/../controller/BaseController.php");
require_once(__DIR__ . "/../model/UsuarioMapper.php");

class LoginController{

	private $UsuarioMapper;
    private $view;
	public function __construct() {
        $this->view = ViewManager::getInstance();
        // get the current user and put it to the view
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        if(isset($_SESSION["currentuser"])) {
            $this->currentUser = new Usuario();
            //add current user to the view, since some views require it
        }
		$this->UsuarioMapper = new UsuarioMapper();
	}
	
    public function loadView() {/*Carga la vista de login para entrar en la web*/
        require_once("view/usuario/login.php");
    }

    /*Inicia sesión
    *Si el usuario existe incia sesion y carga la plantilla por defecto
    *si no muestra un mensaje de error y refresca la vista
    */
    public function login(){
    	/*HABRIA QUE DEFERENCIAR ENTRE ENTRAR COMO DEPORTISTA Y ENTRENADOR/ADMINISTRADOR TIENEN MENUS DIFERENTES*/
        if(isset($_POST["dni"]) && isset($_POST["contraseña"])){
            if($this->UsuarioMapper->login($_POST["dni"],$_POST["contraseña"])){
            /* y se inicia la sesion y se carga la vista por defecto*/
            $_SESSION["currentuser"]=$_POST["dni"];
            // send user to the restricted area (HTTP 302 code)
            $this->view->redirect("main", "index");
            }else{
                /*se pone un mensaje de error y se reresca la vista*/
                $errors["username"] = "El nombre de usuario/contraseña no existen en el sistema";
                $this->view->setFlash($errors["username"]);
            }
        }
    	require_once("view/usuario/login.php");
    }
    /*Cierra la sesion */
    public function logout() {
		session_destroy();
		// perform a redirection. More or less:
		// header("Location: logIn.php?controller=users&action=users")
		// die();
		$this->view->redirect("Login", "login");
	}
}
?>