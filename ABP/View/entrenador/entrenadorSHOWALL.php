<?php 

require_once(__DIR__."/../../core/ViewManager.php");

$view = ViewManager::getInstance();
$entrenadores = $view->getVariable("entrenadores");
$currentuser = $view->getVariable("currentusername");
$view->setVariable("title", "Entrenadores");
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
                <i class="fa fa-table"></i><?= i18n("Mostrar todas los Entrenadores") ?>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" >
                        <thead>
                            <tr>
                            <th><?= i18n("nombre") ?></th>
                            <th><?= i18n("apellidos") ?></th> 
                            <th><?= i18n("edad") ?></th>
                            <th><?= i18n("email") ?></th>
                            <th><?= i18n("telefono") ?></th>
                        </tr>
                        </thead>
                            <tfoot>
                                <tr>
                                <th><?= i18n("nombre") ?></th>
                                <th><?= i18n("apellidos") ?></th> 
                                <th><?= i18n("edad") ?></th>
                                <th><?= i18n("email") ?></th>
                                <th><?= i18n("telefono") ?></th>
                            </tr>
                            </tfoot>
            <tbody>

<?php
                foreach($entrenadores as $entrenador){
?>

                    <tr>
                        <td><?php echo $entrenadores->getNombre(); ?></td>
                        <td><?php echo $entrenadores->getApellidos(); ?></td> 
                        <td><?php echo $entrenadores->getEdad(); ?></td>
                        <td><?php echo $entrenadores->getEmail(); ?></td> 
                        <td><?php echo $entrenadores->getTelefono(); ?></td> 
                        <td>
                        <a href='./index.php?controller=Entrenador&amp;action=entrenadorEDIT&amp;idEntrenador=<?php echo $aentrenador->getIdActividad();?>'><img src='./view/Icons/edit.png'>
                            </a>
                        </td>
                        <td>
                         <a href='./index.php?controller=Actividad&amp;action=actividadDELETE&amp;idActividad=<?php echo $actividad->getIdActividad();?>'><img src='./view/Icons/delete.png'>
                            </a>
                        </td>
                        <td>
                        <a href='./index.php?controller=Actividad&amp;action=actividadView&amp;idActividad=<?php echo $actividad->getIdActividad();?>'><img src='./view/Icons/detalle.png'>
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