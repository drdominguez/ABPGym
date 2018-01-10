<?php
require_once(__DIR__."/../../core/ViewManager.php");

$view = ViewManager::getInstance();
$pago = $view->getVariable("pago");
$tipoUsuario = $view->getVariable("tipoUsuario");
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
                <i class="fa fa-table"></i><?= i18n("Ver Pago") ?>
            </div>
            <div class="card-body">
                            <?php if($tipoUsuario == 'administrador'){?>
                <b><?= i18n("ID del Pago") ?>:</b> <p><?php echo $pago->getIdPago(); ?></p>
                <?php } ?>
                <b><?= i18n("DNI del Deportista") ?>:</b> <p><?php echo $pago->getDniDeportista(); ?></p>
                <b><?= i18n("Actividad") ?>:</b> <p><?php echo $pago->getActividad(); ?></p>
                <b><?= i18n("Importe") ?>:</b> <p><?php echo $pago->getImporte(); ?> €</p>
                <b><?= i18n("Fecha") ?>: </b> <p><?php echo $pago->getFecha(); ?></p>
                <button type="button" onclick="window.location.href='./index.php?controller=Pago&amp;action=PagoListar'" class="btn btn-primary"><?= i18n("Volver") ?></button>
            </div>
        </div>
    </div>
</div>