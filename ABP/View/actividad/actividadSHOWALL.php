<?php 

require_once(__DIR__."/../../core/ViewManager.php");

$view = ViewManager::getInstance();
$actividades = $view->getVariable("actividades");
$currentuser = $view->getVariable("currentusername");
$view->setVariable("title", "Actividades");
?>

<div class="content-wrapper">
    <div class="container-fluid">
         <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <div id="flash"><?= $view->popFlash() ?></div>
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
            <tbody>

<?php
                foreach($actividades as $actividad){
?>
                    <tr>
                        <td><?php echo $actividad->getPrecio(); ?></td>       
                        <td><?php echo $actividad->getNombre(); ?></td>
                    <td>
                   <a href='./index.php?controller=Actividad&amp;action=ActividadView&amp;idActividdad=<?php echo $actividad->getIdActividad();?>'><img src='./view/Icons/detalle.png'>
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
