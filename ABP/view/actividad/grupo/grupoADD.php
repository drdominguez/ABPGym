<?php
    $view=ViewManager::getInstance();
?>
<!DOCTYPE html>
<html>
    <div class="content-wrapper">
            <div class="container-fluid">
                <!-- Breadcrumbs-->
                <ol class="breadcrumb">
                        <div id="flash"><?= $view->popFlash() ?></div>
                </ol>
                <!-- Example DataTables Card-->
                <div class="card mb-3">
                    <div class="card-header">
                        <i class="fa fa-table"></i><?= i18n(" Añadir Actividad Grupo") ?>
                    <div class="card-body"> 
                        <div id="flash"><?= $view->popFlash() ?></div>
                            <form name='Form' id="form1" action="index.php?controller=Actividad&amp;action=grupoADD" class="form-signin" accept-charset="UTF-8" method="POST">
                            <div class="form-group">
                                <div class="form-row">
                                    <div class="col-md-6">
                                        <label for="exampleInputNombre">Nombre</label>
                                        <input class="form-control" name="nombre" id="exampleInputNombre" type="TEXT" aria-describedby="emailHelp" placeholder="Nombre" onblur="esVacio(this)  && comprobarText(this,15)">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="exampleInputTiempo">Precio</label>
                                        <input class="form-control" name="precio" id="exampleInputDescripcion" type="TEXT" aria-describedby="emailHelp" placeholder="Precio" onblur="esVacio(this)  && comprobarText(this,15)">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-row">
                                    <div class="col-md-6">
                                        <label for="exampleInputNombre">Instalaciones</label>
                                        <input class="form-control" name="instalaciones" id="exampleInputNombre" type="TEXT" aria-describedby="emailHelp" placeholder="Instalaciones" onblur="esVacio(this)  && comprobarText(this,15)">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="exampleInputTiempo">Plazas</label>
                                        <input class="form-control" name="plazas" id="exampleInputDescripcion" type="TEXT" aria-describedby="emailHelp" placeholder="Plazas" onblur="esVacio(this)  && comprobarText(this,15)">
                                    </div>
                                </div>
                            </div>
                            </form>
                            <button type="button" onclick="window.location.href='./index.php?controller=actividad&amp;action=actividadListar'" class="btn btn-default">Volver</button>
                            <button type='submit' name='action' form="form1" value='ADD' class="btn btn-primary">Insertar</button>
                    </div>
             </div>
        </div>
    </div>
</html>