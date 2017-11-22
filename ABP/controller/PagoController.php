<?php

require_once(__DIR__."/../core/ViewManager.php");
require_once(__DIR__ . "/../controller/BaseController.php");
require_once(__DIR__ . "/../model/PagoMapper.php");
require_once(__DIR__ . "/../model/Pago.php");

class PagoController extends BaseController
{
    private $pagoMapper;

    public function __construct()
    {
        parent::__construct();/*llama al contructor padre 'BaseController de gestion de la sesion*/
        $this->pagoMapper = new PagoMapper();
    }



    /*Notificacion ADD
    *Si se llama con un get carga la vista
    *si se llama con un post añade la notificacion
    */
    public function PagoADD() {
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
            $actividades = $this->pagoMapper->listarActividades();
            $this->view->setVariable("actividades",$actividades);
            $this->view->render("pago","pagoADD");
        }
    }

    public function PagoListar()
    {
        $pagos = $this->pagoMapper->listar();
        $this->view->setVariable("pagos",$pagos);
        $this->view->render("pago","pagoSHOWALL");
    }

}
?>