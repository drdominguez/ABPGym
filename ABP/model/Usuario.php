<?php
require_once(__DIR__."/../core/ValidationException.php");
class Usuario
{
        //Definimos las variables
            private $dni;
            private $nombre;
            private $apellidos;
            private $edad;
            private $password;
            private $email;
            private $telefono;
            private $fechaAlta;
        function __construct($dni=NULL,$nombre=NULL,$apellidos=NULL,$edad=NULL,$password=NULL,$email=NULL,$telefono=NULL,$fechaAlta=NULL){
            $this->dni = $dni;
            $this->nombre = $nombre;
            $this->apellidos = $apellidos;
            $this->edad = $edad;
            $this->password = md5($password);
            $this->email = $email;
            $this->telefono = $telefono;//Comprobamos si es un atributo de tipo fecha o no 
            $this->fechaAlta=$fechaAlta;   
        }
    public function getDni() {
        return $this->dni;
    }
    
    public function getNombre() {
        return $this->nombre;
    }
    
    public function getApellidos() {
        return $this->apellidos;
    }
    
    public function getEdad(){
        return $this->edad;
    }
    
    public function getPassword() {
        return $this->password;
    }
    public function getEmail(){
        return $this->email;
    }
    public function getTelefono(){
        return $this->telefono;
    }
    public function getFecha(){
        return $this->fechaAlta;
    }
    public function setDni($dni) {
        $this->dni = $dni;
    }
    
    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }
    
    public function setApellidos($apellidos) {
        $this->apellidos = $apellidos;
    }
    
    public function setEdad($edad) {
        $this->edad = $edad;
    }
    
    public function setPassword($password) {
        $this->password = md5($password);
    }
    public function setEmail($email){
        $this->email = $email;
    }
    public function setTelefono($telefono){
        $this->telefono=$telefono;
    }
    public function setFecha($fechaAlta){
        $this->fechaAlta = $fechaAlta;
    }
    /**
    * Comprueba que el usuario sea valido
    *
    * @throws ValidationException 
    *
    * @return void
    */
    public function checkIsValidForRegister() {
        $errors = array();
        /*-------------------debe validarse que el dni sea correcto-------------------------------------------------*/
    }
}
?> 
