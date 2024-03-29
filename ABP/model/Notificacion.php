<?php


class Notificacion
{
    //Definimos las variables
    private $idNotificacion;
    private $dniAdministrador;
    private $Asunto;
    private $contenido;
    private $fecha;
    private $visto;

    function __construct($idNotificacion = NULL, $dniAdministrador = NULL,$Asunto = NULL,$contenido = NULL,$fecha = NULL,$visto=NULL)
    {

        $this->idNotificacion = $idNotificacion;
        $this->dniAdministrador = $dniAdministrador;
        $this->Asunto = $Asunto;
        $this->contenido = $contenido;
        $this->fecha = $fecha;
        $this->visto = $visto;

    }



    public function getIdNotificacion()
    {
        return $this->idNotificacion;
    }

    public function getDniAdministrador()
    {
        return $this->dniAdministrador;
    }

    public function getAsunto()
    {
        return $this->Asunto;
    }

    public function getContenido()
    {
        return $this->contenido;
    }

    public function getFecha()
    {
        return $this->fecha;
    }
    public function getVisto(){
        return $this->visto;
    }

    public function setIdNotificacion($idNotificacion)
    {
        $this->idNotificacion = $idNotificacion;
    }

    public function setDniAdministrador($dniAdministrador)
    {
        $this->dniAdministrador = $dniAdministrador;
    }

    public function setAsunto($Asunto)
    {
        $this->Asunto = $Asunto;
    }

    public function setContenido($contenido)
    {
        $this->contenido = $contenido;
    }

    public function setFecha($fecha)
    {
        $this->fecha = $fecha;
    }
    public function setVisto($visto){
        $this->visto = $visto;
    }
}//fin de clase

?>
