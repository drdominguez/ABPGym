<?php
require_once(__DIR__."/../../core/ViewManager.php");

    $view = ViewManager::getInstance();
    $actividad = $view->getVariable("actividad");
    $recurso = $view->getVariable("nombreInstalación");
    $currentuser = $view->getVariable("currentusername");
    $errors = $view->getVariable("errors");
    $view->setVariable("title", "Ver Actividad");
    $monitorAsignado = $view->getVariable("monitorAsignado");

?>
<script type="text/javascript">
    function dniEntrenador(dni){
        document.getElementById("dni").value=dni;
    }
</script> 
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
                <b><?= i18n("plazas") ?>: </b> <?php echo $actividad->getPlazas(); ?><br> 
                <b><?= i18n("dia") ?>:</b> <?php echo $actividad->getHorario()->getDia(); ?><br>
                <b><?= i18n("hora") ?>:</b> <?php echo $actividad->getHorario()->getHora(); ?><br>                
                <b><?= i18n("fechaInicio") ?>:</b> <?php echo $actividad->getHorario()->getFechaInicio(); ?><br>
                <b><?= i18n("fechaFin") ?>: </b> <?php echo $actividad->getHorario()->getFechaFin(); ?><br>
                <b><?= i18n("Dni Monitor") ?>: </b> <?php echo $monitorAsignado[0]['dni'] ; ?><br>
                <b><?= i18n("Nombre Monitor") ?>: </b> <?php echo $monitorAsignado[0]['nombre'] ; ?><br>
                <b><?= i18n("Apellidos Monitor") ?>: </b> <?php echo $monitorAsignado[0]['apellidos'] ; ?><br>

                <button type="button" onclick="window.location.href='./index.php?controller=Actividad&amp;action=ActividadListar'" class="btn btn-primary">Volver</button> 
            </div>
        </div>
    </div>
</div>