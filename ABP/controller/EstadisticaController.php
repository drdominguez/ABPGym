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

    public function Listar(){
        $estadisticaMapper = new EstadisticaMapper();
        $estadisticas = $estadisticaMapper->listar();
        $this->view->setVariable("estadistica",$estadisticas);
        $this->view->render("Estadistica","estadisticaSHOWALL");
    }

    public function TablaView() {
        $tablaMapper = new TablaMapper();
        if (!isset($_GET["idTabla"])){
            throw new Exception("El id es obligatorio");
        }
        $idTabla = $_GET["idTabla"];
        // find the notification object in the database
        $tabla =  $tablaMapper->findTablaById($idTabla);
        $ejercicios = $tablaMapper->findEjerciciosById($idTabla);

        if ($tabla == NULL){
            throw new Exception("No existe tabla con este id: ".$idTabla);
        }
        // put the notification object to the view
        $this->view->setVariable("tabla", $tabla);
        $this->view->setVariable("ejercicios", $ejercicios);
        // render the view (/view/posts/view.php)
        $this->view->render("sesionEntrenamiento", "tablaSHOWCURRENT");
    }

}
?>