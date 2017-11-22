<?php

require_once(__DIR__."/../core/ViewManager.php");
require_once(__DIR__ . "/../controller/BaseController.php");
require_once(__DIR__ . "/../model/EntrenadorMapper.php");
require_once(__DIR__ . "/../model/Entrenador.php");

class EntrenadorController extends BaseController
{
    private $entrenadorMapper;

    public function __construct() 
    {
        parent::__construct();/*llama al contructor padre 'BaseController de gestion de la sesion*/
        $this->entrenadorMapper = new EntrenadorMapper();
    }
    
    public function entrenadorADD() 
    {
        if(isset($_POST["dniEntrenador"]))
        {
            $entrenador = new Entrenador();
            $entrenador->setDniEntrenador($_POST["dniEntrenador"]);
            if($this->entrenadorMapper->add($entrenador))
            {
               $this->view->setFlash("Entrenador añadido correctamente");
            }else
            {
                $errors["username"] = "El entrenador no se ha añadido corectamente";
                $this->view->setFlash($errors["username"]);
            }
            $this->view->redirect("Entrenador", "entrenadorListar");
        }else
        {
            $usuarios = $this->entrenadorMapper->listarUsuarios();
            $this->view->setVariable("usuarios",$usuarios);
            $this->view->render("entrenador","entrenadorADD");
        }
        
    }
    public function entrenadorDELETE() 
    {
        if(!isset($_POST['borrar']))
        {
            if (!isset($_GET["dniEntrenador"])) 
            {
                throw new Exception("El dni es obligatorio");
            }
            $dniEntrenador = $_GET["dniEntrenador"];
            // find the notification object in the database
            $entrenador = $this->entrenadorMapper->findById($dniEntrenador);
            if ($entrenador == NULL) 
            {
                throw new Exception("No existe entrenador con este dni: ".$dniEntrenador);
            }
            // put the notification object to the view
            $this->view->setVariable("entrenador", $entrenador);
            // render the view (/view/posts/view.php)
            $this->view->render("entrenador", "entrenadorDELETE");
        }else
        {
            $dniEntrenador = $_POST["dniEntrenaador"];
            if($entrenador = $this->entrenadorMapper->delete($dniEntrenador))
            {
               $this->view->setFlash("Entrenador Eliminado Correctamente");
            }else
            {
                $errors["username"] = "El entrenador no se ha eliminado corectamente";
                $this->view->setFlash($errors["username"]);
            }
            $this->view->redirect("entrenador", "entrenadorListar");
        }
    }

    public function entrenadorListar() 
    {
   
       $entrenadores = $this->entrenadorMapper->listar();
       $this->view->setVariable("entrenadores",$entrenadores);
       $this->view->render("entrenador","entrenadorSHOWALL");
    }
    

    public function entrenadorView() 
    {
        if (!isset($_GET["dniEntrenador"])) 
        {
            throw new Exception("El id es obligatorio");
        }
        $idEntrenador = $_GET["dniEntrenador"];
        // find the notification object in the database
        $entrenador = $this->entrenadorMapper->findById($idEntrenador);
        if ($entrenador== NULL) 
        {
            throw new Exception("No existe entrenador con este id: ".$idEntrenador);
        }
        // put the notification object to the view
        $this->view->setVariable("usuario", $entrenador);
        $this->view->render("entrenador", "entrenadorSHOWCURRENT");
    }

}
?>