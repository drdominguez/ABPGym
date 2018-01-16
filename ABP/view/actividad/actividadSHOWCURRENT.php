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
                <b><?= i18n("idActividad") ?>:</b> <p><?php echo $actividad->getIdActividad(); ?></p>
                <b><?= i18n("Nombre") ?>:</b> <p><?php echo $actividad->getNombre(); ?></p>
                <b><?= i18n("Precio") ?>:</b> <p><?php echo $actividad->getPrecio(); ?></p>
                <b><?= i18n("Instalaciones") ?>:</b><p><?php echo $recurso->getNombreRecurso(); ?></p>
                <b><?= i18n("Plazas") ?>: </b><p> <?php echo $actividad->getPlazas(); ?></p>
                <b><?= i18n("Dia") ?>:</b> <p><?php echo $actividad->getHorario()->getDia(); ?></p>
                <b><?= i18n("Hora") ?>:</b><p> <?php echo $actividad->getHorario()->getHora(); ?></p>
                <b><?= i18n("FechaInicio") ?>:</b> <p><?php echo $actividad->getHorario()->getFechaInicio(); ?></p>
                <b><?= i18n("FechaFin") ?>: </b> <p><?php echo $actividad->getHorario()->getFechaFin(); ?></p>
                <b><?= i18n("DNI Monitor") ?>: </b> <p><?php echo $monitorAsignado[0]['dni'] ; ?></p>
                <b><?= i18n("Nombre Monitor") ?>: </b> <p><?php echo $monitorAsignado[0]['nombre'] ; ?></p>
                <b><?= i18n("Apellidos Monitor") ?>: </b> <p><?php echo $monitorAsignado[0]['apellidos'] ; ?></p>

                <button type="button" onclick="window.location.href='./index.php?controller=Actividad&amp;action=ActividadListar'" class="btn btn-primary">Volver</button> 
            </div>
        </div>
    </div>
</div>