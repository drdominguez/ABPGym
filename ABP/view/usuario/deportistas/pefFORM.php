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
                <i class="fa fa-table"></i><?= i18n("Añadir Deportista PEF") ?>
            </div>
            <div class="card-body">
                <form name = 'Form' action='./index.php?controller=Deportista&amp;action=addPEF' method='post'>
                    <div class="form-group">
                        <div class="form-row">
                            <label for="Tarjeta"><?= i18n("Tarjeta") ?>: </label>
                            <input class="form-control" type = 'text' name = 'Tarjeta' size = '60' value = ''  onchange="comprobarVacio(this)  && comprobarTexto(this, 60)" >
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-row">
                            <label for="Comentario"><?= i18n("Comentario") ?> : </label>
                            <textarea class="form-control" name = 'Comentario' rows="6"  value = ''  onchange="comprobarVacio(this)" ></textarea>
                        </div>
                    </div>
                    <br>
                    <button type="button" onclick="window.location.href='./index.php?controller=Deportista&amp;action=pefADD'" class="btn btn-default"><?= i18n("Volver") ?></button>
                    <button  type='submit' name='action' value='addPEF' class="btn btn-primary"><?= i18n("Enviar") ?></button>
                </form>
            </div>
        </div>
    </div>
</div>
</html>