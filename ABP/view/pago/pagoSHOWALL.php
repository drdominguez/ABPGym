<?php
require_once(__DIR__."/../../core/ViewManager.php");

$view = ViewManager::getInstance();
$pagos = $view->getVariable("pagos");
$tipoUsuario = $view->getVariable("tipoUsuario");
$currentuser = $view->getVariable("currentusername");
$view->setVariable("title", "Pagos");
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
                <i class="fa fa-table"></i><?= i18n("Mostrar todos los pagos") ?>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" >
                        <thead>
                        <tr>
                            <?php if($tipoUsuario == 'administrador'){?>
                            <th><?= i18n("DNI") ?></th>
                            <?php } ?>
                            <th><?= i18n("Actividad") ?></th>
                            <th><?= i18n("Importe") ?></th>
                            <?php if($tipoUsuario == 'administrador'){?>
                            <th><?= i18n("Borrar") ?></th>
                            <?php } ?>
                            <th><?= i18n("Ver") ?></th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <?php if($tipoUsuario == 'administrador'){?>
                            <th><?= i18n("DNI") ?></th>
                            <?php } ?>
                            <th><?= i18n("Actividad") ?></th>
                            <th><?= i18n("Importe") ?></th>
                             <?php if($tipoUsuario == 'administrador'){?>
                            <th><?= i18n("Borrar") ?></th>
                              <?php } ?>
                            <th><?= i18n("Ver") ?></th>
                        </tr>
                        </tfoot>
                        <tbody>

                        <?php foreach($pagos as $pago){ ?>
                            <tr>
                            <?php if($tipoUsuario == 'administrador'){?>
                                <td><?php echo $pago->getDniDeportista(); ?></td>
                                <?php } ?>
                                <td><?php echo $pago->getActividad(); ?></td>
                                <td><?php echo $pago->getImporte(); ?>€</td>
                                <?php if($tipoUsuario == 'administrador'){?>
                                <td>
                                    <a href='./index.php?controller=Pago&amp;action=PagoDELETE&amp;idPago=<?php echo $pago->getIdPago();?>'><span id="icon-eliminar" class=" icon-bin"></span>
                                    </a>
                                    
                                </td>
                                <?php } ?>
                                <td>
                                    <a href='./index.php?controller=Pago&amp;action=PagoView&amp;idPago=<?php echo $pago->getIdPago();?>'><span id="icon-ver" class="icon-eye-plus"></span>
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
