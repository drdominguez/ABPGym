<?php

require_once(__DIR__."/../core/ViewManager.php");
require_once(__DIR__ . "/../controller/BaseController.php");
require_once(__DIR__ . "/../model/Actividad.php");
require_once(__DIR__ . "/../model/ActividadIndividual.php");
require_once(__DIR__ . "/../model/ActividadGrupo.php");
require_once(__DIR__ . "/../model/ActividadMapper.php");
require_once(__DIR__ . "/../model/ActividadIndividualMapper.php");
require_once(__DIR__ . "/../model/ActividadGrupoMapper.php");

class ActividadController extends BaseController{

    private $actividadMapper;
    private $individualMapper;
    private $grupoMapper;

    public function __construct() {
        parent::__construct();/*llama al contructor padre 'BaseController de gestion de la sesion*/
        $this->actividadMapper = new ActividadMapper();
    }
    
    public function actividadListar() {
        $actividades = $this->actividadMapper->listar();
        $this->view->setVariable("actividades",$actividades);
        $this->view->render("actividad","actividadSHOWALL");
    }

    
    public function individualADD() {
        $this->individualMapper = new ActividadIndividualMapper();
        if(isset($_POST["precio"]) && isset($_POST["nombre"])){//si existen los post añado la actividad
            $individual = new ActividadIndividual();
            $individual->setTiempo($_POST["precio"]);
            $individual->setUnidad($_POST["nombre"]);
            if($this->individualMapper->add($individual)){
               $this->view->setFlash("Actividad Individual Añadida Corectamente");

            }else{
                $errors["actividaderror"] = "La actividad individual no se ha añadido corectamente";
                $this->view->setFlash($errors["actividaderror"]);
            }
        }
        $this->view->render("actividad/individual","individualADD");
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
        $this->grupoMapper = new ActividadGrupoMapper();
        if(isset($_POST["precio"]) && isset($_POST["nombre"]) && isset($_POST["instalaciones"]) && isset($_POST["plazas"])){//si existen los post añado la actividad
            $grupo = new ActividadGrupo();
            $grupo->setPrecio($_POST["precio"]);
            $grupo->setNombre($_POST["nombre"]);
            $grupo->setInstalaciones($_POST["instalaciones"]);
            $grupo->setPlazas($_POST["plazas"]);
            if($this->grupoMapper->add($grupo)){
               $this->view->setFlash("Actividad Grupo Añadida Corectamente");

            }else{
                $errors["actividaderror"] = "La actividad  de grupo no se ha añadido corectamente";
                $this->view->setFlash($errors["actividaderror"]);
            }
        }
        $this->view->render("actividad/grupo","grupoADD");

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
