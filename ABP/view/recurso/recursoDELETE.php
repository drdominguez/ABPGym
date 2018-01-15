<?php
    require_once(__DIR__."/../../core/ViewManager.php");

    $view = ViewManager::getInstance();
    $recurso = $view->getVariable("recurso");
    $errors = $view->getVariable("errors");
    $view->setVariable("title", "Borrar Recurso");
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
                <i class="fa fa-table"></i><?= i18n("Borrar Recurso") ?>
            </div>
            <div class="card-body">
                <form name = 'Form' id="form1" action = './index.php?controller=Recurso&amp;action=RecursoDelete' method = 'post' onsubmit = 'comprobar()'>
                    <b><?= i18n("idRecurso") ?>:</b> <p><?php echo $recurso->getIdRecurso(); ?></p>
                    <input type="hidden" name="idRecurso" value="<?php echo $recurso->getIdRecurso(); ?>">
                    <b><?= i18n("nombre") ?>:</b> <p><?php echo $recurso->getNombreRecurso(); ?></p>
                    <b><?= i18n("observaciones") ?>:</b> <p><?php echo $recurso->getObservaciones(); ?></p>
                    <input type="hidden" name="borrar" value="ok">
                    <button type="button" onclick="window.location.href='./index.php?controller=Recurso&amp;action=recursoListar'" class="btn btn-default">Volver</button> 
                    <button  type='submit' name='action' value='recursoDelete' class="btn btn-primary"><?= i18n("Borrar") ?></button>
                </form>
            </div>
        </div>
    </div>
</div>