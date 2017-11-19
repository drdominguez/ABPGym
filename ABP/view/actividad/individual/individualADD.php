<?php
    $view=ViewManager::getInstance();
?>
<!DOCTYPE html>
<html>
    <div class="content-wrapper">
            <div class="container-fluid">
                <!-- Breadcrumbs-->
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="../Controller/actividadController.php">Añadir Actividad</a>
                    </li>
                    <li class="breadcrumb-item active">ADD</li>
                </ol>
                <!-- Example DataTables Card-->
                <div class="card mb-3">
                    <div class="card-header">
                        <i class="fa fa-table"></i> Añadir Actividad Individual</div>
                    <div class="card-body"> 
                    <div id="flash"><?= $view->popFlash() ?></div>
                    <form name='Form' id="form1" action="index.php?controller=Actividad&amp;action=individualADD" class="form-signin" accept-charset="UTF-8" method="POST">
                        <div class="form-group">
                            <div class="form-row">
                                <div class="col-md-6">
                                    <label for="exampleInputNombre">Nombre</label>
                                    <input class="form-control" name="nombre" id="exampleInputNombre" type="TEXT" aria-describedby="emailHelp" placeholder="Nombre" onblur="esVacio(this)  && comprobarText(this,15)">
                                </div>
                                <div class="col-md-6">
                                    <label for="exampleInputTiempo">Precio</label>
                                    <input class="form-control" name="descripcion" id="exampleInputDescripcion" type="TEXT" aria-describedby="emailHelp" placeholder="Precio" onblur="esVacio(this)  && comprobarText(this,15)">
                                </div>
                            </div>
                        </div>
                    </form>
                    <button type="button" onclick="window.location.href='../Controller/ActividadController.php?action=default'" class="btn btn-default">Volver</button>
                            <button type='submit' name='action' form="form1" value='ADD' class="btn btn-primary">Insertar</button>
                    </div>
                </div>
            </div>
        </div>
</html>
