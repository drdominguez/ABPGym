<?php


class notificacion_Model
{
    //Definimos las variables
    private $idNotificacion;
    private $dniAdministrador;
    private $Asunto;
    private $contenido;
    private $fecha;

    function __construct($idNotificacion = NULL, $dniAdministrador = NULL,$Asunto = NULL,$contenido = NULL,$fecha = NULL){

        $this->idNotificacion = $idNotificacion;
        $this->dniAdministrador = $dniAdministrador;
        $this->Asunto = $Asunto;
        $this->contenido = $contenido;
        //Comprobamos si es un atributo de tipo fecha o no
        if($fecha == ''){
            $this->fecha = $fecha;
        }else{

            $this->fecha = date_format(date_create($fecha), 'Y-m-d');


        }
    }

    public function getIdNotificacion(){
        return $this->idNotificacion;
    }

    public function getDniAdministrador(){
        return $this->dniAdministrador;
    }

    public function getAsunto(){
        return $this->Asunto;
    }

    public function getContenido(){
        return $this->contenido;
    }

    public function getFecha(){
        return $this->fecha;
    }

    public function setIdNotificacion($idNotificacion){
        $this->idNotificacion = $idNotificacion;
    }

    public function setDniAdministrador($dniAdministrador){
        $this->dniAdministrador = $dniAdministrador;
    }

    public function setAsunto($asunto){
        $this->asunto = $asunto;
    }

    public function setContenido($contenido){
        $this->contenido = $contenido;
    }

    public function setFecha($fecha){
        $this->fecha = $fecha;
    }
}//fin de clase

?>
