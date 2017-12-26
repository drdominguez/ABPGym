<?php
require_once(__DIR__."/../core/ViewManager.php");
require_once(__DIR__ . "/../controller/BaseController.php");
require_once(__DIR__ . "/../model/DeportistaMapper.php");
require_once(__DIR__ . "/../model/DeportistaTDU.php");
require_once(__DIR__ . "/../model/DeportistaPEF.php");
require_once(__DIR__ . "/../model/DeportistaTDUMapper.php");
require_once(__DIR__ . "/../model/DeportistaPEFMapper.php");
require_once(__DIR__."/../model/UsuarioMapper.php");
require_once(__DIR__."/../model/Usuario.php");

class DeportistaController extends BaseController
{
    private $deportistaMapper;
    private $usuarioMapper;
    private $deportistaPEFMapper;
    private $deportistaTDUMapper;
    private $permisos;

    public function __construct()
    {
        parent::__construct();/*llama al contructor padre 'BaseController de gestion de la sesion*/
        $this->deportistaMapper = new DeportistaMapper();
        $this->usuarioMapper = new UsuarioMapper();
        $this->deportistaPEFMapper = new DeportistaPEFMapper();
        $this->deportistaTDUMapper = new DeportistaTDUMapper();
        $this->permisos= new Permisos();
    }

    /*tduADD
    * Añade a un deportista TDU
    * Es necesario ser administrador para añadir deportistas
    * Si no es administrador nisiquiera cargará la vista
    */
    public function tduADD() {
        if($this->permisos->esAdministrador()){
            if(isset($_POST["dni"]) && isset($_POST["nombre"])&& isset($_POST["apellidos"])&& isset($_POST["edad"])&& isset($_POST["contrasena"])&& isset($_POST["email"])&& isset($_POST["telefono"]) && isset($_POST["tarjeta"])){
                $tdu = new DeportistaTDU($_POST["dni"],$_POST["nombre"],$_POST["apellidos"],$_POST["edad"],$_POST["contrasena"],$_POST["email"],$_POST["telefono"],date("Y-m-d"), $_POST["tarjeta"]);
                if($this->deportistaTDUMapper->addTDU($tdu)){
                    $this->view->setFlash("TDU Añadido Correctamente");
                }else{
                    $this->view->setFlash("TDU no se ha podido añadir");
                }
            }
            $this->view->setVariable("usuarioTipo","TDU");
            $this->view->render("usuario/deportistas","deportistaADD");
        }
    }

    /*pefADD
    *Añade a un deportista PEF
    * Es necesario ser administrador para añadir deportistas
    * De no ser administrador nisiquiera mortrará la vista
    */
    public function pefADD(){
        if($this->permisos->esAdministrador()){
            if(isset($_POST["dni"]) && isset($_POST["nombre"])&& isset($_POST["apellidos"])&& isset($_POST["edad"])&& isset($_POST["contrasena"])&& isset($_POST["email"])&& isset($_POST["telefono"]) && isset($_POST["tarjeta"]) && isset($_POST["comentarioRevision"])){
                $pef = new DeportistaPEF($_POST["dni"],$_POST["nombre"],$_POST["apellidos"],$_POST["edad"],$_POST["contrasena"],$_POST["email"],$_POST["telefono"],date("Y-m-d"),$_POST["tarjeta"], $_POST["comentarioRevision"]);
            }
            if($this->deportistaPEFMapper->addPEF($pef)){
                $this->view->setFlash("PEF Añadido Correctamente");
            }else{
                $this->view->setFlash("PEF no se ha podido añadir");
            }
            $this->view->setVariable("usuarioTipo","PEF");
            $this->view->render("usuario/deportistas","deportistaADD");
        }
    }

    public function listarTDU(){
        $deportistasTDU = $this->deportistaTDUMapper->listarTDU();
        $this->view->setVariable("deportistasTDU",$deportistasTDU);
        $this->view->render("usuario/deportistas","tduSHOWALL");
    }
    public function listarPEF(){
        $deportistasPEF = $this->deportistaPEFMapper->listarPEF();
        $this->view->setVariable("deportistasPEF",$deportistasPEF);
        $this->view->render("usuario/deportistas","pefSHOWALL");
    }
/*La parte de deportistas deberia haber sido hecha por Juan Ramon Este codigo produce errores y no funciona*/
    /*public function PefEDIT()
    {
        if(isset($_POST["dni"]) && isset($_POST["tarjeta"]) && isset($_POST["comentario"]))
        {//si existen los post añado la notificacion
            $pef = new DeportistaPEF();
            $pef->setDni($_POST["dni"]);
            $pef->setTarjeta($_POST["tarjeta"]);
            $pef->setComentario($_POST["comentario"]);
            if($this->deportistaPEFMapper->editPEF($pef))
            {
                $this->view->setFlash("Deportista Editado Correctamente");
            }else
            {
                $errors["username"] = "El deportista no se ha editado corectamente";
                $this->view->setFlash($errors["username"]);
            }
            $this->view->redirect("Deportista", "listarPEF");
        }else
        {
            $dni = $_GET["dni"];
            $pef = $this->deportistaPEFMapper->findById($dni);
            if ($pef == NULL)
            {
                throw new Exception("No existe deportista con este dni: ".$dni);
            }
            $this->view->setVariable("usuario",$pef);
            $this->view->render("usuario/deportistas","pefEDIT");
        }
    }

    public function TduEDIT()
    {
        if(isset($_POST["dni"]) && isset($_POST["tarjeta"]))
        {//si existen los post añado la notificacion
            $tdu = new DeportistaPEF();
            $tdu->setDni($_POST["dni"]);
            $tdu->setTarjeta($_POST["tarjeta"]);
            if($this->deportistaTDUMapper->editTDU($tdu))
            {
                $this->view->setFlash("Deportista Editado Correctamente");
            }else
            {
                $errors["username"] = "El deportista no se ha editado corectamente";
                $this->view->setFlash($errors["username"]);
            }
            $this->view->redirect("Deportista", "listarTDU");
        }else
        {
            $dni = $_GET["dni"];
            $pef = $this->deportistaTDUMapper->findById($dni);
            if ($pef == NULL)
            {
                throw new Exception("No existe deportista con este dni: ".$dni);
            }

            $this->view->setVariable("usuario",$pef);
            $this->view->render("usuario/deportistas","tduEDIT");
        }
    }*/
    /*La parte de deportistas deberia haber sido hecha por Juan Ramon Este codigo produce errores y no funciona*/
    /*Hecha por Álex la de Juan Ramón no funcionaba correctamente*/
    /*TduEDIT
    *Abre la vista de editar un deportista tdu desde la vista de listarUsuarios
    *si es llamado por un get envia a la vista tdos los datos del deportista TDU
    * Si es llamado por un post actualiza los datos del deportista en la bbdd
    */
    public function TduEDIT(){
        if($this->permisos->esAdministrador()){
            if($_GET['dni']){//se llama con un get desde la vista listar usuarios, quiere caragar el formulario de editar deportista tdu
                $dep=$this->deportistaMapper->getTDU($_GET['dni']);
                $tdu=new DeportistaTDU($dep["dni"],$dep["nombre"],$dep["apellidos"],$dep["edad"],$dep["contrasena"],$dep["email"],$dep["telefono"],$dep["fechaAlta"],$dep["tarjeta"]);
                $this->view->setVariable("usuario",$tdu);
            //se quieren actualizar los datos del deportista
            }elseif(isset($_POST["dni"]) && isset($_POST["nombre"]) && isset($_POST["apellidos"]) && isset($_POST["edad"]),isset($_POST["email"]),isset($_POST["telefono"])){
                //creamos el tdu con los datos recogidos por el formulario de editar TDU
                $tdu=new DeportistaTDU($_POST["dni"],$_POST["nombre"],$_POST["apellidos"],$_POST["edad"],$_POST["contrasena"],$_POST["email"],$_POST["telefono"],$_POST["fechaAlta"],$_POST["tarjeta"]);
                /*se quiere cambiar de tipo de deportista*/
                if($_POST("tipo")=="TDU Tarjeta Deportista Universitaria"){
                    
                }else{//solo se quieren actualizar los datos del deportista
                    
                }
            }
            else{
                $this->view->setFlash("ERROR: No se puede eliminar a un usuario sin 'DNI'");
            }
        }else{//no es administrador no puede cambiar los datos de un deportista
            $this->view->redirect("main","index");
        }
        $this->view->render("usuario/deportistas", "tduEDIT");
    }

    /*Hecha por Álex la de Juan Ramón no funcionaba correctamente*/
    public function PefEDIT(){
        if($this->permisos->esAdministrador()){
            if($_GET['dni']){
                $dep=$this->deportistaMapper->getPEF($_GET['dni']);
                $pef=new DeportistaTDU($dep["dni"],$dep["nombre"],$dep["apellidos"],$dep["edad"],$dep["contrasena"],$dep["email"],$dep["telefono"],$dep["fechaAlta"],$dep["tarjeta"],$dep["comentarioRevision"]);
                $this->view->setVariable("usuario",$pef);
            }else{
                $this->view->setFlash("ERROR: No se puede eliminar a un usuario sin 'DNI'");
            }
        }else{
            $this->view->redirect("main","index");
        }
        $this->view->render("usuario/deportistas", "tduPEF");
    }

    

    

    /*Notificacion SHOW CURRENT
    *Si se llama con un get carga la vista
    *si se llama con un post muestra notificacion
    */
    public function TduView()
    {
        if (!isset($_GET["dni"]))
        {
            throw new Exception("El dni es obligatorio");
        }
        $dni = $_GET["dni"];
        // find the notification object in the database
        $deportista = $this->deportistaTDUMapper->findById($dni);
        if ($deportista == NULL)
        {
            throw new Exception("No existe usuario con este dni: ".$dni);
        }
        // put the notification object to the view
        $this->view->setVariable("deportista", $deportista);
        // render the view (/view/posts/view.php)
        $this->view->render("usuario/deportistas", "tduSHOWCURRENT");
    }


     /*Notificacion SHOW CURRENT
    *Si se llama con un get carga la vista
    *si se llama con un post muestra notificacion
    */
    public function PefView()
    {
        if (!isset($_GET["dni"]))
        {
            throw new Exception("El dni es obligatorio");
        }
        $dni = $_GET["dni"];
        // find the notification object in the database
        $deportista = $this->deportistaPEFMapper->findById($dni);
        if ($deportista == NULL)
        {
            throw new Exception("No existe usuario con este dni: ".$dni);
        }
        // put the notification object to the view
        $this->view->setVariable("deportista", $deportista);
        // render the view (/view/posts/view.php)
        $this->view->render("usuario/deportistas", "pefSHOWCURRENT");
    }


}
?>