<?php 
require_once(__DIR__."/../../core/ViewManager.php");

    $view = ViewManager::getInstance();
    $tablas = $view->getVariable("tablas");
    $currentuser = $view->getVariable("currentusername");
    $view->setVariable("title", "Tablas");
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
                <i class="fa fa-table"></i><?= i18n("Mostrar todas las tablas") ?>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" >
                        <thead>
                            <tr>
                                <th><?= i18n("nombre") ?></th>
                                <th><?= i18n("tipo") ?></th>
                                <th><?= i18n("comentario") ?></th>
                                <th><?= i18n("Ver") ?></th>
                                <th><?= i18n("Realizar") ?></th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th><?= i18n("nombre") ?></th>
                                <th><?= i18n("tipo") ?></th>
                                <th><?= i18n("comentario") ?></th>
                                <th><?= i18n("Ver") ?></th>
                                <th><?= i18n("Realizar") ?></th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php foreach($tablas as $tabla) { ?>
                                <tr>
                                    <td><?php echo $tabla->getNombre(); ?></td>
                                    <td><?php echo $tabla->getTipo(); ?></td>
                                    <td><?php echo $tabla->getComentario(); ?></td>
                                    <td>
                                        <a href='./index.php?controller=SesionEntrenamiento&amp;action=TablaView&amp;idTabla=<?php echo $tabla->getIdTabla();?>'><img src='./view/Icons/detalle.png'>
                                        </a>
                                    </td>
                                    <td>
                                        <a href='./index.php?controller=Tabla&amp;action=TablaEDIT&amp;idTabla=<?php echo $tabla->getIdTabla();?>'><img src='./view/Icons/play.png'>
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