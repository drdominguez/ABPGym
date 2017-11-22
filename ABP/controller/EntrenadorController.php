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
        if(isset($_POST["tipo"]) && isset($_POST["nombre"]) && isset($_POST["usuarios"]))
        {//si existen los post añado la notificacion
            $usuarios = $_POST["usuarios"];
            $entrenador = new Entrenador();
            $entrenador->setTipo($_POST["n"]);
            $entrenador->setNombre($_POST["nombre"]);
            $entrenador->setComentario($_POST['comentario']);
            if($this->entrenadorMapper->add($entrenador,$usuarios))
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
            $usuarios = $this->tablaMapper->listarUsuarios();
            $this->view->setVariable("usuarios",$usuarios);
            $this->view->render("entrenador","entrenadorADD");
        }
        
    }

    public function entrenadorListar() 
    {
    exit;
       $entrenadores = $this->entrenadorMapper->listar();
       $this->view->setVariable("entrenadores",$entrenadores);
       $this->view->render("entrenador","entrenadorSHOWALL");
    }
    

    public function entrenadorView() 
    {
        if (!isset($_GET["idEntrenador"])) 
        {
            throw new Exception("El id es obligatorio");
        }
        $idEntrenador = $_GET["idEntrenador"];
        // find the notification object in the database
        $entrenador = $this->entrenadorMapper->findById($idEntrenador);
        if ($entrenador== NULL) 
        {
            throw new Exception("No existe entrenador con este id: ".$idEntrenador);
        }
        // put the notification object to the view
        $this->view->setVariable("entrenador", $entrenador);
        $this->entrenadorMapper->visto($entrenador->getIdEntrenador(),$_SESSION['currentuser']);
        $this->view->render("entrenador", "entrenadorSHOWCURRENT");
    }

}
?>