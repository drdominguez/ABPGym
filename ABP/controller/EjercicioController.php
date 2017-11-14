<?php

require_once(__DIR__."/../core/ViewManager.php");
require_once(__DIR__."/../controller/BaseController.php");
require_once(__DIR__."/../model/EjercicioMapper.php");
require_once(__DIR__."/../model/EjercicioEstiramientoMapper.php");
require_once(__DIR__."/../model/EjercicioMuscularMapper.php");
require_once(__DIR__."/../model/EjercicioCardioMapper.php");

class EjercicioController extends BaseController{

	private $ejercicioMapper;
	private $estiramientoMapper;
	private $cardioMapper;
	private $muscularMapper;

	public function __construct() {
		parent::__construct();/*llama al contructor padre 'BaseController de gestion de la sesion*/
		$this->ejercicioMapper = new EjercicioMapper();
	}
	
	/*EstiramientoADD
	*Si se llama con un get carga la vista
	*si se llama con un post añade el estiramiento
	*/
    public function EstiramientoADD() {
    	$this->estiramientoMapper = new EjercicioEstiramientoMapper();

    }

    /*EstiramientoRemove
	*Si se llama con un get carga la vista
	*si se llama con un post añade el estiramiento
	*/
    public function EstiramientoRemove() {
        $this->estiramientoMapper = new EjercicioEstiramientoMapper();

    }

    /*EstiramientoListar
	*Muestra una lista con todos los estiramientos
	*/
    public function EstiramientoListar() {
       $this->estiramientoMapper = new EjercicioEstiramientoMapper();

    }


    /*cardioADD
	*Si se llama con un get carga la vista
	*si se llama con un post añade el cardio
	*/
    public function cardioADD() {
        $this->cardioMapper = new EjercicioCardioMapper();

    }

    /*cardioRemove
	*Si se llama con un get carga la vista
	*si se llama con un post añade el cardio
	*/
    public function cardioRemove() {
        $this->cardioMapper = new EjercicioCardioMapper();
    }

    /*cardioListar
	*Muestra una lista con todos los cardio
	*/
    public function cardioListar() {
       $this->cardioMapper = new EjercicioCardioMapper();

    }

     /*muscularADD
	*Si se llama con un get carga la vista
	*si se llama con un post añade el muscular
	*/
    public function muscularADD() {
        $this->muscularMapper = new EjercicioMuscularMapper();

    }

    /*muscularRemove
	*Si se llama con un get carga la vista
	*si se llama con un post añade el muscular
	*/
    public function muscularRemove() {
    	$this->muscularMapper = new EjercicioMuscularMapper();

    }

    /*muscularListar
	*Muestra una lista con todos los muscular
	*/
    public function muscularListar() {
    	$this->muscularMapper = new EjercicioMuscularMapper();

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
                $errors["username"] = "Username and/or password not exists in system";
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