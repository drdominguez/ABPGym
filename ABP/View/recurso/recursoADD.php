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
                        <i class="fa fa-table"></i><?= i18n(" Añadir Recurso") ?>
                    <div class="card-body"> 
                    <form name='Form' id="form1" action="index.php?controller=Recurso&amp;action=recursoADD" class="form-signin" accept-charset="UTF-8" method="POST" onsubmit="return validarRecursoADD()">
                        <div class="form-group">
                            <div class="form-row">
                                <div class="col-md-6">
                                    <label for="exampleInputNombre">Nombre</label>
                                    <input class="form-control" name="nombreRecurso" id="exampleInputNombre" type="TEXT" aria-describedby="emailHelp" placeholder="Nombre" onchange="comprobarVacio(this)  && comprobarTexto(this,30)">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-row">
                                
                                <label for="exampleInputObservacion">Observaciones</label>
                                <textarea name="observaciones" class="form-control"></textarea>
                             
                            </div>
                        </div>        
                    </form>
                     <button type="button" onclick="window.location.href='./index.php?controller=Recurso&amp;action=recursoListar'" class="btn btn-default">Volver</button>
                            <button type='submit' name='action' form="form1" value='recursoADD' class="btn btn-primary">Insertar</button>
                    </div>
                </div>
            </div>
        </div>
</html>