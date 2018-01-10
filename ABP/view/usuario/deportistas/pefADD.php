<?php
require_once(__DIR__."/../../../core/ViewManager.php");

$view = ViewManager::getInstance();
$usuarios = $view->getVariable("usuarios");
$currentuser = $view->getVariable("currentusername");
$view->setVariable("title", "Deportistas");
?>

<div class="content-wrapper">
    <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <div id="flash"><?= $view->popFlash() ?></div>
        </ol>

           <div class="card mb-3">
            <div class="card-header">
                <i class="fa fa-table"></i><?= i18n("Añadir PEF") ?></div>
            <div class="card-body">
                <div id="flash"><?= $view->popFlash() ?></div>
                <form name='Form' id="form1" action="index.php?controller=Deportista&amp;action=pefADD" class="form-signin" accept-charset="UTF-8" method="POST">
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-md-6">
                                <label for="exampleInputNombre"><?= i18n("Tarjeta") ?></label>
                                <input class="form-control" name="tarjeta" id="exampleInputNombre" type="text" aria-describedby="emailHelp" placeholder="" onchange="comprobarVacio(this) && comprobarText(this) && comprobarSolonum(this)">
                            </div>
                        </div>
                    </div>
                        <div class="form-group">
                            <div class="form-row">
                                <label for="exampleInputTiempo"><?= i18n("Comentario") ?></label>
                                <textarea class="form-control" name="comentario" rows="10"></textarea>
                            </div>
                        </div>
        <!-- Example DataTables Card-->
        <div class="card mb-3">
            <div class="card-header">
                <i class="fa fa-table"></i><?= i18n("Mostrar todos los usuarios") ?>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" >
                        <thead>
                        <tr>
                            <th><?= i18n("dni") ?></th>
                            <th><?= i18n("nombre") ?></th>
                            <th><?= i18n("apellidos") ?></th>
                            <th><?= i18n("Añadir deportista") ?></th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th><?= i18n("dni") ?></th>
                            <th><?= i18n("nombre") ?></th>
                            <th><?= i18n("apellidos") ?></th>
                            <th><?= i18n("Añadir deportista") ?></th>
                        </tr>
                        </tfoot>
                        <tbody>

                        <?php foreach($usuarios as $usuario){ ?>
                            <tr>
                                <td><?php echo $usuario->getDni(); ?></td>
                                <td><?php echo $usuario->getNombre(); ?></td>
                                <td><?php echo $usuario->getApellidos(); ?></td>
                                <td>
                                <input type="radio" name="dni" value="<?php echo $usuario->getDni(); ?>">
                                </td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
         <button type="button" onclick="window.location.href='./index.php?controller=Deportista&amp;action=listarPEF'" class="btn btn-default"><?= i18n("Volver") ?></button> 
                <button  type='submit' name='action' value='pefADD' class="btn btn-primary"><?= i18n("Añadir") ?></button>

            </form>
    </div>
</div>
