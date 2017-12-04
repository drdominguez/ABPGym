<?php

require_once(__DIR__."/../core/ViewManager.php");
require_once(__DIR__ . "/../controller/BaseController.php");
require_once(__DIR__ . "/../model/Recurso.php");
require_once(__DIR__ . "/../model/RecursoMapper.php");
require_once(__DIR__ . "/../core/permisos.php");

class RecursoController extends BaseController{

    private $RecursoMapper;
    private $permisos;

    public function __construct() {
        parent::__construct();/*llama al contructor padre 'BaseController de gestion de la sesion*/
        $this->recursoMapper = new RecursoMapper();
        $this->permisos= new Permisos();
    }

    public function recursoView() 
    {
        if (!isset($_GET["idRecurso"])) 
        {
            throw new Exception("El id es obligatorio");
        }
        $idRecurso = $_GET["idRecurso"];
        $recurso = $this->recursoMapper->findById($idRecurso);
        if ($recurso == NULL) 
        {
            throw new Exception("No existe recurso con este id: ".$idRecurso);
        }
        $this->view->setVariable("recurso", $recurso);
        $this->view->render("recurso", "recursoSHOWCURRENT");
    }
    public function recursoDELETE() 
    {   
        if(!isset($_POST['borrar']))
        {
            if (!isset($_GET["idRecurso"])) 
            {
                throw new Exception("El id es obligatorio");
            }
            $idRecurso = $_GET["idRecurso"];
            
            // find the notification object in the database
            $recurso = $this->recursoMapper->findById($idRecurso);
            if ($recurso == NULL) 
            {
                throw new Exception("No existe actividad con este id: ".$idRecurso);
            }
            // put the notification object to the view
            $this->view->setVariable("recurso", $recurso);
            // render the view (/view/posts/view.php)
            $this->view->render("recurso", "recursoDELETE");
        }else
        {
            $idRecurso = $_POST["idRecurso"];
            if($recurso = $this->recursoMapper->delete($idRecurso))
            {
               $this->view->setFlash("Recurso Eliminado Correctamente");
            }else
            {
                $errors["idRecurso"] = "El recurso no se ha eliminado corectamente";
                $this->view->setFlash($errors["idRecurso"]);
            }
            
            $this->view->redirect("Recurso", "recursoListar");
        }
    }

    public function recursoEDIT() 
    {   
        if($this->permisos->esAdministrador()){
        if(isset($_POST["idRecurso"]) && isset($_POST["nombreRecurso"]))
        {//si existen los post añado la notificacion
            $recursoE = new Recurso();
            $recursoE->setIdRecurso($_POST["idRecurso"]);
            $recursoE->setNombreRecurso($_POST["nombreRecurso"]);
            if($this->recursoMapper->edit($recursoE,$_POST["idRecurso"]))
            {
               $this->view->setFlash("Recurso Editado Correctamente");
            }else
            {
                $errors["username"] = "El recurso no se ha editado corectamente";
                $this->view->setFlash($errors["username"]);
            }
            $this->view->redirect("recurso", "recursoListar");
        }else
        {
            $idRecurso = $_GET["idRecurso"];
            $recurso = $this->recursoMapper->findById($idRecurso);
            if ($recurso == NULL) 
            {
                throw new Exception("No existe recurso con este id: ".$idRecurso);
            }

                $this->view->setVariable("recurso",$recurso);
                $this->view->render("recurso","recursoEDIT");
            }
      }else{
        $this->view->redirect("main", "index");
    }
    }

    
    public function recursoListar() {
        $recursos = $this->recursoMapper->listar();
        $this->view->setVariable("recurso",$recursos);
        $this->view->render("recurso","recursoSHOWALL");
    }
    
    public function recursoADD() {

        if(isset($_POST["nombreRecurso"])){//si existen los post añado la actividad
            $recursoA = new Recurso();
            $recursoA->setNombreRecurso($_POST["nombreRecurso"]);  
            if($this->recursoMapper->add($recursoA)){
               $this->view->setFlash("Recurso Añadido Corectamente");

            }else{
                $errors["recursoerror"] = "El recurso no se ha añadido corectamente";
                $this->view->setFlash($errors["recursoerror"]);
            }
        }
        $this->view->render("recurso","recursoADD");
    }

    }
?>
