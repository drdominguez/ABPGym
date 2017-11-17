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
                        <a href="#">notificacion</a>
                    </li>
                    <li class="breadcrumb-item active">Show Current</li>
                </ol>
                <!-- Example DataTables Card-->
                <div class="card mb-3">
                    <div class="card-header">
                        <i class="fa fa-table"></i> Mostrar una notificación</div>
                    <div class="card-body">
        <b>ID Notificacion:</b> <?php echo $notificacion->getIdNotificacion(); ?><br>
        <b>DNI Administrador:</b> <?php echo $notificacion->getDniAdministrador(); ?><br>
        <b>Asunto:</b> <?php echo $notificacion->getAsunto(); ?><br>
        <b>Contenido:</b> <?php echo $notificacion->getContenido(); ?><br>
        <b>Fecha: </b> <?php echo $notificacion->getFecha(); ?><br>  
            <button type="button" onclick="window.location.href='./index.php?controller=Notificacion&amp;action=NotificacionListar'" class="btn btn-primary">Volver</button> 
            

</div>
            </div>
        </div>
    </div>
</html>