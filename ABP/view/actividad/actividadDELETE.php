<?php
    require_once(__DIR__."/../../core/ViewManager.php");

    $view = ViewManager::getInstance();
    $actividad = $view->getVariable("actividad");
    $horario = $view->getVariable("horario");
    $recurso = $view->getVariable("nombreInstalación");
    $currentuser = $view->getVariable("currentusername");
    $errors = $view->getVariable("errors");
    $view->setVariable("title", "Borrar Actividad");
    $monitorAsignado = $view->getVariable("monitorAsignado");
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
                <i class="fa fa-table"></i><?= i18n("Borrar Actividad") ?>
            </div>
            <div class="card-body">
                <form name = 'Form' id="form1" action = './index.php?controller=Actividad&amp;action=ActividadDelete' method = 'post' onsubmit = 'comprobar()'>
                    <b><?= i18n("idActividad") ?>:</b> <p> <?php echo $actividad->getIdActividad(); ?></p>
                    <input type="hidden" name="idActividad" value="<?php echo $actividad->getIdActividad(); ?>">
                    <b><?= i18n("nombre") ?>:</b> <p><?php echo $actividad->getNombre(); ?></p>
                    <b><?= i18n("precio") ?>:</b> <p><?php echo $actividad->getPrecio(); ?></p>               
                    <b><?= i18n("instalaciones") ?>:</b> <p><?php echo $recurso->getNombreRecurso(); ?></p>
                    <b><?= i18n("plazas") ?>: </b> <p><?php echo $actividad->getPlazas(); ?></p>
                    <b><?= i18n("dia") ?>:</b> <p><?php echo $actividad->getHorario()->getDia(); ?></p>
                    <b><?= i18n("hora") ?>:</b> <p><?php echo $actividad->getHorario()->getHora(); ?></p>                
                    <b><?= i18n("fechaInicio") ?>:</b> <p><?php echo $actividad->getHorario()->getFechaInicio(); ?></p>
                    <b><?= i18n("fechaFin") ?>: </b> <p><?php echo $actividad->getHorario()->getFechaFin(); ?></p>p> 
                    <b><?= i18n("Dni Monitor") ?>: </b><p> <?php echo $monitorAsignado[0]['dni'] ; ?></p>
                    <b><?= i18n("Nombre Monitor") ?>: </b> <p><?php echo $monitorAsignado[0]['nombre'] ; ?></p>
                    <b><?= i18n("Apellidos Monitor") ?>: </b> <p><?php echo $monitorAsignado[0]['apellidos'] ; ?></p> 

                    <input type="hidden" name="borrar" value="ok">
                    <button type="button" onclick="window.location.href='./index.php?controller=Actividad&amp;action=actividadListar'" class="btn btn-default">Volver</button> 
                    <button  type='submit' name='action' value='actividadDelete' class="btn btn-primary"><?= i18n("Borrar") ?></button>
                </form>
            </div>
        </div>
    </div>
</div>