<?php
require_once(__DIR__."/../../core/ViewManager.php");

$view = ViewManager::getInstance();
$pago = $view->getVariable("pago");
$currentuser = $view->getVariable("currentusername");
$errors = $view->getVariable("errors");
$view->setVariable("title", "Ver Pago");
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
                <i class="fa fa-table"></i><?= i18n("Mostrar pago") ?>
            </div>
            <div class="card-body">
                <b><?= i18n("IDPago") ?>:</b> <?php echo $pago->getIdPago(); ?><br>
                <b><?= i18n("DNI") ?>:</b> <?php echo $pago->getDniDeportista(); ?><br>
                <b><?= i18n("IDActividad") ?>:</b> <?php echo $pago->getActividad(); ?><br>
                <b><?= i18n("Importe") ?>:</b> <?php echo $pago->getImporte(); ?><br>
                <b><?= i18n("Fecha") ?>: </b> <?php echo $pago->getFecha(); ?><br>
                <button type="button" onclick="window.location.href='./index.php?controller=Pago&amp;action=PagoListar'" class="btn btn-primary">Volver</button>
            </div>
        </div>
    </div>
</div>