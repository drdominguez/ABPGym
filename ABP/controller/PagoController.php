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
    public function PagoADD()
    {
        if(isset($_POST[" "]) && isset($_POST["contenido"]))
        {//si existen los post añado la notificacion
            $notificacion = new Notificacion();
            $notificacion->setAsunto($_POST["Asunto"]);
            $notificacion->setContenido($_POST["contenido"]);
            $notificacion->setFecha(date("Y-m-d H:i:s"));
            if($this->notificacionMapper->add($notificacion))
            {
                $this->view->setFlash("Pago Añadido Correctamente");

            }else
            {
                $errors["username"] = "El pago no se ha añadido corectamente";
                $this->view->setFlash($errors["username"]);
            }
            $this->view->redirect("Notificacion", "NotificacionListar");
        }else
        {
            $this->view->render("notificacion","notificacionADD");
        }

    }




    /*NotificacionListar
    *Muestra una lista con todos las Notificaciones
    */
    public function PagoListar()
    {
        $pagos = $this->pagoMapper->listar();
        $this->view->setVariable("pagos",$pagos);
        $this->view->render("Pago","pago_SHOWALL_View");
    }





    /*Notificacion SHOW CURRENT
    *Si se llama con un get carga la vista
    *si se llama con un post muestra notificacion
    */


}
?>