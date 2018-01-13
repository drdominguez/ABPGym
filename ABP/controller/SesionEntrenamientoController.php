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
   	private $sesionMapper;
    private $permisos;

    public function __construct() {
        parent::__construct();/*llama al contructor padre 'BaseController de gestion de la sesion*/
        $this->tablaMapper = new TablaMapper();
        $this->permisos= new Permisos();
        $this->sesionMapper= new SesionEntrenamientoMapper();
    }

    public function TablaListar(){
        $tablaMapper = new TablaMapper();
        $tablas = $tablaMapper->listar();
        $this->view->setVariable("tablas",$tablas);
        $this->view->render("sesionEntrenamiento","tablaSHOWALL");
    }

    public function TablaView(){
        if (!isset($_GET["idTabla"])){
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
        if ($tabla == NULL){
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

    /*realizarTabla
    *Muestra los ejercicios con su informacion pormenorizada para que sean realizados por un deportista.
    *si se llama con un get muestra el formulario
    * si se llama por un post guarda la sesión en la bbdd
    */
    public function realizarTabla(){
    	if(isset($_POST["tiempo"]) && !empty($_POST["tiempo"])){
    		$sesion=new SesionEntrenamiento('',$_POST["comentarios"],self::duracion($_POST["tiempo"]),date("Y-m-d"),$_SESSION["currentuser"]);
    		$this->sesionMapper->sesionAdd($sesion,$_POST["idTabla"]);
    		$this->view->redirect("SesionEntrenamiento","TablaListar");
    	}
    	//listas donde se guardaran los ejercicios de una tabla
        $listaEjercicios = array();
        // obtenemos los ejercicios de la tabla
        $listaEjercicios=$this->tablaMapper->getAllEjercicios($_GET["idTabla"]);
        //le pasamos los parametros necesarios a la vista
        $this->view->setVariable("idTabla",$_GET["idTabla"]);
        $this->view->setVariable("ejercicios",$listaEjercicios);
        //llamamos a la vista
        $this->view->render("sesionEntrenamiento", "realizarEjercicio");
    }

    private function duracion($tiempo){
    	$horas=$tiempo[0];//es el primer digito,se supone que una tabla no llevara mas de 9 horas

    	/*obtenedos cada unidad de tiempo en base al numero de dígitos del crono y de los separadores ':' de unidades.*/
    	if($tiempo[1]==':' && $tiempo[3]==':' && $tiempo[5]==':'){//caso1
    		$horas=$tiempo[0];//un digito hora
    		$minutos=$tiempo[2];//un digito minutos
    		$segundos=$tiempo[4];//un digito segundos
    	}elseif($tiempo[1]==':' && $tiempo[3]==':' && $tiempo[6]==':'){//caso2
    		$horas=$tiempo[0];//un digito hora
    		$minutos=$tiempo[2];//un digito minutos
    		$segundos=substr($tiempo,4,5);//dos digitos segundos
    	}elseif($tiempo[1]==':' && $tiempo[4]==':' && $tiempo[7]==':'){//caso3
    		$horas=$tiempo[0];//un digito hora
    		$minutos=substr($tiempo,2,3);//dos digitos minutos
    		$segundos=substr($tiempo,5,6);// dos sigitos segundos
    	}else{//caso4
    		$horas=substr($tiempo,0,1);//dos digitos horas
    		$minutos=substr($tiempo,3,4);//dos digitos minutos
    		$segundos=substr($tiempo,6,7);//dos digitos segundos
    	}
    	//convertimos los datos de texto a enteros
    	$intHoras=(int)$horas;
    	$intMinutos=(int)$minutos;
    	$intSegundos=(int)$segundos;
    	//pasamos todo a minutos
    	return ($intHoras*60)+$intMinutos+($intSegundos/60);
    }
}

?>