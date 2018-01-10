<?php
require_once(__DIR__."/../../core/ViewManager.php");

$view = ViewManager::getInstance();
$pago = $view->getVariable("pago");
$currentuser = $view->getVariable("currentusername");
$errors = $view->getVariable("errors");
$view->setVariable("title", "Borrar Pago");
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
                <i class="fa fa-table"></i><?= i18n("Borrar Pago") ?>
            </div>
            <div class="card-body">
                <form name = 'Form' id="form1" action = './index.php?controller=Pago&amp;action=PagoDELETE' method = 'post' onsubmit = 'comprobar()'>
                    <b><?= i18n("ID del Pago") ?>:</b> <p><?php echo $pago->getIdPago(); ?></p>
                    <b><?= i18n("DNI del Deportista") ?>:</b> <p><?php echo $pago->getDniDeportista(); ?></p>
                    <b><?= i18n("Actividad") ?>:</b><p> <?php echo $pago->getActividad(); ?></p>
                    <b><?= i18n("Importe") ?>:</b> <p><?php echo $pago->getImporte(); ?></p>
                    <b><?= i18n("Fecha") ?>: </b> <p><?php echo $pago->getFecha(); ?></p>
                    <input type="hidden" name="idPago" value="<?php echo $pago->getIdPago(); ?>">
                    <input type="hidden" name="borrar" value="ok">
                    <button type="button" onclick="window.location.href='./index.php?controller=Pago&amp;action=PagoListar'" class="btn btn-default"><?= i18n("Volver") ?></button>
                    <button  type='submit' name='action' value='PagoDELETE' class="btn btn-primary"><?= i18n("Borrar") ?></button>
                </form>
            </div>
        </div>
    </div>
</div>