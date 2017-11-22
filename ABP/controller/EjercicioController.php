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

    public function loadAddView(){
        $this->view->render("ejercicios","add");
    }

    public function loadRemoveView(){
        $this->view->render("ejercicios","remove");
    }

    public function loadEditView(){
        $this->view->render("ejercicios","edit");
    }

    public function loadListView(){
        $this->view->render("ejercicios","list");
    }
	
	/*
    /Muestra un estiraminto en la vista de forma detallada.
    */
    public function estiramientoVer(){
        $this->estiramientoMapper = new EjercicioEstiramientoMapper();
        $ejercicioEstiramiento=$this->estiramientoMapper->getEstiramientoById($_GET["idEjercicio"]);
        $this->view->setVariable("estiramiento", $ejercicioEstiramiento);
        $this->view->render("ejercicios/estiramiento","estiramientoSHOWCURRENT");
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
        var_dump("pepeppepepe");
        if(isset($_POST["idEjercicio"]) && !empty($_POST["idEjercicio"])){//si lo llamamos por POST lo borra
            $this->estiramientoMapper->removeEstiramiento($_POST["idEjercicio"]);
            $this->view->setFlash("Ejercicio Eliminado Corectamente");
            self::estiramientoListar();//volvemos a listar los ejercicios
        }else{//si no muesta la vista
            $estiramiento=$this->estiramientoMapper->getEstiramientoById($_GET["idEjercicio"]);
            $this->view->setVariable("estiramiento",$estiramiento);
            $this->view->render("ejercicios/estiramiento","estiramientoDELETE");
        }
    }

    /*EstiramientoListar
	*Muestra una lista con todos los estiramientos
	*/
    public function estiramientoListar() {
        $this->estiramientoMapper = new EjercicioEstiramientoMapper();
        $listaEstiramiento = $this->estiramientoMapper->listarEstiramiento();
        if(!isset($listaEstiramiento) OR empty($listaEstiramiento)){
             $errors["username"] = "No hay estiramientos disponibles";
                $this->view->setFlash($errors["username"]);
        }else{
            $this->view->setVariable("estiramientos", $listaEstiramiento);
        }
        $this->view->render("ejercicios/estiramiento", "estiramientoSHOWALL");
    }

    /*
    *Muestra en detalle un ejercicio cardio
    */
     public function cardioVer(){
        $this->cardioMapper = new EjercicioCardioMapper();
        $ejercicioCardio=$this->cardioMapper->getCardioById($_GET["idEjercicio"]);
        $this->view->setVariable("cardio", $ejercicioCardio);
        $this->view->render("ejercicios/cardio","cardioSHOWCURRENT");
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
	*si se llama con un post elimina el cardio
	*/
    public function cardioRemove() {
        $this->cardioMapper = new EjercicioCardioMapper();
        if(isset($_POST["idEjercicio"]) && !empty($_POST["idEjercicio"])){//si lo llamamos por POST lo borra
            $this->cardioMapper->removeCardio($_POST["idEjercicio"]);
            $this->view->setFlash("Ejercicio Eliminado Corectamente");
             self::cardioListar();//volvemos a listar los cardios
        }else{//si no muesta la vista
            $cardio=$this->cardioMapper->getCardioById($_GET["idEjercicio"]);
            $this->view->setVariable("cardio",$cardio);
            $this->view->render("ejercicios/cardio","cardioDELETE");
        }
    }

    /*cardioListar
	*Muestra una lista con todos los cardio
	*/
    public function cardioListar() {
       $this->cardioMapper = new EjercicioCardioMapper();
       $listaCardio = $this->cardioMapper->listarCardio();
       if(!isset($listaCardio) OR empty($listaCardio)){
            $errors["username"] = "No hay cardios disponibles";
            $this->view->setFlash($errors["username"]);
        }else{
            $this->view->setVariable("cardios", $listaCardio);
        }
        $this->view->render("ejercicios/cardio", "cardioSHOWALL");
    }

    /*
    *Muestra en detalle un ejercicio cardio
    */
    public function muscularVer(){
        $this->muscularMapper = new EjercicioMuscularMapper();
        $ejercicioMuscular=$this->muscularMapper->getMuscularById($_GET["idEjercicio"]);
        $this->view->setVariable("muscular", $ejercicioMuscular);
        $this->view->render("ejercicios/muscular","MuscularSHOWCURRENT");
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
    	$this->mucularMapper = new EjercicioMuscularMapper();
        if(isset($_POST["idEjercicio"]) && !empty($_POST["idEjercicio"])){//si lo llamamos por POST lo borra
            $this->mucularMapper->removeMuscular($_POST["idEjercicio"]);
            $this->view->setFlash("Ejercicio Eliminado Corectamente");
             self::muscularListar();//volvemos a listar los cardios
        }else{//si no muesta la vista
            $muscular=$this->mucularMapper->getMuscularById($_GET["idEjercicio"]);
            $this->view->setVariable("muscular",$muscular);
            $this->view->render("ejercicios/muscular","muscularDELETE");
        }
    }

    /*muscularListar
	*Muestra una lista con todos los muscular
	*/
    public function muscularListar() {
        $this->muscularMapper = new EjercicioMuscularMapper();
    	$listaMuscular = $this->muscularMapper->listarMuscular();
       if(!isset($listaMuscular) OR empty($listaMuscular)){
            $errors["username"] = "No hay musculares disponibles";
            $this->view->setFlash($errors["username"]);
        }else{
            $this->view->setVariable("musculares", $listaMuscular);
        }
        $this->view->render("ejercicios/muscular", "muscularSHOWALL");
    }

}
?>