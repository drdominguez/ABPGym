<?php

require_once(__DIR__."/../core/ViewManager.php");
require_once(__DIR__ . "/../controller/BaseController.php");
require_once(__DIR__ . "/../model/SesionEntrenamientoMapper.php");
require_once(__DIR__ . "/../model/TablaMapper.php");
require_once(__DIR__ . "/../model/Tabla.php");
require_once(__DIR__ . "/../model/EjercicioMapper.php");

class SesionEntrenamientoController extends BaseController{

    private $tablaMapper;

    public function __construct() {
        parent::__construct();/*llama al contructor padre 'BaseController de gestion de la sesion*/
        $this->tablaMapper = new TablaMapper();
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

    /*
    *Muestra los ejercicios con su informacion pormenorizada para que sean realizados por un deportista.
    *si se llama por un get lista todos los ejercicios detallados en la vista
    *si de llama por un post guarda la sesion en la bbdd
    */
    public function realizarTabla(){
        $listaEjercicios = array();//se iran guardando todos los ejercicios con la informacion detallada
        $carioMapper = new EjercicioCardioMapper();
        $estiramientoMapper = new EjericioEstiramientoMapper();
        $muscularMapper = new EjercicioMuscularMapper();
        $ejercicios=$this->tablaMapper->findEjerciciosById($_GET["idTabla"];
        foreach ($ejercicios as $ejercicio) {//voy recorriendo todos los ejercicios de la tabla a realizar
            if($carioMapper->esCardio($ejercicio->getIdEjercicio())){
                $ejercicioCompleto=$carioMapper->getCardioById($ejercicio->getIdEjercicio());
            }elseif($estiramientoMapper->esEstiramiento($ejercicio->getIdEjercicio())){
                $ejercicioCompleto=$carioMapper->getEstiramientoById($ejercicio->getIdEjercicio());
            }else{//si no es ni cardio ni estiramiento solo puede ser muscular
                $ejercicioCompleto=$muscularMapper->getMuscularById($ejercicio->getIdEjercicio());
            }
             array_push($listaEjercicios, $ejercicioCompleto); //guardo los ejercicios completos
        }
        $this->view->setVariable($listaEjercicios);
        $this->view->render("sesionEntrenamiento", "realizarEjercicio");
    }
}
?>