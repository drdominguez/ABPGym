<?php

require_once(__DIR__."/../core/Access_DB.php");
require_once(__DIR__."/Pago.php");
require_once(__DIR__."/Actividad.php");

Class PagoMapper{

    protected $db;
    protected $idPago;

    public function __construct(){
        $this->db=PDOConnection::getInstance();
    }

    public function add($pago){
          if($this->esAdministrador())
        {
            if($this->esDeportista2($pago->getDniDeportista()))
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
        if($this->esAdministrador())
        {
            $stmt = $this->db->query("SELECT * from pago");
        }else
        {
            $stmt = $this->db->prepare("SELECT P.idPago, P.dniDeportista,P.idActividad,P.importe,P.fecha from pago P, WHERE P.dniDeportista =?");
            $stmt->execute(array($_SESSION['currentuser']));
        }
        $pagos_db = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $pagos = array();
        foreach ($pagos_db as $pago)
        {
            array_push($pagos, new Pago($pago['idPago'],$pago['dniDeportista'],$pago['idActividad'],$pago['importe'],$pago['fecha']));
        }
        return $pagos;
    }

    public function findById($idPago)
    {
        $stmt = $this->db->prepare("SELECT * FROM pago WHERE idPago=?");
        $stmt->execute(array($idPago));
        $pago = $stmt->fetch(PDO::FETCH_ASSOC);
        if($pago != null)
        {
            return new Pago($pago["idPago"],$pago["dniDeportista"],$pago["idActividad"],$pago["importe"],$pago["fecha"]);
        }else
        {
            return NULL;
        }

    }

    public function edit($pago){
        $stmt=$this->db-> prepare("UPDATE pago SET dniDeportista=?, idActividad=?, importe=?, fecha=? WHERE idPago=?");
        if(esSuperusuario()){
            $stmt=execute(array($pago->getDniDeportista(),$pago->getIdActividad(),$pago->getImporte(),$pago->getFecha(),$pago->getIdPago()));
            return true;
        }
        return false;
    }
    public function delete($idPago){
        $stmt = $this->db->prepare("DELETE FROM pago WHERE idPago = ?");
        if(esSuperusuario()){
            $stmt= execute(array($idPago));
            return true;
        }
        return false;
    }

    public function listarActividades()
    {
        if($this->esAdministrador())
        {
            $stmt = $this->db->query("SELECT * FROM actividad");
            $actividades_db = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $actividades = array();
            foreach ($actividades_db as $actividad)
            {
                array_push($actividades, new Actividad($actividad['idActividad'],$actividad['nombre'],$actividad['precio']));
            }
            return $actividades;
        }
    }

    public function esDeportista2($dni){
        $stmt = $this->db->prepare("SELECT dni FROM deportista WHERE dni=?");
        $stmt->execute(array($dni));
        if ($stmt->fetchColumn() > 0) {
             return true;
        }
        return false;
    }

    protected function esAdministrador()
    {
        $stmt= $this->db->prepare("SELECT dniAdministrador FROM administrador WHERE dniAdministrador=?");
        $stmt->execute(array($_SESSION["currentuser"]));
        if ($stmt->fetchColumn()>0)
        {
            return true;
        }
        return false;
    }
}
?>








