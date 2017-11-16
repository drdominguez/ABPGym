<?php

require_once(__DIR__."/../core/ViewManager.php");
require_once(__DIR__ . "/../controller/BaseController.php");
require_once(__DIR__ . "/../model/ActividadMapper.php");
require_once(__DIR__ . "/../model/ActividadIndividualMapper.php");
require_once(__DIR__ . "/../model/ActividadGrupoMapper.php");

class EjercicioController extends BaseController{

    private $actividadMapper;
    private $individualMapper;
    private $grupoMapper;

    public function __construct() {
        parent::__construct();/*llama al contructor padre 'BaseController de gestion de la sesion*/
        $this->actividadMapper = new ActividadMapper();
    }
    
    /*EstiramientoADD
    *Si se llama con un get carga la vista
    *si se llama con un post añade el estiramiento
    */
    public function indivualADD() {
        $this->estiramientoMapper = new EjercicioEstiramientoMapper();
        if(isset($_POST["tiempo"]) && isset($_POST["unidad"])){//si existen los post añado el ejercicio
            $estiramiento = new EjercicioEstiramiento();
            $estiramiento->setTiempo($_POST["tiempo"]);
            $estiramiento->setUnidad($_POST["unidad"]);
            if($this->estiramientoMapper->add($estiramiento)){
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
    public function indivualRemove() {
        $this->estiramientoMapper = new EjercicioEstiramientoMapper();

    }

    /*EstiramientoListar
    *Muestra una lista con todos los estiramientos
    */
    public function indivualListar() {
       $this->estiramientoMapper = new EjercicioEstiramientoMapper();

    }


    /*cardioADD
    *Si se llama con un get carga la vista
    *si se llama con un post añade el cardio
    */
    public function grupoADD() {
        $this->cardioMapper = new EjercicioCardioMapper();

    }

    /*cardioRemove
    *Si se llama con un get carga la vista
    *si se llama con un post añade el cardio
    */
    public function grupoRemove() {
        $this->cardioMapper = new EjercicioCardioMapper();
    }

    /*cardioListar
    *Muestra una lista con todos los cardio
    */
    public function grupoListar() {
       $this->cardioMapper = new EjercicioCardioMapper();

    }
}
?>
