<?php

require_once(__DIR__."/../core/ViewManager.php");
require_once(__DIR__ . "/../controller/BaseController.php");
require_once(__DIR__ . "/../model/TablaMapper.php");
require_once(__DIR__ . "/../model/EjercicioMapper.php");
require_once(__DIR__ . "/../model/Tabla.php");
require_once(__DIR__ . "/../core/permisos.php");

class TablaController extends BaseController
{
    private $tablaMapper;
    private $permisos;
    
    public function __construct() {
        parent::__construct();/*llama al contructor padre 'BaseController de gestion de la sesion*/
        $this->tablaMapper = new TablaMapper();
        $this->permisos= new Permisos();
    }

    /*Tabla ADD
    *Si se llama con un get carga la vista
    *si se llama con un post añade la notificacion
    */
    public function EstandarADD() 
    {

        if($this->permisos->esSuperusuario()){
        if(isset($_POST["nombre"]) && (isset($_POST["estiramientos"]) || isset($_POST["musculares"])|| isset($_POST["cardios"])))
        {//si existen los post añado la notificacion
            if(isset($_POST["estiramientos"])){

                $estiramientos = $_POST["estiramientos"];

            }else{
                $estiramientos=array();
            }
             if(isset($_POST["musculares"])){

            $musculares = $_POST["musculares"];

            }else{
                $musculares=array();
            }
             if(isset($_POST["cardios"])){

            $cardios = $_POST["cardios"];

            }else{
                $cardios= array();
            }

            $array_musculares= array();
            $array_cardios= array();
            $array_musculares= array();

            foreach ($estiramientos as $estiramiento) {
                $array_estiramientos["tiempo_" . $estiramiento] = $_POST["estiramientotiempo_" . $estiramiento];
                $array_estiramientos["idEstiramiento_" . $estiramiento] = $_POST["idEstiramiento_" . $estiramiento];
            }

            foreach ($musculares as $muscular) {
                $array_musculares["carga_".$muscular] = $_POST["muscularcarga_" . $muscular];
                $array_musculares["repeticiones_".$muscular] = $_POST["muscularrepeticiones_" . $muscular];
                $array_musculares["idMuscular_" . $muscular] = $_POST["idMuscular_" . $muscular];

            }


            foreach ($cardios as $cardio) {
                $array_cardios["tiempo_".$cardio] = $_POST["cardiotiempo_" . $cardio];
                $array_cardios["distancia_".$cardio] = $_POST["cardiodistancia_" . $cardio];
                $array_cardios["idCardio_" . $cardio] = $_POST["idCardio_" . $cardio];

            }
            $tabla = new Tabla();
            $tabla->setNombre($_POST["nombre"]);
            $tabla->setComentario($_POST['comentario']);
            //Añadir los atributos dependiendo del tipo de ejercicio (cardio, muscular o entrenamiento)
            if($this->tablaMapper->addEstandar($tabla,$estiramientos,$musculares,$cardios,$array_estiramientos,$array_musculares,$array_cardios))
            {
                $this->view->redirect("Tabla", "tablaListar","Tabla Añadida Correctamente");
            }else
            {
                $this->view->redirect("Tabla", "tablaListar","La tabla no se ha añadido corectamente");
            }
        }else
        {
            $cardio = $this->tablaMapper->listarCardio();
            $muscular = $this->tablaMapper->listarMuscular();
            $estiramiento = $this->tablaMapper->listarEstiramiento();
            $this->view->setVariable("cardios",$cardio);
            $this->view->setVariable("musculares",$muscular);
            $this->view->setVariable("estiramientos",$estiramiento);
            $this->view->render("tabla","estandarADD");
        }
    }else{
        $this->view->redirect("main", "index");
    }
    }

public function PersonalizadaADD() 
    {

        if($this->permisos->esSuperusuario()){
        if(isset($_POST["nombre"]) && isset($_POST["usuario"]))
        {//si existen los post añado la notificacion

            if(isset($_POST["estiramientos"])){

                $estiramientos = $_POST["estiramientos"];

            }else{
                $estiramientos=array();
            }
             if(isset($_POST["musculares"])){

            $musculares = $_POST["musculares"];

            }else{
                $musculares=array();
            }
             if(isset($_POST["cardios"])){

            $cardios = $_POST["cardios"];

            }else{
                $cardios= array();
            }

            $array_musculares= array();
            $array_cardios= array();
            $array_musculares= array();

            foreach ($estiramientos as $estiramiento) {
                $array_estiramientos["tiempo_" . $estiramiento] = $_POST["estiramientotiempo_" . $estiramiento];
                $array_estiramientos["idEstiramiento_" . $estiramiento] = $_POST["idEstiramiento_" . $estiramiento];
            }

            foreach ($musculares as $muscular) {
                $array_musculares["carga_".$muscular] = $_POST["muscularcarga_" . $muscular];
                $array_musculares["repeticiones_".$muscular] = $_POST["muscularrepeticiones_" . $muscular];
                $array_musculares["idMuscular_" . $muscular] = $_POST["idMuscular_" . $muscular];

            }


            foreach ($cardios as $cardio) {
                $array_cardios["tiempo_".$cardio] = $_POST["cardiotiempo_" . $cardio];
                $array_cardios["distancia_".$cardio] = $_POST["cardiodistancia_" . $cardio];
                $array_cardios["idCardio_" . $cardio] = $_POST["idCardio_" . $cardio];

            }

            $usuario = $_POST['usuario'];
            $tabla = new Tabla();
            $tabla->setNombre($_POST["nombre"]);
            $tabla->setComentario($_POST['comentario']);
            //Añadir los atributos dependiendo del tipo de ejercicio (cardio, muscular o entrenamiento)

            if($this->tablaMapper->addPersonalizada($tabla,$estiramientos,$musculares,$cardios,$array_estiramientos,$array_musculares,$array_cardios,$usuario))
            {
                $this->view->redirect("Tabla", "tablaListar","Tabla Añadida Correctamente");
            }else
            {
                $this->view->redirect("Tabla", "tablaListar","La tabla no se ha añadido corectamente");
            }
        }else
        {
            $usuarios = $this->tablaMapper->listarDeportistas();
            $cardio = $this->tablaMapper->listarCardio();
            $muscular = $this->tablaMapper->listarMuscular();
            $estiramiento = $this->tablaMapper->listarEstiramiento();
            $this->view->setVariable("cardios",$cardio);
            $this->view->setVariable("musculares",$muscular);
            $this->view->setVariable("estiramientos",$estiramiento);
            $this->view->setVariable("usuarios", $usuarios);
            $this->view->render("tabla","personalizadaADD");
        }
    }else{
        $this->view->redirect("main", "index");
    }
    }


 /*Tabla EDIT
    *Si se llama con un get carga la vista
    *si se llama con un post añade la notificacion
    */
    public function TablaEDIT() 
    {   
        if($this->permisos->esSuperusuario()){
        if(isset($_POST["nombre"]) && (isset($_POST["estiramientos"]) || isset($_POST["musculares"])|| isset($_POST["cardios"])))
        {//si existen los post añado la notificacion

            if(isset($_POST["estiramientos"])){

                $estiramientos = $_POST["estiramientos"];

            }else{
                $estiramientos=array();
            }
             if(isset($_POST["musculares"])){

            $musculares = $_POST["musculares"];

            }else{
                $musculares=array();
            }
             if(isset($_POST["cardios"])){

            $cardios = $_POST["cardios"];

            }else{
                $cardios= array();
            }

            $array_musculares= array();
            $array_cardios= array();
            $array_musculares= array();

            foreach ($estiramientos as $estiramiento) {
                $array_estiramientos["tiempo_" . $estiramiento] = $_POST["estiramientotiempo_" . $estiramiento];
                $array_estiramientos["idEstiramiento_" . $estiramiento] = $_POST["idEstiramiento_" . $estiramiento];
            }

            foreach ($musculares as $muscular) {
                $array_musculares["carga_".$muscular] = $_POST["muscularcarga_" . $muscular];
                $array_musculares["repeticiones_".$muscular] = $_POST["muscularrepeticiones_" . $muscular];
                $array_musculares["idMuscular_" . $muscular] = $_POST["idMuscular_" . $muscular];

            }


            foreach ($cardios as $cardio) {
                $array_cardios["tiempo_".$cardio] = $_POST["cardiotiempo_" . $cardio];
                $array_cardios["distancia_".$cardio] = $_POST["cardiodistancia_" . $cardio];
                $array_cardios["idCardio_" . $cardio] = $_POST["idCardio_" . $cardio];

            }

            $idTabla = $_POST['idTabla'];
            $tipo = $_POST['tipo'];
            $tabla = new Tabla($idTabla,$tipo);
            $tabla->setNombre($_POST["nombre"]);
            $tabla->setComentario($_POST['comentario']);

            if($this->tablaMapper->edit($tabla,$estiramientos,$musculares,$cardios,$array_estiramientos,$array_musculares,$array_cardios))
            {
                $this->view->redirect("Tabla", "tablaListar","Tabla Editada Correctamente");
            }else
            {
                $this->view->redirect("Tabla", "tablaListar","La tabla no se ha editado corectamente");
            }
        }else
        {
            $idTabla = $_GET["idTabla"];
            $cardio = $this->tablaMapper->listarCardio();
            $muscular = $this->tablaMapper->listarMuscular();
            $estiramiento = $this->tablaMapper->listarEstiramiento();
            $cardioselected = $this->tablaMapper->listarCardioSelected($idTabla);
            $muscularselected = $this->tablaMapper->listarMuscularSelected($idTabla);
            $estiramientoselected = $this->tablaMapper->listarEstiramientoSelected($idTabla);
            $tabla = $this->tablaMapper->findTablaById($idTabla);
            if ($tabla == NULL) 
            {
                throw new Exception("No existe tabla con este id: ".$idTabla);
            }

            $this->view->setVariable("cardios",$cardio);
            $this->view->setVariable("musculares",$muscular);
            $this->view->setVariable("estiramientos",$estiramiento);
            $this->view->setVariable("cardioselected",$cardioselected);
            $this->view->setVariable("muscularselected",$muscularselected);
            $this->view->setVariable("estiramientoselected",$estiramientoselected);
            $this->view->setVariable("tabla", $tabla);
            $this->view->render("tabla","tablaEDIT");
            }
      }else{
        $this->view->redirect("main", "index");
    }
    }
    /*TablaListar
    *Muestra una lista con todos las Notificaciones
    */
    public function TablaListar() 
    {
        if(isset($_GET['setflash'])){
            $this->view->setFlash($_GET['setflash']);
        }
        $tipoUsuario = $this->permisos->comprobarTipo();
        $tablas = $this->tablaMapper->listar();
        $this->view->setVariable("tablas",$tablas);
        $this->view->setVariable("tipoUsuario",$tipoUsuario);
        $this->view->render("tabla","tablaSHOWALL");
    }





    /*TablaDelete
    *Muestra una lista con todos las Notificaciones
    */
    public function TablaDelete() 
    {
    if($this->permisos->esSuperusuario()){
        if(!isset($_POST['borrar']))
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
            if ($tabla == NULL) 
            {
                throw new Exception("No existe tabla con este id: ".$idTabla);
            }
            // put the notification object to the view
            $tipoUsuario = $this->permisos->comprobarTipo();
            $this->view->setVariable("tipoUsuario",$tipoUsuario);
            $this->view->setVariable("tabla", $tabla);            
            $this->view->setVariable("cardios",$cardios);
            $this->view->setVariable("usuarios",$usuarios);
            $this->view->setVariable("musculares",$musculares);
            $this->view->setVariable("estiramientos",$estiramientos);
            // render the view (/view/posts/view.php)
            $this->view->render("tabla", "tablaDELETE");
        }else
        {
            $idTabla = $_POST["idTabla"];
            if($tabla = $this->tablaMapper->delete($idTabla))
            {
                $this->view->redirect("Tabla", "tablaListar","Tabla Eliminada Correctamente");
            }else
            {
                $this->view->redirect("Tabla", "tablaListar","La tabla no se ha eliminado corectamente");
            }
        }
        }else{
        $this->view->redirect("main", "index");
    }
    }




    /*Tabla SHOW CURRENT
    *Si se llama con un get carga la vista
    *si se llama con un post muestra notificacion
    */
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
        $this->view->render("tabla", "tablaSHOWCURRENT");
    }


    /*Tabla Asignar
    *Si se llama con un get carga la vista
    *si se llama con un post muestra notificacion
    */
    public function TablaAsignar() 
    {
        if($this->permisos->esSuperusuario()){
         if(isset($_POST["usuario"]) && isset($_POST["idTabla"]))
        {
            $usuario = $_POST['usuario'];
            $tabla = $_POST['idTabla'];
             if($this->tablaMapper->asignar($usuario,$tabla))
            {
                $this->view->redirect("Tabla", "tablaListar","Tabla Asignada Correctamente");
            }else
            {
                $this->view->redirect("Tabla", "tablaListar","La tabla no se ha asignado corectamente");
            }
        }else{
            $idTabla = $_GET['idTabla'];
            $usuarios = $this->tablaMapper->listarDeportistas();
            $usuariosAsignados = $this->tablaMapper->listarDeportistasAsignados($idTabla);
            $this->view->setVariable("usuariosAsignados",$usuariosAsignados);
            $this->view->setVariable("usuarios",$usuarios);
            $this->view->render("tabla","tablaASIGNAR");
        }
         }else{
        $this->view->redirect("main", "index");
    }
    }


    public function DesasignarTabla(){
        if($this->permisos->esSuperusuario()){
            if(isset($_POST['borrar']) && isset($_POST['usuario']) && isset($_POST['idTabla'])){
                $usuario = $_POST['usuario'];
                $idTabla = $_POST['idTabla'];
                $tabla = $this->tablaMapper->findTablaById($idTabla);
                if($this->tablaMapper->desasignar($usuario, $tabla)){
                    $this->view->redirect("Tabla", "tablaListar","Tabla Desasignada Correctamente");
                }else
                {
                    $this->view->redirect("Tabla", "tablaListar","La tabla no se ha desasignado corectamente");
                }
            }else{

                if(isset($_POST['usuario'])){
                    $tablasUsuario = $this->tablaMapper->listarTablasUsuario($_POST['usuario']);
                    $this->view->setVariable("usuario",$_POST['usuario']);
                    $this->view->setVariable("tablas", $tablasUsuario);
                    $this->view->render("tabla", "tablaDESASIGNAR");
                }else{
                    $usuarios = $this->tablaMapper->listarDeportistas();
                    $this->view->setVariable("usuarios",$usuarios);
                    $this->view->render("tabla","tablaDESASIGNAR");
                }
            }
        }else{
        $this->view->redirect("main", "index");
    }
    }
}
?>