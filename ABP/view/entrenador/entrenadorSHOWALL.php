<?php 

require_once(__DIR__."/../../core/ViewManager.php");

$view = ViewManager::getInstance();
$usuarios = $view->getVariable("entrenadores");
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
                <i class="fa fa-table"></i><?= i18n(" Mostrar todas los Entrenadores") ?>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" >
                        <thead>
                            <tr>
                            <th><?= i18n("Nombre") ?></th>
                            <th><?= i18n("Apellidos") ?></th> 
                            <th><?= i18n("Edad") ?></th>
                            <th><?= i18n("Email") ?></th>
                            <th><?= i18n("Telefono") ?></th>
                            <th><?= i18n("Eliminar") ?></th>
                            <th><?= i18n("Ver") ?></th>
                        </tr>
                        </thead>
                            <tfoot>
                                <tr>
                                <th><?= i18n("Nombre") ?></th>
                                <th><?= i18n("Apellidos") ?></th> 
                                <th><?= i18n("Edad") ?></th>
                                <th><?= i18n("Email") ?></th>
                                <th><?= i18n("Telefono") ?></th>
                                <th><?= i18n("Eliminar") ?></th>
                                <th><?= i18n("Ver") ?></th>
                            </tr>
                            </tfoot>
            <tbody>

<?php
                foreach($usuarios as $usuario){
?>
                    <tr>
                        <td><?php echo $usuario->getNombre(); ?></td>
                        <td><?php echo $usuario->getApellidos(); ?></td> 
                        <td><?php echo $usuario->getEdad(); ?></td>
                        <td><?php echo $usuario->getEmail(); ?></td> 
                        <td><?php echo $usuario->getTelefono(); ?></td> 
                        <td>
                         <a href='./index.php?controller=Entrenador&amp;action=entrenadorDELETE&amp;dniEntrenador=<?php echo $usuario->getDni();?>'><img src='./view/Icons/delete.png'>
                        </a>
                        </td>
                        <td>
                        <a href='./index.php?controller=Entrenador&amp;action=entrenadorView&amp;dniEntrenador=<?php echo $usuario->getDni();?>'><img src='./view/Icons/detalle.png'>
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