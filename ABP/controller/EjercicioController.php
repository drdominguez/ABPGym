<?php

require_once(__DIR__."/../core/ViewManager.php");
require_once(__DIR__ . "/../controller/BaseController.php");
require_once(__DIR__ . "/../model/EjercicioMapper.php");
require_once(__DIR__ . "/../model/EjercicioEstiramientoMapper.php");
require_once(__DIR__ . "/../model/EjercicioMuscularMapper.php");
require_once(__DIR__ . "/../model/EjercicioCardioMapper.php");

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
        if(isset($_POST["nombre"]) && isset($_POST["descripcion"]) && isset($_POST["tiempo"]) && isset($_POST["unidad"])){//si existen los post añado el ejercicio
            $estiramiento = new EjercicioEstiramiento('',$_POST["nombre"], $_POST["descripcion"],$_POST["video"],$_POST["imagen"],$_POST["tiempo"],$_POST["unidad"]);
            if($this->estiramientoMapper->addEstiramiento($estiramiento)){
               $this->view->setFlash("Ejercicio Añadido Corectamente");

            }else{
                $errors["username"] = "El ejercicio no se ha añadido corectamente";
                $this->view->setFlash($errors["username"]);
            }
        }
        $this->view->render("ejercicios/estiramiento","estiramientoADD");
    }

    /*EstiramientoRemove
	*Si se llama con un get carga la vista
	*si se llama con un post añade el estiramiento
	*/
    public function estiramientoRemove() {
        $this->estiramientoMapper = new EjercicioEstiramientoMapper();

    }

    /*EstiramientoListar
	*Muestra una lista con todos los estiramientos
	*/
    public function estiramientoListar() {
       $this->estiramientoMapper = new EjercicioEstiramientoMapper();

    }


    /*cardioADD
	*Si se llama con un get carga la vista
	*si se llama con un post añade el cardio
	*/
    public function cardioADD() {
        $this->cardioMapper = new EjercicioCardioMapper();
        if(isset($_POST["nombre"]) && isset($_POST["descripcion"]) && isset($_POST["tiempo"]) && isset($_POST["unidad"]) && isset($_POST["distancia"])){//si existen los post añado el ejercicio
            $cardio = new EjercicioCardio('',$_POST["nombre"], $_POST["descripcion"],$_POST["video"],$_POST["imagen"],$_POST["tiempo"],$_POST["unidad"],$_POST["distancia"]);
            if($this->cardioMapper->addCardio($cardio)){
               $this->view->setFlash("Ejercicio Añadido Corectamente");

            }else{
                $errors["username"] = "El ejercicio no se ha añadido corectamente";
                $this->view->setFlash($errors["username"]);
            }
        }
        $this->view->render("ejercicios/cardio","cardioADD");
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
        if(isset($_POST["nombre"]) && isset($_POST["descripcion"]) && isset($_POST["carga"]) && isset($_POST["repeticiones"])){//si existen los post añado el ejercicio
            $muscular = new EjercicioMuscular('',$_POST["nombre"], $_POST["descripcion"],$_POST["video"],$_POST["imagen"], $_POST["carga"], $_POST["repeticiones"]);
            if($this->muscularMapper->addMuscular($muscular)){
               $this->view->setFlash("Ejercicio Añadido Corectamente");

            }else{
                $errors["username"] = "El ejercicio no se ha añadido corectamente";
                $this->view->setFlash($errors["username"]);
            }
        }
        $this->view->render("ejercicios/muscular","muscularADD");
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

}
?>