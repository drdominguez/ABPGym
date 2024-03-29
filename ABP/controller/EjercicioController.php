<?php

require_once(__DIR__."/../core/ViewManager.php");
require_once(__DIR__ . "/../controller/BaseController.php");
require_once(__DIR__ . "/../model/EjercicioMapper.php");
require_once(__DIR__ . "/../model/EjercicioEstiramientoMapper.php");
require_once(__DIR__ . "/../model/EjercicioMuscularMapper.php");
require_once(__DIR__ . "/../model/EjercicioCardioMapper.php");

class EjercicioController extends BaseController{

	private $ejercicioMapper;
	private $estiramientoMapper;
	private $cardioMapper;
	private $muscularMapper;

	public function __construct() {
		parent::__construct();/*llama al contructor padre 'BaseController de gestion de la sesion*/
		$this->ejercicioMapper = new EjercicioMapper();
	}

    public function loadAddView(){
        $this->view->render("ejercicios","add");
    }

    public function loadRemoveView(){
        $this->view->render("ejercicios","remove");
    }

    public function loadEditView(){
        $this->view->render("ejercicios","edit");
    }

    public function loadListView(){
        $this->view->render("ejercicios","list");
    }
	
	/*
    /Muestra un estiraminto en la vista de forma detallada.
    */
    public function estiramientoVer(){
        $this->estiramientoMapper = new EjercicioEstiramientoMapper();
        $ejercicioEstiramiento=$this->estiramientoMapper->getEstiramientoById($_GET["idEjercicio"]);
        $this->view->setVariable("estiramiento", $ejercicioEstiramiento);
        $this->view->render("ejercicios/estiramiento","estiramientoSHOWCURRENT");
    }

    /*EstiramientoADD
    *Si se llama con un get carga la vista
    *si se llama con un post añade el estiramiento
    */
    public function EstiramientoADD() {
        $this->estiramientoMapper = new EjercicioEstiramientoMapper();
        if(isset($_POST["nombre"]) && isset($_POST["descripcion"])){//si existen los post añado el ejercici

                if($_POST['video']=='https://www.youtube.com/embed/'){
                    $rutavideo=null;
                }else{
                    $rutavideo=$_POST['video'];
                }
                
    
            $estiramiento = new EjercicioEstiramiento('',$_POST["nombre"], $_POST["descripcion"],$rutavideo,'');
            if($idEjercicio = $this->estiramientoMapper->addEstiramiento($estiramiento)){
                    $nombreFoto = $_FILES['imagen']['name'];
                    $tipoFoto = $_FILES['imagen']['type'];
                    $nombreTempFoto = $_FILES['imagen']['tmp_name'];

                if($nombreFoto != null){
                    $dir_subida = 'ABP/../View/pictures/ejercicios/fotos/';
                    $extension = substr($tipoFoto, 6);
                    $rutaImagen = $dir_subida . $idEjercicio . ".". $extension;
                    move_uploaded_file($nombreTempFoto, $rutaImagen);
                    
                }else{
                    $rutaImagen=null;
                }

                 $this->ejercicioMapper->addImagen($idEjercicio,$rutaImagen);


                $this->view->setFlash("Ejercicio Añadido Corectamente");

            }else{
                $errors["username"] = "El ejercicio no se ha añadido corectamente";
                $this->view->setFlash($errors["username"]);
            }
        }
        $this->view->render("ejercicios/estiramiento","estiramientoADD");
    }

    /*
    *Edita un estiramiento
    *a partir de un id obtenido por la vista crea un etiramiento usando getEstiramientoById
    *luego lo edita en la bbdd.
    */
    public function estiramientoEdit(){
        $this->estiramientoMapper = new EjercicioEstiramientoMapper();
        if(isset($_POST["idEjercicio"]) && !empty($_POST["idEjercicio"])){//si lo llamamos por POST lo borra

            if(isset($_FILES['imagen'])){

                    $nombreFoto = $_FILES['imagen']['name'];
                    $tipoFoto = $_FILES['imagen']['type'];
                    $nombreTempFoto = $_FILES['imagen']['tmp_name'];

                    if($nombreFoto != null){
                        $dir_subida = 'ABP/../View/pictures/ejercicios/fotos/';
                        $extension = substr($tipoFoto, 6);
                        $rutaImagen = $dir_subida . $_POST['idEjercicio'] . ".". $extension;
                         unlink($_POST['imagenvieja']);
                        move_uploaded_file($nombreTempFoto, $rutaImagen);
                    }

                }else{
                    $rutaImagen=null;
                }
                if($_POST['video']=='https://www.youtube.com/embed/'){
                    $rutavideo=null;
                }else{
                    $rutavideo=$_POST['video'];
                }

            $estiramiento = new EjercicioEstiramiento($_POST["idEjercicio"],$_POST["nombre"],$_POST["descripcion"],$rutavideo,$rutaImagen);
            $this->estiramientoMapper->editEstiramiento($estiramiento);
            $this->view->setFlash("Ejercicio Editado Corectamente");
            self::estiramientoListar();//volvemos a listar los ejercicios
        }else{//si no muesta la vista
            $estiramiento=$this->estiramientoMapper->getEstiramientoById($_GET["idEjercicio"]);
            $this->view->setVariable("estiramiento",$estiramiento);
            $this->view->render("ejercicios/estiramiento","estiramientoEDIT");
        }
    }

    /*EstiramientoRemove
	*Si se llama con un get carga la vista
	*si se llama con un post añade el estiramiento
	*/
    public function estiramientoRemove() {
        $this->estiramientoMapper = new EjercicioEstiramientoMapper();
        if(isset($_POST["idEjercicio"]) && !empty($_POST["idEjercicio"])){//si lo llamamos por POST lo borra
            $this->estiramientoMapper->removeEstiramiento($_POST["idEjercicio"]);
            $this->view->setFlash("Ejercicio Eliminado Corectamente");
            self::estiramientoListar();//volvemos a listar los ejercicios
        }else{//si no muesta la vista
            $estiramiento=$this->estiramientoMapper->getEstiramientoById($_GET["idEjercicio"]);
            $this->view->setVariable("estiramiento",$estiramiento);
            $this->view->render("ejercicios/estiramiento","estiramientoDELETE");
        }
    }

    /*EstiramientoListar
	*Muestra una lista con todos los estiramientos
	*/
    public function estiramientoListar() {
        $this->estiramientoMapper = new EjercicioEstiramientoMapper();
        $listaEstiramiento = $this->estiramientoMapper->listarEstiramiento();
        if(!isset($listaEstiramiento) OR empty($listaEstiramiento)){
             $errors["username"] = "No hay estiramientos disponibles";
                $this->view->setFlash($errors["username"]);
        }else{
            $this->view->setVariable("estiramientos", $listaEstiramiento);
        }
        $this->view->render("ejercicios/estiramiento", "estiramientoSHOWALL");
    }

    /*
    *Muestra en detalle un ejercicio cardio
    */
     public function cardioVer(){
        $this->cardioMapper = new EjercicioCardioMapper();
        $ejercicioCardio=$this->cardioMapper->getCardioById($_GET["idEjercicio"]);
        $this->view->setVariable("cardio", $ejercicioCardio);
        $this->view->render("ejercicios/cardio","cardioSHOWCURRENT");
    }

    /*cardioADD
	*Si se llama con un get carga la vista
	*si se llama con un post añade el cardio
	*/
    public function cardioADD() {
        $this->cardioMapper = new EjercicioCardioMapper();
        if(isset($_POST["nombre"]) && isset($_POST["descripcion"])){//si existen los post añado el ejercicio

                if($_POST['video']=='https://www.youtube.com/embed/'){
                    $rutavideo=null;
                }else{
                    $rutavideo=$_POST['video'];
                }

            $cardio = new EjercicioCardio('',$_POST["nombre"], $_POST["descripcion"],$rutavideo,'');
            if($idEjercicio = $this->cardioMapper->addCardio($cardio)){

                    $nombreFoto = $_FILES['imagen']['name'];
                    $tipoFoto = $_FILES['imagen']['type'];
                    $nombreTempFoto = $_FILES['imagen']['tmp_name'];

                if($nombreFoto != null){
                    $dir_subida = 'ABP/../View/pictures/ejercicios/fotos/';
                    $extension = substr($tipoFoto, 6);
                    $rutaImagen = $dir_subida . $idEjercicio . ".". $extension;
                    move_uploaded_file($nombreTempFoto, $rutaImagen);
                    
                }else{
                    $rutaImagen=null;
                }
                 $this->ejercicioMapper->addImagen($idEjercicio,$rutaImagen);

               $this->view->setFlash("Ejercicio Añadido Corectamente");

            }else{
                $errors["username"] = "El ejercicio no se ha añadido corectamente";
                $this->view->setFlash($errors["username"]);
            }
        }
        $this->view->render("ejercicios/cardio","cardioADD");
    }

    /*
    *Edita un cardio
    *a partir de un id obtenido por la vista crea un etiramiento usando getEstiramientoById
    *luego lo edita en la bbdd.
    */
    public function cardioEdit(){
        $this->cardioMapper = new EjercicioCardioMapper();
        if(isset($_POST["idEjercicio"]) && !empty($_POST["idEjercicio"])){//si lo llamamos por POST lo borra

             if(isset($_FILES['imagen'])){

                    $nombreFoto = $_FILES['imagen']['name'];
                    $tipoFoto = $_FILES['imagen']['type'];
                    $nombreTempFoto = $_FILES['imagen']['tmp_name'];

                    if($nombreFoto != null){
                        $dir_subida = 'ABP/../View/pictures/ejercicios/fotos/';
                        $extension = substr($tipoFoto, 6);
                        $rutaImagen = $dir_subida . $_POST['idEjercicio'] . ".". $extension;
                        unlink($_POST['imagenvieja']);
                        move_uploaded_file($nombreTempFoto, $rutaImagen);
                    }

                }else{
                    $rutaImagen=null;
                }


                if($_POST['video']=='https://www.youtube.com/embed/'){
                    $rutavideo=null;
                }else{
                    $rutavideo=$_POST['video'];
                }

            $cardio = new EjercicioCardio($_POST["idEjercicio"],$_POST["nombre"],$_POST["descripcion"],$rutavideo,$rutaImagen);
            $this->cardioMapper->editCardio($cardio);
            $this->view->setFlash("Ejercicio Editado Corectamente");
            self::cardioListar();//volvemos a listar los ejercicios
        }else{//si no muesta la vista
            $cardio=$this->cardioMapper->getCardioById($_GET["idEjercicio"]);
            $this->view->setVariable("cardio",$cardio);
            $this->view->render("ejercicios/cardio","cardioEDIT");
        }
    }

    /*cardioRemove
	*Si se llama con un get carga la vista
	*si se llama con un post elimina el cardio
	*/
    public function cardioRemove() {
        $this->cardioMapper = new EjercicioCardioMapper();
        if(isset($_POST["idEjercicio"]) && !empty($_POST["idEjercicio"])){//si lo llamamos por POST lo borra
            $this->cardioMapper->removeCardio($_POST["idEjercicio"]);
            $this->view->setFlash("Ejercicio Eliminado Corectamente");
             self::cardioListar();//volvemos a listar los cardios
        }else{//si no muesta la vista
            $cardio=$this->cardioMapper->getCardioById($_GET["idEjercicio"]);
            $this->view->setVariable("cardio",$cardio);
            $this->view->render("ejercicios/cardio","cardioDELETE");
        }
    }

    /*cardioListar
	*Muestra una lista con todos los cardio
	*/
    public function cardioListar() {
       $this->cardioMapper = new EjercicioCardioMapper();
       $listaCardio = $this->cardioMapper->listarCardio();
       if(!isset($listaCardio) OR empty($listaCardio)){
            $errors["username"] = "No hay cardios disponibles";
            $this->view->setFlash($errors["username"]);
        }else{
            $this->view->setVariable("cardios", $listaCardio);
        }
        $this->view->render("ejercicios/cardio", "cardioSHOWALL");
    }

    /*
    *Muestra en detalle un ejercicio cardio
    */
    public function muscularVer(){
        $this->muscularMapper = new EjercicioMuscularMapper();
        $ejercicioMuscular=$this->muscularMapper->getMuscularById($_GET["idEjercicio"]);
        $this->view->setVariable("muscular", $ejercicioMuscular);
        $this->view->render("ejercicios/muscular","MuscularSHOWCURRENT");
    }

     /*muscularADD
	*Si se llama con un get carga la vista
	*si se llama con un post añade el muscular
	*/
    public function muscularADD() {
        $this->muscularMapper = new EjercicioMuscularMapper();
        if(isset($_POST["nombre"]) && isset($_POST["descripcion"])){//si existen los post añado el ejercicio


                if($_POST['video']=='https://www.youtube.com/embed/'){
                    $rutavideo=null;
                }else{
                    $rutavideo=$_POST['video'];
                }
                

            $muscular = new EjercicioMuscular('',$_POST["nombre"], $_POST["descripcion"],$rutavideo,'');
            if($idEjercicio = $this->muscularMapper->addMuscular($muscular)){
                 $nombreFoto = $_FILES['imagen']['name'];
                    $tipoFoto = $_FILES['imagen']['type'];
                    $nombreTempFoto = $_FILES['imagen']['tmp_name'];

                if($nombreFoto != null){
                    $dir_subida = 'ABP/../View/pictures/ejercicios/fotos/';
                    $extension = substr($tipoFoto, 6);
                    $rutaImagen = $dir_subida . $idEjercicio . ".". $extension;
                    move_uploaded_file($nombreTempFoto, $rutaImagen);
                    
                }else{
                    $rutaImagen=null;
                }
                 $this->ejercicioMapper->addImagen($idEjercicio,$rutaImagen);

               $this->view->setFlash("Ejercicio Añadido Corectamente");
            }else{
                $errors["username"] = "El ejercicio no se ha añadido corectamente";
                $this->view->setFlash($errors["username"]);
            }
        }
        $this->view->render("ejercicios/muscular","muscularADD");
    }

    /*
    *Edita un muscular
    *a partir de un id obtenido por la vista crea un etiramiento usando getEstiramientoById
    *luego lo edita en la bbdd.
    */
    public function muscularEdit(){
        $this->muscularMapper = new EjercicioMuscularMapper();
        if(isset($_POST["idEjercicio"]) && !empty($_POST["idEjercicio"])){//si lo llamamos por POST lo borra

            if(isset($_FILES['imagen'])){

                    $nombreFoto = $_FILES['imagen']['name'];
                    $tipoFoto = $_FILES['imagen']['type'];
                    $nombreTempFoto = $_FILES['imagen']['tmp_name'];

                    if($nombreFoto != null){
                        $dir_subida = 'ABP/../View/pictures/ejercicios/fotos/';
                        $extension = substr($tipoFoto, 6);
                        $rutaImagen = $dir_subida . $_POST['idEjercicio'] . ".". $extension;
                         unlink($_POST['imagenvieja']);
                        move_uploaded_file($nombreTempFoto, $rutaImagen);
                    }

                }else{
                    $rutaImagen=null;
                }
                
                if($_POST['video']=='https://www.youtube.com/embed/'){
                    $rutavideo=null;
                }else{
                    $rutavideo=$_POST['video'];
                }
                
            $muscular = new EjercicioMuscular($_POST["idEjercicio"],$_POST["nombre"],$_POST["descripcion"],$rutavideo,$rutaImagen);
            $this->muscularMapper->editMuscular($muscular);
            $this->view->setFlash("Ejercicio Editado Corectamente");
            self::muscularListar();//volvemos a listar los ejercicios
        }else{//si no muesta la vista
            $muscular=$this->muscularMapper->getMuscularById($_GET["idEjercicio"]);
            $this->view->setVariable("muscular",$muscular);
            $this->view->render("ejercicios/muscular","muscularEDIT");
        }
    }
    /*muscularRemove
	*Si se llama con un get carga la vista
	*si se llama con un post añade el muscular
	*/
    public function muscularRemove() {
    	$this->mucularMapper = new EjercicioMuscularMapper();
        if(isset($_POST["idEjercicio"]) && !empty($_POST["idEjercicio"])){//si lo llamamos por POST lo borra
            $this->mucularMapper->removeMuscular($_POST["idEjercicio"]);
            $this->view->setFlash("Ejercicio Eliminado Corectamente");
             self::muscularListar();//volvemos a listar los cardios
        }else{//si no muesta la vista
            $muscular=$this->mucularMapper->getMuscularById($_GET["idEjercicio"]);
            $this->view->setVariable("muscular",$muscular);
            $this->view->render("ejercicios/muscular","muscularDELETE");
        }
    }

    /*muscularListar
	*Muestra una lista con todos los muscular
	*/
    public function muscularListar() {
        $this->muscularMapper = new EjercicioMuscularMapper();
    	$listaMuscular = $this->muscularMapper->listarMuscular();
       if(!isset($listaMuscular) OR empty($listaMuscular)){
            $errors["username"] = "No hay musculares disponibles";
            $this->view->setFlash($errors["username"]);
        }else{
            $this->view->setVariable("musculares", $listaMuscular);
        }
        $this->view->render("ejercicios/muscular", "muscularSHOWALL");
    }

}
?>