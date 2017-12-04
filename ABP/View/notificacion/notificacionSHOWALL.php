<?php
    require_once(__DIR__."/../../core/ViewManager.php");

    $view = ViewManager::getInstance();
    $notificaciones = $view->getVariable("notificaciones");
    $currentuser = $view->getVariable("currentusername");
    $view->setVariable("title", "Notificaciones");
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
                <i class="fa fa-table"></i><?= i18n("Mostrar todas las notificaciones") ?>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" >
                        <thead>
                            <tr>
                                <th><?= i18n("fecha") ?></th>
                                <th><?= i18n("Asunto") ?></th>
                                <th><?= i18n("contenido") ?></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th><?= i18n("fecha") ?></th>
                                <th><?= i18n("Asunto") ?></th>
                                <th><?= i18n("contenido") ?></th>
                                <th></th>
                            </tr>
                        </tfoot>
                        <tbody>

                        <?php foreach($notificaciones as $notificacion){ ?>
                            <tr>
                                <td><?php echo $notificacion->getFecha(); ?></td>
                                <td><?php echo $notificacion->getAsunto(); ?></td>
                                <td><?php echo $notificacion->getContenido(); ?></td>
                                <td>
                                    <a href='./index.php?controller=Notificacion&amp;action=NotificacionView&amp;idNotificacion=<?php echo $notificacion->getIdNotificacion();?>'><img src='./view/Icons/detalle.png'>
                                    </a>
                                </td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>