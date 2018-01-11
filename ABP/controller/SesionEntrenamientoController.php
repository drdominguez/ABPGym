<?php

require_once(__DIR__."/../core/ViewManager.php");
require_once(__DIR__ . "/../controller/BaseController.php");
require_once(__DIR__ . "/../model/SesionEntrenamientoMapper.php");
require_once(__DIR__ . "/../model/TablaMapper.php");
require_once(__DIR__ . "/../model/Tabla.php");
require_once(__DIR__ . "/../model/EjercicioMapper.php");
require_once(__DIR__ . "/../model/EjercicioCardioMapper.php");
require_once(__DIR__ . "/../model/EjercicioMuscularMapper.php");
require_once(__DIR__ . "/../model/EjercicioEstiramientoMapper.php");
require_once(__DIR__ . "/../core/permisos.php");

class SesionEntrenamientoController extends BaseController{

    private $tablaMapper;
    private $permisos;

    public function __construct() {
        parent::__construct();/*llama al contructor padre 'BaseController de gestion de la sesion*/
        $this->tablaMapper = new TablaMapper();
        $this->permisos= new Permisos();
    }

    public function TablaListar(){
        $tablaMapper = new TablaMapper();
        $tablas = $tablaMapper->listar();
        $this->view->setVariable("tablas",$tablas);
        $this->view->render("sesionEntrenamiento","tablaSHOWALL");
    }

    public function TablaView() 
    {
        if (!isset($_GET["idTabla"])) 
        {
            throw new Exception("El id es obligatorio");
        }
        
        $idTabla = $_GET["idTabla"];

        // find the notification object in the database
        $tabla = $this->tablaMapper->findTablaById($idTabla);
        $musculares = $this->tablaMapper->findMuscularesById($idTabla);
        $cardios = $this->tablaMapper->findCardiosById($idTabla);
        $estiramientos = $this->tablaMapper->findEstiramientosById($idTabla);
        $usuarios = $this->tablaMapper->listarUsuariosTabla($idTabla);
        $tipoUsuario = $this->permisos->comprobarTipo();

        if ($tabla == NULL) 
        {
            throw new Exception("No existe tabla con este id: ".$idTabla);
        }
        // put the notification object to the view

        
        $this->view->setVariable("tipoUsuario",$tipoUsuario);
        $this->view->setVariable("tabla", $tabla);            
        $this->view->setVariable("cardios",$cardios);
        $this->view->setVariable("usuarios",$usuarios);
        $this->view->setVariable("musculares",$musculares);
        $this->view->setVariable("estiramientos",$estiramientos);

        // render the view (/view/posts/view.php)
        $this->view->render("tabla", "tablaSHOWCURRENT2");
    }

    /*
    *Muestra los ejercicios con su informacion pormenorizada para que sean realizados por un deportista.
    *si se llama por un get lista todos los ejercicios detallados en la vista
    *si de llama por un post guarda la sesion en la bbdd
    */
    public function realizarTabla(){
    	
        $listaEjercicios = array();//se iran guardando todos los ejercicios con la informacion detallada
        $carioMapper = new EjercicioCardioMapper();
        $estiramientoMapper = new EjercicioEstiramientoMapper();
        $muscularMapper = new EjercicioMuscularMapper();




        $ejercicios=$this->tablaMapper->findEjerciciosById($_GET["idTabla"]);
        foreach ($ejercicios as $ejercicio) {//voy recorriendo todos los ejercicios de la tabla a realizar
            if($carioMapper->esCardio($ejercicio->getIdEjercicio())){
                $ejercicioCompleto=$carioMapper->getCardioById($ejercicio->getIdEjercicio());
            }elseif($estiramientoMapper->esEstiramiento($ejercicio->getIdEjercicio())){
                $ejercicioCompleto=$estiramientoMapper->getEstiramientoById($ejercicio->getIdEjercicio());
            }else{//si no es ni cardio ni estiramiento solo puede ser muscular
                $ejercicioCompleto=$muscularMapper->getMuscularById($ejercicio->getIdEjercicio());
            }
            array_push($listaEjercicios, $ejercicioCompleto); //guardo los ejercicios completos
        }



        $this->view->setVariable("ejercicios",$listaEjercicios);
        $this->view->render("sesionEntrenamiento", "realizarEjercicio");
    }
}
?>