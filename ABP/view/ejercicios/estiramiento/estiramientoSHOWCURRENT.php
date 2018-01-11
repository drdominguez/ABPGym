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
                    <i class="fa fa-table"></i><?= i18n("Mostrar Ejercicio") ?>
                </div>
                <div class="card-body">
                    <b><?= i18n("Id") ?>:</b> <?php echo $estiramiento->getIdEjercicio(); ?><br>
                    <b><?= i18n("Nombre") ?>:</b> <?php echo $estiramiento->getNombre(); ?><br>
                    <b><?= i18n("Descripcion") ?>:</b> <?php echo $estiramiento->getDescripcion(); ?><br>
                    <b><?= i18n("Video") ?>:</b>  <iframe width="280" height="155" allowfullscreen frameborder="0" src="<?php echo $estiramiento->getVideo(); ?>"></iframe><br>
                    <b><?= i18n("Imágen") ?>:</b> <img src="<?php echo $estiramiento->getImagen(); ?>" height="300" width="300"><br>
                    <button type="button" onclick="window.location.href='./index.php?controller=Ejercicio&amp;action=estiramientoListar'" class="btn btn-primary">Volver</button> 
                </div>
            </div>
        </div>
    </div>
</html>
