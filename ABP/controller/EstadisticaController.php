<?php

require_once(__DIR__."/../core/ViewManager.php");
require_once(__DIR__ . "/../controller/BaseController.php");
require_once(__DIR__ . "/../model/Estadistica.php");
require_once(__DIR__ . "/../model/EstadisticaMapper.php");
require_once(__DIR__ . "/../core/permisos.php");



class EstadisticaController extends BaseController{

    private $estadisticaMapper;
    private $permisos;

    public function __construct() {
        parent::__construct();/*llama al contructor padre 'BaseController de gestion de la sesion*/
        $this->estadisticaMapper = new EstadisticaMapper();
        $this->permisos= new Permisos();
    }

    public function Listar()
    {
        $tipoUsuario = $this->permisos->comprobarTipo();
        $estadisticaMapper = new EstadisticaMapper();
        $estadisticas = $estadisticaMapper->listar();
        $this->view->setVariable("estadistica",$estadisticas);
        $this->view->setVariable("tipoUsuario",$tipoUsuario);
        $this->view->render("Estadistica","estadisticaSHOWALL");
    }

    public function Listar2(){
        if (!isset($_GET["dni"])){
            throw new Exception("El dni es obligatorio");
        }
        $dni = $_GET["dni"];
        $tipoUsuario = $this->permisos->comprobarTipo();
        $estadisticaMapper = new EstadisticaMapper();
        $estadisticas = $estadisticaMapper->listarDeportista($dni);
        $this->view->setVariable("estadistica",$estadisticas);
        $this->view->setVariable("tipoUsuario",$tipoUsuario);
        $this->view->render("Estadistica","estadisticaSHOWDEPORTISTA");
    }


    public function EstadisticaView() {
        $estadisticaMapper = new EstadisticaMapper();
        if (!isset($_GET["idTabla"])){
            throw new Exception("El idTabla es obligatorio");
        }
        $idTabla = $_GET["idTabla"];
        $idSesion = $_GET["idSes"];
        // find the notification object in the database
        $estadistica =  $estadisticaMapper->mostrarEstadistica($idTabla,$idSesion);

        if ($estadistica == NULL){
            throw new Exception("No existe tabla con este id: ".$idTabla);
        }
        // put the notification object to the view
        $this->view->setVariable("estadistica", $estadistica);
        // render the view (/view/posts/view.php)
        $this->view->render("Estadistica", "estadisticaSHOWCURRENT");
    }

}
?>