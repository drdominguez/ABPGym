<?php
require_once(__DIR__."/../../core/ViewManager.php");

    $view = ViewManager::getInstance();
    $usuario = $view->getVariable("usuario");
    $currentuser = $view->getVariable("currentusername");
    $errors = $view->getVariable("errors");
    $view->setVariable("title", "Ver Entrenador");
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
                <i class="fa fa-table"></i><?= i18n("Mostrar entrenador") ?>
            </div>
            <div class="card-body">
                <b><?= i18n("dni") ?>:</b> <?php echo $usuario->getDni(); ?><br>
                <b><?= i18n("nombre") ?>:</b> <?php echo $usuario->getNombre(); ?><br>
                <b><?= i18n("apellidos") ?>:</b> <?php echo $usuario->getApellidos(); ?><br>
                <b><?= i18n("edad") ?>:</b> <?php echo $usuario->getEdad(); ?><br>
                <b><?= i18n("email") ?>:</b> <?php echo $usuario->getEmail(); ?><br>
                <b><?= i18n("telefono") ?>: </b> <?php echo $usuario->getTelefono(); ?><br> 
                <b><?= i18n("fechaAlta") ?>: </b> <?php echo $usuario->getFecha(); ?><br>  
                <button type="button" onclick="window.location.href='./index.php?controller=Entrenador&amp;action=entrenadorListar'" class="btn btn-primary">Volver</button> 
            </div>
        </div>
    </div>
</div>