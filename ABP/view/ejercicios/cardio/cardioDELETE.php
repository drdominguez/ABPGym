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
                    <li class="breadcrumb-item">
                        <a>Gestión</a>
                    </li>
                    <li class="breadcrumb-item active">Ejercicios</li>
                </ol>
                <!-- Example DataTables Card-->
                <div class="card mb-3">
                    <div class="card-header">
                        <i class="fa fa-table"></i>Eliminar Cardio</div>
                    <div class="card-body">      
                    <div id="flash"><?= $view->popFlash() ?></div>
                    <form name='Form' id="form1" class="form-signin" action="index.php?controller=Ejercicio&amp;action=cardioRemove" accept-charset="UTF-8" method="POST">
                         <input class="form-control" name="idEjercicio" id="exampleInputIdEjercicio" type="hidden" aria-describedby="emailHelp" value="<?php echo $cardio->getIdEjercicio() ?>" readonly="readonly" onblur="esVacio(this)  && comprobarText(this,15)">
                        <div class="form-group">
                            <div class="form-row">
                              <div class="col-md-6">
                                <label for="exampleInputNombre">Nombre</label>
                                <input class="form-control" name="nombre" id="exampleInputNombre" type="TEXT" aria-describedby="emailHelp" value="<?php echo $cardio->getNombre() ?>" readonly="readonly" onblur="esVacio(this)  && comprobarText(this,15)">
                              </div>
                                <div class="col-md-6">
                                    <label for="exampleInputTiempo">Descripción</label>
                                    <textarea class="form-control" name="descripcion" readonly="readonly" rows="2"><?php echo $cardio->getDescripcion() ?>
                                    </textarea>
                                </div>
                            </div>
                         </div>
                        <div class="form-group">
                             <div class="form-row">
                                <div class="col-md-6">
                                    <label for="exampleInputTiempo">Video</label>
                                    <input class="form-control" name="video" id="exampleInputVideo" type="file" aria-describedby="emailHelp" value="<?php echo $cardio->getVideo() ?>" readonly="readonly" onblur="esVacio(this)  && comprobarText(this,15)">
                                </div>
                                <div class="col-md-6">
                                    <label for="exampleInputTiempo">Imagen</label>
                                    <input class="form-control" name="imagen" id="exampleInputImagen" type="file" aria-describedby="emailHelp" value="<?php echo $cardio->getImagen() ?>" readonly="readonly" onblur="esVacio(this)  && comprobarText(this,15)">
                                </div>
                            </div>
                        </div>
                    </form>
                    <button type="button" onclick="window.location.href='./index.php?controller=Ejercicio&amp;action=cardioListar'" class="btn btn-default"><?= i18n("Volver") ?></button> 
                    <button type='submit' name='action' form="form1" value='Remove' class="btn btn-primary"><?= i18n("Eliminar") ?></button> 
                </div>
            </div>
        </div>
    </div>
</html>

