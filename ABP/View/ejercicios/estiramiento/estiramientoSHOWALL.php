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
                                        <th><?= i18n("Ver") ?></th>
                                        <th><?= i18n("Eitar") ?></th>
                                        <th><?= i18n("Eliminar") ?></th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    <?php if(!empty($listaEstiramientos)){ ?>
                                    <?php foreach($listaEstiramientos as $estiramiento){ ?>
                                        <tr>
                                            <td><?php echo $estiramiento["idEjercicio"]; ?></td>
                                            <td><?php echo $estiramiento["nombre"]; ?></td>
                                            <td><?php echo $estiramiento["descripcion"]; ?></td>
                                            <td><?php echo $estiramiento["tiempo"]; ?></td>
                                            <td><?php echo $estiramiento["unidad"]; ?></td>
                                            <td>
                                                <a href='./index.php?controller=Ejercicio&amp;action=estiramientoVer&amp;idEjercicio=<?php echo $estiramiento["idEjercicio"];?>'><img src='./view/Icons/detalle.png'>
                                                </a>
                                            </td>
                                            <td>
                                                <a href=''><img src='./view/Icons/edit.png'>
                                                </a>
                                            </td>
                                            <td>
                                                <a href='./index.php?controller=Ejercicio&amp;action=estiramientoRemove&amp;idEjercicio=<?php echo $estiramiento["idEjercicio"];?>'><img src='./view/Icons/delete.png'>
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