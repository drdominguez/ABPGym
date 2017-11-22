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
                        <a>Gestión</a>
                    </li>
                    <li class="breadcrumb-item active">Ejercicios</li>
                </ol>
                <!-- Example DataTables Card-->
                <div class="card mb-3">
                    <div class="card-header">
                        <i class="fa fa-table"></i>Detalles Muscular</div>
                    <div class="card-body">      
                    <div id="flash"><?= $view->popFlash() ?></div>
                    <form name='Form' id="form1" class="form-signin" accept-charset="UTF-8">
                        <div class="form-group">
                            <div class="form-row">
                              <div class="col-md-6">
                            <label for="exampleInputNombre">Nombre</label>
                            <input class="form-control" name="nombre" id="exampleInputNombre" type="TEXT" aria-describedby="emailHelp" value="<?php echo $muscular->getNombre() ?>" readonly="readonly" onblur="esVacio(this)  && comprobarText(this,15)">
                            </div>
                            <div class="col-md-6">
                            <label for="exampleInputTiempo">Descripción</label>
                            <textarea class="form-control" name="descripcion" rows="2" readonly="readonly"><?php echo $muscular->getDescripcion() ?></textarea>
                        </div>
                             </div>
                         </div>
                        <div class="form-group">
                             <div class="form-row">
                                 <div class="col-md-6">
                            <label for="exampleInputTiempo">Video</label>
                            <input class="form-control" name="video" id="exampleInputVideo" value="<?php echo $muscular->getVideo() ?>" readonly="readonly" type="file" aria-describedby="emailHelp" onblur="esVacio(this)  && comprobarText(this,15)">
                                 </div>
                                 <div class="col-md-6">
                            <label for="exampleInputTiempo">Imagen</label>
                            <input class="form-control" name="imagen" id="exampleInputImagen" type="file" aria-describedby="emailHelp" value="<?php echo $muscular->getImagen() ?>" readonly="readonly" onblur="esVacio(this)  && comprobarText(this,15)">
                        </div>
                             </div>
                        </div>
                        <div class="form-group">
                             <div class="form-row">
                                <div class="col-md-6">
                                    <label for="exampleInputCarga">Carga</label>
                                    <input class="form-control" name="carga" id="exampleInputCarga" type="TEXT" aria-describedby="emailHelp" value="<?php echo $muscular->getCarga() ?>" readonly="readonly" onblur="esVacio(this)  && comprobarText(this,15)">
                                </div>
                                <div class="col-md-6">
                                     <label for="exampleInputCarga">Repeticiones</label>
                                    <input class="form-control" name="repeticiones" id="exampleInputRepeticiones" type="TEXT" aria-describedby="emailHelp" value="<?php echo $muscular->getRepeticiones() ?>" readonly="readonly" onblur="esVacio(this)  && comprobarText(this,15)">
                                </div>
                             </div>
                        </div>
                    </form>
                       <button type="button" onclick="window.location.href='./index.php?controller=Ejercicio&amp;action=MuscularListar'" class="btn btn-default"><?= i18n("Volver") ?></button>
                    </div>
                </div>
            </div>
    </div>
</html>