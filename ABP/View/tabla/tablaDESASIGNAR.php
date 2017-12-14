<?php
    require_once(__DIR__."/../../core/ViewManager.php");

    $view = ViewManager::getInstance();
    $tablas = $view->getVariable("tablas");
    $usuarios = $view->getVariable("usuarios");
    $usuario = $view->getVariable("usuario");
    $currentuser = $view->getVariable("currentusername");
    $errors = $view->getVariable("errors");
    $view->setVariable("title", "Borrar Tabla");
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
                <i class="fa fa-table"></i><?= i18n("Desasignar tabla") ?>
            </div>
            <div class="card-body">
                <form name = 'Form' id="form1" action = './index.php?controller=Tabla&amp;action=DesasignarTabla' method = 'post' onsubmit = 'comprobar()'>
                    <?php if(!isset($usuario)){?>
                    <div class="card mb-3">
                        <div class="card-header">
                            <i class="fa fa-table"></i><?= i18n("Mostrar todos los usuarios") ?>
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
                                                    <a target="_blank" onclick="window.open(this.href, this.target, 'width=500,height=400'); return false;" href='./index.php?controller=Tabla&amp;action=TablaADD&amp;idEjercicio=<?php echo $usuario->getDni();?>'><img src='./view/Icons/detalle.png'>
                                                    </a>
                                            </td>
                                            <td>
                                            <input type="radio" name="usuario" value="<?php echo $usuario->getDni();?>">Seleccionar<br>
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
                    <button type="button" onclick="window.location.href='./index.php?controller=Tabla&amp;action=TablaListar'" class="btn btn-default">Volver</button> 
                    <button  type='submit' name='action' value='DesasignarTabla' class="btn btn-primary"><?= i18n("Continuar") ?></button>
                    <?php }else{?>

        <div class="card mb-3">
            <div class="card-header">
                <i class="fa fa-table"></i><?= i18n("Mostrar todas las tablas") ?>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" >
                        <thead>
                            <tr>
                                <th><?= i18n("nombre") ?></th>
                                <th><?= i18n("tipo") ?></th>
                                <th><?= i18n("comentario") ?></th>
                                <th><?= i18n("Ver") ?></th>
                                <th><?= i18n("Seleccionar") ?></th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th><?= i18n("nombre") ?></th>
                                <th><?= i18n("tipo") ?></th>
                                <th><?= i18n("comentario") ?></th>
                                <th><?= i18n("Ver") ?></th>
                                <th><?= i18n("Seleccionar") ?></th>
                            </tr>
                        </tfoot>
                        <tbody>
<?php
                        foreach($tablas as $tabla)
                        {
?>
                            <tr>
                                    <td><?php echo $tabla->getNombre(); ?></td>
                                    <td><?php echo $tabla->getTipo(); ?></td>
                                    <td><?php echo $tabla->getComentario(); ?></td>
                                    <td>
                                        <a href='./index.php?controller=Tabla&amp;action=TablaView&amp;idTabla=<?php echo $tabla->getIdTabla();?>'><img src='./view/Icons/detalle.png'>
                                        </a>
                                    </td>
                                    <td>
                                            <input type="radio" name="idTabla" value="<?php echo $tabla->getIdTabla();?>">Seleccionar<br>

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
                    <input type="hidden" name="borrar" value="ok">
                    <input type="hidden" name="usuario" value="<?php echo $usuario; ?>">
                    <button type="button" onclick="window.location.href='./index.php?controller=Tabla&amp;action=TablaListar'" class="btn btn-default">Volver</button> 
                    <button  type='submit' name='action' value='DesasignarTabla' class="btn btn-primary"><?= i18n("Borrar") ?></button>
                    <?php } ?>
                </form>
            </div>
        </div>
    </div>
</div>