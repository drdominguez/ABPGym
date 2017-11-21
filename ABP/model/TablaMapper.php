<?php

require_once(__DIR__."/../core/Access_DB.php");
require_once(__DIR__."/Tabla.php");

Class TablaMapper
{
    protected $db;
    protected $idTabla;

    public function __construct()
    {
        $this->db=PDOConnection::getInstance();
    }
    


    public function add($tabla,$ejercicios)
    {
        $stmt = $this->db->prepare("INSERT INTO tabla(tipo,comentario,nombre) VALUES (?,?,?)");
        if($this->esSuperusuario())
        {
            $stmt->execute(array($tabla->getTipo(),$tabla->getComentario(),$tabla->getNombre()));
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

    public function edit($tabla,$ejercicios,$idTabla)
        {
            $stmt = $this->db->prepare("SELECT * FROM tabla WHERE idTabla =?");
            $stmt->execute(array($idTabla));
            $tablaDB = $stmt->fetch(PDO::FETCH_ASSOC);
            if($tablaDB == null){
                return false;
            }else{
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
            }
        }


    public function listar()
    {
        $stmt = $this->db->query("SELECT * from tabla");
        $tablas_db = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $tablas = array();
        foreach ($tablas_db as $tabla) 
        {
            array_push($tablas, new Tabla($tabla['idTabla'],$tabla['tipo'],$tabla['comentario'],$tabla['nombre']));
        }
        return $tablas;
    }



    public function listarEjercicios()
    {
        if($this->esAdministrador())
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
        $stmt = $this->db->prepare("DELETE from tabla WHERE idTabla=?");
        $stmt->execute(array($idTabla));
        return true;
    }




    protected function esAdministrador()
    {
        $stmt= $this->db->prepare("SELECT dniAdministrador FROM administrador WHERE dniAdministrador=?");
        $stmt->execute(array($_SESSION["currentuser"]));
        if ($stmt->fetchColumn()>0)
        {
            return true;
        }
        return false;
    }



    protected function esSuperusuario()
    {
        $stmt= $this->db->prepare("SELECT dniSuperUsuario FROM superusuario WHERE dniSuperUsuario=?");
        $stmt-> execute(array($_SESSION["currentuser"]));
        if ($stmt->fetchColumn()>0)
        {
            return true;
        }
        return false;
    }
}
?>
