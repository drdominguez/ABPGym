<?php
require_once(__DIR__."/../../../core/ViewManager.php");

$view = ViewManager::getInstance();
$deportistas = $view->getVariable("deportistas");
$currentuser = $view->getVariable("currentusername");
$view->setVariable("title", "Deportistas");
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
                <i class="fa fa-table"></i><?= i18n("Mostrar todos los deportistas") ?>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" >
                        <thead>
                        <tr>
                            <th><?= i18n("DNI") ?></th>
                            <th><?= i18n("Nombre") ?></th>
                            <th><?= i18n("Apellidos") ?></th>
                            <th><?= i18n("Editar") ?></th>
                            <th><?= i18n("Borrar") ?></th>
                            <th><?= i18n("Ver") ?></th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th><?= i18n("DNI") ?></th>
                            <th><?= i18n("Nombre") ?></th>
                            <th><?= i18n("Apellidos") ?></th>
                            <th><?= i18n("Editar") ?></th>
                            <th><?= i18n("Borrar") ?></th>
                            <th><?= i18n("Ver") ?></th>
                        </tr>
                        </tfoot>
                        <tbody>

                        <?php foreach($deportistas as $deportista){ ?>
                            <tr>
                                <td><?php echo $deportista["dni"]; ?></td>
                                <td><?php echo $deportista["nombre"]; ?></td>
                                <td><?php echo $deportista["apellidos"]; ?></td>
                                <td>
                                    <a href='./index.php?controller=Deportista&amp;action=DeportistaEDIT&amp;dni=<?php echo $deportista["dni"];?>'><img src='./view/Icons/edit.png'>
                                    </a>
                                </td>
                                <td>
                                    <a href='./index.php?controller=Deportista&amp;action=DeportistaDELETE&amp;dni=<?php echo $deportista["dni"];?>'><img src='./view/Icons/delete.png'>
                                    </a>
                                </td>
                                <td>
                                    <a href='./index.php?controller=Deportista&amp;action=DeportistaView&amp;dni=<?php echo $deportista["dni"];?>'><img src='./view/Icons/detalle.png'>
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
