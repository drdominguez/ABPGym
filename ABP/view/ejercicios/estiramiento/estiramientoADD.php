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
                        <a href="../Controller/usuario_Controller.php">Usuarios</a>
                    </li>
                    <li class="breadcrumb-item active">ADD</li>
                </ol>
                <!-- Example DataTables Card-->
                <div class="card mb-3">
                    <div class="card-header">
                        <i class="fa fa-table"></i> Añadir Estiramiento</div>
                    <div class="card-body">      
                    <div id="flash"><?= $view->popFlash() ?></div>
                    <form name='Form' id="form1" action="index.php?controller=Login&amp;action=login" class="form-signin" accept-charset="UTF-8" method="POST">
                    	<div class="form-group">
                            <div class="form-row">
                              <div class="col-md-6">
                            <label for="exampleInputNombre">Nombre</label>
                            <input class="form-control" name="nombre" id="exampleInputNombre" type="TEXT" aria-describedby="emailHelp" placeholder="Nombre" onblur="esVacio(this)  && comprobarText(this,15)">
                            </div>
                            <div class="col-md-6">
                            <label for="exampleInputTiempo">Descripción</label>
                            <input class="form-control" name="descripcion" id="exampleInputDescripcion" type="TEXT" aria-describedby="emailHelp" placeholder="Descripción" onblur="esVacio(this)  && comprobarText(this,15)">
                        </div>
                             </div>
                         </div>
                        <div class="form-group">
                             <div class="form-row">
                                 <div class="col-md-6">
                            <label for="exampleInputTiempo">Video</label>
                            <input class="form-control" name="video" id="exampleInputVideo" type="TEXT" aria-describedby="emailHelp" placeholder="Video" onblur="esVacio(this)  && comprobarText(this,15)">
                                 </div>
                                 <div class="col-md-6">
                            <label for="exampleInputTiempo">Imagen</label>
                            <input class="form-control" name="imagen" id="exampleInputImagen" type="TEXT" aria-describedby="emailHelp" placeholder="Imagen" onblur="esVacio(this)  && comprobarText(this,15)">
                        </div>
                             </div>
                        </div>
                        <div class="form-group">
                             <div class="form-row">
                                <div class="col-md-6">
                            <label for="exampleInputTiempo">Tiempo</label>
                            <input class="form-control" name="tiempo" id="exampleInputTiempo" type="TEXT" aria-describedby="emailHelp" placeholder="Tiempo" onblur="esVacio(this)  && comprobarText(this,15)">
                        </div>
                                <div class="col-md-6">
                            <label for="exampleInputUnidad">Unidad</label>
                            <input class="form-control" id="exampleInputUnidad" name="unidad" type="TEXT" placeholder="Unidad duración" onblur="esVacio(this)  && comprobarText(this,32)">
                        </div>
                             </div>
                        </div>

                    </form>

                    <button type="button" onclick="window.location.href='../controller/EjercicioController.php?action=default'" class="btn btn-default">Volver</button> 
                     <button type='submit' name='action' form="form1" value='ADD' class="btn btn-primary">Insertar</button> 
                </div>
            </div>
        </div>
    </div>
</html>