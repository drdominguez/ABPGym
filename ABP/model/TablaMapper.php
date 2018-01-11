<?php

require_once(__DIR__."/../core/Access_DB.php");
require_once(__DIR__."/Tabla.php");
require_once(__DIR__."/EjercicioMuscular.php");
require_once(__DIR__."/EjercicioCardio.php");
require_once(__DIR__."/EjercicioEstiramiento.php");
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

    public function addEstandar($tabla,$estiramientos,$musculares,$cardios,$array_estiramientos,$array_musculares,$array_cardios)
    {
        $stmt = $this->db->prepare("INSERT INTO tabla(tipo,comentario,nombre,dniSuperUsuario) VALUES (?,?,?,?)");
        if($this->permisos->esSuperusuario())
        {
            $stmt->execute(array('estandar',$tabla->getComentario(),$tabla->getNombre(),$_SESSION['currentuser']));
            $this->idTabla= $this->db->lastInsertId();

            foreach ($cardios as $cardio)
            {
                $tiempo_cardio= $array_cardios["tiempo_" . $cardio];
                $distancia_cardio=$array_cardios["distancia_" . $cardio];

                $stmt = $this->db->prepare("INSERT INTO cardio_tabla(idCardio,idTabla,tiempo,distancia) VALUES (?,?,?,?)");
                $stmt->execute(array($cardio, $this->idTabla,$tiempo_cardio,$distancia_cardio));
            }

             foreach ($musculares as $muscular)
            {
                $carga_muscular= $array_musculares["carga_" . $muscular];
                $repeticiones_muscular=$array_musculares["repeticiones_" . $muscular];

                $stmt = $this->db->prepare("INSERT INTO muscular_tabla(idMuscular,idTabla,carga,repeticiones) VALUES (?,?,?,?)");
                $stmt->execute(array($muscular,$this->idTabla,$carga_muscular,$repeticiones_muscular));
            }

             foreach ($estiramientos as $estiramiento)
            {
                $tiempo_estiramiento= $array_estiramientos["tiempo_" . $estiramiento];


                $stmt = $this->db->prepare("INSERT INTO estiramiento_tabla(idEstiramiento,idTabla,tiempo) VALUES (?,?,?)");
                $stmt->execute(array($estiramiento, $this->idTabla,$tiempo_estiramiento));
            }
            return true;
        }else
        {
            return false;
        }
    }

  public function addPersonalizada($tabla,$estiramientos,$musculares,$cardios,$array_estiramientos,$array_musculares,$array_cardios,$usuario)
    {
        $stmt = $this->db->prepare("INSERT INTO tabla(tipo,comentario,nombre,dniSuperUsuario) VALUES (?,?,?,?)");
        if($this->permisos->esSuperusuario())
        {
            $stmt->execute(array('personalizada',$tabla->getComentario(),$tabla->getNombre(),$_SESSION['currentuser']));
            $this->idTabla= $this->db->lastInsertId();
            foreach ($cardios as $cardio)
            {
                $tiempo_cardio= $array_cardios["tiempo_" . $cardio];
                $distancia_cardio=$array_cardios["distancia_" . $cardio];
                
                $stmt = $this->db->prepare("INSERT INTO cardio_tabla(idCardio,idTabla,tiempo,distancia) VALUES (?,?,?,?)");
                $stmt->execute(array($cardio, $this->idTabla,$tiempo_cardio,$distancia_cardio));
            }

             foreach ($musculares as $muscular)
            {
                $carga_muscular= $array_musculares["carga_" . $muscular];
                $repeticiones_muscular=$array_musculares["repeticiones_" . $muscular];

                $stmt = $this->db->prepare("INSERT INTO muscular_tabla(idMuscular,idTabla,carga,repeticiones) VALUES (?,?,?,?)");
                $stmt->execute(array($muscular,$this->idTabla,$carga_muscular,$repeticiones_muscular));
            }

             foreach ($estiramientos as $estiramiento)
            {
                $tiempo_estiramiento= $array_estiramientos["tiempo_" . $estiramiento];


                $stmt = $this->db->prepare("INSERT INTO estiramiento_tabla(idEstiramiento,idTabla,tiempo) VALUES (?,?,?)");
                $stmt->execute(array($estiramiento, $this->idTabla,$tiempo_estiramiento));
            }
            $stmt = $this->db->prepare("INSERT INTO superusuario_tabla_deportista (dniSuperUsuario,dniDeportista,idTabla) VALUES (?,?,?)");
            $stmt->execute(array($_SESSION['currentuser'],$usuario,$this->idTabla));
            return true;
        }else
        {
            return false;
        }
    }

    public function edit($tabla,$estiramientos,$musculares,$cardios,$array_estiramientos,$array_musculares,$array_cardios)
        {
            $stmt = $this->db->prepare("SELECT * FROM tabla WHERE idTabla =?");
             if($this->permisos->esSuperusuario())
        {
            $stmt->execute(array($tabla->getIdTabla()));
            $tablaDB = $stmt->fetch(PDO::FETCH_ASSOC);
            if($tablaDB == null){
                return false;
            }else{
                if($tablaDB['dniSuperUsuario']==$_SESSION['currentuser'] || $this->permisos->esAdministrador()){

                    $stmt = $this->db->prepare("UPDATE tabla set nombre=?,comentario=? where idTabla=?");
                    $stmt->execute(array($tabla->getNombre(),$tabla->getComentario(),$tabla->getIdTabla()));
                    $stmt = $this->db->prepare("DELETE from cardio_tabla WHERE idTabla=?");
                    $stmt->execute(array($tabla->getIdTabla()));
                    $stmt = $this->db->prepare("DELETE from estiramiento_tabla WHERE idTabla=?");
                    $stmt->execute(array($tabla->getIdTabla()));
                    $stmt = $this->db->prepare("DELETE from muscular_tabla WHERE idTabla=?");
                    $stmt->execute(array($tabla->getIdTabla()));
                    foreach ($cardios as $cardio)
                {
                    $tiempo_cardio= $array_cardios["tiempo_" . $cardio];
                    $distancia_cardio=$array_cardios["distancia_" . $cardio];

                    $stmt = $this->db->prepare("INSERT INTO cardio_tabla(idCardio,idTabla,tiempo,distancia) VALUES (?,?,?,?)");
                    $stmt->execute(array($cardio, $tabla->getIdTabla(),$tiempo_cardio,$distancia_cardio));
                }

                 foreach ($musculares as $muscular)
                {
                    $carga_muscular= $array_musculares["carga_" . $muscular];
                    $repeticiones_muscular=$array_musculares["repeticiones_" . $muscular];

                    $stmt = $this->db->prepare("INSERT INTO muscular_tabla(idMuscular,idTabla,carga,repeticiones) VALUES (?,?,?,?)");
                    $stmt->execute(array($muscular,$tabla->getIdTabla(),$carga_muscular,$repeticiones_muscular));
                }

                 foreach ($estiramientos as $estiramiento)
                {
                    $tiempo_estiramiento= $array_estiramientos["tiempo_" . $estiramiento];


                    $stmt = $this->db->prepare("INSERT INTO estiramiento_tabla(idEstiramiento,idTabla,tiempo) VALUES (?,?,?)");
                    $stmt->execute(array($estiramiento,$tabla->getIdTabla(),$tiempo_estiramiento));
                }
                    return true;
                }else{
                    return false;
                }
            }
        }
        return false;
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
            array_push($usuarios, new Usuario($usuario['dni'],$usuario['nombre'],$usuario['apellidos'],$usuario['edad'],'',$usuario['email'],$usuario['telefono'],$usuario['fechaAlta'],'',$usuario['fotoperfil']));
        }
        return $usuarios;
    }



    public function listarMuscular()
    {
        if($this->permisos->esSuperusuario())
        {
            $stmt = $this->db->query("SELECT * from muscular m, ejercicio e WHERE m.idEjercicio=e.idEjercicio");
            $muscular_db = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $musculares = array();
            foreach ($muscular_db as $muscular) 
            {
                array_push($musculares, new Ejercicio($muscular['idEjercicio'],$muscular['nombre'],$muscular['descripcion'],$muscular['video'],$muscular['imagen']));
            }
            return $musculares;
        }
    }


    public function listarCardio()
    {
          if($this->permisos->esSuperusuario())
        {
            $stmt = $this->db->query("SELECT * from cardio c, ejercicio e WHERE c.idEjercicio=e.idEjercicio");
            $cardio_db = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $cardios = array();
            foreach ($cardio_db as $cardio) 
            {
                array_push($cardios, new Ejercicio($cardio['idEjercicio'],$cardio['nombre'],$cardio['descripcion'],$cardio['video'],$cardio['imagen']));
            }
            return $cardios;
        }
    }


    public function listarEstiramiento()
    {
          if($this->permisos->esSuperusuario())
        {
            $stmt = $this->db->query("SELECT * from estiramiento est, ejercicio e WHERE est.idEjercicio=e.idEjercicio");
            $estiramientos_db = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $estiramientos = array();
            foreach ($estiramientos_db as $estiramiento) 
            {
                array_push($estiramientos, new Ejercicio($estiramiento['idEjercicio'],$estiramiento['nombre'],$estiramiento['descripcion'],$estiramiento['video'],$estiramiento['imagen']));
            }
            return $estiramientos;
        }
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


    public function findMuscularesById($idTabla)
    {
        $stmt = $this->db->prepare("SELECT idMuscular,carga,repeticiones FROM muscular_tabla WHERE idTabla=?");
        $stmt->execute(array($idTabla));
        $ejercicios_db = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $tabla_ejercicios= array();
        if($ejercicios_db != null) 
        { 
            foreach($ejercicios_db as $ejercicio_db)
            {
                $stmt = $this->db->prepare("SELECT * FROM ejercicio WHERE idEjercicio=?");
                $stmt->execute(array($ejercicio_db['idMuscular']));
                $ejercicio2_db = $stmt->fetch(PDO::FETCH_ASSOC);
                $ejercicio = new EjercicioMuscular($ejercicio2_db["idEjercicio"],$ejercicio2_db["nombre"],$ejercicio2_db["descripcion"],$ejercicio2_db["video"],$ejercicio2_db["imagen"],$ejercicio_db["carga"],$ejercicio_db["repeticiones"]);
                array_push($tabla_ejercicios, $ejercicio);
            }
                
        }
        return $tabla_ejercicios;
        }
    

        public function findCardiosById($idTabla)
    {
        $stmt = $this->db->prepare("SELECT idCardio,tiempo,distancia FROM cardio_tabla WHERE idTabla=?");
        $stmt->execute(array($idTabla));
        $ejercicios_db = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $tabla_ejercicios= array();
        if($ejercicios_db != null) 
        { 
            foreach($ejercicios_db as $ejercicio_db)
            {
                $stmt = $this->db->prepare("SELECT * FROM ejercicio WHERE idEjercicio=?");
                $stmt->execute(array($ejercicio_db['idCardio']));
                $ejercicio2_db = $stmt->fetch(PDO::FETCH_ASSOC);
                $ejercicio = new EjercicioCardio($ejercicio2_db["idEjercicio"],$ejercicio2_db["nombre"],$ejercicio2_db["descripcion"],$ejercicio2_db["video"],$ejercicio2_db["imagen"],$ejercicio_db["tiempo"],$ejercicio_db["distancia"]);
                array_push($tabla_ejercicios, $ejercicio);
            }
                
        }
        return $tabla_ejercicios;
        }
    


        public function findEstiramientosById($idTabla)
    {
        $stmt = $this->db->prepare("SELECT idEstiramiento,tiempo FROM estiramiento_tabla WHERE idTabla=?");
        $stmt->execute(array($idTabla));
        $ejercicios_db = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $tabla_ejercicios= array();
        if($ejercicios_db != null) 
        { 
            foreach($ejercicios_db as $ejercicio_db)
            {
                $stmt = $this->db->prepare("SELECT * FROM ejercicio WHERE idEjercicio=?");
                $stmt->execute(array($ejercicio_db['idEstiramiento']));
                $ejercicio2_db = $stmt->fetch(PDO::FETCH_ASSOC);
                $ejercicio = new EjercicioEstiramiento($ejercicio2_db["idEjercicio"],$ejercicio2_db["nombre"],$ejercicio2_db["descripcion"],$ejercicio2_db["video"],$ejercicio2_db["imagen"],$ejercicio_db["tiempo"]);
                array_push($tabla_ejercicios, $ejercicio);
            }
                
        }
        return $tabla_ejercicios;
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


    public function delete($idTabla) 
    {
        if($this->permisos->esSuperusuario()){
            if($this->permisos->esAdministrador()){
                $stmt = $this->db->prepare("SELECT * FROM tabla WHERE idTabla=?");
                $stmt->execute(array($idTabla));
            }else{
                $stmt = $this->db->prepare("SELECT * FROM tabla WHERE dniSuperUsuario=? AND idTabla=?");
                $stmt->execute(array($_SESSION['currentuser'],$idTabla));
            }
            
             $ejercicio_db = $stmt->fetch(PDO::FETCH_ASSOC);
             if($ejercicio_db==null){
                return false;
             }
            $stmt = $this->db->prepare("DELETE from tabla WHERE idTabla=?");
            $stmt->execute(array($idTabla));
            return true;
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

    

    public function listarMuscularSelected($idTabla)
    {
            $stmt = $this->db->prepare("SELECT * from muscular_tabla m, ejercicio e WHERE m.idTabla=? AND m.idMuscular=e.idEjercicio");
            $stmt->execute(array($idTabla));
            $ejercicios_db = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $ejercicios = array();
            foreach ($ejercicios_db as $ejercicio) 
            {
                $ejercicio2 = new EjercicioMuscular($ejercicio["idEjercicio"],$ejercicio["nombre"],$ejercicio["descripcion"],$ejercicio["video"],$ejercicio["imagen"],$ejercicio["carga"],$ejercicio["repeticiones"]);
                array_push($ejercicios, $ejercicio2);
            }
            return $ejercicios;
    }

    public function listarCardioSelected($idTabla)
    {
            $stmt = $this->db->prepare("SELECT * from cardio_tabla c, ejercicio e WHERE c.idTabla=? AND c.idCardio=e.idEjercicio");
            $stmt->execute(array($idTabla));
            $ejercicios_db = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $ejercicios = array();
            foreach ($ejercicios_db as $ejercicio) 
            {
                $ejercicio2 = new EjercicioCardio($ejercicio["idEjercicio"],$ejercicio["nombre"],$ejercicio["descripcion"],$ejercicio["video"],$ejercicio["imagen"],$ejercicio["tiempo"],$ejercicio["distancia"]);
                array_push($ejercicios, $ejercicio2);
            }
            return $ejercicios;
    }

    public function listarEstiramientoSelected($idTabla)
    {
            $stmt = $this->db->prepare("SELECT * from estiramiento_tabla m, ejercicio e WHERE m.idTabla=? AND m.idEstiramiento=e.idEjercicio");
            $stmt->execute(array($idTabla));
            $ejercicios_db = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $ejercicios = array();
            foreach ($ejercicios_db as $ejercicio) 
            {
                $ejercicio2 = new EjercicioEstiramiento($ejercicio["idEjercicio"],$ejercicio["nombre"],$ejercicio["descripcion"],$ejercicio["video"],$ejercicio["imagen"],$ejercicio["tiempo"]);
                array_push($ejercicios, $ejercicio2);
            }
            return $ejercicios;
    }

    public function contarTablas(){
        if($this->permisos->esSuperusuario()){
            if($this->permisos->esAdministrador()){
                $stmt = $this->db->query("SELECT COUNT(*) FROM tabla");
            }else{
                $stmt = $this->db->prepare("SELECT COUNT(*) FROM tabla WHERE dniSuperUsuario=?");
                $stmt->execute(array($_SESSION["currentuser"]));
            }
        }else{
            if($this->permisos->esDeportista()){
                $stmt = $this->db->prepare("SELECT COUNT(*) FROM tabla t, superusuario_tabla_deportista s WHERE s.dniDeportista = ? AND t.idTabla=s.idTabla");
                $stmt->execute(array($_SESSION["currentuser"]));
            }else{
                return false;
            }
        }
        $tablas_db = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $tablas = array();
        foreach ($tablas_db as $tabla) 
        {
            array_push($tablas, $tabla['COUNT(*)']);
        }
        return $tablas;
    }

    public function listarUsuariosTabla($idTabla){
        $stmt = $this->db->prepare("SELECT * FROM superusuario_tabla_deportista s, usuario u WHERE s.dniDeportista=u.dni AND s.idTabla=?");
        $stmt->execute(array($idTabla));
        $usuarios_db = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $usuarios = array();
        foreach ($usuarios_db as $usuario) 
        {
            array_push($usuarios, new Usuario($usuario['dni'],$usuario['nombre'],$usuario['apellidos'],$usuario['edad'],'',$usuario['email'],$usuario['telefono'],$usuario['fechaAlta'],'',$usuario['fotoperfil']));
        }
        return $usuarios;
    }

}
?>
