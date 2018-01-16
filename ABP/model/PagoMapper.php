<?php

require_once(__DIR__."/../core/Access_DB.php");
require_once(__DIR__."/Pago.php");
require_once(__DIR__."/Actividad.php");
require_once(__DIR__ . "/../core/permisos.php");

Class PagoMapper{

    protected $db;
    protected $idPago;
    private $permisos;

    public function __construct(){
        $this->db=PDOConnection::getInstance();
               $this->permisos= new Permisos();
    }

    public function add($pago){
          if($this->permisos->esAdministrador())
        {
            if($this->permisos->esDeportista2($pago->getDniDeportista()))
            {
            $stmt = $this->db->prepare("INSERT INTO pago(dniDeportista,idActividad,importe,fecha) VALUES (?,?,?,?)");
            $stmt->execute(array($pago->getDniDeportista(),$pago->getActividad(),$pago->getImporte(),$pago->getFecha()));
            return true;
        }else{
            return false;
        }
    }else{
        return false;
    }
    }

    public function listar()
    {
        if($this->permisos->esAdministrador())
        {
            $stmt = $this->db->query("SELECT * from pago p, actividad a WHERE p.idActividad=a.idActividad ORDER BY p.fecha desc");
        }else
        {
            $stmt = $this->db->prepare("SELECT * from pago p, actividad a WHERE dniDeportista =? AND p.idActividad=a.idActividad ORDER BY p.fecha desc");
            $stmt->execute(array($_SESSION['currentuser']));
        }
        $pagos_db = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $pagos = array();
        foreach ($pagos_db as $pago)
        {
            array_push($pagos, new Pago($pago['idPago'],$pago['dniDeportista'],$pago['nombre'],$pago['importe'],$pago['fecha']));
        }
        return $pagos;
    }

    public function findById($idPago)
    {
        $stmt = $this->db->prepare("SELECT * FROM pago p, actividad a WHERE idPago=? AND p.idActividad=a.idActividad");
        $stmt->execute(array($idPago));
        $pago = $stmt->fetch(PDO::FETCH_ASSOC);
        if($pago != null)
        {
            return new Pago($pago["idPago"],$pago["dniDeportista"],$pago["nombre"],$pago["importe"],$pago["fecha"]);
        }else
        {
            return NULL;
        }

    }

    public function delete($idPago)
    {
        if($this->permisos->esAdministrador())
        {
            $stmt = $this->db->prepare("SELECT * FROM pago WHERE idPago=?");
            $stmt-> execute(array($idPago));
            $pago_db = $stmt->fetch(PDO::FETCH_ASSOC);
            if($pago_db != null)
            {
                $stmt = $this->db->prepare("DELETE from pago WHERE idPago=?");
                $stmt->execute(array($idPago));
                return true;
            }
            return false;
        }
        return false;
    }

    public function listarActividades()
    {
        if($this->permisos->esAdministrador())
        {
            $stmt = $this->db->query("SELECT * FROM actividad A, horario H, actividad_horario AH, recursos R WHERE A.idActividad=AH.idActividad AND AH.idHorario=H.idHorario AND A.idInstalaciones=R.idRecurso");
            $actividades_db = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $actividades = array();
            foreach ($actividades_db as $actividad)
            {
                $horario = new Horario($actividad['idHorario'],$actividad['dia'],$actividad['hora'],$actividad['fechIni'],$actividad['fechFin']);
                array_push($actividades, new Actividad($actividad['idActividad'],$actividad['nombre'],$actividad['precio'],$actividad['nombreRecurso'],$actividad['plazas'],null,$horario));
            }
            return $actividades;
        }
    }

    public function contarPagos(){
        if($this->permisos->esAdministrador()){
            $stmt = $this->db->query("SELECT COUNT(*) FROM pago");
        }else{
            if($this->permisos->esDeportista()){
                $stmt = $this->db->prepare("SELECT COUNT(*) FROM pago WHERE dniDeportista=?");
                $stmt->execute(array($_SESSION["currentuser"]));
            }else{
                return false;
            }
        }
        $pagos_db = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $pagos = array();
        foreach ($pagos_db as $pago) 
        {
            array_push($pagos, $pago['COUNT(*)']);
        }
        return $pagos;
    }


public function listarDeportistas()
    {
        $stmt = $this->db->query("SELECT * from deportista d, usuario u WHERE d.dni=u.dni");
        $usuarios_db = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $usuarios = array();
        foreach ($usuarios_db as $usuario) 
        {
            array_push($usuarios, new Usuario($usuario['dni'],$usuario['nombre'],$usuario['apellidos'],$usuario['edad'],'',$usuario['email'],$usuario['telefono'],$usuario['fechaAlta'],'',$usuario['fotoperfil']));
        }
        return $usuarios;
    }


}
?>








