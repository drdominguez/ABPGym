<?php
    require_once(__DIR__."/../../core/ViewManager.php");

    $view = ViewManager::getInstance();
    $actividad = $view->getVariable("actividad");
    $recurso = $view->getVariable("nombreInstalación");
    $currentuser = $view->getVariable("currentusername");
    $errors = $view->getVariable("errors");
    $view->setVariable("title", "Borrar Actividad");
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
                    <b><?= i18n("idActividad") ?>:</b> <?php echo $actividad->getIdActividad(); ?><br>
                    <input type="hidden" name="idActividad" value="<?php echo $actividad->getIdActividad(); ?>">
                    <b><?= i18n("nombre") ?>:</b> <?php echo $actividad->getNombre(); ?><br>
                    <b><?= i18n("precio") ?>:</b> <?php echo $actividad->getPrecio(); ?><br>                
                    <b><?= i18n("instalaciones") ?>:</b> <?php echo $recurso->getNombreRecurso(); ?><br>
<?php if($actividad->getPlazas()!=null){?>
                     <b><?= i18n("plazas") ?>: </b> <?php echo $actividad->getPlazas(); ?><br> 
<?php }?> 
                    <input type="hidden" name="borrar" value="ok">
                    <button type="button" onclick="window.location.href='./index.php?controller=Actividad&amp;action=actividadListar'" class="btn btn-default">Volver</button> 
                    <button  type='submit' name='action' value='actividadDelete' class="btn btn-primary"><?= i18n("Borrar") ?></button>
                </form>
            </div>
        </div>
    </div>
</div>