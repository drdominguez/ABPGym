<?php
require_once(__DIR__."/../../core/ViewManager.php");

$view = ViewManager::getInstance();
$estadistica = $view->getVariable("estadistica");
$currentuser = $view->getVariable("currentusername");
$view->setVariable("title", "Ver Detalles Estadistica");

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
                <i class="fa fa-table"></i><?= i18n("Mostrar Detalles Estadística") ?>
            </div>
            <div class="card-body">
                <b><?= i18n("idTabla") ?>:</b> <?php echo $estadistica->getIdTabla(); ?><br>
                <b><?= i18n("idSesion") ?>:</b> <?php echo $estadistica->GetIdSesion(); ?><br>
                <b><?= i18n("Nombre") ?>:</b> <?php echo $estadistica->getNombre(); ?><br>
                <b><?= i18n("Tipo") ?>:</b> <?php echo $estadistica->getTipo(); ?><br>
                <b><?= i18n("Descripcion") ?>: </b> <?php echo $estadistica->getDescripcion(); ?><br>
                <b><?= i18n("Comentario") ?>:</b> <?php echo $estadistica->getComentario(); ?><br>
                <b><?= i18n("Duración") ?>:</b> <?php echo $estadistica->getDuracion(); ?><br>
                <b><?= i18n("Fecha") ?>:</b> <?php echo $estadistica->getFecha(); ?><br>

                <button type="button" onclick="window.location.href='./index.php?controller=Estadistica&amp;action=Listar'" class="btn btn-primary">Volver</button>
            </div>
        </div>
    </div>
</div>