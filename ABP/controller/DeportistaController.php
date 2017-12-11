<?php

require_once(__DIR__."/../core/ViewManager.php");
require_once(__DIR__ . "/../controller/BaseController.php");
require_once(__DIR__ . "/../model/DeportistaMapper.php");
require_once(__DIR__ . "/../model/DeportistaTDU.php");
require_once(__DIR__ . "/../model/DeportistaPEF.php");
require_once(__DIR__ . "/../model/DeportistaTDUMapper.php");
require_once(__DIR__ . "/../model/DeportistaPEFMapper.php");
require_once(__DIR__."/../model/UsuarioMapper.php");
require_once(__DIR__."/../model/Usuario.php");


class DeportistaController extends BaseController
{
    private $deportistaMapper;
    private $usuarioMapper;
    private $deportistaPEFMapper;
    private $deportistaTDUMapper;


    public function __construct()
    {
        parent::__construct();/*llama al contructor padre 'BaseController de gestion de la sesion*/
        $this->deportistaMapper = new DeportistaMapper();
        $this->usuarioMapper = new UsuarioMapper();
        $this->deportistaPEFMapper = new DeportistaPEFMapper();
        $this->deportistaTDUMapper = new DeportistaTDUMapper();

    }

    public function tduADD() {
       $this->view->render("usuario/deportistas","deportistaADD");
    }

    public function pefADD(){
        $this->view->render("usuario/deportistas","deportistaADD");
    }

   /* public function tduADD() {

        if(isset($_POST['dni']) && isset($_POST['tarjeta'])){
            $deportista = new DeportistaTDU();
            $deportista->setDni($_POST["dni"]);
            $deportista->setTarjeta($_POST["tarjeta"]);
            if($this->deportistaTDUMapper->addTDU($deportista))
            {
               $this->view->setFlash("TDU Añadido Correctamente");

            }else
            {
                $errors["username"] = "El TDU no se ha añadido corectamente";
                $this->view->setFlash($errors["username"]);
            }
             $this->view->redirect("Deportista", "listarTDU");

        }else{

            $usuarios = $this->usuarioMapper->listar();
            $this->view->setVariable("usuarios",$usuarios);
            $this->view->render("usuario/deportistas","tduADD");

        }
        
    }*/
    /*  public function pefADD() {

        if(isset($_POST['dni']) && isset($_POST['tarjeta']) && isset($_POST['comentario'])){
            $deportista = new DeportistaPEF();
            $deportista->setDni($_POST["dni"]);
            $deportista->setTarjeta($_POST["tarjeta"]);
            $deportista->setComentario($_POST["comentario"]);

            if($this->deportistaPEFMapper->addPEF($deportista))
            {
               $this->view->setFlash("PEF Añadido Correctamente");

            }else
            {
                $errors["username"] = "El PEF no se ha añadido corectamente";
                $this->view->setFlash($errors["username"]);
            }
             $this->view->redirect("Deportista", "listarPEF");

        }else{

            $usuarios = $this->usuarioMapper->listar();
            $this->view->setVariable("usuarios",$usuarios);
            $this->view->render("usuario/deportistas","pefADD");

        }
        
    }*/

    public function listarTDU()
    {
        $deportistasTDU = $this->deportistaTDUMapper->listarTDU();
        $this->view->setVariable("deportistasTDU",$deportistasTDU);
        $this->view->render("usuario/deportistas","tduSHOWALL");
    }
    public function listarPEF()
    {
        $deportistasPEF = $this->deportistaPEFMapper->listarPEF();
        $this->view->setVariable("deportistasPEF",$deportistasPEF);
        $this->view->render("usuario/deportistas","pefSHOWALL");
    }

    public function PefEDIT()
    {
        if(isset($_POST["dni"]) && isset($_POST["tarjeta"]) && isset($_POST["comentario"]))
        {//si existen los post añado la notificacion
            $pef = new DeportistaPEF();
            $pef->setDni($_POST["dni"]);
            $pef->setTarjeta($_POST["tarjeta"]);
            $pef->setComentario($_POST["comentario"]);
            if($this->deportistaPEFMapper->editPEF($pef))
            {
                $this->view->setFlash("Deportista Editado Correctamente");
            }else
            {
                $errors["username"] = "El deportista no se ha editado corectamente";
                $this->view->setFlash($errors["username"]);
            }
            $this->view->redirect("Deportista", "listarPEF");
        }else
        {
            $dni = $_GET["dni"];
            $pef = $this->deportistaPEFMapper->findById($dni);
            if ($pef == NULL)
            {
                throw new Exception("No existe deportista con este dni: ".$dni);
            }

            $this->view->setVariable("usuario",$pef);
            $this->view->render("usuario/deportistas","pefEDIT");
        }
    }

    public function TduEDIT()
    {
        if(isset($_POST["dni"]) && isset($_POST["tarjeta"]))
        {//si existen los post añado la notificacion
            $tdu = new DeportistaPEF();
            $tdu->setDni($_POST["dni"]);
            $tdu->setTarjeta($_POST["tarjeta"]);
            if($this->deportistaTDUMapper->editTDU($tdu))
            {
                $this->view->setFlash("Deportista Editado Correctamente");
            }else
            {
                $errors["username"] = "El deportista no se ha editado corectamente";
                $this->view->setFlash($errors["username"]);
            }
            $this->view->redirect("Deportista", "listarTDU");
        }else
        {
            $dni = $_GET["dni"];
            $pef = $this->deportistaTDUMapper->findById($dni);
            if ($pef == NULL)
            {
                throw new Exception("No existe deportista con este dni: ".$dni);
            }

            $this->view->setVariable("usuario",$pef);
            $this->view->render("usuario/deportistas","tduEDIT");
        }
    }

    public function TduDELETE()
    {
        if(!isset($_POST['borrar']))
        {
            if (!isset($_GET["dni"]))
            {
                throw new Exception("El dni es obligatorio");
            }
            $dni = $_GET["dni"];
            // find the notification object in the database
            $deportistaTDU = $this->deportistaTDUMapper->findById($dni);
            if ($deportistaTDU == NULL)
            {
                throw new Exception("No existe deportista con este dni: ".$dni);
            }
            // put the notification object to the view
            $this->view->setVariable("deportista", $deportistaTDU);
            // render the view (/view/posts/view.php)
            $this->view->render("usuario/deportistas", "tduDELETE");
        }else
        {
            $dni = $_POST["dni"];
            if($deportistaTDU = $this->deportistaTDUMapper->deleteTDU($dni))
            {
                $this->view->setFlash("Deportista Eliminado Correctamente");
            }else
            {
                $errors["username"] = "El deportista no se ha eliminado corectamente";
                $this->view->setFlash($errors["username"]);
            }
            $this->view->redirect("Deportista", "listarTDU");
        }
    }

    public function PefDELETE()
    {
        if(!isset($_POST['borrar']))
        {
            if (!isset($_GET["dni"]))
            {
                throw new Exception("El dni es obligatorio");
            }
            $dni = $_GET["dni"];
            // find the notification object in the database
            $deportistaPEF = $this->deportistaPEFMapper->findById($dni);
            if ($deportistaPEF == NULL)
            {
                throw new Exception("No existe deportista con este dni: ".$dni);
            }
            // put the notification object to the view
            $this->view->setVariable("deportista", $deportistaPEF);
            // render the view (/view/posts/view.php)
            $this->view->render("usuario/deportistas", "pefDELETE");
        }else
        {
            $dni = $_POST["dni"];
            if($deportista = $this->deportistaPEFMapper->deletePEF($dni))
            {
                $this->view->setFlash("Deportista Eliminado Correctamente");
            }else
            {
                $errors["username"] = "El deportista no se ha eliminado corectamente";
                $this->view->setFlash($errors["username"]);
            }
            $this->view->redirect("Deportista", "listarPEF");
        }
    }



    /*Notificacion SHOW CURRENT
    *Si se llama con un get carga la vista
    *si se llama con un post muestra notificacion
    */
    public function TduView()
    {
        if (!isset($_GET["dni"]))
        {
            throw new Exception("El dni es obligatorio");
        }
        $dni = $_GET["dni"];
        // find the notification object in the database
        $deportista = $this->deportistaTDUMapper->findById($dni);
        if ($deportista == NULL)
        {
            throw new Exception("No existe usuario con este dni: ".$dni);
        }
        // put the notification object to the view
        $this->view->setVariable("deportista", $deportista);
        // render the view (/view/posts/view.php)
        $this->view->render("usuario/deportistas", "tduSHOWCURRENT");
    }


     /*Notificacion SHOW CURRENT
    *Si se llama con un get carga la vista
    *si se llama con un post muestra notificacion
    */
    public function PefView()
    {
        if (!isset($_GET["dni"]))
        {
            throw new Exception("El dni es obligatorio");
        }
        $dni = $_GET["dni"];
        // find the notification object in the database
        $deportista = $this->deportistaPEFMapper->findById($dni);
        if ($deportista == NULL)
        {
            throw new Exception("No existe usuario con este dni: ".$dni);
        }
        // put the notification object to the view
        $this->view->setVariable("deportista", $deportista);
        // render the view (/view/posts/view.php)
        $this->view->render("usuario/deportistas", "pefSHOWCURRENT");
    }


}
?>