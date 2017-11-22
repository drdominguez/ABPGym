<?php 
require_once(__DIR__."/../../core/ViewManager.php");

    $view = ViewManager::getInstance();
    $usuarios = $view->getVariable("usuarios");
    $currentuser = $view->getVariable("currentusername");
    $view->setVariable("title", "Asignar Tabla a Deportista");
?>

<div class="content-wrapper">
    <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <div id="flash"><?= $view->popFlash() ?></div>
        </ol>
        <!-- Example DataTables Card-->
    <form name = 'Form' action='./index.php?controller=Tabla&amp;action=TablaAsignar' method='post'>
        <div class="card mb-3">
            <div class="card-header">
                <i class="fa fa-table"></i><?= i18n("Asignar Tabla") ?>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" >
                        <thead>
                            <tr>
                                <th><?= i18n("DNI") ?></th>
                                <th><?= i18n("Nombre") ?></th>
                                <th><?= i18n("Apellidos") ?></th>
                                <th>Detalle</th>
                                <th>Seleccionar</th>

                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th><?= i18n("DNI") ?></th>
                                <th><?= i18n("Nombre") ?></th>
                                <th><?= i18n("Apellidos") ?></th>
                                <th>Detalle</th>
                                <th>Seleccionar</th>

                            </tr>
                        </tfoot>
                        <tbody>
<?php
                        foreach($usuarios as $usuario)
                        {
?>
                            <tr>
                                    <td><?php echo $usuario->getDni(); ?></td>
                                    <td><?php echo $usuario->getNombre(); ?></td>
                                    <td><?php echo $usuario->getApellidos(); ?></td>
                                    <td>
                                        <a href=''><img src='./view/Icons/detalle.png'>
                                        </a>
                                    </td>
                                     <td>
                                      <input type="radio" name="usuario" value="<?php echo $usuario->getDni(); ?>">
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
                    <input type="hidden" name="idTabla" value="<?php echo $_GET['idTabla']; ?>">
                        <button type="button" onclick="window.location.href='./index.php?controller=Tabla&amp;action=TablaListar'" class="btn btn-default"><?= i18n("Volver") ?></button> 
                <button  type='submit' name='action' value='TablaAsignar' class="btn btn-primary"><?= i18n("Asignar") ?></button>
            </form>

    </div>
</div>