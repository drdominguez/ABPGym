<?php

require_once(__DIR__."/../core/Access_DB.php");
require_once(__DIR__."/Pago.php");

Class NotificacionMapper{
    protected $db;
    protected $idPago;
    public function __construct(){
        $this->db=PDOConnection::getInstance();
    }
    public function add($pago){
        $stmt = $this->db->prepare("INSERT INTO pago(dniDeportista,idActividad,importe,fecha ) VALUES (?,?,?,?)");
        if(esSuperusuario()){//guardamos el ejercicio y añadimos el dni y el id en la tabla superusuario_ejercicio
            $stmt=execute(array($pago->getDniDeportista(),$pago->getidActividad(),$pago->getImporte(),$pago->getFecha()));
            $stmt = $this->db->prepare("INSERT INTO superusuario_pago VALUES (?,?)");
            //db2_last_insert_id($this->db) devuelve el ultimo id insertado
            $this->idPago=db2_last_insert_id($this->db);
            $stmt = execute(array($_SESSION["currentuser"],$this->idPago));
            return true;
        }
        return false;
    }
    public function edit($pago){
        $stmt=$this->db-> prepare("UPDATE pago SET dniDeportista=?, idActividad=?, importe=?, fecha=? WHERE idPago=?");
        if(esSuperusuario()){
            $stmt=execute(array($pago->getDniDeportista(),$pago->getIdActividad(),$pago->getImporte(),$pago->getFecha(),$pago->getIdPago()));
            return true;
        }
        return false;
    }
    public function remove($idPago){
        $stmt = $this->db->prepare("DELETE FROM pago WHERE idPago = ?");
        if(esSuperusuario()){
            $stmt= execute(array($idPago));
            return true;
        }
        return false;
    }

    protected function esSuperusuario(){
        $stmt= $this->db->prepare("SELECT dniAdministrador FROM administrador WHERE dniAdministrador=?");
        $stmt= execute(array($_SESSION["currentuser"]));
        if ($stmt->fetchColumn()>0){
            return true;
        }
        return false;
    }
}
?>
