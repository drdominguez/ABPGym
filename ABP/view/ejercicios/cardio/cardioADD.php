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
                        <i class="fa fa-table"></i> Añadir Cardio</div>
                    <div class="card-body">
                    <form name='Form' id="form1" action="index.php?controller=Ejercicio&amp;action=cardioADD" class="form-signin" accept-charset="UTF-8" enctype="multipart/form-data" method="POST" onsubmit="return validarCardioADD();">
                        <div class="form-group">
                            <div class="form-row">
                              <div class="col-md-6">
                                <label for="exampleInputNombre">Nombre</label>
                                <input class="form-control" name="nombre" id="exampleInputNombre" type="TEXT" aria-describedby="emailHelp" placeholder="Nombre" onblur="comprobarVacio(this)  && comprobarTexto(this,50)">
                              </div>
                                <div class="col-md-6">
                                    <label for="exampleInputTiempo">Descripción</label>
                                    <textarea class="form-control" name="descripcion" rows="2"></textarea>
                                </div>
                            </div>
                         </div>
                        <div class="form-group">
                             <div class="form-row">
                                 <div class="col-md-6">
                                    <label for="exampleInputTiempo">Video</label>
                                    <input class="form-control" name="video" id="exampleInputVideo" type="url" aria-describedby="emailHelp" placeholder="Video" value="https://www.youtube.com/embed/">
                                 </div>
                                <div class="col-md-6">
                                    <label for="exampleInputTiempo">Imagen</label>
                                    <input class="form-control" name="imagen" accept=".jpg, .jpeg, .png" id="exampleInputImagen" type="file" aria-describedby="emailHelp" placeholder="Imagen">
                                </div>
                             </div>
                        </div>
                    </form>
                    <button type="button" onclick="window.location.href='./index.php?controller=Ejercicio&amp;action=loadAddView'" class="btn btn-default"><?= i18n("Volver") ?></button> 
                     <button type='submit' name='action' form="form1" value='ADD' class="btn btn-primary">Insertar</button> 
                </div>
            </div>
        </div>
    </div>
</html>