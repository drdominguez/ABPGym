<?php
    require_once(__DIR__."/../../core/ViewManager.php");

    $view = ViewManager::getInstance();
    $notificaciones = $view->getVariable("notificaciones");
    $tipoUsuario = $view->getVariable("tipoUsuario");
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
                <i class="fa fa-table"></i><?= i18n("Mostrar Todas las Notificaciones") ?>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" >
                        <thead>
                            <tr>
                                <th><?= i18n("Fecha") ?></th>
                                <th><?= i18n("Asunto") ?></th>
                                <th><?= i18n("Contenido") ?></th>
                                <th><?= i18n("Ver") ?></th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th><?= i18n("Fecha") ?></th>
                                <th><?= i18n("Asunto") ?></th>
                                <th><?= i18n("Contenido") ?></th>
                                <th><?= i18n("Ver") ?></th>
                            </tr>
                            </tr>
                        </tfoot>
                        <tbody>

                        <?php foreach($notificaciones as $notificacion){ ?>
                            <tr >
                                <?php if($tipoUsuario != 'administrador' && $notificacion->getVisto() ==0){?>
                                     <td class="tablaNotif" ><?php echo $notificacion->getFecha(); ?></td>
                               <?php }else{ ?>
                                     <td ><?php echo $notificacion->getFecha(); ?></td>
                               <?php  } ?>
                               
                                <td><?php echo $notificacion->getAsunto(); ?></td>
                                <td><?php echo $notificacion->getContenido(); ?></td>
                                <td>
                                    <a href='./index.php?controller=Notificacion&amp;action=NotificacionView&amp;idNotificacion=<?php echo $notificacion->getIdNotificacion();?>'><span id="icon-ver" class="icon-eye-plus"></span>
                                    </a>
                                </td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
         <button type="button" onclick="window.location.href='./index.php?controller=main&action=index'" class="btn btn-primary"><?= i18n("Volver") ?></button> 
    </div>
</div>
