<?php

require_once(__DIR__."/../core/ViewManager.php");
require_once(__DIR__ . "/../controller/BaseController.php");
require_once(__DIR__ . "/../model/PagoMapper.php");
require_once(__DIR__ . "/../model/Pago.php");
require_once(__DIR__ . "/../core/permisos.php");


class PagoController extends BaseController
{
    private $pagoMapper;
       private $permisos;

    public function __construct()
    {
        parent::__construct();/*llama al contructor padre 'BaseController de gestion de la sesion*/
        $this->pagoMapper = new PagoMapper();
         $this->permisos= new Permisos();
    }



    /*Notificacion ADD
    *Si se llama con un get carga la vista
    *si se llama con un post añade la notificacion
    */
    public function PagoADD() {
        if($this->permisos->esAdministrador()){
        if(isset($_POST["dniDeportista"]) && isset($_POST["idActividad"])&& isset($_POST["importe"]) )
        {//si existen los post añado el ejercicio
            
            $pago = new Pago();
            $pago->setDniDeportista($_POST["dniDeportista"]);
            $pago->setIdActividad($_POST["idActividad"]);
            $pago->setImporte($_POST["importe"]);
            $pago->setFecha(date("Y-m-d H:i:s"));
            if($this->pagoMapper->add($pago)){
                $this->view->setFlash("Pago Añadido Corectamente");

            }else{
                $errors["username"] = "El pago no se ha añadido corectamente";
                $this->view->setFlash($errors["username"]);
            }
            $this->view->redirect("pago", "PagoListar");

        }else
        {
            if(isset($_POST["dniDeportista"])){

                $actividades = $this->pagoMapper->listarActividades();
                $this->view->setVariable("actividades",$actividades);
                $this->view->setVariable("usuario",$_POST['dniDeportista']);
                $this->view->setVariable("seleccionarusuario", "ok");
                $this->view->render("pago","pagoADD");

            }else{
                $deportistas = $this->pagoMapper->listarDeportistas();
                $this->view->setVariable("usuarios",$deportistas);
                $this->view->setVariable("seleccionarusuario", "no");
                $this->view->render("pago","pagoADD");
            }
        }
        }else{
                $this->view->redirect("main", "index");
        }
    }

    public function PagoListar()
    {
        if($this->permisos->esAdministrador() || $this->permisos->esDeportista() ){
        $tipoUsuario = $this->permisos->comprobarTipo();
        $pagos = $this->pagoMapper->listar();
        $this->view->setVariable("pagos",$pagos);
         $this->view->setVariable("tipoUsuario",$tipoUsuario);
        $this->view->render("pago","pagoSHOWALL");
        }else{
                $this->view->redirect("main", "index");
        }
    }

    public function PagoDELETE()
    {
        if($this->permisos->esAdministrador()){
        if(!isset($_POST['borrar']))
        {
            if (!isset($_GET["idPago"]))
            {
                throw new Exception("El idPago es obligatorio");
            }
            $idPago = $_GET["idPago"];
            // find the notification object in the database
            $pago = $this->pagoMapper->findById($idPago);
            if ($pago == NULL)
            {
                throw new Exception("No existe ese pago");
            }
            // put the notification object to the view
            $this->view->setVariable("pago", $pago);
            // render the view (/view/posts/view.php)
            $this->view->render("pago", "pagoDELETE");
        }else
        {
            $idPago = $_POST["idPago"];
            if($pago = $this->pagoMapper->delete($idPago))
            {
                $this->view->setFlash("Pago Eliminado Correctamente");
            }else
            {
                $errors["username"] = "El pago no se ha eliminado corectamente";
                $this->view->setFlash($errors["username"]);
            }
            $this->view->redirect("Pago", "PagoListar");
        }
        }else{
                $this->view->redirect("main", "index");
        }
    }

    public function PagoView()
    {
        if($this->permisos->esAdministrador() || $this->permisos->esDeportista() ){
        if (!isset($_GET["idPago"]))
        {
            throw new Exception("El IDPago es obligatorio");
        }
        $idPago = $_GET["idPago"];
        // find the notification object in the database
        $pago = $this->pagoMapper->findById($idPago);
        if ($pago == NULL)
        {
            throw new Exception("No existe pago con ese id: ".$idPago);
        }
        // put the notification object to the view
        $this->view->setVariable("pago", $pago);
        // render the view (/view/posts/view.php)
        $this->view->render("pago", "pagoSHOWCURRENT");
         }else{
                $this->view->redirect("main", "index");
        }
    }

}
?>