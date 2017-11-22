<?php
require_once(__DIR__."/../core/Access_DB.php");
require_once(__DIR__."/UsuarioMapper.php");
require_once(__DIR__."/Usuario.php");
require_once(__DIR__."/SuperUsuario.php");
require_once(__DIR__."/SuperUsuarioMapper.php");

class EntrenadorMapper extends UsuarioMapper
{
       public function __construct(){
        parent::__construct();//inicia el atributo protected $this->db de conexion con la BBDD
    }

public function listar()
    {
        $stmt = $this->db->query("SELECT * from entrenador");
        $entrenadores_db = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $entrenadores = array();

        foreach ($entrenadores_db as $entrenador) 
        {
            $stmt1 = $this->db->prepare("SELECT * from usuario WHERE dni=?");
            $stmt1->execute(array($entrenador['dniEntrenador']));
            $usuario_db = $stmt1->fetch(PDO::FETCH_ASSOC);
            array_push($entrenadores, new Usuario($usuario_db['dni'],$usuario_db['nombre'],$usuario_db['apellidos'],$usuario_db['edad'],null,$usuario_db['email'],$usuario_db['telefono'],$usuario_db['fechaAlta']));
        }
        return $entrenadores;
    }
public function listarUsuarios()
    {
        $stmt = $this->db->query("SELECT * from usuario U, entrenador E WHERE U.dni = E.dniEntrenador");

        $entrenadores_db = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt2 = $this->db->query("SELECT * from usuario");
        $usuarios_db = $stmt2->fetchAll(PDO::FETCH_ASSOC);
        $usuarios = array();
        $entrenadores = array();
        foreach ($entrenadores_db as $entrenador) {
            array_push($entrenadores,new Usuario($entrenador['dni'],$entrenador['nombre'],$entrenador['apellidos'],$entrenador['edad'],NULL,$entrenador['email'],$entrenador['telefono'],$entrenador['fechaAlta']));
        }
        foreach ($usuarios_db as $usuario) 
        {
            $unusuario = new Usuario($usuario['dni'],$usuario['nombre'],$usuario['apellidos'],$usuario['edad'],NULL,$usuario['email'],$usuario['telefono'],$usuario['fechaAlta']);
            if(!in_array($unusuario,$entrenadores)){
                array_push($usuarios,$unusuario);
            }
            
            
         }

        return $usuarios;
    }
function delete($dniEntrenador)
    { 
        if($this->esAdministrador())
        {

            $stmt = $this->db->prepare("SELECT * FROM entrenador WHERE dniEntrenador=?");
            $stmt-> execute(array($dniEntrenador));
            $usuario_db = $stmt->fetch(PDO::FETCH_ASSOC);
            if($usuario_db != null)
            {
                $stmt = $this->db->prepare("DELETE from entrenador WHERE dniEntrenador=?");
                $stmt2 = $this->db->prepare("DELETE from superusuario WHERE dniSuperUsuario=?");
                $stmt2->execute(array($dniEntrenador));
                $stmt->execute(array($dniEntrenador));
            return true;
            }
        return false;
        }
    return false;
    }

public function add($entrenador)
    {
    $stmt = $this->db->prepare("INSERT INTO entrenador(dniEntrenador) VALUES (?)");
    $stmt1 = $this->db->prepare("INSERT INTO superusuario(dniSuperUsuario) VALUES (?)");
    if($this->esAdministrador())
    {   
        $stmt1->execute(array($entrenador->getDniEntrenador()));
        $stmt->execute(array($entrenador->getDniEntrenador()));
        return true;
    }else
        {
            return false;
       }

    }
}
?>