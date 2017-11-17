<?php

require_once(__DIR__."/../core/Access_DB.php");
require_once(__DIR__."/UsuarioMapper.php");
require_once(__DIR__."/Usuario.php");
require_once(__DIR__."/Deportista.php");
require_once(__DIR__."/DeportistaMapper.php");
require_once(__DIR__."/DeportistaTDU.php");

Class DeportistaTDUMapper extends DeportistaMapper {
    public function __construct(){
        parent::__construct();//inicia el atributo protected $this->db de conexion con la BBDD
    }

    public function addTDU($tdu){
        parent::add($tdu);//llama al add de la clase padre
        $stmt = $this->db->prepare("INSERT INTO pef(dni,tarjeta) VALUES (?,?)");
        if(parent::esSuperusuario()){//guardamos el ejercicio y añadimos el dni y el id en la tabla superusuario_ejercicio para saber que superUsuario creo ese ejercicio y luego tenga permisos sobre el
            $stmt=execute(array($this->dni,$tdu->getDni(),$tdu->getTarjeta()));//
            return true;
        }
        return false;
    }
    public function editTDU($tdu){
        parent::edit($tdu);//se actualizan los cambios en la tabla ejercicio por si cambiara alguno
        $stmt=$this->db-> prepare("UPDATE pef SET dni=?, tarjeta=? WHERE dni=?");
        if(parent::permisosDeportista($tdu->getDni())){
            $stmt=execute(array($tdu->getDni(),$tdu->getTarjeta()));
            return true;
        }
        return false;
    }
    public function removeTDU($dni){
        $stmt = $this->db->prepare("DELETE FROM tdu WHERE dni = ?");
        if(parent::permisosDeportista($dni)){
            $stmt= execute(array($dni));
            parent::remove($dni);
            return true;
        }
        return false;
    }
}
?>