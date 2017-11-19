
<?php
$view = ViewManager::getInstance();
$listaEstiramientos = $view->getVariable("estiramientos");
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
                        <i class="fa fa-table"></i><?= i18n("Mostrar todos los Estiramientos") ?></div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" >
                                <thead>
                                    <tr>
                                        <th><?= i18n("Id") ?></th>
                                        <th><?= i18n("Nombre") ?></th>
                                        <th><?= i18n("Descripción") ?></th>
                                        <th><?= i18n("Video") ?></th>
                                        <th><?= i18n("Imagen") ?></th>
                                         <th><?= i18n("Tiempo") ?></th>
                                        <th><?= i18n("Unidad") ?></th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th><?= i18n("Id") ?></th>
                                        <th><?= i18n("Nombre") ?></th>
                                        <th><?= i18n("Descripción") ?></th>
                                        <th><?= i18n("Video") ?></th>
                                        <th><?= i18n("Imagen") ?></th>
                                        <th><?= i18n("Tiempo") ?></th>
                                        <th><?= i18n("Unidad") ?></th>
                                        <th></th>
                                        </tr>
                                </tfoot>
                                <tbody>
                                    <?php foreach($listaEstiramientos as $estiramiento){ ?>
                                        <tr>
                                            <td><?php  $estiramiento["idEjercicio"]; ?></td>
                                            <td><?php  $estiramiento["nombre"]; ?></td>
                                            <td><?php  $estiramiento["descripción"]; ?></td>
                                            <td><?php  $estiramiento["video"]; ?></td>
                                            <td><?php  $estiramiento["imagen"]; ?></td>
                                            <td><?php  $estiramiento["tiempo"]; ?></td>
                                            <td><?php  $estiramiento["unidad"]; ?></td><td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
</div>