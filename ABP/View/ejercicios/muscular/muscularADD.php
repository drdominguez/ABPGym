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
                        <i class="fa fa-table"></i> Añadir Muscular</div>
                    <div class="card-body">      
                    <div id="flash"><?= $view->popFlash() ?></div>
                    <form name='Form' id="form1" action="index.php?controller=Ejercicio&amp;action=muscularADD" class="form-signin" accept-charset="UTF-8" method="POST">
                    	<div class="form-group">
                            <div class="form-row">
                              <div class="col-md-6">
                            <label for="exampleInputNombre">Nombre</label>
                            <input class="form-control" name="nombre" id="exampleInputNombre" type="TEXT" aria-describedby="emailHelp" placeholder="Nombre" required onblur="esVacio(this)  && comprobarText(this,15)">
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
                            <input class="form-control" name="video" id="exampleInputVideo" type="file" aria-describedby="emailHelp" placeholder="Video" onblur="esVacio(this)  && comprobarText(this,15)">
                                 </div>
                                 <div class="col-md-6">
                            <label for="exampleInputTiempo">Imagen</label>
                            <input class="form-control" name="imagen" id="exampleInputImagen" type="file" aria-describedby="emailHelp" placeholder="Imagen" onblur="esVacio(this)  && comprobarText(this,15)">
                        </div>
                             </div>
                        </div>
                        <div class="form-group">
                             <div class="form-row">
                                <div class="col-md-6">
                                    <label for="exampleInputCarga">Carga</label>
                                    <input class="form-control" name="carga" id="exampleInputCarga" type="TEXT" aria-describedby="emailHelp" placeholder="Carga" required onblur="esVacio(this)  && comprobarText(this,15)">
                                </div>
                                <div class="col-md-6">
                                     <label for="exampleInputCarga">Repeticiones</label>
                                    <input class="form-control" name="repeticiones" id="exampleInputRepeticiones" type="TEXT" aria-describedby="emailHelp" placeholder="Repeticiones" required onblur="esVacio(this)  && comprobarText(this,15)">
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