<?php
    $view=ViewManager::getInstance();
    $estiramientos = $view->getVariable("estiramientos");
    $cardios = $view->getVariable("cardios");
    $musculares = $view->getVariable("musculares");
    $currentuser = $view->getVariable("currentusername");
?>

<!DOCTYPE html>
<html>    
    <div class="content-wrapper">
        <div class="container-fluid">
            <!-- Breadcrumbs-->
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href=""><?= i18n("Gestión de tablas") ?></a>
                </li>
                <li class="breadcrumb-item active"><?= i18n("Añadir") ?></li>
            </ol>
            <!-- Example DataTables Card-->
            <form name = 'Form' action='./index.php?controller=Tabla&amp;action=estandarADD' method='post' onsubmit='return validarTablaADD()'>
                <div class="card mb-3">
                    <div class="card-header">
                        <i class="fa fa-table"></i><?= i18n("Anadir tabla") ?>
                    </div>
                    <div class="card-body">      
                        <div id="flash"><?= $view->popFlash() ?></div>      
                        <div class="form-group">
                            <div class="form-row">
                                <div class="col-md-6">
                                    <label for="exampleInputNombre">Nombre</label>
                                    <input class="form-control" name="nombre" id="exampleInputNombre" type="TEXT" aria-describedby="emailHelp" placeholder="Nombre" onchange="comprobarVacio(this);comprobarTexto(this,30);">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-row">
                                <label for="exampleInputTiempo">Descripción</label>
                                <textarea class="form-control" name="comentario" rows="10"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mb-3">
                    <div class="card-header">
                        <i class="fa fa-table"></i><?= i18n("Mostrar todos los estiramientos") ?>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable1" width="100%" cellspacing="0" >
                                <thead>
                                    <tr>
                                        <th><?= i18n("Nombre") ?></th>
                                        <th><?= i18n("Descripción") ?></th>
                                        <th><?= i18n("Vídeo") ?></th>
                                        <th><?= i18n("Imágen") ?></th>
                                        <th><?= i18n("Ver") ?></th>
                                        <th><?= i18n("Seleccionar") ?></th>
                                    </tr>
                                </thead>
                                <tfoot>
                                     <tr>
                                        <th><?= i18n("Nombre") ?></th>
                                        <th><?= i18n("Descripción") ?></th>
                                        <th><?= i18n("Vídeo") ?></th>
                                        <th><?= i18n("Imágen") ?></th>
                                        <th><?= i18n("Ver") ?></th>
                                        <th><?= i18n("Seleccionar") ?></th>
                                    </tr>
                                </tfoot>
                                <tbody>
<?php
                                foreach($estiramientos as $estiramiento)
                                {
?>
                                    <tr>
                                        <td><?php echo $estiramiento->getNombre(); ?></td>
                                        <td><?php echo $estiramiento->getDescripcion(); ?></td>
                                        <td><?php echo $estiramiento->getVideo(); ?></td>
                                        <td><?php echo $estiramiento->getImagen(); ?></td> 
                                        <td>
                                            <a target="_blank" onclick="window.open(this.href, this.target, 'width=500,height=400'); return false;" href='./index.php?controller=Tabla&amp;action=TablaADD&amp;idEjercicio=<?php echo $estiramiento->getIdEjercicio();?>'><img src='./view/Icons/detalle.png'>
                                            </a>
                                        </td>
                                        <td>
                                            <input type="checkbox" name="ejercicios[]" value="<?php echo $estiramiento->getIdEjercicio();?>">Añadir<br>
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
                <div class="card mb-3">
                    <div class="card-header">
                        <i class="fa fa-table"></i><?= i18n("Mostrar todos los cardios") ?>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable2" width="100%" cellspacing="0" >
                                <thead>
                                    <tr>
                                        <th><?= i18n("Nombre") ?></th>
                                        <th><?= i18n("Descripción") ?></th>
                                        <th><?= i18n("Vídeo") ?></th>
                                        <th><?= i18n("Imágen") ?></th>
                                        <th><?= i18n("Ver") ?></th>
                                        <th><?= i18n("Seleccionar") ?></th>
                                    </tr>
                                </thead>
                                <tfoot>
                                     <tr>
                                        <th><?= i18n("Nombre") ?></th>
                                        <th><?= i18n("Descripción") ?></th>
                                        <th><?= i18n("Vídeo") ?></th>
                                        <th><?= i18n("Imágen") ?></th>
                                        <th><?= i18n("Ver") ?></th>
                                        <th><?= i18n("Seleccionar") ?></th>
                                    </tr>
                                </tfoot>
                                <tbody>
<?php
                                foreach($cardios as $cardio)
                                {
?>
                                    <tr>
                                        <td><?php echo $cardio->getNombre(); ?></td>
                                        <td><?php echo $cardio->getDescripcion(); ?></td>
                                        <td><?php echo $cardio->getVideo(); ?></td>
                                        <td><?php echo $cardio->getImagen(); ?></td> 
                                        <td>
                                            <a target="_blank" onclick="window.open(this.href, this.target, 'width=500,height=400'); return false;" href='./index.php?controller=Tabla&amp;action=TablaADD&amp;idEjercicio=<?php echo $cardio->getIdEjercicio();?>'><img src='./view/Icons/detalle.png'>
                                            </a>
                                        </td>
                                        <td>
                                            <input type="checkbox" name="ejercicios[]" value="<?php echo $cardio->getIdEjercicio();?>">Añadir<br>
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
                <div class="card mb-3">
                    <div class="card-header">
                        <i class="fa fa-table"></i><?= i18n("Mostrar todos los musculares") ?>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable3" width="100%" cellspacing="0" >
                                <thead>
                                    <tr>
                                        <th><?= i18n("Nombre") ?></th>
                                        <th><?= i18n("Descripción") ?></th>
                                        <th><?= i18n("Vídeo") ?></th>
                                        <th><?= i18n("Imágen") ?></th>
                                        <th><?= i18n("Ver") ?></th>
                                        <th><?= i18n("Seleccionar") ?></th>
                                    </tr>
                                </thead>
                                <tfoot>
                                     <tr>
                                        <th><?= i18n("Nombre") ?></th>
                                        <th><?= i18n("Descripción") ?></th>
                                        <th><?= i18n("Vídeo") ?></th>
                                        <th><?= i18n("Imágen") ?></th>
                                        <th><?= i18n("Ver") ?></th>
                                        <th><?= i18n("Seleccionar") ?></th>
                                    </tr>
                                </tfoot>
                                <tbody>
<?php
                                foreach($musculares as $muscular)
                                {
?>
                                    <tr>
                                        <td><?php echo $muscular->getNombre(); ?></td>
                                        <td><?php echo $muscular->getDescripcion(); ?></td>
                                        <td><?php echo $muscular->getVideo(); ?></td>
                                        <td><?php echo $muscular->getImagen(); ?></td> 
                                        <td>
                                            <a target="_blank" onclick="window.open(this.href, this.target, 'width=500,height=400'); return false;" href='./index.php?controller=Tabla&amp;action=TablaADD&amp;idEjercicio=<?php echo $muscular->getIdEjercicio();?>'><img src='./view/Icons/detalle.png'>
                                            </a>
                                        </td>
                                        <td>
                                            <input type="checkbox" name="ejercicios[]" value="<?php echo $muscular->getIdEjercicio();?>">Añadir<br>
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
                <button type="button" onclick="window.location.href='./index.php?controller=Tabla&amp;action=TablaListar'" class="btn btn-default"><?= i18n("Volver") ?></button> 
                <button  type='submit' name='action' value='TablaADD' class="btn btn-primary"><?= i18n("Añadir") ?></button>
            </form>
        </div>
    </div>
</html>