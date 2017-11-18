<?php
//file: view/posts/view.php
require_once(__DIR__."/../../core/ViewManager.php");
$view = ViewManager::getInstance();

$tabla = $view->getVariable("tabla");
$currentuser = $view->getVariable("currentusername");
$errors = $view->getVariable("errors");

$view->setVariable("title", "Borrar Tabla");

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
                        <i class="fa fa-table"></i><?= i18n("Borrar tabla") ?></div>
                    <div class="card-body">
            <form name = 'Form' id="form1" action = './index.php?controller=Tabla&amp;action=TablaDelete' method = 'post' onsubmit = 'comprobar()'>
        <b><?= i18n("idTabla") ?>:</b> <?php echo $tabla->getIdTabla(); ?><br>
        <input type="hidden" name="idTabla" value="<?php echo $tabla->getIdTabla(); ?>">
        <b><?= i18n("nombre") ?>:</b> <?php echo $tabla->getNombre(); ?><br>
        <b><?= i18n("tipo") ?>:</b> <?php echo $tabla->getTipo(); ?><br>
        <b><?= i18n("comentario") ?>:</b> <?php echo $tabla->getComentario(); ?><br>
        <input type="hidden" name="borrar" value="ok">
            <button type="button" onclick="window.location.href='./index.php?controller=Tabla&amp;action=TablaListar'" class="btn btn-default">Volver</button> 
            <button  type='submit' name='action' value='TablaDelete' class="btn btn-primary"><?= i18n("Borrar") ?></button>
            </form>

</div>
            </div>
        </div>
    </div>
</html>