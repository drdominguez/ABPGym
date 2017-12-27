<?php

require_once(__DIR__."/../core/Access_DB.php");
require_once(__DIR__."/UsuarioMapper.php");
require_once(__DIR__."/Usuario.php");
require_once(__DIR__."/Deportista.php");
require_once(__DIR__."/DeportistaMapper.php");
require_once(__DIR__."/DeportistaTDU.php");
require_once(__DIR__ . "/../core/permisos.php");

Class DeportistaTDUMapper extends DeportistaMapper {

    private $permisos;

    public function __construct(){
        parent::__construct();//inicia el atributo protected $this->db de conexion con la BBDD
        $this->permisos= new Permisos();
    }

    public function addTDU($tdu){
        if($this->permisos->esAdministrador() && parent::add($tdu)){ 
            $stmt = $this->db->prepare("INSERT INTO tdu(dni,tarjeta) VALUES (?,?)");
            $stmt->execute(array($tdu->getDni(),$tdu->getTarjeta()));//
            return true;
        }
        return false;
    }

    /*Hecha por Juan Ramón, NO ESTA BIEN, editar un usuario no es solo cambiarle de DNI, de hecho el DNI no debería poder cambiarse, hay que poder cambiar su nombre, edad, telefono, email...poder cambiarlo de tipo de usuario*/
    /*
    public function editTDU($usuario)
    {
        $stmt = $this->db->prepare("SELECT * FROM tdu WHERE dni =?");
        $stmt->execute(array($usuario->getDni()));
        $usuario_db = $stmt->fetch(PDO::FETCH_ASSOC);
        if($usuario_db == null){
            return false;
        }else{
            $stmt = $this->db->prepare("UPDATE tdu SET tarjeta=? WHERE dni=?");
            $stmt->execute(array($usuario->getTarjeta(),$usuario->getDni()));
            return true;
        }
    }*/

    /*editTDU
    *Hecho por Álex
    * Permite editar los datos de un deportista TDU
    * No se sigue la lógica estanar del resto del proyecto que la clase paradre edite sus
    * propios datos por que hay un sin fin de cosas mal hechas por Juan Ramón y no queda tiempo
    * para corregirlo todo
    */
    public function editTDU($tdu){
        // si tiene permisos y actualizo la tabla usuario actualiza la tabla tdu
        if($this->permisos->esAdministrador() && self::actualizarUsuario($tdu)){
            $stmt=$this->db->prepare("UPDATE tdu SET tarjeta=? WHERE dni=?");
            $stmt->execute(array($tdu->getTarjeta(),$tdu->getDni()));
            return true;
        }
        return false;//si no es administrador no puede editar un deportista
    }

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

    /*changeUser hecho por Álex
    * Cambia un deportista TDU a PEF y actualiza sus datos en la BBDD
    * Al cambiar de usuario no se tiene en cuenta agregar un comentario de la revisión médica esto siempre podrá hacerse editando posteriormente el usuario desde el formulario de editar PEF
    */
    public function changeUser($tdu){
       if($this->permisos->esAdministrador()){
        //eliminido al deportista de la tabla tdu
        self::removeTDU($tdu->getDni());
        //inserto al deportista en la tabla PEF
        $stmt=$this->db->prepare("INSERT INTO pef(dni,tarjeta) VALUES(?,?)");
        $stmt->execute(array($tdu->getDni(),$tdu->getTarjeta()));
        // actualizo sus datos en la tabla usuario y en la tabla pef
        self::editPEF($tdu);
       }
    }

    public function changeUser2($tdu){
       if($this->permisos->esAdministrador()){
        //eliminido al deportista de la tabla tdu
        self::removePEF($tdu->getDni());
        //inserto al deportista en la tabla PEF
        $stmt=$this->db->prepare("INSERT INTO tdu(dni,tarjeta) VALUES(?,?)");
        $stmt->execute($tdu->getDni(),$tdu->getTarjeta());
        // actualizo sus datos en la tabla usuario y en la tabla pef
        self::editTDU($tdu);
       }
    }

    /*hecha por Juan Ramón, NO ESTA BIEN, si quieres eliminar un deportista se hace un delete desde la tabla usuario y por el cascade se borra de todos los sitios. Además si le pasas el dni ya sabes de que usuario se trata para que lo recoges con un SLECT¿?¿?¿?¿? NO TIENE SENTIDO*/
    /*
    public function deleteTDU($dni)
    {
        if($this->esAdministrador())
        {
            $stmt = $this->db->prepare("SELECT * FROM tdu WHERE dni=?");
            $stmt-> execute(array($dni));
            $deportistaTDU_db = $stmt->fetch(PDO::FETCH_ASSOC);
            if($deportistaTDU_db != null)
            {
                $stmt = $this->db->prepare("DELETE from tdu WHERE dni=?");
                $stmt->execute(array($dni));
                $stmt = $this->db->prepare("DELETE from deportista WHERE dni=?");
                $stmt->execute(array($dni));
                return true;
            }
            return false;
        }
        return false;
    }*/

    public function listarTDU()
    {
        $stmt = $this->db->query("SELECT tdu.*, usuario.nombre, usuario.apellidos FROM `usuario`, `tdu` WHERE tdu.dni = usuario.dni");
        $stmt -> execute();
        $lista = $stmt->fetchAll();
        return $lista;
    }
    /*Hecho por Juan Ramón, ESTA MAL, esta consulta nunca va a funcionar, si haces un select * de unas tablas con inner join hay que hacerlo con el nombreTabla.* si no el SGBD(sistema gestor de base de datos) no puede saber de que tabla obtener los campos*/
    public function findById($dni)
    {
       $stmt = $this->db->prepare("SELECT * FROM tdu t, usuario u WHERE t.dni=? AND t.dni=u.dni");
        $stmt->execute(array($dni));
        $deportistaTDU = $stmt->fetch(PDO::FETCH_ASSOC);
        if($deportistaTDU != null)
        {
            return $deportistaTDU;
        }else
        {
            return NULL;
        }
    }

    /*actualizarUsuario hecho por Álex
    * Actualiza los datos de un tdu en la tabla usuario
    * no comprueba si es administrador por que lo comprobara la funcion desde la que se llama
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

    /*removeTDU hecho por Álex
    * Elimina un tdu SÓLO de la tabla TDU con el fin de agregarlo luego a otra tabla como por ejemplo PEF
    * no comprueba si es administrador por que lo comprobara la funcion desde la que se llama
    */
    private function removeTDU($dni){
        $stmt=$this->db->prepare("DELETE FROM tdu WHERE dni=?");
        $stmt->execute(array($dni));
    }
    /*Esa función esta hecha en el core permisos, no hace falta replicarla, aunque no está mal, no la borro por si se llama en algún lado y evitar errores, hay que tener en cuenta que esta funcion no deberia ser public sino PRIVATE*/
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

}
?>