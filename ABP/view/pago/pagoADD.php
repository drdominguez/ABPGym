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
                <a href="../Controller/PagoController.php"><?= i18n("Añadir Pago") ?></a>
            </li>
            <li class="breadcrumb-item active">ADD</li>
        </ol>
        <!-- Example DataTables Card-->
        <div class="card mb-3">
            <div class="card-header">
                <i class="fa fa-table"></i><?= i18n("Añadir Pago") ?></div>
            <div class="card-body">
                <div id="flash"><?= $view->popFlash() ?></div>
                <form name='Form' id="form1" action="index.php?controller=Pago&amp;action=PagoADD" class="form-signin" accept-charset="UTF-8" method="POST">
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-md-6">
                                <label for="exampleInputNombre"><?= i18n("DNI") ?></label>
                                <input class="form-control" name="dniDeportista" id="exampleInputNombre" type="text" aria-describedby="emailHelp" placeholder="DNI" onchange="comprobarVacio(this)  && comprobarDni(this)">
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
                                        <th><?= i18n("Ver") ?></th>
                                        <th><?= i18n("Seleccionar") ?></th>
                                    </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                        <th><?= i18n("Nombre") ?></th>
                                        <th><?= i18n("Precio") ?></th>
                                        <th><?= i18n("Ver") ?></th>
                                        <th><?= i18n("Seleccionar") ?></th>

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
                                                <a target="_blank" onclick="window.open(this.href, this.target, 'width=500,height=400'); return false;" href='./index.php?controller=Actividad&amp;action=ActividadView&amp;idActividad=<?php echo $actividad->getIdActividad();?>'><img src='./view/Icons/detalle.png'>
                                                </a>
                                            </td>
                                            <td>
                                                <input type="hidden" name="importe" value="<?php echo $actividad->getPrecio();?>">
                                                <input type="radio" name="idActividad" value="<?php echo $actividad->getIdActividad();?>"><?= i18n("Seleccionar") ?><br>
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

                <button type="button" onclick="window.location.href='./index.php?controller=Pago&amp;action=PagosListar''" class="btn btn-default"><?= i18n("Volver") ?></button>
                <button type='submit' name='action'  value='PagoADD' class="btn btn-primary"><?= i18n("Insertar") ?></button>
                </form>
            </div>
        </div>
    </div>
</div>
</html>