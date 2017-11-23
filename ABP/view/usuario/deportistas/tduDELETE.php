<?php
require_once(__DIR__."</../../../core/ViewManager.php");

$view = ViewManager::getInstance();
$deportista = $view->getVariable("deportista");
$currentuser = $view->getVariable("currentusername");
$errors = $view->getVariable("errors");
$view->setVariable("title", "Borrar Deportista TDU");
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
                <i class="fa fa-table"></i><?= i18n("Borrar deportista") ?>
            </div>
            <div class="card-body">
                <form name = 'Form' id="form1" action = './index.php?controller=Deportista&amp;action=tduDELETE' method = 'post' onsubmit = 'comprobar()'>
                    <b><?= i18n("DNI") ?>:</b> <?php echo $deportista->getDni(); ?><br>

                    <input type="hidden" name="dni" value="<?php echo $deportista->getDni(); ?>">
                    <input type="hidden" name="borrar" value="ok">
                    <button type="button" onclick="window.location.href='./index.php?controller=Deportista&amp;action=tduDELETE'" class="btn btn-default">Volver</button>
                    <button  type='submit' name='action' value='tduDELETE' class="btn btn-primary"><?= i18n("Borrar") ?></button>
                </form>
            </div>
        </div>
    </div>
</div>