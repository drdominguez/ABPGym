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
                $stmt = $this->db->prepare("SELECT dniDeportista from entrenador_deportista WHERE dniEntrenador=?");
                $stmt->execute(array($_SESSION['currentuser']));
            }else{
            $stmt = $this->db->prepare("SELECT t.idTabla, t.tipo, t.comentario as descripcion, t.nombre,
                                                         s.idSesionEntrenamiento, s.comentario as coment, s.duracion, s.fecha,
                                                         s.dniDeportista
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
            if($this->permisos->esSuperusuario()){
                array_push($estadisticas, $estadistica['dniDeportista']);
            }else {
                array_push($estadisticas, new Estadistica($estadistica['idTabla'], $estadistica['idSesionEntrenamiento'],
                    $estadistica['nombre'], $estadistica['tipo'], $estadistica['descripcion'], $estadistica['coment'],
                    $estadistica['duracion'], $estadistica['fecha'], $estadistica['dniDeportista']));
            }
        }
        return $estadisticas;
    }

    public function listarDeportista($dni){
        $stmt = $this->db->prepare("SELECT t.idTabla, t.tipo, t.comentario as descripcion, t.nombre,
                                                         s.idSesionEntrenamiento, s.comentario as coment, s.duracion, s.fecha,
                                                         s.dniDeportista
                                                        from tabla t, sesionentrenamiento s,
                                                            sesionentrenamiento_tabla st 
                                                            WHERE t.idTabla = st.idTabla 
                                                            AND s.idSesionEntrenamiento = st.idSesionEntrenamiento
                                                            AND dniDeportista=?");
        $stmt->execute(array($dni));

        $estadisticas_db = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $estadisticas = array();
        foreach ($estadisticas_db as $estadistica)
        {
                array_push($estadisticas, new Estadistica($estadistica['idTabla'], $estadistica['idSesionEntrenamiento'],
                    $estadistica['nombre'], $estadistica['tipo'], $estadistica['descripcion'], $estadistica['coment'],
                    $estadistica['duracion'], $estadistica['fecha'], $estadistica['dniDeportista']));
        }
        return $estadisticas;
    }


    public function mostrarEstadistica($idTabla, $idSesion){
        $stmt = $this->db->prepare("SELECT t.idTabla, t.tipo, t.comentario as descripcion, t.nombre,
                                                         s.idSesionEntrenamiento, s.comentario as coment, s.duracion, s.fecha,
                                                         s.dniDeportista
                                                        from tabla t, sesionentrenamiento s,
                                                            sesionentrenamiento_tabla st 
                                                            WHERE t.idTabla = st.idTabla 
                                                            AND s.idSesionEntrenamiento = st.idSesionEntrenamiento
                                                            AND t.idTabla = ? AND s.idSesionEntrenamiento = ?");

        $stmt->execute(array($idTabla,$idSesion));
        $estadistica = $stmt->fetch(PDO::FETCH_ASSOC);


        return new Estadistica($estadistica['idTabla'],$estadistica['idSesionEntrenamiento'],
            $estadistica['nombre'],$estadistica['tipo'],$estadistica['descripcion'],$estadistica['coment'],
            $estadistica['duracion'],$estadistica['fecha'],$estadistica['dniDeportista']);

    }
}
?>
