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

    //Hecho por Álex
    /*
    * Carga la vista de tduAdd por defecto
    */
    public function loadDeportistaAddView(){
        $this->view->render("usuario/deportistas","deportistaADD");
    }

    //Hecho por Álex
    /*deportistaADD
    * Segun el tipo de deportista seleccionado llama a su funcion de añadir
    */
    public function deportistaADD(){
         
        $nombreFoto = $_FILES['fotoperfil']['name'];
        $tipoFoto = $_FILES['fotoperfil']['type'];
        $nombreTempFoto = $_FILES['fotoperfil']['tmp_name'];

        if($nombreFoto != null){
            $dir_subida = 'ABP/../View/pictures/usuarios/fotoperfil/';
            $extension = substr($tipoFoto, 6);
            $rutaFotoPerfil = $dir_subida . $_POST['dni'] . ".". $extension;
            move_uploaded_file($nombreTempFoto, $rutaFotoPerfil);
        }

        if($_POST["tipo"][0]=="TDU"){
            $tdu = new DeportistaTDU($_POST["dni"],$_POST["nombre"],$_POST["apellidos"],$_POST["edad"],$_POST["contrasena"],$_POST["email"],$_POST["telefono"],date("Y-m-d"), $rutaFotoPerfil, $_POST["tarjeta"]);
            self::tduADD($tdu);
        }
        $pef = new DeportistaPEF($_POST["dni"],$_POST["nombre"],$_POST["apellidos"],$_POST["edad"],$_POST["contrasena"],$_POST["email"],$_POST["telefono"],date("Y-m-d"),$rutaFotoPerfil ,$_POST["tarjeta"], $_POST["comentarioRevision"]);
        self::pefADD($pef);
    }

    //Hecho por Álex
    /*tduADD
    * Añade a un deportista TDU
    * Es necesario ser administrador para añadir deportistas
    * Si no es administrador nisiquiera cargará la vista
    */
    public function tduADD($tdu) {
        if($this->permisos->esAdministrador()){
                if($this->deportistaTDUMapper->addTDU($tdu)){
                    $this->view->setFlash("TDU Añadido Correctamente");
                }else{
                    $this->view->setFlash("ERROR: TDU no se ha podido añadir");
                }
        }
        $this->view->setVariable("usuarioTipo","TDU");
        $this->view->render("usuario/deportistas","deportistaADD");
    }

    //Hecho por Álex
    /*pefADD
    *Añade a un deportista PEF
    * Es necesario ser administrador para añadir deportistas
    * De no ser administrador nisiquiera mortrará la vista
    */
    public function pefADD($pef){
        if($this->permisos->esAdministrador()){
            if($this->deportistaPEFMapper->addPEF($pef)){
                $this->view->setFlash("PEF Añadido Correctamente");
            }else{
                $this->view->setFlash("PEF no se ha podido añadir");
            }
            $this->view->setVariable("usuarioTipo","PEF");
            $this->view->render("usuario/deportistas","deportistaADD");
        }
    }

    //Hecha por Juan Ramón
    //Álex... creo que no se llama nunca, al igual que a las vistas implicadas
    /*listarTDU
    */
    public function listarTDU(){
        $deportistasTDU = $this->deportistaTDUMapper->listarTDU();
        $this->view->setVariable("deportistasTDU",$deportistasTDU);
        $this->view->render("usuario/deportistas","tduSHOWALL");
    }

    //Hecha por Juan Ramón
    //Álex... creo que no se llama nunca, al igual que a las vistas implicadas
    /*listarTDU
    */
    public function listarPEF(){
        $deportistasPEF = $this->deportistaPEFMapper->listarPEF();
        $this->view->setVariable("deportistasPEF",$deportistasPEF);
        $this->view->render("usuario/deportistas","pefSHOWALL");
    }
/*La parte de deportistas deberia haber sido hecha por Juan Ramón Este codigo produce errores y no funciona*/
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

    /*Hecha por Álex*/
    /*TduEDIT
    *Abre la vista de editar un deportista tdu desde la vista de listarUsuarios
    *si es llamado por un get envia a la vista tdos los datos del deportista TDU
    * Si es llamado por un post actualiza los datos del deportista en la bbdd
    */
    public function TduEDIT(){
        if($this->permisos->esAdministrador()){
            if(isset($_GET['dni'])){//se llama con un get desde la vista listar usuarios, quiere caragar el formulario de editar deportista tdu
                $dep=$this->deportistaMapper->getTDU($_GET['dni']);
                $tdu=new DeportistaTDU($dep["dni"],$dep["nombre"],$dep["apellidos"],$dep["edad"],$dep["contrasena"],$dep["email"],$dep["telefono"],$dep["fechaAlta"],$dep['fotoperfil'],$dep["tarjeta"]);
                $this->view->setVariable("usuario",$tdu);
            //se quieren actualizar los datos del deportista
            }elseif(isset($_POST["dni"]) && isset($_POST["nombre"]) && isset($_POST["apellidos"]) && isset($_POST["edad"])&& isset($_POST["email"]) && isset($_POST["telefono"])){

                if(isset($_FILES['fotoperfil'])){

                    $nombreFoto = $_FILES['fotoperfil']['name'];
                    $tipoFoto = $_FILES['fotoperfil']['type'];
                    $nombreTempFoto = $_FILES['fotoperfil']['tmp_name'];

                    if($nombreFoto != null){
                        $dir_subida = 'ABP/../View/pictures/usuarios/fotoperfil/';
                        $extension = substr($tipoFoto, 6);
                        $rutaFotoPerfil = $dir_subida . $_POST['dni'] . ".". $extension;
                         unlink($_POST['imagenvieja']);
                        move_uploaded_file($nombreTempFoto, $rutaFotoPerfil);
                    }

                }else{
                    $rutaFotoPerfil=null;
                }

                //creamos el tdu con los datos recogidos por el formulario de editar TDU
                $tdu=new DeportistaTDU($_POST["dni"],$_POST["nombre"],$_POST["apellidos"],$_POST["edad"],$_POST["contraseña"],$_POST["email"],$_POST["telefono"],NULL,$rutaFotoPerfil,$_POST["tarjeta"]);
                if($_POST["tipo"][0]=="TDU"){//se actualizan los datos del deportista
                    $this->deportistaTDUMapper->editTDU($tdu);
                }else{//se cambia de tipo de deportista y se actualizan sus datos
                    $this->deportistaTDUMapper->changeUser($tdu);
                }
                $this->view->redirect("Usuario","UsuariosListar");
            }
            else{
                $this->view->setFlash("ERROR: No se puede eliminar a un usuario sin 'DNI'");
            }
        }else{//no es administrador no puede cambiar los datos de un deportista
            $this->view->redirect("main","index");
        }
        $this->view->render("usuario/deportistas", "tduEDIT");
    }

    //Hecha por Álex
    /*PefEDIT
    *Abre la vista de editar un deportista Pef desde la vista de listarUsuarios
    *si es llamado por un get envia a la vista tdos los datos del deportista Pef
    * Si es llamado por un post actualiza los datos del deportista en la bbdd
    */
    public function PefEDIT(){
        if($this->permisos->esAdministrador()){
            if(isset($_GET['dni'])){//se llama con un get desde la vista listar usuarios, quiere caragar el formulario de editar deportista pef
                $dep=$this->deportistaMapper->getPEF($_GET['dni']);
                $pef=new DeportistaPEF($dep["dni"],$dep["nombre"],$dep["apellidos"],$dep["edad"],$dep["contrasena"],$dep["email"],$dep["telefono"],$dep["fechaAlta"],$dep['fotoperfil'],$dep["tarjeta"],$dep["comentarioRevision"]);
                $this->view->setVariable("usuario",$pef);
            //se quieren actualizar los datos del deportista
            }elseif(isset($_POST["dni"]) && isset($_POST["nombre"]) && isset($_POST["apellidos"]) && isset($_POST["edad"])&& isset($_POST["email"]) && isset($_POST["telefono"])){

                if(isset($_FILES['fotoperfil'])){

                    $nombreFoto = $_FILES['fotoperfil']['name'];
                    $tipoFoto = $_FILES['fotoperfil']['type'];
                    $nombreTempFoto = $_FILES['fotoperfil']['tmp_name'];

                    if($nombreFoto != null){
                        $dir_subida = 'ABP/../View/pictures/usuarios/fotoperfil/';
                        $extension = substr($tipoFoto, 6);
                        $rutaFotoPerfil = $dir_subida . $_POST['dni'] . ".". $extension;
                        unlink($_POST['imagenvieja']);
                        move_uploaded_file($nombreTempFoto, $rutaFotoPerfil);
                    }

                }else{
                    $rutaFotoPerfil=null;
                }
                //creamos el pef con los datos recogidos por el formulario de editar TDU
                $pef=new DeportistaPEF($_POST["dni"],$_POST["nombre"],$_POST["apellidos"],$_POST["edad"],$_POST["contraseña"],$_POST["email"],$_POST["telefono"],NULL,$rutaFotoPerfil,$_POST["tarjeta"],$_POST["comentarioRevision"]);
                if($_POST["tipo"][0]=="PEF"){//se actualizan los datos del deportista
                    $this->deportistaPEFMapper->editPEF($pef);
                }else{//se cambia de tipo de deportista y se actualizan sus datos
                    $this->deportistaPEFMapper->changeUser2($pef);
                }
                $this->view->redirect("Usuario","UsuariosListar");
            }
            else{
                $this->view->setFlash("ERROR: No se puede eliminar a un usuario sin 'DNI'");
            }
        }else{//no es administrador no puede cambiar los datos de un deportista
            $this->view->redirect("main","index");
        }
        $this->view->render("usuario/deportistas", "pefEDIT");
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