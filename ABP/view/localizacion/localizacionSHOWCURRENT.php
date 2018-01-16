<?php
require_once(__DIR__."/../../core/ViewManager.php");

    $view = ViewManager::getInstance();

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
                <i class="fa fa-table"></i><?= i18n("Ver Localización") ?>
            </div>
            <div class="card-body">
                <b><?= i18n("Calle") ?>:</b> <p><?php echo "Avenida de Marín"; ?></p>
                <b><?= i18n("Número") ?>:</b> <p><?php echo "9"; ?></p>
                <b><?= i18n("Provincia") ?>:</b> <p><?php echo "Ourense"; ?></p>
                <b><?= i18n("Comunidad Autónoma") ?>:</b> <p><?php echo "Galicia"; ?></p>
                <b><?= i18n("Pais") ?>:</b><p> <?php echo "España"; ?></p>

                <button type="button" onclick="window.location.href='./index.php?controller=main&action=index'" class="btn btn-primary"><?= i18n("Volver") ?></button> 
            </div>
        </div>
    </div>
</div>