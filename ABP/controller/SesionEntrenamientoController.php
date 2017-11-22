<?php

require_once(__DIR__."/../core/ViewManager.php");
require_once(__DIR__ . "/../controller/BaseController.php");
require_once(__DIR__ . "/../model/SesionEntrenamientoMapper.php");
require_once(__DIR__ . "/../model/TablaMapper.php");

class SesionEntrenamientoController extends BaseController{

    private $SesionMapper;

    public function __construct() {
        parent::__construct();/*llama al contructor padre 'BaseController de gestion de la sesion*/
        $this->SesionMapper = new SesionEntrenamientoMapper();
    }

    public function RealizarSesion(){
        self::TablaListar();
    }

    public function TablaListar(){
        $tablaMapper = new TablaMapper();
        $tablas = $tablaMapper->listar();
        $this->view->setVariable("tablas",$tablas);
        $this->view->render("sesionEntrenamiento","tablaSHOWALL");
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

    /*
    *Edita un estiramiento
    *a partir de un id obtenido por la vista crea un etiramiento usando getEstiramientoById
    *luego lo edita en la bbdd.
    */
    public function estiramientoEdit(){
        $this->estiramientoMapper = new EjercicioEstiramientoMapper();
        if(isset($_POST["idEjercicio"]) && !empty($_POST["idEjercicio"])){//si lo llamamos por POST lo borra
            $estiramiento = new EjercicioEstiramiento($_POST["idEjercicio"],$_POST["nombre"],$_POST["descripcion"],$_POST["video"],$_POST["imagen"],$_POST["tiempo"],$_POST["unidad"]);
            $this->estiramientoMapper->editEstiramiento($estiramiento);
            $this->view->setFlash("Ejercicio Editado Corectamente");
            self::estiramientoListar();//volvemos a listar los ejercicios
        }else{//si no muesta la vista
            $estiramiento=$this->estiramientoMapper->getEstiramientoById($_GET["idEjercicio"]);
            $this->view->setVariable("estiramiento",$estiramiento);
            $this->view->render("ejercicios/estiramiento","estiramientoEDIT");
        }
    }

    /*EstiramientoRemove
    *Si se llama con un get carga la vista
    *si se llama con un post añade el estiramiento
    */
    public function estiramientoRemove() {
        $this->estiramientoMapper = new EjercicioEstiramientoMapper();
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

}
?>