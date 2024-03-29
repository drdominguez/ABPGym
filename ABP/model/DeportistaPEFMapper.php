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
        if($this->permisos->esAdministrador() && parent::ADD($pef)){ 
            $stmt = $this->db->prepare("INSERT INTO pef(dni,tarjeta,comentarioRevision) VALUES (?,?,?)");
            $stmt->execute(array($pef->getDni(),$pef->getTarjeta(),$pef->getComentarioRevision()));
            return true;
        }
        return false;
    }

    //Hecho por Álex
    /*changeUser
    * Se llama cuando se cambia un tipo de usuario de pef a pef
    */
    public function changeUser($pef){
       if($this->permisos->esAdministrador()){
        //eliminido al deportista de la tabla pef
        self::removeTDU($pef->getDni());
        //actualizo sus datos en la tabla usuario por si se modifico alguno en el formulario
        self::actualizarUsuario($pef);
        //inserto al deportista en la tabla PEF
        $stmt=$this->db->prepare("INSERT INTO pef(dni,tarjeta) VALUES(?,?)");
        $stmt->execute($pef->getDni(),$pef->getTarjeta());
       }
    }

     public function changeUser2($tdu){
       if($this->permisos->esAdministrador()){
        //eliminido al deportista de la tabla tdu
        self::removePEF($tdu->getDni());
        //inserto al deportista en la tabla PEF
        $stmt=$this->db->prepare("INSERT INTO tdu(dni,tarjeta) VALUES(?,?)");
        $stmt->execute(array($tdu->getDni(),$tdu->getTarjeta()));
        //actualizo sus datos en la tabla usuario y en la tabla TDU
        self::editTDU($tdu);
       }
    }

    /*editTDU
    *Actualiza los datos del tdu despues de cambiar un usuario pef a tdu
    *
    */
    private function editTDU($tdu){
        // si tiene permisos y actualizo la tabla usuario actualiza la tabla tdu
        if($this->permisos->esAdministrador() && self::actualizarUsuario($tdu)){
            $stmt=$this->db->prepare("UPDATE tdu SET tarjeta=? WHERE dni=?");
            $stmt->execute(array($tdu->getTarjeta(),$tdu->getDni()));
            return true;
        }
        return false;//si no es administrador no puede editar un deportista
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
            $stmt->execute(array($pef->getTarjeta(),$pef->getComentarioRevision(),$pef->getDni()));
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
    private function actualizarUsuario($pef){
        if($pef->getContraseña()!=""){//se actualiza la contraseña
            if($pef->getFotoPerfil()==null){
             $stmt = $this->db->prepare("UPDATE usuario SET nombre=?, apellidos=?,edad=?,contrasena=?,email=?,telefono=? WHERE dni=?");
              $stmt->execute(array($pef->getNombre(),$pef->getApellidos(),$pef->getEdad(), md5($pef->getContraseña()),$pef->getEmail(),$pef->getTelefono(),$pef->getDni()));
            }else{
            $stmt = $this->db->prepare("UPDATE usuario SET nombre=?, apellidos=?,edad=?,contrasena=?,email=?,telefono=?,fotoperfil=? WHERE dni=?");
             $stmt->execute(array($pef->getNombre(),$pef->getApellidos(),$pef->getEdad(), md5($pef->getContraseña()),$pef->getEmail(),$pef->getTelefono(),$pef->getFotoPerfil(),$pef->getDni()));
            }
           
            return true;
        }else{//no se actualiza la contraseña
            if($pef->getFotoPerfil()==null){
                $stmt = $this->db->prepare("UPDATE usuario SET nombre=?, apellidos=?,edad=?,email=?,telefono=? WHERE dni=?");

            $stmt->execute(array($pef->getNombre(),$pef->getApellidos(),$pef->getEdad(),$pef->getEmail(),$pef->getTelefono(),$pef->getDni()));
            }else{
                $stmt = $this->db->prepare("UPDATE usuario SET nombre=?, apellidos=?,edad=?,email=?,telefono=?,fotoperfil=? WHERE dni=?");

                $stmt->execute(array($pef->getNombre(),$pef->getApellidos(),$pef->getEdad(),$pef->getEmail(),$pef->getTelefono(),$pef->getFotoPerfil(),$pef->getDni()));
            }
            
            return true;
        }
        return false;
    }

    /*removeTDU hecho por Álex
    * Elimina un tdu SÓLO de la tabla PEF con el fin de agregarlo luego a otra tabla como por ejemplo PEF
    * no comprueba si es administrador por que lo comprobara la funcion desde la que se llama
    */
    public function removePEF($dni){
        $stmt=$this->db->prepare("DELETE FROM pef WHERE dni=?");
        $stmt->execute(array($dni));
    }

}
?>