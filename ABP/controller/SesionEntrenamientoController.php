<?php

require_once(__DIR__."/../core/ViewManager.php");
require_once(__DIR__ . "/../controller/BaseController.php");
require_once(__DIR__ . "/../model/SesionEntrenamientoMapper.php");
require_once(__DIR__ . "/../model/TablaMapper.php");
require_once(__DIR__ . "/../model/Tabla.php");
require_once(__DIR__ . "/../model/EjercicioMapper.php");

class SesionEntrenamientoController extends BaseController{

    private $SesionMapper;

    public function __construct() {
        parent::__construct();/*llama al contructor padre 'BaseController de gestion de la sesion*/
        $this->SesionMapper = new SesionEntrenamientoMapper();
    }

    public function TablaListar(){
        $tablaMapper = new TablaMapper();
        $tablas = $tablaMapper->listar();
        $this->view->setVariable("tablas",$tablas);
        $this->view->render("sesionEntrenamiento","tablaSHOWALL");
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