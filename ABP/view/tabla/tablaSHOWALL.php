<?php 
require_once(__DIR__."/../../core/ViewManager.php");

    $view = ViewManager::getInstance();
    $tablas = $view->getVariable("tablas");
    $tipoUsuario = $view->getVariable("tipoUsuario");
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
                                <th><?= i18n("nombre") ?></th>
                                <th><?= i18n("tipo") ?></th>
                                <th><?= i18n("comentario") ?></th>
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
                                        
                                        <a href='./index.php?controller=Tabla&amp;action=TablaEDIT&amp;idTabla=<?php echo $tabla->getIdTabla();?>'><img src='./view/Icons/edit.png'>
                                        </a>
                                         

                                    </td>
                                    <td>

                                        <a href='./index.php?controller=Tabla&amp;action=TablaDelete&amp;idTabla=<?php echo $tabla->getIdTabla();?>'><img src='./view/Icons/delete.png'>
                                        </a>
                                         
                                    </td>
                                    <?php } ?>
                                    <td>
                                        <a href='./index.php?controller=Tabla&amp;action=TablaView&amp;idTabla=<?php echo $tabla->getIdTabla();?>'><img src='./view/Icons/detalle.png'>
                                        </a>
                                    </td>
                                    <?php if($tipoUsuario != 'deportista'){?>
                                    <td>
                                        <?php if($tabla->getTipo()=='estandar'){?>
                                        <a href='./index.php?controller=Tabla&amp;action=TablaAsignar&amp;idTabla=<?php echo $tabla->getIdTabla();?>'><img src='./view/Icons/add.png'>
                                        </a>
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
    </div>
</div>