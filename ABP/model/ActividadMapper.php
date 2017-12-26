<?php
require_once(__DIR__."/../core/Access_DB.php");
require_once(__DIR__."/Actividad.php");
require_once(__DIR__."/Horario.php");
require_once(__DIR__."/ActividadEntrenador.php");
require_once(__DIR__."/ActividadDeportista.php");
require_once(__DIR__."/Usuario.php");
require_once(__DIR__."/Recurso.php");
require_once(__DIR__."/ActividadGrupo.php");

class ActividadMapper{
    protected $db;
    /**
    *el contructor obtiene la conexion con la base de datos del core
    **/
    public function __construct() {
        $this->db = PDOConnection::getInstance();
    }
    function addDeportista($usuariosd,$idActividad,$actividad){
        $deportistas = array();
        $cont=$actividad->getContador();
        $plazas=$actividad->getPlazas();

        if(self::esAdministrador())
        {

            foreach ($usuariosd as $usuariod) 
            {
                $usuariod_insertar = new ActividadDeportista();
                $usuariod_insertar->setDniDeportista($usuariod);
                array_push($deportistas, $usuariod_insertar);

            }

            if($deportistas && $plazas>=sizeof($deportistas)){
                foreach($deportistas as $deportista)
                {
                    if($plazas>$cont){
                    $stmt3 = $this->db->prepare("INSERT INTO actividad_deportista(idActividad,dniDeportista) VALUES (?,?)");
                    $stmt3->execute(array($idActividad,$deportista->getDniDeportista()));
                    $stmt4 = $this->db->prepare("UPDATE actividad SET contador=contador+1 WHERE idActividad=?");
                    $stmt4->execute(array($idActividad));
                    }
                }
            }
            return true;
        }
        return false;
    }
    //Añadir
    function add($actividad,$actividadEntrenador){ 

        $stmt = $this->db->prepare("INSERT INTO actividad(nombre,precio,idInstalaciones,plazas,contador) values (?,?,?,?,?)");

        if(self::esAdministrador()){

            $stmt -> execute(array($actividad->getNombre(),$actividad->getPrecio(),$actividad->getIdInstalaciones(),$actividad->getPlazas(),$actividad->getContador()));

            $idActividad = $this->db->lastInsertId();


            $stmt1 = $this->db->prepare("INSERT INTO actividad_entrenador(dniEntrenador,idActividad) values (?,?)");

            $stmt1 -> execute(array($actividadEntrenador->getDniEntrenador(),$idActividad));
            
            return true;
        }
        return false;
    }

    //Funcion borrar un elemento de la BD
    function delete($idActividad){
        $stmt = $this->db->prepare("DELETE from actividad WHERE idActividad=?");
         if(self::esAdministrador()){
            $stmt -> execute(array($idActividad));
            return true;
        }
        return false;
    }
    function edit($actividad,$actividadEntrenador,$dniEntrenador,$idActividad,$usuarios){
        $cont=$actividad->getContador();

        if(self::esAdministrador()){
            $stmt = $this->db->prepare("UPDATE actividad SET nombre=?, precio=?, idInstalaciones=?, plazas=?  WHERE idActividad=? ");
            
            $stmt -> execute(array($actividad->getNombre(),$actividad->getPrecio(),$actividad->getIdInstalaciones(),$actividad->getPlazas(),$idActividad));
            $stmt1 = $this->db->prepare("UPDATE horario SET dia=?, hora=?, fechIni=?, fechFin=? WHERE idHorario=? ");
            $stmt1 -> execute(array($actividad->getHorario()->getDia(),$actividad->getHorario()->getHora(),$actividad->getHorario()->getFechaInicio(),$actividad->getHorario()->getFechaFin(),$actividad->getHorario()->getIdHorario()));
            $stmt2 = $this->db->prepare("UPDATE actividad_entrenador SET dniEntrenador=? WHERE idActividad=?");
            $stmt2 -> execute(array($dniEntrenador,$idActividad));
            $deportistas = array();

            foreach ($usuarios as $usuario) 
            {
                $usuario_insertar = new ActividadDeportista();
                $usuario_insertar->setDniDeportista($usuario);
                array_push($deportistas, $usuario_insertar);

            }
            if($deportistas){
                foreach($deportistas as $deportista)
                {
                    $stmt3 = $this->db->prepare("INSERT INTO actividad_deportista(idActividad,dniDeportista) VALUES (?,?)");
                    $stmt3->execute(array($idActividad,$usuario_insertar->getDniDeportista()));
                    $actividad->setContador($cont++);

                }
            }
            return true;
        }
        return false;
    }

    public function listar(){

            $stmt = $this->db->query("SELECT * from actividad");
            $actividades_db = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $actividades = array();

            foreach ($actividades_db as $actividad) {    
                array_push($actividades, new Actividad($actividad['idActividad'],$actividad['nombre'],$actividad['precio'],$actividad['idInstalaciones']));
            }
        return $actividades;
        
        }

    public function idRecurso($idActividad){
        $stmt = $this->db->prepare("SELECT idInstalaciones FROM actividad WHERE idActividad=?");
        $stmt->execute(array($idActividad));
        $actividad = $stmt->fetch(PDO::FETCH_ASSOC);
        if($actividad!=null){
            return $actividad['idInstalaciones'];
        }else{
        return null;
        }
    }

    public function findNomIdInstalaciones($idInstalaciones){
        $stmt = $this->db->prepare("SELECT * FROM recursos WHERE idRecurso=?");
        $stmt->execute(array($idInstalaciones));
        $actividad = $stmt->fetch(PDO::FETCH_ASSOC);
        if($actividad!=null){
            return new Recurso($actividad['idRecurso'],$actividad['nombreRecurso']);
        }else{
        return null;
        }
    }
    public function findById($idActividad)
    {
        $stmt = $this->db->prepare("SELECT * FROM actividad WHERE idActividad =?");
        $stmt->execute(array($idActividad));
        $actividad = $stmt->fetch(PDO::FETCH_ASSOC);
        if($actividad != null) 
        {
            $stmt2 = $this->db->prepare("SELECT * FROM horario H,actividad_horario A WHERE H.idHorario=A.idHorario AND A.idActividad=?");  
            $stmt2->execute(array($idActividad));  
            $horario_db = $stmt2->fetch(PDO::FETCH_ASSOC);
            $horario = new Horario($horario_db['idHorario'],$horario_db['dia'],$horario_db['hora'],$horario_db['fechIni'],$horario_db['fechFin']);
            $stmt2 = $this->db->prepare("SELECT * FROM grupo WHERE idActividad =?");
            $stmt2->execute(array($idActividad));

            if($stmt2!=null)
            {
                $actividad2 = $stmt2->fetch(PDO::FETCH_ASSOC);
                return new ActividadGrupo($actividad["idActividad"],$actividad["nombre"],$actividad["precio"],$actividad['idInstalaciones'],$actividad["plazas"],$horario);
                }else 
                {

                $stmt3 = $this->db->prepare("SELECT * FROM  individual WHERE idActividad =?");
                $stmt3->execute(array($idActividad));
                if($stmt3!=null){
                    $actividad3 = $stmt3->fetch(PDO::FETCH_ASSOC);
                    return new ActividadIndividual($actividad["idActividad"],$actividad["nombre"],$actividad["precio"],$actividad['idInstalaciones'],$actividad["plazas"],$horario_db);
                }
            }
        }
        return NULL;
    }
    public function findMonitor()
    {
        $stmt = $this->db->query("SELECT * FROM usuario U, entrenador E WHERE E.dniEntrenador = U.dni ");
        $usuarios_db = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $usuarios = array();
        foreach ($usuarios_db as $usuario) 
        {
            array_push($usuarios, new Usuario($usuario['dni'],$usuario['nombre'],$usuario['apellidos'],$usuario['edad'],$usuario['email'],$usuario['telefono'],$usuario['fechaAlta']));
        }
        return $usuarios;
    }
    public function esGrupo($idActividad){
        $stmt= $this->db->prepare("SELECT A.idActividad FROM actividad A, grupo G WHERE A.idActividad=? AND G.idActividad = A.idActividad");
        
        $stmt -> execute(array($idActividad));
        if ($stmt->fetchColumn()>0){
            return true;
        }
        return false;
    }
    public function selectRecurso(){
        $stmt= $this->db->query("SELECT * FROM recursos");
        $recursos_db = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $recursos = array();
        foreach ($recursos_db as $recurso) 
        {
            array_push($recursos, new Recurso($recurso['idRecurso'],$recurso['nombreRecurso']));
        }
        return $recursos;
    }

    protected function permisosActividad($idActividad){
        /*Comprobar si el susuario es un administrador*/
        $stmt = $this->db->prepare("SELECT dni FROM administrador WHERE dniAdministrador=?");
        $stmt -> execute(array($_SESSION["currentuser"]));
        if ($stmt->fetchColumn() > 0) {
             return true;
        }else{//comprobar si ha creado el usuario actual esa actividad si no no tiene permisos sobre el
            $stmt = $this->db->prepare("SELECT * FROM superusuario_individual WHERE dniSuperUsuario=? AND idActividad=?");
            $stmt -> execute(array($_SESSION["currentuser"], $idActividad));
            if ($stmt->fetchColumn() > 0) {
             return true;
            }
        }
        return false;
    }
    public function listarUsuarios()
    {
        if($this->esAdministrador())
        {
            $stmt = $this->db->query("SELECT * from deportista d, usuario u WHERE d.dni=u.dni;");
        }
        $usuarios_db = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $usuarios = array();
        foreach ($usuarios_db as $usuario) 
        {
            array_push($usuarios, new Usuario($usuario['dni'],$usuario['nombre'],$usuario['apellidos']));
        }
        return $usuarios;
    }
    public function findMonitorAsignado($idActividad){

        if($this->esAdministrador())
        {

         $stmt = $this->db->prepare("SELECT dniEntrenador from actividad_entrenador WHERE idActividad=?;");

         $stmt -> execute(array($idActividad));
         }
        $entrenador_db = $stmt->fetch(PDO::FETCH_ASSOC);
        $entrenador = $entrenador_db['dniEntrenador'];
        

        $stmt1 = $this->db->prepare("SELECT * from usuario where dni = ?");
        $stmt1-> execute(array($entrenador ));
        $entrenadorasignado = $stmt1->fetchAll(PDO::FETCH_ASSOC);
        
        
        return $entrenadorasignado;

    }
    protected function esAdministrador(){
        $stmt= $this->db->prepare("SELECT dniAdministrador 
        FROM administrador WHERE dniAdministrador=?");
        
        $stmt -> execute(array($_SESSION["currentuser"]));
        if ($stmt->fetchColumn()>0){
            return true;
        }
        return false;
    }
}//fin de clase
?> 