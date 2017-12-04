<?php
require_once(__DIR__."/../../core/ViewManager.php");

    $view = ViewManager::getInstance();
    $actividad = $view->getVariable("actividad");
    $recurso = $view->getVariable("nombreInstalación");
    $currentuser = $view->getVariable("currentusername");
    $errors = $view->getVariable("errors");
    $view->setVariable("title", "Ver Actividad");
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
                <i class="fa fa-table"></i><?= i18n("Mostrar Actividad") ?>
            </div>
            <div class="card-body">
                <b><?= i18n("idActividad") ?>:</b> <?php echo $actividad->getIdActividad(); ?><br>
                <b><?= i18n("nombre") ?>:</b> <?php echo $actividad->getNombre(); ?><br>
                <b><?= i18n("precio") ?>:</b> <?php echo $actividad->getPrecio(); ?><br>                
                <b><?= i18n("instalaciones") ?>:</b> <?php echo $recurso->getNombreRecurso(); ?><br>
<?php if($actividad->getPlazas()!=null){?>
                <b><?= i18n("plazas") ?>: </b> <?php echo $actividad->getPlazas(); ?><br> 
<?php }?> 
                <button type="button" onclick="window.location.href='./index.php?controller=Actividad&amp;action=ActividadListar'" class="btn btn-primary">Volver</button> 
            </div>
        </div>
    </div>
</div>