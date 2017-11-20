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
                                        <th></th>
                                        <th></th>
                                        <th></th>
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
                                        <th></th>
                                        <th></th>
                                        <th></th>
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
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                    <?php }} ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
</div>