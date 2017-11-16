<meta http-equiv="Content-Type" content="text/html"; charset="utf-8"/>

<?php
    class usuario_SHOWALL { 

        private $datos;
        private $array; 
        private $volver;

        function __construct($array, $datos){
            $this->datos = $datos;
            $this->lista = $array;
            $this->render();
        }
                
        function render(){  
           include '../view/Header.php';
            include '../view/menuLateral.php';
             include '../view/notificacionesMenu.php';
                include '../view/menuSuperior.php';
           
?>
<div class="content-wrapper">
            <div class="container-fluid">
                <!-- Breadcrumbs-->
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="../Controller/usuario_Controller.php"><?php echo $strings['Usuarios'] ?></a>
                    </li>
                    <li class="breadcrumb-item active"><?php echo $strings['Ver todos los usuarios'] ?></li>
                </ol>
                <!-- Example DataTables Card-->
                <div class="card mb-3">
                    <div class="card-header">
                        <i class="fa fa-table"></i> <?php echo $strings['Mostrar todos los usuarios']; ?></div>
                    <div class="card-body">
                        <div class="table-responsive">
             <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
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
                                        <th>
                                        </th>
                                        <th>
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
                                        <th>
                                        </th>
                                        <th>
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
                    if($_SESSION['login'] != strtoupper($datos['dni'])){
?>                  
                    <td>
                    <a href='../Controller/usuario_Controller.php?dni=<?php echo $datos['dni']; ?>&action=EDIT'>
                                    <img src='../View/Icons/edit.png'>
                    
                    </a>
                            
                    </td>

                    <td>
                    <a href='../Controller/usuario_Controller.php?dni=<?php echo $datos['dni']; ?>&action=DELETE'>
                                    <img src='../View/Icons/delete.png'>
                    </a>
                    
                    </td>
        <?php }else{ ?>

                        <td>
                        </td>
                        <td>
                        </td>
                      
<?php

                    }  
                    ?>  
                    <td>
                    <a href='../Controller/usuario_Controller.php?dni=<?php echo $datos['dni']; ?>&action=SHOWCURRENT'>
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