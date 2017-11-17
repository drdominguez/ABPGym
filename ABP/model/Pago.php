<?php


class Pago
{
    //Definimos las variables
    private $idPago;
    private $dniDeportista;
    private $idActividad;
    private $importe;
    private $fecha;

    function __construct($idPago = NULL, $dniDeportista = NULL,$idActividad = NULL,$importe = NULL,$fecha = NULL){

        $this->idPago = $idPago;
        $this->dniDeportista = $dniDeportista;
        $this->idActividad = $idActividad;
        $this->importe = $importe;
        //Comprobamos si es un atributo de tipo fecha o no
        if($fecha == ''){
            $this->fecha = $fecha;
        }else{

            $this->fecha = date_format(date_create($fecha), 'Y-m-d');


        }
    }

    public function getIdPago(){
        return $this->idPago;
    }

    public function getDniDeportista(){
        return $this->dniDeportista;
    }

    public function getActividad(){
        return $this->idActividad;
    }

    public function getImporte(){
        return $this->importe;
    }

    public function getFecha(){
        return $this->fecha;
    }

    public function setIdPago($idPago){
        $this->idPago = $idPago;
    }

    public function setDniDeportista($dniDeportista){
        $this->dniDeportista = $dniDeportista;
    }

    public function setidActividad($idActividad){
        $this->idActividad = $idActividad;
    }

    public function setImporte($importe){
        $this->importe = $importe;
    }

    public function setFecha($fecha){
        $this->fecha = $fecha;
    }
}//fin de clase

?>
