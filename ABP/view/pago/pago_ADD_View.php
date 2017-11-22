<?php
$view=ViewManager::getInstance();
$actividades = $view->getVariable("actividades");
$currentuser = $view->getVariable("currentusername");
?>
<!DOCTYPE html>
<html>
<div class="content-wrapper">
    <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="../Controller/PagoController.php">Añadir Pago</a>
            </li>
            <li class="breadcrumb-item active">ADD</li>
        </ol>
        <!-- Example DataTables Card-->
        <div class="card mb-3">
            <div class="card-header">
                <i class="fa fa-table"></i> Añadir Pago</div>
            <div class="card-body">
                <div id="flash"><?= $view->popFlash() ?></div>
                <form name='Form' id="form1" action="index.php?controller=Pago&amp;action=PagoADD" class="form-signin" accept-charset="UTF-8" method="POST">
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-md-6">
                                <label for="exampleInputNombre">DNI</label>
                                <input class="form-control" name="dni" id="exampleInputNombre" type="TEXT" aria-describedby="emailHelp" placeholder="dni" onblur="esVacio(this)  && comprobarText(this,15)">
                            </div>
                            <div class="col-md-6">
                                <label for="exampleInputTiempo">Nombre</label>
                                <input class="form-control" name="precio" id="exampleInputDescripcion" type="TEXT" aria-describedby="emailHelp" placeholder="Nombre" onblur="esVacio(this)  && comprobarText(this,15)">
                            </div>
                        </div>
                    </div>
                    <div class="card mb-3">
                        <div class="card-header">
                            <i class="fa fa-table"></i><?= i18n("Mostrar todas las actividades") ?>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" >
                                    <thead>
                                    <tr>
                                        <th><?= i18n("Nombre") ?></th>
                                        <th><?= i18n("Precio") ?></th>
                                    </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                        <th><?= i18n("Nombre") ?></th>
                                        <th><?= i18n("Precio") ?></th>
                                    </tr>
                                    </tfoot>
                                    <tbody>
                                    <?php
                                    foreach($actividades as $actividad)
                                    {
                                        ?>
                                        <tr>
                                            <td><?php echo $actividad->getNombre(); ?></td>
                                            <td><?php echo $actividad->getPrecio(); ?></td>
                                            <td>
                                                <a target="_blank" onclick="window.open(this.href, this.target, 'width=500,height=400'); return false;" href='./index.php?controller=Actividad&amp;action=individualADD&amp;idActividad=<?php echo $actividad->getIdActividad();?>'><img src='./view/Icons/detalle.png'>
                                                </a>
                                            </td>
                                            <td>
                                                <input type="checkbox" name="actividades[]" value="<?php echo $actividad->getIdActividad();?>">Añadir<br>
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
                <button type="button" onclick="window.location.href='../Controller/PagoController.php?action=default'" class="btn btn-default">Volver</button>
                <button type='submit' name='action' form="form1" value='ADD' class="btn btn-primary">Insertar</button>
                </form>
            </div>
        </div>
    </div>
</div>
</html>