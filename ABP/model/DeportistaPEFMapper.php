<?php

require_once(__DIR__."/../core/Access_DB.php");
require_once(__DIR__."/UsuarioMapper.php");
require_once(__DIR__."/Usuario.php");
require_once(__DIR__."/Deportista.php");
require_once(__DIR__."/DeportistaMapper.php");
require_once(__DIR__."/DeportistaPEF.php");
require_once(__DIR__ . "/../core/permisos.php");

Class DeportistaPEFMapper extends DeportistaMapper {

    private $permisos;

    public function __construct(){
        parent::__construct();//inicia el atributo protected $this->db de conexion con la BBDD
        $this->permisos= new Permisos();
    }

    /*addPEF
    * LLama a la clase padre para que añada un deportista en la tabla deportistas
    * Añade un deportista a la table PEF
    * Es necesario ser administrador
    */
    public function addPEF($pef){
        if($this->permisos->esAdministrador() && parent::add($pef)){ 
            $stmt = $this->db->prepare("INSERT INTO pef(dni,tarjeta,comentarioRevision) VALUES (?,?,?)");
            $stmt->execute(array($pef->getDni(),$pef->getTarjeta(),$pef->getComentario()));
            return true;
        }
        return false;
    }

    //Hecho por Álex
    /*changeUser
    * Se llama cuando se cambia un tipo de usuario de pef a tdu
    */
    public function changeUser($tdu){
       if($this->permisos->esAdministrador()){
        //eliminido al deportista de la tabla tdu
        self::removeTDU($tdu->getDni());
        //actualizo sus datos en la tabla usuario por si se modifico alguno en el formulario
        self::actualizarUsuario($tdu);
        //inserto al deportista en la tabla PEF
        $stmt=$this->db->prepare("INSERT INTO pef(dni,tarjeta) VALUES(?,?)");
        $stmt->execute($tdu->getDni(),$tdu->getTarjeta());
       }
    }

    /*Esta hecho por JUAN RAMÓN, no está bien actualizar un deportsta PEF es más que actualizar su tarjeta y su comentario de revisión, se puede actualizar su nombre, telefono, email, contraseña, edad...etc*/
    /*
    function editPEF($usuario)
    {
        $stmt = $this->db->prepare("SELECT * FROM pef WHERE dni =?");
        $stmt->execute(array($usuario->getDni()));
        $usuario_db = $stmt->fetch(PDO::FETCH_ASSOC);
        if($usuario_db == null){
            return false;
        }else{
            $stmt = $this->db->prepare("UPDATE pef SET tarjeta=?,comentarioRevision=? WHERE dni=?");
            $stmt->execute(array( $usuario->getTarjeta(),$usuario->getComentario(),$usuario->getDni()));
            return true;
        }
    }
    */

     //Hecho por Álex
    /*editPEF
    *Permite editar un deportista de tipo PEF
    */
    public function editPEF($pef){
        // si tiene permisos y actualizo la tabla usuario actualiza la tabla tdu
        if($this->permisos->esAdministrador() && self::actualizarUsuario($pef)){
            $stmt=$this->db->prepare("UPDATE pef SET tarjeta=?, comentarioRevision=?  WHERE dni=?");
            $stmt->execute(array($pef->getTarjeta(),$pef->comentarioRevision(),$pef->getDni()));
            return true;
        }
        return false;//si no es administrador no puede editar un deportista
    }

    /*Hecho por Juan Ramón, no está bien hecha, existen indices con restricción de delete cascade, sólo es necesario hacer un delete en la tabla usuario, es posible que esta función no sea llamada nunca*/
    public function deletePEF($dni)
    {
        if($this->esAdministrador())
        {
            $stmt = $this->db->prepare("SELECT * FROM pef WHERE dni=?");
            $stmt-> execute(array($dni));
            $deportistaPEF_db = $stmt->fetch(PDO::FETCH_ASSOC);
            if($deportistaPEF_db != null)
            {
                $stmt = $this->db->prepare("DELETE from pef WHERE dni=?");
                $stmt->execute(array($dni));
                $stmt = $this->db->prepare("DELETE from deportista WHERE dni=?");
                $stmt->execute(array($dni));
                return true;
            }
            return false;
        }
        return false;
    }

    public function listarPEF()
    {
        $stmt = $this->db->query("SELECT pef.*, usuario.nombre, usuario.apellidos FROM `usuario`, `pef` WHERE pef.dni = usuario.dni");
        $stmt -> execute();
        $lista = $stmt->fetchAll();
        return $lista;
    }

    /*Hecha por Juan Ramón, Esta mal,la consulta con ese inner join jamás va a funcionar, no se especifica en la parte select de que tabla obtener los datos, proboca una sqlException*/
    public function findById($dni)
    {
        $stmt = $this->db->prepare("SELECT * FROM pef p, usuario u WHERE p.dni=? AND p.dni=u.dni");
        $stmt->execute(array($dni));
        $deportistaPEF = $stmt->fetch(PDO::FETCH_ASSOC);
        if($deportistaPEF != null)
        {
            return $deportistaPEF;
        }else
        {
            return NULL;
        }
    }
    /*Heca por Juan Ramón, debería usarse la función definida en core/permisos no se borra por si se llama en algun lado y no probocar más errores, además debería ser privada ya que sólo es llamada desde la propia clase*/
    public function esAdministrador()
    {
        $stmt= $this->db->prepare("SELECT dniAdministrador FROM administrador WHERE dniAdministrador=?");
        $stmt->execute(array($_SESSION["currentuser"]));
        if ($stmt->fetchColumn()>0)
        {
            return true;
        }
        return false;
    }
    //Hecho por Álex
    /*actualizarUsuario
    * Permite actualizar los datos de un deportista en la tabla usuario.
    */
    private function actualizarUsuario($tdu){
         //Se actualizan los datos en la tabla usuario
        if($tdu->getContraseña()!=""){//se actualiza la contraseña
             $stmt = $this->db->prepare("UPDATE usuario SET nombre=?, apellidos=?,edad=?,contrasena=?,email=?,telefono=? WHERE dni=?");
            $stmt->execute(array($tdu->getNombre(),$tdu->getApellidos(),$tdu->getEdad(), md5($tdu->getContraseña()),$tdu->getEmail(),$tdu->getTelefono(),$tdu->getDni()));
            return true;
        }else{//no se actualiza la contraseña
            $stmt = $this->db->prepare("UPDATE usuario SET nombre=?, apellidos=?,edad=?,email=?,telefono=? WHERE dni=?");
            $stmt->execute(array($tdu->getNombre(),$tdu->getApellidos(),$tdu->getEdad(),$tdu->getEmail(),$tdu->getTelefono(),$tdu->getDni()));
            return true;
        }
        return false;
    }

}
?>