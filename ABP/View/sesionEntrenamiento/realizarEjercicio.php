<?php
    $view=ViewManager::getInstance();

    $ejercicios=$view->getVariable("ejercicio");
?>
<!DOCTYPE html>
<html>
<?php foreach($ejercicios as $ejercicio){
    if(get_class($ejercicio)=="EjercicioCardio"){?>
      <div class="content-wrapper">
            <div class="container-fluid">
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
                        <b><?= i18n("Tiempo") ?>:</b> <?php echo $cardio->getTiempo(); ?><br>
                        <b><?= i18n("Unidad") ?>:</b> <?php echo $cardio->getUnidad(); ?><br>
                        <b><?= i18n("Distancia") ?>:</b> <?php echo $cardio->getDistancia(); ?><br>
                        <button type="button" onclick="window.location.href='./index.php?controller=Ejercicio&amp;action=CardioListar'" class="btn btn-primary">Volver</button> 
                    </div>
                </div>
            </div>
        </div>
    <?php }
    if(get_class($ejercicio)=="EjercicioEstiramiento"){?>
        <div class="content-wrapper">
            <div class="container-fluid">
                <!-- Example DataTables Card-->
                <div class="card mb-3">
                    <div class="card-header">
                        <i class="fa fa-table"></i><?= i18n("Mostrar Ejercicio") ?>
                    </div>
                    <div class="card-body">
                        <b><?= i18n("Id") ?>:</b> <?php echo $ejercicio->getIdEjercicio(); ?><br>
                        <b><?= i18n("Nombre") ?>:</b> <?php echo $ejercicio->getNombre(); ?><br>
                        <b><?= i18n("Descripcion") ?>:</b> <?php echo $ejercicio->getDescripcion(); ?><br>
                        <b><?= i18n("Video") ?>:</b> <?php echo $ejercicio->getVideo() ?><br>
                        <b><?= i18n("Imágen") ?>:</b> <?php echo $ejercicio->getImagen(); ?><br>
                        <b><?= i18n("Tiempo") ?>:</b> <?php echo $ejercicio->getTiempo(); ?><br>
                        <b><?= i18n("Unidad") ?>:</b> <?php echo $ejercicio->getUnidad(); ?><br>
                        <button type="button" onclick="window.location.href='./index.php?controller=Ejercicio&amp;action=estiramientoListar'" class="btn btn-primary">Volver</button> 
                    </div>
                </div>
            </div>
        </div>
    <?php }
    if(get_class($ejercicio)=="EjercicioMuscular"){?>
        <div class="content-wrapper">
            <div class="container-fluid">
                <!-- Example DataTables Card-->
                <div class="card mb-3">
                    <div class="card-header">
                        <i class="fa fa-table"></i><?= i18n("Mostrar Ejercicio") ?>
                    </div>
                    <div class="card-body">
                        <b><?= i18n("Id") ?>:</b> <?php echo $ejercicio->getIdEjercicio(); ?><br>
                        <b><?= i18n("Nombre") ?>:</b> <?php echo $ejercicio->getNombre(); ?><br>
                        <b><?= i18n("Descripcion") ?>:</b> <?php echo $ejercicio->getDescripcion(); ?><br>
                        <b><?= i18n("Video") ?>:</b> <?php echo $ejercicio->getVideo() ?><br>
                        <b><?= i18n("Imágen") ?>:</b> <?php echo $ejercicio->getImagen(); ?><br>
                        <b><?= i18n("Carga") ?>:</b> <?php echo $ejercicio->getCarga(); ?><br>
                        <b><?= i18n("Repeticiones") ?>:</b> <?php echo $ejercicio->getRepeticiones(); ?><br>
                        <button type="button" onclick="window.location.href='./index.php?controller=Ejercicio&amp;action=MuscularListar'" class="btn btn-primary">Volver</button> 
                    </div>
                </div>
            </div>
        </div>
    <?php { 
{?>
    <label for="exampleInputTiempo">Comentario</label>
    <textarea class="form-control" name="comentarios" rows="4"></textarea>
    <button type="button" onclick="window.location.href='./index.php?controller=Ejercicio&amp;action=MuscularListar'" class="btn btn-primary">Guardar</button>
</html>