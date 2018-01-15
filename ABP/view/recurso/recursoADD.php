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
                        <i class="fa fa-table"></i><?= i18n("Añadir Recurso") ?>
                    <div class="card-body"> 
                    <form name='Form' id="form1" action="index.php?controller=Recurso&amp;action=recursoADD" class="form-signin" accept-charset="UTF-8" method="POST" onsubmit="return validarRecursoADD()">
                        <div class="form-group">
                            <div class="form-row">
                                <div class="col-md-6">
                                    <label for="exampleInputNombre"><?= i18n("Nombre") ?></label>
                                    <input class="form-control" name="nombreRecurso" id="exampleInputNombre" type="TEXT" aria-describedby="emailHelp" placeholder="Nombre" onchange="comprobarVacio(this)  && comprobarTexto(this,50)">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-row">
                                
                                <label for="exampleInputObservacion"><?= i18n("Observaciones") ?></label>
                                <textarea name="observaciones" class="form-control"></textarea>
                             
                            </div>
                        </div>        
                    </form>
                     <button type="button" onclick="window.location.href='./index.php?controller=Recurso&amp;action=recursoListar'" class="btn btn-default"><?= i18n("Volver") ?></button>
                            <button type='submit' name='action' form="form1" value='recursoADD' class="btn btn-primary"><?= i18n("Insertar") ?></button>
                    </div>
                </div>
            </div>
        </div>
</html>