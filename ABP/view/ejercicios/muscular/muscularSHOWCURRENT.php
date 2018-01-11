<?php
    $view=ViewManager::getInstance();
    $muscular=$view->getVariable("muscular");
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
                    <b><?= i18n("Id") ?>:</b> <?php echo $muscular->getIdEjercicio(); ?><br>
                    <b><?= i18n("Nombre") ?>:</b> <?php echo $muscular->getNombre(); ?><br>
                    <b><?= i18n("Descripcion") ?>:</b> <?php echo $muscular->getDescripcion(); ?><br>
                    <b><?= i18n("Video") ?>:</b> <?php echo $muscular->getVideo() ?><br>
                    <b><?= i18n("Imágen") ?>:</b><img src="<?php echo $muscular->getImagen(); ?>" height="300" width="300"><br>
                    <br>
                    <button type="button" onclick="window.location.href='./index.php?controller=Ejercicio&amp;action=MuscularListar'" class="btn btn-primary">Volver</button> 
                </div>
            </div>
        </div>
    </div>
</html>