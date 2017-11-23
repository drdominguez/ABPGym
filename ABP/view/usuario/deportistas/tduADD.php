<?php
require_once(__DIR__."/../../../core/ViewManager.php");

$view = ViewManager::getInstance();
$usuarios = $view->getVariable("usuarios");
$currentuser = $view->getVariable("currentusername");
$view->setVariable("title", "Usuarios");
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
                <i class="fa fa-table"></i><?= i18n("Mostrar todos los usuarios") ?>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" >
                        <thead>
                        <tr>
                            <th><?= i18n("dni") ?></th>
                            <th><?= i18n("nombre") ?></th>
                            <th><?= i18n("apellidos") ?></th>
                            <th><?= i18n("Añadir deportista TDU") ?></th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th><?= i18n("dni") ?></th>
                            <th><?= i18n("nombre") ?></th>
                            <th><?= i18n("apellidos") ?></th>
                            <th><?= i18n("Añadir deportista TDU") ?></th>
                        </tr>
                        </tfoot>
                        <tbody>

                        <?php foreach($usuarios as $usuario){ ?>
                            <tr>
                                <td><?php echo $usuario->getDni(); ?></td>
                                <td><?php echo $usuario->getNombre(); ?></td>
                                <td><?php echo $usuario->getApellidos(); ?></td>
                                <td>
                                    <a href='./index.php?controller=Deportista&amp;action=addTDU&amp;dni=<?php echo $usuario->getDni();?>'><img src='./view/Icons/add.png'>
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
