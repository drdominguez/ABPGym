<?php

require_once(__DIR__."/../core/ViewManager.php");
require_once(__DIR__ . "/../controller/BaseController.php");
require_once(__DIR__ . "/../model/Actividad.php");
require_once(__DIR__ . "/../model/Horario.php");
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
        $this->actividadGrupoMapper = new ActividadGrupoMapper();
        $this->individualMapper = new ActividadIndividualMapper();
        $this->grupoMapper = new ActividadGrupoMapper();
    }

    public function actividadView() 
    {
        if (!isset($_GET["idActividad"])) 
        {
            throw new Exception("El id es obligatorio");
        }
        $idActividad = $_GET["idActividad"];
        $actividad = $this->actividadMapper->findById($idActividad);
        $nomRecurso=$this->actividadMapper->findNomIdInstalaciones($actividad->getIdInstalaciones());
        if ($actividad == NULL) 
        {
            throw new Exception("No existe actividad con este id: ".$idActividad);
        }
        $this->view->setVariable("actividad", $actividad);
        $this->view->setVariable("nombreInstalación", $nomRecurso);
        $this->view->render("actividad", "actividadSHOWCURRENT");
    }
    public function actividadDELETE() 
    {   
        if(!isset($_POST['borrar']))
        {
            if (!isset($_GET["idActividad"])) 
            {
                throw new Exception("El id es obligatorio");
            }
            $idActividad = $_GET["idActividad"];
            $idRecurso = $this->actividadMapper->idRecurso($idActividad);
            $nomRecurso=$this->actividadMapper->findNomIdInstalaciones($idRecurso);
            
            // find the notification object in the database
            $actividad = $this->actividadMapper->findById($idActividad);
            if ($actividad == NULL) 
            {
                throw new Exception("No existe actividad con este id: ".$idActividad);
            }
            // put the notification object to the view
            $this->view->setVariable("nombreInstalación", $nomRecurso);
            $this->view->setVariable("actividad", $actividad);
            // render the view (/view/posts/view.php)
            $this->view->render("actividad", "actividadDELETE");
        }else
        {
            $idActividad = $_POST["idActividad"];
            if($actividad = $this->actividadMapper->delete($idActividad))
            {
               $this->view->setFlash("Actividad Eliminada Correctamente");
            }else
            {
                $errors["idActividad"] = "La actividad no se ha eliminado corectamente";
                $this->view->setFlash($errors["idActividad"]);
            }
            
            $this->view->redirect("Actividad", "actividadListar");
        }
    }

    public function actividadEDIT() 
    {   
        if(isset($_POST["nombre"]) && isset($_POST["precio"]))
        {//si existen los post añado la notificacion
            $idActividad=$_POST['idActividad'];
            if($this->actividadMapper->esGrupo($idActividad)){            
                $actividad = new ActividadGrupo(null,$_POST["nombre"],$_POST["precio"],$_POST['idInstalaciones'],$_POST['plazas']);

            
                if($this->actividadGrupoMapper->editGrupo($actividad,$idActividad))
            {

               $this->view->setFlash("Actividad Editada Correctamente");
            }else
            {
                $errors["idActividad"] = "La actividad no se ha editado corectamente";
                $this->view->setFlash($errors["idActividad"]);
            }
            $this->view->redirect("actividad", "actividadListar");

            }else{
                $actividad = new Actividad();
                $actividad->setNombre($_POST["nombre"]);
                $actividad->setPrecio($_POST["precio"]);
                $actividad->setIdInstalaciones($_POST["idInstalaciones"]);  
                if($this->actividadMapper->edit($actividad,$idActividad))
            {
               $this->view->setFlash("Actividad Editada Correctamente");
            }else
            {
                $errors["username"] = "La actividad no se ha editado corectamente";
                $this->view->setFlash($errors["username"]);
            }
            $this->view->redirect("actividad", "actividadListar");

            }
            
        }else
        {
            $idActividad = $_GET["idActividad"];
            $actividad = $this->actividadMapper->findById($idActividad);
            if ($actividad == NULL) 
            {
                throw new Exception("No existe actividad con este id: ".$idActividad);
            }
                $listarrecursos=$this->actividadMapper->selectRecurso();
                $this->view->setVariable("listarecursos",$listarrecursos);
                $this->view->setVariable("actividad", $actividad);
                $this->view->render("actividad","actividadEDIT");
            }
    }
    
    public function actividadListar() {
        $actividades = $this->actividadMapper->listar();
        $this->view->setVariable("actividades",$actividades);
        $this->view->render("actividad","actividadSHOWALL");
    }
    
    public function individualADD() {
    

        if(isset($_POST["precio"]) && isset($_POST["nombre"])&& isset($_POST["idInstalaciones"]) && isset($_POST["plazas"])){//si existen los post añado la actividad
            $horario = new Horario();
            $individual = new ActividadIndividual();
            $horario->setDia($_POST["dia"]);
            $horario->setHora($_POST["hora"]);
            $horario->setFechaInicio($_POST["fechIni"]);
            $horario->setFechaFin($_POST["fechFin"]);
            $individual->setNombre($_POST["nombre"]);
            $individual->setPrecio($_POST["precio"]);
            $individual->setIdInstalaciones($_POST["idInstalaciones"]);
            $individual->setPlazas($_POST["plazas"]); 
            $individual->setHorario($horario); 
            if($this->individualMapper->addIndividual($individual)){
               $this->view->setFlash("Actividad Individual Añadida Corectamente");

            }else{
                $errors["actividaderror"] = "La actividad individual no se ha añadido corectamente";
                $this->view->setFlash($errors["actividaderror"]);
            }
        }
        $listarrecursos=$this->actividadMapper->selectRecurso();
        $this->view->setVariable("listarecursos",$listarrecursos);
        $this->view->render("actividad/individual","individualADD");
    }

    public function grupoADD() {
        if(isset($_POST["precio"]) && isset($_POST["nombre"]) && isset($_POST["idInstalaciones"]) && isset($_POST["plazas"])){//si existen los post añado la actividad
            $horario = new Horario();
            $grupo = new ActividadGrupo();
            $horario->setDia($_POST["dia"]);
            $horario->setHora($_POST["hora"]);
            $horario->setFechaInicio($_POST["fechIni"]);
            $horario->setFechaFin($_POST["fechFin"]);
            $grupo->setNombre($_POST["nombre"]);
            $grupo->setPrecio($_POST["precio"]);
            $grupo->setIdInstalaciones($_POST["idInstalaciones"]);
            $grupo->setPlazas($_POST["plazas"]); 
            $grupo->setHorario($horario); 
            if($this->grupoMapper->addGrupo($grupo)){
               $this->view->setFlash("Actividad Grupo Añadida Corectamente");

            }else{
                $errors["actividaderror"] = "La actividad  de grupo no se ha añadido corectamente";
                $this->view->setFlash($errors["actividaderror"]);
            }
        }
        $listarrecursos=$this->actividadMapper->selectRecurso();
        $this->view->setVariable("listarecursos",$listarrecursos);
        $this->view->render("actividad/grupo","grupoADD");

    }

    }
?>
