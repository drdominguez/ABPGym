<?php
    require_once(__DIR__."/../../core/ViewManager.php");

    $view = ViewManager::getInstance();
    $usuarios = $view->getVariable("usuarios");
    $currentuser = $view->getVariable("currentusername");
    $view->setVariable("title", "Usuarios");
?>
<header>
    <meta charset="UTF-8">
    <title>Iconos</title>
    <link rel="stylesheet" type="text/css" href="./view/Icons/icomoon/style.css">
    <link rel="stylesheet" type="text/css" href="./view/Icons/icomoon/modifyIcon.css">
</header>
<div class="content-wrapper">
    <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <div id="flash"><?= $view->popFlash() ?></div>
        </ol>
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
                                <th><?= i18n("Dni") ?></th>
                                <th><?= i18n("Nombre") ?></th>
                                <th><?= i18n("Apellidos") ?></th>
                                <th><?= i18n("Tipo") ?></th>
                                <th><?= i18n("Editar") ?></th>
                                <th><?= i18n("Borrar") ?></th>
                                <th><?= i18n("Ver") ?></th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th><?= i18n("Dni") ?></th>
                                <th><?= i18n("Nombre") ?></th>
                                <th><?= i18n("Apellidos") ?></th>
                                <th><?= i18n("Tipo") ?></th>
                                <th><?= i18n("Editar") ?></th>
                                <th><?= i18n("Borrar") ?></th>
                                <th><?= i18n("Ver") ?></th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php foreach($usuarios as $usuario){ ?>
                                <tr>
                                    <td><?php echo $usuario->getDni(); ?></td>
                                    <td><?php echo $usuario->getNombre(); ?></td>
                                    <td><?php echo $usuario->getApellidos(); ?></td>
                                    <td>
                                        <?php if($usuario->getTipo()=="superUsuario"){ ?>
                                            Super Usuario
                                        <?php }elseif($usuario->getTipo()=="TDU"){ ?>
                                            TDU
                                        <?php }else{ ?>
                                            PEF
                                        <?php }?>
                                    </td>
                                    <td>
                                    <?php if($usuario->getTipo()=="superUsuario"){ ?>
                                            <a href='./index.php?controller=Usuario&amp;action=UsuarioEDIT&amp;dni=<?php echo $usuario->getDni();?>'><span id="icon-editar" class="icon-pencil22"></span>
                                            </a>
                                        <?php }elseif($usuario->getTipo()=="TDU"){ ?>
                                            <a href='./index.php?controller=Deportista&amp;action=tduEDIT&amp;dni=<?php echo $usuario->getDni();?>'><span id="icon-editar" class="icon-pencil22"></span>
                                            </a>
                                        <?php }else{ ?>
                                            <a href='./index.php?controller=Deportista&amp;action=pefEDIT&amp;dni=<?php echo $usuario->getDni();?>'><span id="icon-editar" class="icon-pencil22"></span>
                                            </a>
                                        <?php } ?>
                                    </td>
                                    <td>
                                        <?php if($usuario->getDni() != $_SESSION['currentuser']){ ?>
                                        <a href='./index.php?controller=Usuario&amp;action=UsuarioDELETE&amp;dni=<?php echo $usuario->getDni();?>'><span id="icon-eliminar" class=" icon-bin"></span>
                                        </a>
                                        <?php } ?>
                                    </td>
                                    <td>
                                        <a href='./index.php?controller=Usuario&amp;action=UsuarioView&amp;dni=<?php echo $usuario->getDni();?>'><span id="icon-ver" class="icon-eye-plus"></span>
                                        </a>
                                    </td>
                                </tr>
                            <?php }?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>