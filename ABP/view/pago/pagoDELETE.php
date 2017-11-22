<?php
require_once(__DIR__."/../../core/ViewManager.php");

$view = ViewManager::getInstance();
$usuario = $view->getVariable("pago");
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
                <i class="fa fa-table"></i><?= i18n("Borrar pago") ?>
            </div>
            <div class="card-body">
                <form name = 'Form' id="form1" action = './index.php?controller=Pago&amp;action=PagoDELETE' method = 'post' onsubmit = 'comprobar()'>
                    <b><?= i18n("IDPago") ?>:</b> <?php echo $pago->getIdPago(); ?><br>
                    <b><?= i18n("DNI") ?>:</b> <?php echo $pago->getDniDeportista(); ?><br>
                    <b><?= i18n("Actividad") ?>:</b> <?php echo $pago->getActividad(); ?><br>
                    <b><?= i18n("Importe") ?>:</b> <?php echo $pago->getImporte(); ?><br>
                    <b><?= i18n("Fecha") ?>: </b> <?php echo $pago->getFecha(); ?><br>
                    <input type="hidden" name="idPago" value="<?php echo $pago->getIdPago(); ?>">
                    <input type="hidden" name="borrar" value="ok">
                    <button type="button" onclick="window.location.href='./index.php?controller=Pago&amp;action=PagoDELETE'" class="btn btn-default">Volver</button>
                    <button  type='submit' name='action' value='PagoDELETE' class="btn btn-primary"><?= i18n("Borrar") ?></button>
                </form>
            </div>
        </div>
    </div>
</div>