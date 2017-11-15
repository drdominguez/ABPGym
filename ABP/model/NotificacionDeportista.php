<?php


class notificacionDeportista_Model
{
    //Definimos las variables
    private $dniAdministrador;
    private $dniDeportista;
    private $idNotificacion;
    private $visto;

    function __construct($dniAdministrador = NULL, $dniDeportista = NULL,$idNotificacion = NULL,$visto = NULL){

        $this->dniAdministrador = $dniAdministrador;
        $this->dniDeportista = $dniDeportista;
        $this->idNotificacion = $idNotificacion;
        $this->visto = $visto;

    }

    public function getDniAdministrador(){
        return $this->dniAdministrador;
    }

    public function getDniDeportista(){
        return $this->dniDeportista;
    }

    public function getIdNotificacion(){
        return $this->idNotificacion;
    }

    public function getVisto(){
        return $this->visto;
    }

    public function setDniAdministrador($dniAdministrador){
        $this->dniAdministrador = $dniAdministrador;
    }


    public function setDniDeportista($dniDeportista){
        $this->dniDeportista = $dniDeportista;
    }

    public function setIdNotificacion($idNotificacion){
        $this->idNotificacion = $idNotificacion;
    }

    public function setVisto($visto){
        $this->visto = $visto;
    }

}//fin de clase

?>
