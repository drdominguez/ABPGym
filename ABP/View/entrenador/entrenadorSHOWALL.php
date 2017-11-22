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
                foreach($usuarios as $usuario){
?>
                    <tr>
                        <td><?php echo $usuarios->getNombre(); ?></td>
                        <td><?php echo $usuarios->getApellidos(); ?></td> 
                        <td><?php echo $usuarios->getEdad(); ?></td>
                        <td><?php echo $usuarios->getEmail(); ?></td> 
                        <td><?php echo $usuarios->getTelefono(); ?></td> 
                        <td>
                        <a href='./index.php?controller=Entrenador&amp;action=entrenadorEDIT&amp;idEntrenador=<?php echo $entrenador->getIdEntrenador();?>'><img src='./view/Icons/edit.png'>
                            </a>
                        </td>
                        <td>
                         <a href='./index.php?controller=Entrenador&amp;action=etrenadorenDELETE&amp;idEntrenador=<?php echo $entrenador->getIdEntrenador();?>'><img src='./view/Icons/delete.png'>
                            </a>
                        </td>
                        <td>
                        <a href='./index.php?controller=Entrenador&amp;action=entrenadorView&amp;idEntrenador=<?php echo $entrenador->getIdEntrenador();?>'><img src='./view/Icons/detalle.png'>
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