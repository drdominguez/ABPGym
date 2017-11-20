<?php
    require_once(__DIR__."/../../core/ViewManager.php");

    $view = ViewManager::getInstance();
    $tabla = $view->getVariable("tabla");
    $ejercicios = $view->getVariable("ejercicios");
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
                <i class="fa fa-table"></i><?= i18n("Borrar tabla") ?>
            </div>
            <div class="card-body">
                <form name = 'Form' id="form1" action = './index.php?controller=Tabla&amp;action=TablaDelete' method = 'post' onsubmit = 'comprobar()'>
                    <b><?= i18n("idTabla") ?>:</b> <?php echo $tabla->getIdTabla(); ?><br>
                    <input type="hidden" name="idTabla" value="<?php echo $tabla->getIdTabla(); ?>">
                    <b><?= i18n("nombre") ?>:</b> <?php echo $tabla->getNombre(); ?><br>
                    <b><?= i18n("tipo") ?>:</b> <?php echo $tabla->getTipo(); ?><br>
                    <b><?= i18n("comentario") ?>:</b> <?php echo $tabla->getComentario(); ?><br>
                    <input type="hidden" name="borrar" value="ok">
                    
                    <div class="card mb-3">
                        <div class="card-header">
                            <i class="fa fa-table"></i><?= i18n("Mostrar todos los ejercicios") ?>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" >
                                    <thead>
                                        <tr>
                                            <th><?= i18n("Nombre") ?></th>
                                            <th><?= i18n("Descripción") ?></th>
                                            <th><?= i18n("Vídeo") ?></th>
                                            <th><?= i18n("Imágen") ?></th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th><?= i18n("Nombre") ?></th>
                                            <th><?= i18n("Descripción") ?></th>
                                            <th><?= i18n("Vídeo") ?></th>
                                            <th><?= i18n("Imágen") ?></th>
                                            <th></th>
                                        </tr>
                                    </tfoot>
                                    <tbody>

<?php
                                    foreach($ejercicios as $ejercicio)
                                    {
?>
                                        <tr>
                                            <td><?php echo $ejercicio->getNombre(); ?></td>
                                            <td><?php echo $ejercicio->getDescripcion(); ?></td>
                                            <td><?php echo $ejercicio->getVideo(); ?></td>
                                            <td><?php echo $ejercicio->getImagen(); ?></td> 
                                            <td>
                                                    <a target="_blank" onclick="window.open(this.href, this.target, 'width=500,height=400'); return false;" href='./index.php?controller=Tabla&amp;action=TablaADD&amp;idEjercicio=<?php echo $ejercicio->getId();?>'><img src='./view/Icons/detalle.png'>
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
                    <button type="button" onclick="window.location.href='./index.php?controller=Tabla&amp;action=TablaListar'" class="btn btn-default">Volver</button> 
                    <button  type='submit' name='action' value='TablaDelete' class="btn btn-primary"><?= i18n("Borrar") ?></button>
                </form>
            </div>
        </div>
    </div>
</div>