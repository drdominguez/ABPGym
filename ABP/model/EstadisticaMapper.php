<?php

require_once(__DIR__."/../core/Access_DB.php");
require_once(__DIR__."/Estadistica.php");
require_once(__DIR__ . "/../core/permisos.php");


Class EstadisticaMapper
{
    protected $db;
    protected $idTabla;
    private $permisos;

    public function __construct()
    {
        $this->db=PDOConnection::getInstance();
        $this->permisos= new Permisos();
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
            $stmt = $this->db->prepare("SELECT t.idTabla, t. tipo, t.comentario as descripcion, t.nombre,
                                                         s.idSesionEntrenamiento, s.comentario as coment, s.duracion, s.fecha
                                                        from tabla t, sesionentrenamiento s,
                                                            sesionentrenamiento_tabla st 
                                                            WHERE t.idTabla = st.idTabla 
                                                            AND s.idSesionEntrenamiento = st.idSesionEntrenamiento
                                                            AND dniDeportista=?");
            $stmt->execute(array($_SESSION['currentuser']));

        }

        $estadisticas_db = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $estadisticas = array();
        foreach ($estadisticas_db as $estadistica)
        {
            array_push($estadisticas, new Estadistica($estadistica['idTabla'],$estadistica['idSesionEntrenamiento'],$estadistica['nombre'],
                $estadistica['tipo'],$estadistica['descripcion'],$estadistica['coment'],$estadistica['duracion'],$estadistica['fecha']));
        }
        return $estadisticas;

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
}
?>
