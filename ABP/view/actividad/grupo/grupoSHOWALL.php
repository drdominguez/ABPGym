
<?php 

require_once(__DIR__."/../../core/ViewManager.php");
$view = ViewManager::getInstance();

$actividad = $view->getVariable("actividad");
$currentuser = $view->getVariable("currentusername");

$view->setVariable("title", "Actividades");

?>

<div class="content-wrapper">
            <div class="container-fluid">
                <!-- Breadcrumbs-->
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="#"><?= i18n("Gestión de actividades") ?></a>
                    </li>
                    <li class="breadcrumb-item active"><?= i18n("Ver notificaciones") ?></li>
                </ol>
                <!-- Example DataTables Card-->
                
                <div class="card mb-3">
                    <div class="card-header">
                        <i class="fa fa-table"></i><?= i18n("Mostrar todas las actividades") ?></div>
                    <div class="card-body">
                        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" >
                <thead>
                                    <tr>
                                        <th><?= i18n("Precio") ?></th>
                                        <th><?= i18n("Nombre") ?></th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tfoot>
                                     <tr>
                                        <th><?= i18n("Precio") ?></th>
                                        <th><?= i18n("Nombre") ?></th>
                                        <th></th>
                                    </tr>
                                </tfoot>
                                <tbody>

<?php
                foreach($actividades as $actividad){
?>
                    <tr>
                        <td>
                            <?php echo $actividad->getPrecio(); ?>
                        </td>
                        <td>
                            <?php echo $actividad->getNombre(); ?>
                        </td>
<?php
                    ?>  
                    <td>
                    <a href='./index.php?controller=Actividad&amp;action=ActividadView&amp;idActividad=<?php echo $notificacion->getIdActividad();?>'>
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
