<?php
    $view=ViewManager::getInstance();
    $estiramiento=$view->getVariable("estiramiento");
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
                        <i class="fa fa-table"></i>Eliminar Estiramiento</div>
                    <div class="card-body">      
                       <b><?= i18n("Id") ?>:</b> <p><?php echo $estiramiento->getIdEjercicio(); ?></p><br>
                    <b><?= i18n("Nombre") ?>:</b> <p><?php echo $estiramiento->getNombre(); ?></p><br>
                    <b><?= i18n("Descripcion") ?>:</b> <p><?php echo $estiramiento->getDescripcion(); ?></p><br>
                    <b><?= i18n("Video") ?>:</b>  <p><iframe width="280" height="155" allowfullscreen frameborder="0" src="<?php echo $estiramiento->getVideo(); ?>"></iframe></p><br>
                    <b><?= i18n("Imágen") ?>:</b> <p><img src="<?php echo $estiramiento->getImagen(); ?>" height="300" width="300"></p><br>
                    <button type="button" onclick="window.location.href='./index.php?controller=Ejercicio&amp;action=estiramientoListar'" class="btn btn-default"><?= i18n("Volver") ?></button> 
                    <button type='submit' name='action' form="form1" value='Remove' class="btn btn-primary"><?= i18n("Eliminar") ?></button> 
                </div>
            </div>
        </div>
    </div>
</html>
