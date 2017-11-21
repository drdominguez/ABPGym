<?php
require_once(__DIR__."/../core/Access_DB.php");
require_once(__DIR__."/Actividad.php");

class ActividadMapper{
    protected $db;
    /**
    *el contructor obtiene la conexion con la base de datos del core
    **/
    public function __construct() {
        $this->db = PDOConnection::getInstance();
    }
    
    //Añadir
    function add($actividad){ 
        $stmt = $this->db->prepare("INSERT INTO actividad(nombre,precio) values (?,?)");
        if(self::esAdministrador()){
            $stmt -> execute(array($actividad->getNombre(),$actividad->getPrecio()));
            return true;
        }
        return false;
    }

    //Funcion borrar un elemento de la BD
    function delete($idActividad){
        $stmt = $this->db->prepare("DELETE from actividad WHERE idActividad=?");
         if(self::esAdministrador()){
            $stmt -> execute(array($actividad->getIdActividad()));
            return true;
        }
        return false;
    }

    //Funcion editar
    function edit($actividad){
        $stmt = $this->db->prepare("UPDATE actividad SET precio=? WHERE idActividad=? ");
        if(self::esAdministrador()){
            $stmt -> execute(array($actividad->getIdActividad(),$actividad->getNombre(),$actividad->getPrecio()));
            return true;
        }
        return false;
    }
    public function listar(){

            $stmt = $this->db->query("SELECT * from actividad");
            $actividades_db = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $actividades = array();

            foreach ($actividades_db as $actividad) {
                array_push($actividades, new Actividad($actividad['idActividad'],$actividad['nombre'],$actividad['precio']));
            
            }
        return $actividades;
        
        }
    public function findById($idActividad)
    {
        $stmt = $this->db->prepare("SELECT * FROM actividad WHERE idActividad =?");
        $stmt->execute(array($idActividad));
        $actividad = $stmt->fetch(PDO::FETCH_ASSOC);
        if($actividad != null) 
        {

            $stmt2 = $this->db->prepare("SELECT * FROM  grupo WHERE idActividad =?");
            $stmt2->execute(array($idActividad));

            if($stmt2!=null)
            {
                $actividad2 = $stmt2->fetch(PDO::FETCH_ASSOC);
                return new ActividadGrupo($actividad["idActividad"],$actividad["nombre"],$actividad["precio"],$actividad2["instalaciones"],$actividad2["plazas"]);
                }else 
                {

                $stmt3 = $this->db->prepare("SELECT * FROM  individual WHERE idActividad =?");
                $stmt3->execute(array($idActividad));
                if($stmt3!=null){
                    $actividad3 = $stmt3->fetch(PDO::FETCH_ASSOC);
                    return new ActividadIndividual($actividad["idActividad"],$actividad["nombre"],$actividad["precio"]);
                }
            }
        }
        return NULL;
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