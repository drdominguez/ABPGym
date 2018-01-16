<?php
require_once(__DIR__."/../../core/ViewManager.php");

    $view = ViewManager::getInstance();
    $recurso = $view->getVariable("recurso");
    $currentuser = $view->getVariable("currentusername");
    $errors = $view->getVariable("errors");
    $view->setVariable("title", "Ver Recurso");
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
                <i class="fa fa-table"></i><?= i18n("Mostrar Recurso") ?>
            </div>
            <div class="card-body">
                <b><?= i18n("nombreRecurso") ?>:</b> <p><?php echo $recurso->getNombreRecurso(); ?></p>
                <b><?= i18n("observaciones") ?>:</b> <p><?php echo $recurso->getObservaciones(); ?></p>
                <button type="button" onclick="window.location.href='./index.php?controller=Recurso&amp;action=recurso2Listar'" class="btn btn-primary">Volver</button> 
            </div>
        </div>
    </div>
</div>