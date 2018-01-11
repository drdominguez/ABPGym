<?php
$view = ViewManager::getInstance();
$listaMusculares = $view->getVariable("musculares");
$currentuser = $view->getVariable("currentusername");
$view->setVariable("title", "Estiramientos");
?>
<header>
    <meta charset="UTF-8">
    <title>Iconos</title>
    <link rel="stylesheet" type="text/css" href="./view/Icons/icomoon/style.css">
    <link rel="stylesheet" type="text/css" href="./view/Icons/icomoon/modifyIcon.css">
</header>
<div class="content-wrapper">
            <div class="container-fluid">
                 <!-- Breadcrumbs-->
                <ol class="breadcrumb">
                    <div id="flash"><?= $view->popFlash()?></div>
                </ol>
                <!-- Example DataTables Card-->
                <div class="card mb-3">
                    <div class="card-header">
                        <i class="fa fa-table"></i><?= i18n("Listado de musculares") ?></div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" >
                                <thead>
                                    <tr>
                                        <th><?= i18n("Id") ?></th>
                                        <th><?= i18n("Nombre") ?></th>
                                        <th><?= i18n("Descripción") ?></th>
                                        <th><?= i18n("Editar") ?></th>
                                        <th><?= i18n("Eliminar") ?></th>
                                        <th><?= i18n("Ver") ?></th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th><?= i18n("Id") ?></th>
                                        <th><?= i18n("Nombre") ?></th>
                                        <th><?= i18n("Descripción") ?></th>
                                        <th><?= i18n("Editar") ?></th>

                                        <th><?= i18n("Eliminar") ?></th>
                                        <th><?= i18n("Ver") ?></th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    <?php if(!empty($listaMusculares)){ ?>
                                    <?php foreach($listaMusculares as $muscular){ ?>
                                        <tr>
                                            <td><?php echo $muscular["idEjercicio"]; ?></td>
                                            <td><?php echo $muscular["nombre"]; ?></td>
                                            <td><?php echo $muscular["descripcion"]; ?></td>
                                            <td>
                                                <a href='./index.php?controller=Ejercicio&amp;action=muscularEdit&amp;idEjercicio=<?php echo $muscular["idEjercicio"];?>'><span id="icon-editar" class="icon-pencil22"></span>
                                            </td>
                                             <td>
                                                <a href='./index.php?controller=Ejercicio&amp;action=muscularRemove&amp;idEjercicio=<?php echo $muscular["idEjercicio"];?>'><span id="icon-eliminar" class=" icon-bin"></span>
                                                </a>
                                            </td>
                                            <td>
                                                <a href='./index.php?controller=Ejercicio&amp;action=muscularVer&amp;idEjercicio=<?php echo $muscular["idEjercicio"];?>'><span id="icon-ver" class="icon-eye-plus"></span>
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