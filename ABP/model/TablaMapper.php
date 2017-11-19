<?php

require_once(__DIR__."/../core/Access_DB.php");
require_once(__DIR__."/Tabla.php");





Class TablaMapper{
    protected $db;
    protected $idTabla;
    public function __construct(){
        $this->db=PDOConnection::getInstance();
    }
    
    public function add($tabla,$ejercicios){
         $stmt = $this->db->prepare("INSERT INTO tabla(tipo,comentario,nombre) VALUES (?,?,?)");
        if($this->esSuperusuario()){
            $stmt->execute(array($tabla->getTipo(),$tabla->getComentario(),$tabla->getNombre()));
            $this->idTabla= $this->db->lastInsertId();
            foreach ($ejercicios as $ejercicio) {
                $stmt = $this->db->prepare("INSERT INTO tabla_ejercicios(idTabla,idEjercicio) VALUES (?,?)");
                $stmt->execute(array($this->idTabla,$ejercicio));
            }
            return true;
        }else{
            return false;
    }
}


    public function listar(){

        if($this->esAdministrador()){
            $stmt = $this->db->query("SELECT * from tabla");
        }else{
             $stmt = $this->db->prepare("SELECT N.idNotificacion, N.dniAdministrador,N.Asunto,N.contenido,N.fecha from notificacion N, notificacion_deportista D WHERE D.dniDeportista =? AND N.idNotificacion=D.idNotificacion");
             $stmt->execute(array($_SESSION['currentuser']));
        }
            $tablas_db = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $tablas = array();

            foreach ($tablas_db as $tabla) {
                array_push($tablas, new Tabla($tabla['idTabla'],$tabla['tipo'],$tabla['comentario'],$tabla['nombre']));
            
            }
        return $tablas;
        
        }


public function listarEjercicios(){

        if($this->esAdministrador()){
            $stmt = $this->db->query("SELECT * from ejercicio");
            $tablas_db = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $tablas = array();

            foreach ($tablas_db as $tabla) {
                array_push($tablas, new Ejercicio($tabla['idEjercicio'],$tabla['nombre'],$tabla['descripcion'],$tabla['video'],$tabla['imagen']));
            
            }
        return $tablas;
        
        }
    }

    public function findById($idTabla){
            $stmt = $this->db->prepare("SELECT * FROM tabla WHERE idTabla=?");
            $stmt->execute(array($idTabla));
            $tabla = $stmt->fetch(PDO::FETCH_ASSOC);

            if($tabla != null) {
            return new Tabla(
            $tabla["idTabla"],
            $tabla["tipo"],
            $tabla["comentario"],
            $tabla["nombre"]);
        } else {
            return NULL;
        }

        }

    public function delete($idTabla) {
            $stmt = $this->db->prepare("DELETE from tabla WHERE idTabla=?");
            $stmt->execute(array($idTabla));
            return true;
        }

    protected function esAdministrador(){
        $stmt= $this->db->prepare("SELECT dniAdministrador FROM administrador WHERE dniAdministrador=?");
        $stmt->execute(array($_SESSION["currentuser"]));
        if ($stmt->fetchColumn()>0){
            return true;
        }
        return false;
    }

        protected function esSuperusuario(){
        $stmt= $this->db->prepare("SELECT dniSuperUsuario FROM superusuario WHERE dniSuperUsuario=?");
        $stmt-> execute(array($_SESSION["currentuser"]));
        if ($stmt->fetchColumn()>0){
            return true;
        }
        return false;
    }
}
?>
