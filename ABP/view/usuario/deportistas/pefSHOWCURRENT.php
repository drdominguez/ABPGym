<?php
require_once(__DIR__."/../../../core/ViewManager.php");

$view = ViewManager::getInstance();
$deportista = $view->getVariable("deportista");
$currentuser = $view->getVariable("currentusername");
$errors = $view->getVariable("errors");
$view->setVariable("title", "Ver Deportista");
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
                <i class="fa fa-table"></i><?= i18n("Mostrar deportista") ?>
            </div>
            <div class="card-body">
                <b><?= i18n("DNI") ?>:</b> <?php echo $deportista["dni"]; ?><br>
                <b><?= i18n("Nombre") ?>:</b> <?php echo $deportista["nombre"]; ?><br>
                <b><?= i18n("Apellidos") ?>:</b> <?php echo $deportista["apellidos"]; ?><br>
                <b><?= i18n("Tarjeta") ?>:</b> <?php echo $deportista["tarjeta"]; ?><br>
                <b><?= i18n("Comentario") ?>:</b> <?php echo $deportista["comentarioRivision"]; ?><br>
                <button type="button" onclick="window.location.href='./index.php?controller=Deportista&amp;action=listarPEF'" class="btn btn-primary">Volver</button>
            </div>
        </div>
    </div>
</div>