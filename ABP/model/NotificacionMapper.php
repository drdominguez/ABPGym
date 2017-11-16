<?php

require_once(__DIR__."/../core/Access_DB.php");
require_once(__DIR__."/Notificacion.php");
require_once(__DIR__."/NotificacionDeportista.php");



Class NotificacionMapper{
    protected $db;
    protected $idNotificacion;
    public function __construct(){
        $this->db=PDOConnection::getInstance();
    }
    
    public function add($notificacion){
        $stmt = $this->db->prepare("INSERT INTO notificacion(dniAdministrador,Asunto,contenido,fecha ) VALUES (?,?,?,?)");
        $stmt = execute(array($notificacion->getDniAdministrador(),$notificacion->getAsunto(),$notificacion->getContenido(),$notificacion->getFecha()));
        $this->idNotificacion=db2_last_insert_id($this->db);
        $stmt = $this->db->prepare("SELECT dni FROM deportista");
        $stmt = execute();
        if ($deportistas = $stmt->fetch_all() > 0) {
            var_dump($deportistas);
            exit;
            //tengo que obtener todos los dnis y realizar el siguiente insert into con cada uno
            $stmt = $this->db->prepare("INSERT INTO notificacion_deportista(dniAdministrador,dniDeportista,idNotificacion,visto) VALUES (?,?,?,?)");
            $stmt = execute(array($_SESSION["currentuser"],$dni,$this->idNotificacion,$this->visto));
            return true;
        }else{
            return false;
        }
    }

    protected function esAdministrador(){
        $stmt= $this->db->prepare("SELECT dniAdministrador FROM administrador WHERE dniAdministrador=?");
        $stmt= execute(array($_SESSION["currentuser"]));
        if ($stmt->fetchColumn()>0){
            return true;
        }
        return false;
    }
}
?>
