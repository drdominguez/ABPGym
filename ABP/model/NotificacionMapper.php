<?php

require_once(__DIR__."/../core/Access_DB.php");
require_once(__DIR__."/Deportista.php");
require_once(__DIR__."/Notificacion.php");
require_once(__DIR__ . "/../core/permisos.php");


Class NotificacionMapper
{
    protected $db;
    protected $idNotificacion;
    private $permisos;

    public function __construct()
    {
        $this->db=PDOConnection::getInstance();
                 $this->permisos= new Permisos();

    }
    
    public function add($notificacion)
    {

        $stmt = $this->db->prepare("INSERT INTO notificacion(dniAdministrador,Asunto,contenido,fecha) VALUES (?,?,?,?)");
        if($this->permisos->esAdministrador())
        {
            $stmt->execute(array($_SESSION['currentuser'],$notificacion->getAsunto(),$notificacion->getContenido(),$notificacion->getFecha()));
            $this->idNotificacion= $this->db->lastInsertId();
            $stmt = $this->db->query("SELECT dni FROM deportista");
            $deportistas_db = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $deportistas = array();
            foreach ($deportistas_db as $deportista) 
            {
                array_push($deportistas, new Deportista($deportista["dni"]));
            }
            if ($deportistas) 
            {
                foreach($deportistas as $deportista)
                {
                    $stmt = $this->db->prepare("INSERT INTO notificacion_deportista(dniAdministrador,dniDeportista,idNotificacion,visto) VALUES (?,?,?,?)");
                    $stmt->execute(array($_SESSION['currentuser'],$deportista->getDni(),$this->idNotificacion,0));
                }
            }
            return true;
        }else
        {
            return false;
        }
    }




    public function listar()
    {
        if($this->permisos->esAdministrador())
        {
            $stmt = $this->db->query("SELECT * from notificacion");
        }else
        {
            $stmt = $this->db->prepare("SELECT N.idNotificacion, N.dniAdministrador,N.Asunto,N.contenido,N.fecha from notificacion N, notificacion_deportista D WHERE D.dniDeportista =? AND N.idNotificacion=D.idNotificacion");
            $stmt->execute(array($_SESSION['currentuser']));
        }
        $notificaciones_db = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $notificaciones = array();
        foreach ($notificaciones_db as $notificacion) 
        {
            array_push($notificaciones, new Notificacion($notificacion['idNotificacion'],$notificacion['dniAdministrador'],$notificacion['Asunto'],$notificacion['contenido'],$notificacion['fecha']));
        }
        return $notificaciones;
    }




    public function listarSinVer()
    {
        if($this->permisos->esAdministrador())
        {
            $stmt = $this->db->query("SELECT * from notificacion");
        }else
        {
            $stmt = $this->db->prepare("SELECT N.idNotificacion, N.dniAdministrador,N.Asunto,N.contenido,N.fecha from notificacion N, notificacion_deportista D WHERE D.dniDeportista =? AND N.idNotificacion=D.idNotificacion AND D.visto=0");
            $stmt->execute(array($_SESSION['currentuser']));
        }
        $notificaciones_db = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $notificaciones = array();
        foreach ($notificaciones_db as $notificacion) 
        {
            array_push($notificaciones, new Notificacion($notificacion['idNotificacion'],$notificacion['dniAdministrador'],$notificacion['Asunto'],$notificacion['contenido'],$notificacion['fecha']));
        }
        return $notificaciones;
    }



    public function contarNotificacionesSinVer()
    {
        if($this->permisos->esAdministrador())
        {
            $stmt = $this->db->query("SELECT COUNT(*) from notificacion");
        }else
        {
            $stmt = $this->db->prepare("SELECT COUNT(*) from notificacion N, notificacion_deportista D WHERE D.dniDeportista =? AND N.idNotificacion=D.idNotificacion AND D.visto=0");
            $stmt->execute(array($_SESSION['currentuser']));
        }
        $notificaciones_db = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $notificaciones = array();
        foreach ($notificaciones_db as $notificacion) 
        {
            array_push($notificaciones, $notificacion['COUNT(*)']);
        }
        return $notificaciones;
    }



    public function findById($idNotificacion)
    {
        $stmt = $this->db->prepare("SELECT * FROM notificacion WHERE idNotificacion=?");
        $stmt->execute(array($idNotificacion));
        $notificacion = $stmt->fetch(PDO::FETCH_ASSOC);
        if($notificacion != null) 
        {
            return new Notificacion($notificacion["idNotificacion"],$notificacion["dniAdministrador"],$notificacion["Asunto"],$notificacion["contenido"],$notificacion["fecha"]);
        }else 
        {
            return NULL;
        }

    }



    public function visto($idNotificacion,$dniDeportista)
    {
        if(!$this->permisos->esAdministrador())
        {
            $stmt=$this->db-> prepare("UPDATE notificacion_deportista SET visto=? WHERE idNotificacion=? AND dniDeportista=?");
            $stmt->execute(array(1,$idNotificacion,$dniDeportista));
            return true;
        }
    }

}
?>
