<?php
    require_once(__DIR__."/../../core/ViewManager.php");

    $view = ViewManager::getInstance();
    $pagos = $view->getVariable("pagos");
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
                            <th><?= i18n("DNI") ?></th>
                            <th><?= i18n("Actividad") ?></th>
                            <th><?= i18n("Importe") ?></th>
                            <th><?= i18n("Fecha") ?></th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th><?= i18n("DNI") ?></th>
                            <th><?= i18n("Actividad") ?></th>
                            <th><?= i18n("Importe") ?></th>
                            <th><?= i18n("Fecha") ?></th>
                        </tr>
                        </tfoot>
                        <tbody>

                        <?php
                        foreach($pagos as $pago)
                        {
                            ?>
                            <tr>
                                <td><?php echo $pago->getDniDeportista(); ?></td>
                                 <td><?php echo $pago->getActividad(); ?></td>
                                <td><?php echo $pago->getImporte(); ?></td>
                                <td><?php echo $pago->getFecha(); ?></td>
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