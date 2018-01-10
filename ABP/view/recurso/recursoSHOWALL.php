<?php 

require_once(__DIR__."/../../core/ViewManager.php");

$view = ViewManager::getInstance();
$recursos = $view->getVariable("recurso");
$currentuser = $view->getVariable("currentusername");
$view->setVariable("title", "Recursos");
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
                <i class="fa fa-table"></i><?= i18n("Mostrar todos los Recursos") ?>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" >
                        <thead>
                            <tr>
                            <th><?= i18n("Nombre") ?></th>
                            <th><?= i18n("Editar") ?></th>
                            <th><?= i18n("Borrar") ?></th>
                            <th><?= i18n("Ver") ?></th>
                        </tr>
                        </thead>
                            <tfoot>
                            <tr>
                            <th><?= i18n("Nombre") ?></th>
                            <th><?= i18n("Editar") ?></th>
                            <th><?= i18n("Borrar") ?></th>
                            <th><?= i18n("Ver") ?></th>
                            </tr>
                            </tfoot>
            <tbody>

<?php
                foreach($recursos as $recurso){
?>

                    <tr>
                        <td><?php echo $recurso->getNombreRecurso(); ?></td>
                        <td>
                        <a href='./index.php?controller=Recurso&amp;action=recursoEDIT&amp;idRecurso=<?php echo $recurso->getIdRecurso();?>'><span id="icon-editar" class="icon-pencil22"></span>
                            </a>
                        </td>
                        <td>
                         <a href='./index.php?controller=Recurso&amp;action=recursoDELETE&amp;idRecurso=<?php echo $recurso->getIdRecurso();?>'><span id="icon-eliminar" class=" icon-bin"></span>
                            </a>
                        </td>
                        <td>
                        <a href='./index.php?controller=Recurso&amp;action=recursoView&amp;idRecurso=<?php echo $recurso->getIdRecurso();?>'><span id="icon-ver" class="icon-eye-plus"></span>
                        </a>
                        </td>

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
<?php
                  
?>