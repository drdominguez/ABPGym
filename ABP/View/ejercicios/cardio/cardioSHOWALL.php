<?php
$view = ViewManager::getInstance();
$listaCardio = $view->getVariable("cardios");
$currentuser = $view->getVariable("currentusername");
$view->setVariable("title", "Estiramientos");
?>
<div class="content-wrapper">
            <div class="container-fluid">
                 <!-- Breadcrumbs-->
                <ol class="breadcrumb">
                    <div id="flash"><?= $view->popFlash()?></div>
                </ol>
                <!-- Example DataTables Card-->
                <div class="card mb-3">
                    <div class="card-header">
                        <i class="fa fa-table"></i><?= i18n("Listado de estiramientos") ?></div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" >
                                <thead>
                                    <tr>
                                        <th><?= i18n("Id") ?></th>
                                        <th><?= i18n("Nombre") ?></th>
                                        <th><?= i18n("Descripción") ?></th>
                                         <th><?= i18n("Tiempo") ?></th>
                                        <th><?= i18n("Unidad") ?></th>
                                        <th><?= i18n("Distancia") ?></th>
                                        <th><?= i18n("Ver") ?></th>
                                        <th><?= i18n("Eitar") ?></th>
                                        <th><?= i18n("Eliminar") ?></th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th><?= i18n("Id") ?></th>
                                        <th><?= i18n("Nombre") ?></th>
                                        <th><?= i18n("Descripción") ?></th>
                                        <th><?= i18n("Tiempo") ?></th>
                                        <th><?= i18n("Unidad") ?></th>
                                        <th><?= i18n("Distancia") ?></th>
                                        <th><?= i18n("Ver") ?></th>
                                        <th><?= i18n("Eitar") ?></th>
                                        <th><?= i18n("Eliminar") ?></th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    <?php if(!empty($listaCardio)){ ?>
                                    <?php foreach($listaCardio as $cardio){ ?>
                                        <tr>
                                            <td><?php echo $cardio["idEjercicio"]; ?></td>
                                            <td><?php echo $cardio["nombre"]; ?></td>
                                            <td><?php echo $cardio["descripcion"]; ?></td>
                                            <td><?php echo $cardio["tiempo"]; ?></td>
                                            <td><?php echo $cardio["unidad"]; ?></td>
                                            <td><?php echo $cardio["distancia"]; ?></td>
                                            <td>
                                                <a href=''><img src='./view/Icons/detalle.png'>
                                                </a></td>
                                            <td>
                                                <a href=''><img src='./view/Icons/edit.png'>
                                                </a>
                                            </td>
                                            <td>
                                                <a href=''><img src='./view/Icons/delete.png'>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php }} ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
</div>