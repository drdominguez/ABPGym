<?php
require_once(__DIR__."/../core/Access_DB.php");
require_once(__DIR__."/Recurso.php");

class RecursoMapper2{
    protected $db;
    /**
    *el contructor obtiene la conexion con la base de datos del core
    **/
    public function __construct() {
        $this->db = PDOConnection::getInstance();
    }

    public function listar(){

            $stmt = $this->db->query("SELECT * from recursos");
            $recursos_db = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $recursos = array();

            foreach ($recursos_db as $recurso) {
                array_push($recursos, new Recurso($recurso['idRecurso'],$recurso['nombreRecurso'],$recurso['observaciones']));            
            }
        return $recursos;
        
        }


    public function findById($idRecurso)
    {
        $stmt = $this->db->prepare("SELECT * FROM recursos WHERE idRecurso =?");
        $stmt->execute(array($idRecurso));
        $recurso = $stmt->fetch(PDO::FETCH_ASSOC);
        if($recurso != null) 
            {
            return new Recurso($idRecurso,$recurso['nombreRecurso'],$recurso['observaciones']);
        }
        return NULL;
    }
    
    public function selectRecurso(){
        $stmt= $this->db->query("SELECT * FROM recursos");
        $recursos_db = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $recursos = array();
        foreach ($recursos_db as $recurso) 
        {
            array_push($recursos, new Recurso($recurso['idRecurso'],$recurso['nombreRecurso'],$recurso['observaciones']));
        }
        return $recursos;
    }

   
}//fin de clase
?> 