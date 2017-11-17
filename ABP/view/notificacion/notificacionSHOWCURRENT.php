<?php
//file: view/posts/view.php
require_once(__DIR__."/../../core/ViewManager.php");
$view = ViewManager::getInstance();

$notificacion = $view->getVariable("notificacion");
$currentuser = $view->getVariable("currentusername");
$errors = $view->getVariable("errors");

$view->setVariable("title", "Ver Notificacion");

?>
<div class="content-wrapper">
            <div class="container-fluid">
                <!-- Breadcrumbs-->
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="#"><?= i18n("Gestión de notificaciones") ?></a>
                    </li>
                    <li class="breadcrumb-item active"><?= i18n("Mostrar notificacion") ?></li>
                </ol>
                <!-- Example DataTables Card-->
                <div class="card mb-3">
                    <div class="card-header">
                        <i class="fa fa-table"></i><?= i18n("Mostrar notificacion") ?></div>
                    <div class="card-body">
        <b><?= i18n("idNotificacion") ?>:</b> <?php echo $notificacion->getIdNotificacion(); ?><br>
        <b><?= i18n("dniAdministrador") ?>:</b> <?php echo $notificacion->getDniAdministrador(); ?><br>
        <b><?= i18n("Asunto") ?>:</b> <?php echo $notificacion->getAsunto(); ?><br>
        <b><?= i18n("contenido") ?>:</b> <?php echo $notificacion->getContenido(); ?><br>
        <b><?= i18n("fecha") ?>: </b> <?php echo $notificacion->getFecha(); ?><br>  
            <button type="button" onclick="window.location.href='./index.php?controller=Notificacion&amp;action=NotificacionListar'" class="btn btn-primary">Volver</button> 
            

</div>
            </div>
        </div>
    </div>
</html>