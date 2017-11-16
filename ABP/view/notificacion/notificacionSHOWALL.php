
<?php
    class notificacion_SHOWALL { 

        private $datos;
        private $array; 
        private $volver;

        function __construct($array, $datos, $usuario){
            $this->datos = $datos;
            $this->lista = $array;
            $this->usuario = $usuario;
            $this->render();
        }
        
        function render(){   include '../view/Header.php';
            include '../view/menuLateral.php';
            include '../view/notificacionesMenu.php';
                include '../view/menuSuperior.php';

?>


<div class="content-wrapper">
            <div class="container-fluid">
                <!-- Breadcrumbs-->
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="#">notificacion</a>
                    </li>
                    <li class="breadcrumb-item active">Show All</li>
                </ol>
                <!-- Example DataTables Card-->
                
                <div class="card mb-3">
                    <div class="card-header">
                        <i class="fa fa-table"></i>Mostrar todas las notificaciones</div>
                    <div class="card-body">
                        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" >
                <thead>
                                    <tr>
                                          <?php
                                     foreach($this->lista as $titulo){
?>
                                        <th >
<?php
                                        echo $strings[$titulo];
?>
                                        </th>
<?php
                                    }
    ?>                                  <th>
                                        </th>
                                        
                                    </tr>
                                </thead>
                                <tfoot>
                                     <tr>
                                            <?php
                                     foreach($this->lista as $titulo){
?>
                                        <th>
<?php
                                        echo $strings[$titulo];
?>
                                        </th>
<?php
                                    }
    ?>                                  <th>
                                        </th>
                                       
                                    </tr>
                                </tfoot>
                                <tbody>

<?php
                foreach($this->datos as $datos){
?>
                    <tr>
<?php
                    for($i=0;$i<count($this->lista);$i++){
?>
                        <td>
<?php
                        echo $datos[$this->lista[$i]];
?>
                        </td>
<?php
                    }
                    ?>  
                    <td>
                    <a href='../Controller/notificacion_Controller.php?idNotificacion=<?php echo $datos['idNotificacion']; ?>&dni=<?php echo $usuario->dni;?>&action=SHOWCURRENT'>
                                    <img src='../View/Icons/detalle.png'>
            </a>
                    
                    </td>

                
                    </tr>
<?php
                    }   
?>
            </tbody>
                            </table>
                              </div>
                    </div>
                </div>
<?php

            include '../view/Footer.php';
        
        } //render method

    } //main class
?>