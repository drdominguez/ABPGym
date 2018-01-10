<?php
    require_once(__DIR__."/../../core/ViewManager.php");

    $view = ViewManager::getInstance();
    $usuarios = $view->getVariable("usuarios");
    $currentuser = $view->getVariable("currentusername");
    $view->setVariable("title", "Usuarios");
?>

<div class="content-wrapper">
    <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <div id="flash"><?= $view->popFlash() ?></div>
        </ol>
        <!-- Example DataTables Card-->
        <form name="Form" action='./index.php?controller=Entrenador&amp;action=EntrenadorADD' method='post'>
        <div class="card mb-3">
            <div class="card-header">
                <i class="fa fa-table"></i><?= i18n(" Mostrar todos los usuarios") ?>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" >
                        <thead>
                            <tr>
                                <th><?= i18n("dni") ?></th>
                                <th><?= i18n("nombre") ?></th>
                                <th><?= i18n("apellidos") ?></th>
                                <th><?= i18n("Ver") ?></th>
                                <th><?= i18n("Asignar") ?></th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th><?= i18n("dni") ?></th>
                                <th><?= i18n("nombre") ?></th>
                                <th><?= i18n("apellidos") ?></th>
                                <th><?= i18n("Ver") ?></th>
                                <th><?= i18n("Asignar") ?></th>
                            </tr>
                        </tfoot>
                        <tbody>

                        <?php foreach($usuarios as $usuario){ ?>
                            <tr>
                                <td><?php echo $usuario->getDni(); ?></td>
                                <td><?php echo $usuario->getNombre(); ?></td>
                                <td><?php echo $usuario->getApellidos(); ?></td>
                                  <td>
                                    <a target="_blank" onclick="window.open(this.href, this.target, 'width=500,height=400'); return false;" href='./index.php?controller=Entrenador&amp;action=EntrenadorView&amp;dniEntrenador=<?php echo $usuario->getDni();?>'><img src='./view/Icons/detalle.png'>
                                    </a>
                                </td>
                                 <td>
                                    <input type="radio" name="dniEntrenador" value="<?php echo $usuario->getDni();?>">Añadir<br>
                                </td>

                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>

                </div>

            </div>
        </div>
        <button type="button" onclick="window.location.href='./index.php?controller=Entrenador&amp;action=entrenadorListar'" class="btn btn-default"><?= i18n("Volver") ?></button> 
        <button  type='submit' name='action' value='entrenadorADD' class="btn btn-primary"><?= i18n("Añadir") ?></button>
    </div>
</div>
