<?php 
require_once(__DIR__."/../../core/ViewManager.php");

    $view = ViewManager::getInstance();
    $tablas = $view->getVariable("tablas");
    $tipoUsuario = $view->getVariable("tipoUsuario");
    $currentuser = $view->getVariable("currentusername");
    $view->setVariable("title", "Tablas");
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
            <div id="flash"><?= $view->popFlash() ?></div>
        </ol>
        <!-- Example DataTables Card-->
        <div class="card mb-3">
            <div class="card-header">
                <i class="fa fa-table"></i><?= i18n("Mostrar Todas las Tablas") ?>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" >
                        <thead>
                            <tr>
                                <th><?= i18n("Nombre") ?></th>
                                <th><?= i18n("Tipo") ?></th>
                                <th><?= i18n("Comentario") ?></th>
                                <?php if($tipoUsuario != 'deportista'){?>
                                <th><?= i18n("Editar") ?></th>
                                <th><?= i18n("Borrar") ?></th>
                                <?php } ?>
                                <th><?= i18n("Ver") ?></th>
                                <?php if($tipoUsuario != 'deportista'){?>
                                <th><?= i18n("Asignar") ?></th>
                                <?php } ?>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th><?= i18n("Nombre") ?></th>
                                <th><?= i18n("Tipo") ?></th>
                                <th><?= i18n("Comentario") ?></th>
                                 <?php if($tipoUsuario != 'deportista'){?>
                                <th><?= i18n("Editar") ?></th>
                                <th><?= i18n("Borrar") ?></th>
                                <?php } ?>
                                <th><?= i18n("Ver") ?></th>
                                <?php if($tipoUsuario != 'deportista'){?>
                                <th><?= i18n("Asignar") ?></th>
                                <?php } ?>
                            </tr>
                        </tfoot>
                        <tbody>
<?php
                        foreach($tablas as $tabla)
                        {
?>
                            <tr>
                                    <td><?php echo $tabla->getNombre(); ?></td>
                                    <td><?php echo $tabla->getTipo(); ?></td>
                                    <td><?php echo $tabla->getComentario(); ?></td>
                                    <?php if($tipoUsuario != 'deportista'){?>
                                    <td>
                                        
                                        <a href='./index.php?controller=Tabla&amp;action=TablaEDIT&amp;idTabla=<?php echo $tabla->getIdTabla();?>'><span id="icon-editar" class="icon-pencil22"></span>
                                         

                                    </td>
                                    <td>

                                        <a href='./index.php?controller=Tabla&amp;action=TablaDelete&amp;idTabla=<?php echo $tabla->getIdTabla();?>'><span id="icon-eliminar" class=" icon-bin"></span>
                                        </a>
                                         
                                    </td>
                                    <?php } ?>
                                    <td>
                                        <a href='./index.php?controller=Tabla&amp;action=TablaView&amp;idTabla=<?php echo $tabla->getIdTabla();?>'><span id="icon-ver" class="icon-eye-plus"></span>
                                        </a>
                                    </td>
                                    <?php if($tipoUsuario != 'deportista'){?>
                                    <td>
                                        <?php if($tabla->getTipo()=='estandar'){?>
                                        <a href='./index.php?controller=Tabla&amp;action=TablaAsignar&amp;idTabla=<?php echo $tabla->getIdTabla();?>'><span id="icon-ver" class="icon-address-book"></span>
                                         <?php } ?>
                                    </td>
                                    <?php } ?>
                            </tr>
<?php
                        }   
?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
           <button type="button" onclick="window.location.href='./index.php?controller=main&action=index'" class="btn btn-primary"><?= i18n("Volver") ?></button> 
    </div>
</div>