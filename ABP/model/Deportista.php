<?php
class Deportista
{
    //Definimos las variables
    private $dni;


    function __construct($dni = NULL){
        $this->dni = $dni;
    }

    public function getDni(){
        return $this->dni;
    }
    public function setDni($dni){
        $this->dni = $dni;
    }
}//fin de clase

?>
