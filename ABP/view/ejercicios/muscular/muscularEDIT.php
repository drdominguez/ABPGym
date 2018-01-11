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
                    <li class="breadcrumb-item">
                        <div id="flash"><?= $view->popFlash() ?></div>
                </ol>
                <!-- Example DataTables Card-->
                <div class="card mb-3">
                    <div class="card-header">
                        <i class="fa fa-table"></i>Editar Muscular</div>
                    <div class="card-body">
                    <form name='Form' id="form1" class="form-signin" action="index.php?controller=Ejercicio&amp;action=muscularEdit" accept-charset="UTF-8" method="POST">
                        <input class="form-control" name="idEjercicio" id="exampleInputIdEjercicio" type="hidden" aria-describedby="emailHelp" value="<?php echo $muscular->getIdEjercicio() ?>" readonly="readonly" onblur="esVacio(this)  && comprobarText(this,15)">
                        <div class="form-group">
                            <div class="form-row">
                            <div class="col-md-6">
                                <label for="exampleInputNombre">Nombre</label>
                                <input class="form-control" name="nombre" id="exampleInputNombre" type="TEXT" aria-describedby="emailHelp" value="<?php echo $muscular->getNombre() ?>" onblur="esVacio(this)  && comprobarText(this,15)">
                            </div>
                            <div class="col-md-6">
                                <label for="exampleInputTiempo">Descripción</label>
                               <textarea class="form-control" name="descripcion" value="descripcion" rows="2" ><?php echo $muscular->getDescripcion() ?></textarea>
                            </div>
                            </div>
                        </div>
                        <div class="form-group">
                             <div class="form-row">
                                 <div class="col-md-6">
                                    <label for="exampleInputTiempo">Video</label>
                                    <input class="form-control" name="video" id="exampleInputVideo" type="url" aria-describedby="emailHelp" placeholder="Video" value="https://www.youtube.com/embed/" onblur="esVacio(this)  && comprobarText(this,15)">
                                </div>
                                 <div class="col-md-6">
                                     <iframe width="280" height="155" allowfullscreen frameborder="0" src="<?php echo $muscular->getVideo(); ?>"></iframe>
                                </div>
                             </div>
                        </div>
                         <div class="form-group">
                             <div class="form-row">
                                 <div class="col-md-6">
                                    <label for="exampleInputTiempo">Imagen</label>
                                    <input class="form-control" name="imagen" id="exampleInputImagen" type="file" aria-describedby="emailHelp" >
                                </div>
                                 <div class="col-md-6">
                                  <img src="<?php echo $muscular->getImagen(); ?>" height="300" width="300">  
                                </div>
                             </div>
                        </div>
                    <input type="hidden" name="imagenvieja" value="<?php echo $muscular->getImagen(); ?>">
                    </form>
                    <button type="button" onclick="window.location.href='./index.php?controller=Ejercicio&amp;action=muscularListar'" class="btn btn-default"><?= i18n("Volver") ?></button> 
                    <button type='submit' name='action' form="form1" value='Edit' class="btn btn-primary"><?= i18n("Edit") ?></button> 
                </div>
            </div>
        </div>
    </div>
</html>
