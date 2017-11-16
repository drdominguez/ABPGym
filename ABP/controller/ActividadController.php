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
    *si se llama con un post añade la actividad
    */
    public function indivualADD() {
        $this->individualMapper = new ActividadIndividualMapper();
        if(isset($_POST["precio"]) && isset($_POST["nombre"])){//si existen los post añado la actividad
            $individual = new ActividadIndividual();
            $individual->setTiempo($_POST["precio"]);
            $individual->setUnidad($_POST["nombre"]);
            if($this->individualMapper->add($individual)){
               $this->view->setFlash("Actividad Añadido Corectamente");

            }else{
                $errors["actividaderror"] = "La actividad no se ha añadido corectamente";
                $this->view->setFlash($errors["actividaderror"]);
            }
        }
        $this->view->render("actividades/individual","individualADD");
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
