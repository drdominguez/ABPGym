
<?php 

require_once(__DIR__."/../../core/ViewManager.php");
$view = ViewManager::getInstance();

$notificaciones = $view->getVariable("notificaciones");
$currentuser = $view->getVariable("currentusername");

$view->setVariable("title", "Notificaciones");

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
                                        <th>Asunto</th>
                                        <th>Contenido</th>
                                        <th>Fecha</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tfoot>
                                     <tr>
                                        <th>Asunto</th>
                                        <th>Contenido</th>
                                        <th>Fecha</th>
                                        <th></th>
                                    </tr>
                                </tfoot>
                                <tbody>

<?php
                foreach($notificaciones as $notificacion){
?>
                    <tr>
                        <td>
                            <?php echo $notificacion->getAsunto(); ?>
                        </td>
                        <td>
                            <?php echo $notificacion->getContenido(); ?>
                        </td>
                        <td>
                            <?php echo $notificacion->getFecha(); ?>
                        </td>
<?php
                    ?>  
                    <td>
                    <a href='./index.php?controller=Notificacion&amp;action=NotificacionView&amp;idNotificacion=<?php echo $notificacion->getIdNotificacion();?>'>
                                    <img src='./view/Icons/detalle.png'>
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
      
     //render method
 //main class
?>