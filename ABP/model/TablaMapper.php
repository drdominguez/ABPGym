<?php

require_once(__DIR__."/../core/Access_DB.php");
require_once(__DIR__."/Tabla.php");
require_once(__DIR__ . "/../core/permisos.php");


Class TablaMapper
{
    protected $db;
    protected $idTabla;
       private $permisos;

    public function __construct()
    {
        $this->db=PDOConnection::getInstance();
          $this->permisos= new Permisos();
    }
    


    public function addEstandar($tabla,$ejercicios)
    {
        $stmt = $this->db->prepare("INSERT INTO tabla(tipo,comentario,nombre,dniSuperUsuario) VALUES (?,?,?,?)");
        if($this->permisos->esSuperusuario())
        {
            $stmt->execute(array('estandar',$tabla->getComentario(),$tabla->getNombre(),$_SESSION['currentuser']));
            $this->idTabla= $this->db->lastInsertId();
            foreach ($ejercicios as $ejercicio)
            {
                $stmt = $this->db->prepare("INSERT INTO tabla_ejercicios(idTabla,idEjercicio) VALUES (?,?)");
                $stmt->execute(array($this->idTabla,$ejercicio));
            }
            return true;
        }else
        {
            return false;
        }
    }

  public function addPersonalizada($tabla,$ejercicios,$usuario)
    {
        $stmt = $this->db->prepare("INSERT INTO tabla(tipo,comentario,nombre,dniSuperUsuario) VALUES (?,?,?,?)");
        if($this->permisos->esSuperusuario())
        {
            $stmt->execute(array('personalizada',$tabla->getComentario(),$tabla->getNombre(),$_SESSION['currentuser']));
            $this->idTabla= $this->db->lastInsertId();
            foreach ($ejercicios as $ejercicio)
            {
                $stmt = $this->db->prepare("INSERT INTO tabla_ejercicios(idTabla,idEjercicio) VALUES (?,?)");
                $stmt->execute(array($this->idTabla,$ejercicio));
            }
            $stmt = $this->db->prepare("INSERT INTO superusuario_tabla_deportista (dniSuperUsuario,dniDeportista,idTabla) VALUES (?,?,?)");
            $stmt->execute(array($_SESSION['currentuser'],$usuario,$this->idTabla));
            return true;
        }else
        {
            return false;
        }
    }


    public function edit($tabla,$ejercicios,$idTabla)
        {
            $stmt = $this->db->prepare("SELECT * FROM tabla WHERE idTabla =?");
             if($this->permisos->esSuperusuario())
        {
            $stmt->execute(array($idTabla));
            $tablaDB = $stmt->fetch(PDO::FETCH_ASSOC);
            if($tablaDB == null){
                return false;
            }else{
                if($tablaDB['dniSuperUsuario']==$_SESSION['currentuser'] || $this->permisos->esAdministrador()){

                    $stmt = $this->db->prepare("UPDATE tabla set nombre=?,comentario=? where idTabla=?");
                    $stmt->execute(array($tabla->getNombre(),$tabla->getComentario(),$idTabla));
                    $stmt = $this->db->prepare("DELETE from tabla_ejercicios WHERE idTabla=?");
                    $stmt->execute(array($idTabla));
                    foreach ($ejercicios as $ejercicio)
                    {
                    $stmt = $this->db->prepare("INSERT INTO tabla_ejercicios(idTabla,idEjercicio) VALUES (?,?)");
                    $stmt->execute(array($idTabla,$ejercicio));
                    }
                    return true;

                }else{
                    return false;
                }
                
            }
        }
        return false;
        }


    public function asignar($usuario,$idTabla){
        if($this->permisos->esSuperusuario())
        {

            if($this->permisos->esDeportista2($usuario)){    
        $stmt = $this->db->prepare("INSERT INTO superusuario_tabla_deportista (dniSuperUsuario,dniDeportista,idTabla) VALUES (?,?,?)");
        $stmt->execute(array($_SESSION['currentuser'],$usuario,$idTabla));
        return true;
    }else{
        return false;
    }
}else{
    return false;
}
    }

    public function desasignar($usuario,$tabla){
        if($this->permisos->esSuperusuario()){
            if($this->permisos->esDeportista2($usuario)){
                if($tabla->getTipo()=='estandar'){
                    $stmt = $this->db->prepare("DELETE FROM superusuario_tabla_deportista WHERE idTabla=? AND dniDeportista=?");
                    $stmt->execute(array($tabla->getIdTabla(), $usuario));
                    return true;
                }else{
                    $stmt= $this->db->prepare("DELETE FROM tabla WHERE idTabla=?");
                    $stmt->execute(array($tabla->getIdTabla()));
                    return true;
                }
                
            }else{
                return false;
            }
        }else{
            return false;
        }

    }

    public function listar()
    {
        if($this->permisos->esSuperusuario()){
            if($this->permisos->esAdministrador()){
                $stmt = $this->db->query("SELECT * from tabla");
            }else{
                $stmt = $this->db->prepare("SELECT * from tabla WHERE dniSuperUsuario=?");
                $stmt->execute(array($_SESSION['currentuser']));
            }
        }else{
                $stmt = $this->db->prepare("SELECT * from tabla t, superusuario_tabla_deportista st WHERE t.idTabla=st.idTabla AND dniDeportista=?");
                $stmt->execute(array($_SESSION['currentuser']));

        }

            $tablas_db = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $tablas = array();
            foreach ($tablas_db as $tabla) 
            {
                array_push($tablas, new Tabla($tabla['idTabla'],$tabla['tipo'],$tabla['comentario'],$tabla['nombre']));
            }
            return $tablas;
        
    }


    public function listarTablasUsuario($usuario){
        $stmt = $this->db->prepare("SELECT * from tabla t, superusuario_tabla_deportista st WHERE t.idTabla=st.idTabla AND dniDeportista=?");
                $stmt->execute(array($usuario));
                $tablas_db = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $tablas = array();
            foreach ($tablas_db as $tabla) 
            {
                array_push($tablas, new Tabla($tabla['idTabla'],$tabla['tipo'],$tabla['comentario'],$tabla['nombre']));
            }
            return $tablas;
        
    }
    public function listarDeportistas()
    {
        $stmt = $this->db->query("SELECT * from deportista d, usuario u WHERE d.dni=u.dni");
        $usuarios_db = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $usuarios = array();
        foreach ($usuarios_db as $usuario) 
        {
            array_push($usuarios, new Usuario($usuario['dni'],$usuario['nombre'],$usuario['apellidos'],$usuario['edad'],$usuario['email'],$usuario['telefono'],$usuario['fechaAlta']));
        }
        return $usuarios;
    }



    public function listarEjercicios()
    {
        if($this->permisos->esSuperusuario())
        {
            $stmt = $this->db->query("SELECT * from ejercicio");
            $ejercicios_db = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $ejercicios = array();
            foreach ($ejercicios_db as $ejercicio) 
            {
                array_push($ejercicios, new Ejercicio($ejercicio['idEjercicio'],$ejercicio['nombre'],$ejercicio['descripcion'],$ejercicio['video'],$ejercicio['imagen']));
            }
            return $ejercicios;
        }
    }


    public function listarEjerciciosSelected($idTabla)
    {
            $stmt = $this->db->prepare("SELECT idEjercicio from tabla_ejercicios WHERE idTabla=?");
            $stmt->execute(array($idTabla));
            $ejercicios_db = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $ejercicios = array();
            foreach ($ejercicios_db as $ejercicio) 
            {
                array_push($ejercicios, $ejercicio['idEjercicio']);
            }
            return $ejercicios;
    }



    public function findTablaById($idTabla)
    {
        $stmt = $this->db->prepare("SELECT * FROM tabla WHERE idTabla=?");
        $stmt->execute(array($idTabla));
        $tabla = $stmt->fetch(PDO::FETCH_ASSOC);
        if($tabla != null)
         {
            return new Tabla($tabla["idTabla"],$tabla["tipo"],$tabla["comentario"],$tabla["nombre"]);
        }else 
        {
            return NULL;
        }
    }



    public function findEjerciciosById($idTabla)
    {
        $stmt = $this->db->prepare("SELECT idEjercicio FROM tabla_ejercicios WHERE idTabla=?");
        $stmt->execute(array($idTabla));
        $ejercicios_db = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $tabla_ejercicios= array();
        if($ejercicios_db != null) 
        { 
            foreach($ejercicios_db as $ejercicio_db)
            {
                $stmt = $this->db->prepare("SELECT * FROM ejercicio WHERE idEjercicio=?");
                $stmt->execute(array($ejercicio_db['idEjercicio']));
                $ejercicio_db = $stmt->fetch(PDO::FETCH_ASSOC);
                $ejercicio = new Ejercicio($ejercicio_db["idEjercicio"],$ejercicio_db["nombre"],$ejercicio_db["descripcion"],$ejercicio_db["video"],$ejercicio_db["imagen"]);
                array_push($tabla_ejercicios, $ejercicio);
            }
                
        }
        return $tabla_ejercicios;
        }
    



    public function delete($idTabla) 
    {
        if($this->permisos->esSuperusuario()){
            $stmt = $this->db->prepare("SELECT * FROM tabla WHERE dniSuperUsuario=? AND idTabla=?");
             $stmt->execute(array($_SESSION['currentuser'],$idTabla));
             $ejercicio_db = $stmt->fetch(PDO::FETCH_ASSOC);
             if(ejercicio_db==null){
                return false;
             }
            $stmt = $this->db->prepare("DELETE from tabla WHERE idTabla=?");
            $stmt->execute(array($idTabla));
            return true;
        }

    }


}
?>
