<?php

require_once(__DIR__."/../core/Access_DB.php");
require_once(__DIR__."/Deportista.php");
require_once(__DIR__."/Notificacion.php");
require_once(__DIR__."/NotificacionDeportista.php");



Class NotificacionMapper{
    protected $db;
    protected $idNotificacion;
    public function __construct(){
        $this->db=PDOConnection::getInstance();
    }
    
    public function add($notificacion){
        $stmt = $this->db->prepare("INSERT INTO notificacion(dniAdministrador,Asunto,contenido,fecha) VALUES (?,?,?,?)");
        $stmt->execute(array($notificacion->getDniAdministrador(),$notificacion->getAsunto(),$notificacion->getContenido(),$notificacion->getFecha()));
        $this->idNotificacion= $this->db->lastInsertId();
        $stmt = $this->db->query("SELECT dni FROM deportista");
        $deportistas_db = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $deportistas = array();
        foreach ($deportistas_db as $deportista) {
            array_push($deportistas, new Deportista($deportista["dni"]));
        }
        if ($deportistas) {
            foreach($deportistas as $deportista){
                $stmt = $this->db->prepare("INSERT INTO notificacion_deportista(dniAdministrador,dniDeportista,idNotificacion,visto) VALUES (?,?,?,?)");
            $stmt->execute(array($notificacion->getDniAdministrador(),$deportista->getDni(),$this->idNotificacion,0));
            }
            return true;
        }else{
            return false;
        }
    }


    public function listar(){

        if($this->esAdministrador()){
            $stmt = $this->db->query("SELECT * from notificacion");
        }else{
             $stmt = $this->db->prepare("SELECT N.idNotificacion, N.dniAdministrador,N.Asunto,N.contenido,N.fecha from notificacion N, notificacion_deportista D WHERE D.dniDeportista =? AND N.idNotificacion=D.idNotificacion");
             $stmt->execute(array($_SESSION['currentuser']));
        }
            $notificaciones_db = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $notificaciones = array();

            foreach ($notificaciones_db as $notificacion) {
                array_push($notificaciones, new Notificacion($notificacion['idNotificacion'],$notificacion['dniAdministrador'],$notificacion['Asunto'],$notificacion['contenido'],$notificacion['fecha']));
            
            }
        return $notificaciones;
        
        }

    protected function esAdministrador(){
        $stmt= $this->db->prepare("SELECT dniAdministrador FROM administrador WHERE dniAdministrador=?");
        $stmt->execute(array($_SESSION["currentuser"]));
        if ($stmt->fetchColumn()>0){
            return true;
        }
        return false;
    }
}
?>
