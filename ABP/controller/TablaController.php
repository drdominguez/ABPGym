<?php

require_once(__DIR__."/../core/ViewManager.php");
require_once(__DIR__ . "/../controller/BaseController.php");
require_once(__DIR__ . "/../model/TablaMapper.php");
require_once(__DIR__ . "/../model/EjercicioMapper.php");
require_once(__DIR__ . "/../model/Tabla.php");

class TablaController extends BaseController
{
    private $tablaMapper;
    
    public function __construct() {
        parent::__construct();/*llama al contructor padre 'BaseController de gestion de la sesion*/
        $this->tablaMapper = new TablaMapper();
    }





    /*Tabla ADD
    *Si se llama con un get carga la vista
    *si se llama con un post añade la notificacion
    */
    public function TablaADD() 
    {
        if(isset($_POST["tipo"]) && isset($_POST["nombre"]) && isset($_POST["ejercicios"]))
        {//si existen los post añado la notificacion
            $ejercicios = $_POST["ejercicios"];
            $tabla = new Tabla();
            $tabla->setTipo($_POST["tipo"]);
            $tabla->setNombre($_POST["nombre"]);
            $tabla->setComentario($_POST['comentario']);
            if($this->tablaMapper->add($tabla,$ejercicios))
            {
               $this->view->setFlash("Tabla Añadida Correctamente");
            }else
            {
                $errors["username"] = "La tabla no se ha añadido corectamente";
                $this->view->setFlash($errors["username"]);
            }
            $this->view->redirect("Tabla", "tablaListar");
        }else
        {
            $ejercicios = $this->tablaMapper->listarEjercicios();
            $this->view->setVariable("ejercicios",$ejercicios);
            $this->view->render("tabla","tablaADD");
        }
    }


 /*Tabla EDIT
    *Si se llama con un get carga la vista
    *si se llama con un post añade la notificacion
    */
    public function TablaEDIT() 
    {   
        if(isset($_POST["tipo"]) && isset($_POST["nombre"]) && isset($_POST["ejercicios"]))
        {//si existen los post añado la notificacion
            $ejercicios = $_POST["ejercicios"];
            $tablaE = new Tabla();
            $tablaE->setTipo($_POST["tipo"]);
            $tablaE->setNombre($_POST["nombre"]);
            $tablaE->setComentario($_POST['comentario']);
            $idTabla = $_POST['idTabla'];
            if($this->tablaMapper->edit($tablaE,$ejercicios,$idTabla))
            {
               $this->view->setFlash("Tabla Editada Correctamente");
            }else
            {
                $errors["username"] = "La tabla no se ha editado corectamente";
                $this->view->setFlash($errors["username"]);
            }
            $this->view->redirect("Tabla", "tablaListar");
        }else
        {
            $idTabla = $_GET["idTabla"];
            $ejercicios = $this->tablaMapper->listarEjercicios();
            $ejerciciosSelected = $this->tablaMapper->listarEjerciciosSelected($idTabla);
            $tabla = $this->tablaMapper->findTablaById($idTabla);
            if ($tabla == NULL) 
            {
                throw new Exception("No existe tabla con este id: ".$idTabla);
            }

                $this->view->setVariable("ejercicios",$ejercicios);
                 $this->view->setVariable("tabla", $tabla);
                $this->view->setVariable("ejerciciosSelected",$ejerciciosSelected);
                $this->view->render("tabla","tablaEDIT");
            }
    }

    /*TablaListar
    *Muestra una lista con todos las Notificaciones
    */
    public function TablaListar() 
    {
       $tablas = $this->tablaMapper->listar();
       $this->view->setVariable("tablas",$tablas);
       $this->view->render("tabla","tablaSHOWALL");
    }





    /*TablaDelete
    *Muestra una lista con todos las Notificaciones
    */
    public function TablaDelete() 
    {

        if(!isset($_POST['borrar']))
        {
            if (!isset($_GET["idTabla"])) 
            {
                throw new Exception("El id es obligatorio");
            }
            $idTabla = $_GET["idTabla"];
            // find the notification object in the database
            $tabla = $this->tablaMapper->findTablaById($idTabla);
            $ejercicios = $this->tablaMapper->findEjerciciosById($idTabla);
            if ($tabla == NULL) 
            {
                throw new Exception("No existe tabla con este id: ".$idTabla);
            }
            // put the notification object to the view
            $this->view->setVariable("tabla", $tabla);
            $this->view->setVariable("ejercicios", $ejercicios);
            // render the view (/view/posts/view.php)
            $this->view->render("tabla", "tablaDELETE");
        }else
        {
            $idTabla = $_POST["idTabla"];
            if($tabla = $this->tablaMapper->delete($idTabla))
            {
               $this->view->setFlash("Tabla Eliminada Correctamente");
            }else
            {
                $errors["username"] = "La tabla no se ha eliminado corectamente";
                $this->view->setFlash($errors["username"]);
            }
            $this->view->redirect("Tabla", "tablaListar");
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
        $ejercicios = $this->tablaMapper->findEjerciciosById($idTabla);
        if ($tabla == NULL) 
        {
            throw new Exception("No existe tabla con este id: ".$idTabla);
        }
        // put the notification object to the view
        $this->view->setVariable("tabla", $tabla);
        $this->view->setVariable("ejercicios", $ejercicios);

        // render the view (/view/posts/view.php)
        $this->view->render("tabla", "tablaSHOWCURRENT");
    }


    /*Tabla Asignar
    *Si se llama con un get carga la vista
    *si se llama con un post muestra notificacion
    */
    public function TablaAsignar() 
    {
         if(isset($_POST["usuario"]) && isset($_POST["idTabla"]))
        {
            $usuario = $_POST['usuario'];
            $tabla = $_POST['idTabla'];
             if($this->tablaMapper->asignar($usuario,$tabla))
            {
               $this->view->setFlash("Tabla Asignada Correctamente");
            }else
            {
                $errors["username"] = "La tabla no se ha asignado corectamente";
                $this->view->setFlash($errors["username"]);
            }
            $this->view->redirect("Tabla", "tablaListar");
            
        }else{
        $usuarios = $this->tablaMapper->listarUsuarios();
        $this->view->setVariable("usuarios",$usuarios);
        $this->view->render("tabla","tablaASIGNAR");
        }
    }
}
?>