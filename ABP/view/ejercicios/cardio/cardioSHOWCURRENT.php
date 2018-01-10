<?php
    $view=ViewManager::getInstance();
    $cardio=$view->getVariable("cardio");
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
                    <b><?= i18n("Id") ?>:</b> <?php echo $cardio->getIdEjercicio(); ?><br>
                    <b><?= i18n("Nombre") ?>:</b> <?php echo $cardio->getNombre(); ?><br>
                    <b><?= i18n("Descripcion") ?>:</b> <?php echo $cardio->getDescripcion(); ?><br>
                    <b><?= i18n("Video") ?>:</b> <?php echo $cardio->getVideo() ?><br>
                    <b><?= i18n("Imágen") ?>:</b> <?php echo $cardio->getImagen(); ?><br>
                    <button type="button" onclick="window.location.href='./index.php?controller=Ejercicio&amp;action=CardioListar'" class="btn btn-primary">Volver</button> 
                </div>
            </div>
        </div>
    </div>
</html>
