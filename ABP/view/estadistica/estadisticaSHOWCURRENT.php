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
                <b><?= i18n("idTabla") ?>:</b> <p><?php echo $estadistica->getIdTabla(); ?></p>
                <b><?= i18n("idSesion") ?>:</b> <p><?php echo $estadistica->GetIdSesion(); ?></p>
                <b><?= i18n("Nombre") ?>:</b> <p><?php echo $estadistica->getNombre(); ?></p>
                <b><?= i18n("Tipo") ?>:</b> <p><?php echo $estadistica->getTipo(); ?></p>
                <b><?= i18n("Descripcion") ?>: </b> <p><?php echo $estadistica->getDescripcion(); ?></p>
                <b><?= i18n("Comentario") ?>:</b> <p><?php echo $estadistica->getComentario(); ?></p>
                <b><?= i18n("Duración") ?>:</b> <p><?php echo $estadistica->getDuracion(); ?></p>
                <b><?= i18n("Fecha") ?>:</b> <p><?php echo $estadistica->getFecha(); ?></p>

                <button type="button" onclick="window.location.href='./index.php?controller=Estadistica&amp;action=Listar'" class="btn btn-primary"><?= i18n("Volver") ?></button>
            </div>
        </div>
    </div>
</div>