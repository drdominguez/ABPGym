<?php
require_once(__DIR__."/../../core/ViewManager.php");

    $view = ViewManager::getInstance();
    $tabla = $view->getVariable("tabla");
    $ejercicios = $view->getVariable("ejercicios");
    $currentuser = $view->getVariable("currentusername");
    $errors = $view->getVariable("errors");
    $view->setVariable("title", "Ver Tabla");
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
                <i class="fa fa-table"></i><?= i18n("Datos Tabla") ?>
            </div>
            <div class="card-body">
                <b><?= i18n("idTabla") ?>:</b> <?php echo $tabla->getIdTabla(); ?><br>
                <b><?= i18n("nombre") ?>:</b> <?php echo $tabla->getNombre(); ?><br>
                <b><?= i18n("tipo") ?>:</b> <?php echo $tabla->getTipo(); ?><br>
                <b><?= i18n("comentario") ?>:</b> <?php echo $tabla->getComentario(); ?><br>
            </div>
        </div>
        <div class="card mb-3">
            <div class="card-header">
                <i class="fa fa-table"></i><?= i18n("Datos Ejercicios") ?>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" >
                        <thead>
                            <tr>
                                <th><?= i18n("Nombre") ?></th>
                                <th><?= i18n("Descripción") ?></th>
                                <th><?= i18n("Vídeo") ?></th>
                                <th><?= i18n("Imágen") ?></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th><?= i18n("Nombre") ?></th>
                                <th><?= i18n("Descripción") ?></th>
                                <th><?= i18n("Vídeo") ?></th>
                                <th><?= i18n("Imágen") ?></th>
                                <th></th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php foreach($ejercicios as $ejercicio) { ?>
                                <tr>
                                    <td><?php echo $ejercicio->getNombre(); ?></td>
                                    <td><?php echo $ejercicio->getDescripcion(); ?></td>
                                    <td><?php echo $ejercicio->getVideo(); ?></td>
                                    <td><?php echo $ejercicio->getImagen(); ?></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <button type="button" onclick="window.location.href='./index.php?controller=SesionEntrenamiento&amp;action=TablaListar'" class="btn btn-primary">Volver</button> 
    </div>
</div>