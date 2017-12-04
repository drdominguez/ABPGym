<?php
require_once(__DIR__."/../../core/ViewManager.php");

    $view = ViewManager::getInstance();
    $notificacion = $view->getVariable("notificacion");
    $tipoUsuario = $view->getVariable("tipoUsuario");
    $usuarios = $view->getVariable("usuarios");
    $currentuser = $view->getVariable("currentusername");
    $errors = $view->getVariable("errors");
    $view->setVariable("title", "Ver Notificacion");
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
                <i class="fa fa-table"></i><?= i18n("Mostrar notificacion") ?>
            </div>
            <div class="card-body">
                <b><?= i18n("idNotificacion") ?>:</b> <?php echo $notificacion->getIdNotificacion(); ?><br>
                <b><?= i18n("dniAdministrador") ?>:</b> <?php echo $notificacion->getDniAdministrador(); ?><br>
                <b><?= i18n("Asunto") ?>:</b> <?php echo $notificacion->getAsunto(); ?><br>
                <b><?= i18n("contenido") ?>:</b> <?php echo $notificacion->getContenido(); ?><br>
                <b><?= i18n("fecha") ?>: </b> <?php echo $notificacion->getFecha(); ?><br>  
                <button type="button" onclick="window.location.href='./index.php?controller=Notificacion&amp;action=NotificacionListar'" class="btn btn-primary">Volver</button> 
            </div>
        </div>
<?php if($tipoUsuario == 'administrador'){?>
        <div class="card mb-3">
            <div class="card-header">
                <i class="fa fa-table"></i><?= i18n("Asignar Tabla") ?>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" >
                        <thead>
                            <tr>
                                <th><?= i18n("DNI") ?></th>
                                <th><?= i18n("Nombre") ?></th>
                                <th><?= i18n("Apellidos") ?></th>
                                <th>Detalle</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th><?= i18n("DNI") ?></th>
                                <th><?= i18n("Nombre") ?></th>
                                <th><?= i18n("Apellidos") ?></th>
                                <th>Detalle</th>

                            </tr>
                        </tfoot>
                        <tbody>
<?php
                        foreach($usuarios as $usuario)
                        {
?>
                            <tr>
                                    <td><?php echo $usuario->getDni(); ?></td>
                                    <td><?php echo $usuario->getNombre(); ?></td>
                                    <td><?php echo $usuario->getApellidos(); ?></td>
                                    <td>
                                        <a href=''><img src='./view/Icons/detalle.png'>
                                        </a>
                                    </td>
                            </tr>
<?php
                        }   
?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
             <?php } ?>
    </div>
</div>