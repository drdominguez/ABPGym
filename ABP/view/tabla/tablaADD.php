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
                <a href=""><?= i18n("Gestión de tablas") ?></a>
            </li>
            <li class="breadcrumb-item active"><?= i18n("Añadir") ?></li>
        </ol>
                <!-- Example DataTables Card-->
        <div class="card mb-3">
            <div class="card-header">
                <i class="fa fa-table"></i><?= i18n("Anadir tabla") ?>
            </div>
            <div class="card-body">      
                <div id="flash"><?= $view->popFlash() ?></div>      
                <form name = 'Form' action='./index.php?controller=Tabla&amp;action=TablaADD' method='post' onsubmit='return comprobar_notificacion()'>
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-md-6">
                                <label for="exampleInputNombre">Nombre</label>
                                <input class="form-control" name="nombre" id="exampleInputNombre" type="TEXT" aria-describedby="emailHelp" placeholder="Nombre" required onblur="esVacio(this)  && comprobarText(this,15)">
                            </div>
                            <div class="col-md-6">
                                <label for="exampleInputTipo">Tipo</label>
                                <select class="form-control" name="tipo">
                                    <option value="estandar">Estándar</option>
                                    <option value="personalizada">Personalizada</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-row">
                            <label for="exampleInputTiempo">Descripción</label>
                            <textarea class="form-control" name="comentario" rows="10"></textarea>
                        </div>
                    </div>
                    <button type="button" onclick="window.location.href='./index.php?controller=Tabla&amp;action=TablaListar'" class="btn btn-default"><?= i18n("Volver") ?></button> 
                    <button  type='submit' name='action' value='TablaADD' class="btn btn-primary"><?= i18n("Añadir") ?></button>     
                </form>
            </div>
        </div>
    </div>
</div>
</html>