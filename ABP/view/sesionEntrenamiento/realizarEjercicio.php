<?php
    $view=ViewManager::getInstance();
    $ejercicios=$view->getVariable("ejercicios");
?>
<html>
<header>
    <link rel="stylesheet" href="./view/css/crono.css" type="text/css">
    <script src="./view/js/crono.js"></script>
</header>
<div class="content-wrapper">
    <div class="card-header">
        <i  class="fa fa-table"></i><?= i18n("Realizar Sesión") ?>
    </div>
    <div class="container-fluid">
        <div class="card mb-3">
        </div>
    </div>
        <?php foreach($ejercicios as $ejercicio){
            if(get_class($ejercicio)=="EjercicioEstiramiento"){?>
                        <!-- Example DataTables Card-->
                        <div class="card mb-3">
                            <div class="card-body">
                                <b><?= i18n("Nombre") ?>:</b> <?php echo $ejercicio->getNombre(); ?><br>
                                <b><?= i18n("Descripcion") ?>:</b> <?php echo $ejercicio->getDescripcion(); ?><br>
                                <b><?= i18n("Video") ?>:</b> <?php echo $ejercicio->getVideo() ?><br>
                                <b><?= i18n("Imágen") ?>:</b> <?php echo $ejercicio->getImagen(); ?><br>
                                <b><?= i18n("Tiempo") ?>:</b> <?php echo $ejercicio->getTiempo(); ?><br><br>
                            </div>
                        </div>
            <?php }
            if(get_class($ejercicio)=="EjercicioCardio"){?>
                <div class="card mb-3">
                        <div class="card-body">
                            <b><?= i18n("Nombre") ?>:</b> <?php echo $ejercicio->getNombre(); ?><br>
                            <b><?= i18n("Descripcion") ?>:</b> <?php echo $ejercicio->getDescripcion(); ?><br>
                            <b><?= i18n("Video") ?>:</b> <?php echo $ejercicio->getVideo() ?><br>
                            <b><?= i18n("Imágen") ?>:</b> <?php echo $ejercicio->getImagen(); ?><br>
                            <b><?= i18n("Tiempo") ?>:</b> <?php echo $ejercicio->getTiempo(); ?><br>
                            <b><?= i18n("Distancia") ?>:</b> <?php echo $ejercicio->getDistancia(); ?><br><br>
                        </div>
                </div>
        <?php }
            if(get_class($ejercicio)=="EjercicioMuscular"){ ?>
                        <!-- Example DataTables Card-->
                        <div class="card mb-3">
                            <div class="card-body">
                                <b><?= i18n("Nombre") ?>:</b> <?php echo $ejercicio->getNombre(); ?><br>
                                <b><?= i18n("Descripcion") ?>:</b> <?php echo $ejercicio->getDescripcion(); ?><br>
                                <b><?= i18n("Video") ?>:</b> <?php echo $ejercicio->getVideo() ?><br>
                                <b><?= i18n("Imágen") ?>:</b> <?php echo $ejercicio->getImagen(); ?><br>
                                <b><?= i18n("Carga") ?>:</b> <?php echo $ejercicio->getCarga(); ?><br>
                                <b><?= i18n("Repeticiones") ?>:</b> <?php echo $ejercicio->getRepeticiones(); ?><br><br>
                            </div>
                        </div>
            <?php }  
}?>
               <!-- Example DataTables Card-->
                <div class="card mb-3">
                    <div class="card-header">
                        <div id="contenedor">
                            <div class="reloj" id="Horas">00</div>
                            <div class="reloj" id="Minutos">:00</div>
                            <div class="reloj" id="Segundos">:00</div>
                            <div class="reloj" id="Centesimas">:00</div>
                            <input type="button" class="btn btn-primary" id="inicio" value="Start &#9658;" onclick="inicio();">
                            <input type="button" class="btn btn-primary" id="parar" value="Stop &#8718;" onclick="parar();" disabled>
                            <input type="button" class="btn btn-primary" id="continuar" value="Resume &#8634;" onclick="inicio();" disabled>
                        </div>
                        <form name='Form' id="form1" action="index.php?controller=SesionEntrenamiento&amp;action=realizarTabla" class="form-signin" accept-charset="UTF-8" enctype="multipart/form-data" method="POST">
                            <label for="exampleInputTiempo">Comentario</label>
                            <textarea class="form-control" name="comentarios" placeholder="Añade un comentario para esta sesión" rows="4"></textarea><br>
                            <input  type="text" hidden="true" id="tiempo" name="tiempo" value="">
                            <input  type="text" hidden="true" name="idTabla" value="<?php echo $view->getVariable("idTabla"); ?>">
                        </form>
                        <button type="button" onclick="window.location.href='./index.php?controller=SesionEntrenamiento&amp;action=TablaListar'" class="btn btn-default"><?= i18n("Volver") ?></button> 
                         <button type='submit' id="btnGuardar" name='action' form="form1" value='ADD' class="btn btn-primary"><?= i18n("Guardar") ?></button> 
                    </div>
                </div>
            </div>
</html>