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
        $this->pagoMapper = new pagoMapper();
    }



    /*Notificacion ADD
    *Si se llama con un get carga la vista
    *si se llama con un post añade la notificacion
    */
    public function PagoADD() {
        $this->PagoMapper = new PagoMapper();
        if(isset($_POST["DNI"]) && isset($_POST["Nombre"]) )
        {//si existen los post añado el ejercicio
            $pago = new Pago();
            $pago->setDniDeportista($_POST["DNI"]);
            $pago->setIdActividad($_POST["Nombre"]);
            $pago->setFecha(date("Y-m-d H:i:s"));
            if($this->PagoMapper->add($pago)){
                $this->view->setFlash("Pago Añadido Corectamente");

            }else{
                $errors["username"] = "El pago no se ha añadido corectamente";
                $this->view->setFlash($errors["username"]);
            }
            $this->view->redirect("Pago", "PagoListar");

        }
        $this->view->render("Pago","pago_ADD_View");
    }

    public function PagoListar()
    {
        $pagos = $this->pagoMapper->listar();
        $this->view->setVariable("pagos",$pagos);
        $this->view->render("Pago","pago_SHOWALL_View");
    }

}
?>