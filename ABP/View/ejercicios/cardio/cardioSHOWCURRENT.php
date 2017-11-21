<?php
    $view=ViewManager::getInstance();
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
                        <i class="fa fa-table"></i> Ver Cardio</div>
                    <div class="card-body">      
                    <div id="flash"><?= $view->popFlash() ?></div>
                    <form name='Form' id="form1" class="form-signin" accept-charset="UTF-8">
                        <div class="form-group">
                            <div class="form-row">
                              <div class="col-md-6">
                                <label for="exampleInputNombre">Nombre</label>
                                <input class="form-control" name="nombre" id="exampleInputNombre" type="TEXT" aria-describedby="emailHelp" placeholder="Nombre" readonly="readonly" onblur="esVacio(this)  && comprobarText(this,15)">
                              </div>
                                <div class="col-md-6">
                                    <label for="exampleInputTiempo">Descripción</label>
                                    <textarea class="form-control" name="descripcion" readonly="readonly" rows="2"></textarea>
                                </div>
                            </div>
                         </div>
                        <div class="form-group">
                             <div class="form-row">
                                 <div class="col-md-6">
                                    <label for="exampleInputTiempo">Video</label>
                                    <input class="form-control" name="video" id="exampleInputVideo" type="file" aria-describedby="emailHelp" placeholder="Video" readonly="readonly" onblur="esVacio(this)  && comprobarText(this,15)">
                                 </div>
                                <div class="col-md-6">
                                    <label for="exampleInputTiempo">Imagen</label>
                                    <input class="form-control" name="imagen" id="exampleInputImagen" type="file" aria-describedby="emailHelp" placeholder="Imagen" readonly="readonly" onblur="esVacio(this)  && comprobarText(this,15)">
                                </div>
                             </div>
                        </div>
                        <div class="form-group">
                             <div class="form-row">
                                <div class="col-md-6">
                                    <label for="exampleInputTiempo">Tiempo</label>
                                    <input class="form-control" name="tiempo" id="exampleInputTiempo" type="TEXT" aria-describedby="emailHelp" placeholder="Tiempo" readonly="readonly" onblur="esVacio(this)  && comprobarText(this,15)">
                                </div>
                                <div class="col-md-6">
                                    <label for="exampleInputUnidad">Unidad</label>
                                    <input class="form-control" name="unidad" id="exampleInputUnidad" type="TEXT" aria-describedby="emailHelp" placeholder="Unidad" readonly="readonly" onblur="esVacio(this)  && comprobarText(this,15)">
                                 </div>
                             </div>
                        </div>
                        <div class="form-group">
                             <div class="form-row">
                                <div class="col-md-6">
                                    <label for="exampleInputTiempo">Distancia</label>
                                    <input class="form-control" name="distancia" id="exampleInputDistancia" type="TEXT" aria-describedby="emailHelp" placeholder="Distancia" readonly="readonly" onblur="esVacio(this)  && comprobarText(this,15)">
                                </div>
                             </div>
                        </div>
                    </form>
                    <button type="button" onclick="window.location.href='../controller/EjercicioController.php?action=default'" class="btn btn-default">Volver</button>
                </div>
            </div>
        </div>
    </div>
</html>
