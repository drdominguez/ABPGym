<!DOCTYPE html>
<html>
<header>
    <script src="./View/js/añadirDeportista.js"></script>
</header>
<?php
    $view=ViewManager::getInstance();
    if($view->getVariable("fragmento")!=""){
      $fragmento=$view->getVariable("fragmento");
    }
    $tipoDeportista = $view->getVariable("usuarioTipo");
?>
<div class="content-wrapper">
    <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <div id="flash"><?= $view->popFlash() ?></div>
        </ol>
        <!-- Example DataTables Card-->
        <div class="card mb-3">
            <div class="card-header">
              <label class="fa fa-table" id="anadirlabel"><?= i18n("Añadir Deportista");?></label>
            </div>
            <div class="card-body">
            <form name='Form' id="form1"  class="form-signin" accept-charset="UTF-8" onsubmit="return validarDeportistaADD()" enctype="multipart/form-data" method="POST" action='index.php?controller=Deportista&amp;action=deportistaADD'>
                <div class="form-group">
                    <div class="form-row">
                        <div class="col-md-6">
                        <label for="dni"><?= i18n("DNI") ?>: </label>
                        <input class="form-control" type = 'text' name = 'dni' size = '9' required="true" value = ''  onchange="comprobarVacio(this)  && comprobarDni(this)" >
                        </div>
                        <div class="col-md-6">
                        <label for="nombre"><?= i18n("Nombre") ?>: </label>
                        <input class="form-control" type = 'text' name = 'nombre' size = '30' required="true" value = ''  onchange="comprobarVacio(this)  && comprobarTexto(this,50)" >
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                        <div class="form-row">
                          <div class="col-md-6">
                        <label for="apellidos"><?= i18n("Apellidos") ?>: </label>
                        <input class="form-control" type = 'text' name = 'apellidos' size = '30' required="true" value = ''  onchange="comprobarVacio(this)  && comprobarTexto(this,50)" >
                        </div>
                        <div class="col-md-6">
                        <label for="edad"><?= i18n("Edad") ?>: </label>
                        <input class="form-control" type = 'text' name = 'edad' size = '4' required="true" value = ''  onchange="comprobarVacio(this)  && comprobarSolonum(this) && comprobarEntero(this,0,200)" >
                        </div>
                      </div>
                    </div>
                     <div class="form-group">
                        <div class="form-row">
                          <div class="col-md-6">
                        <label for="contrasena"><?= i18n("Contraseña") ?>: </label>
                        <input class="form-control" type = 'password' name = 'contrasena' size = '30' required="true" value = ''  onchange="comprobarVacio(this)  && comprobarTexto(this,30)" >
                        </div>
                        <div class="col-md-6">
                        <label for="email"><?= i18n("Email") ?>: </label>
                        <input class="form-control" type = 'text' name = 'email' size = '100' required="true" value = ''  onchange="comprobarVacio(this)  &&  comprobarEmail(this) && comprobarTexto(this,100)" >
                        </div>
                      </div>
                    </div>
                       <div class="form-group">
                        <div class="form-row">
                          <div class="col-md-6">
                        <label for="telefono"><?= i18n("Teléfono") ?>: </label>
                        <input class="form-control" type = 'text' name = 'telefono' size = '20' required="true" value = ''  onchange="comprobarVacio(this)  && comprobarTelf(this)" >
                        </div>
                        <div class="col-md-6">
                        <label for="exampleInputTiempo"><?= i18n("Imagen") ?>: </label>
                        <input class="form-control" name="fotoperfil" accept=".jpg, .jpeg, .png" id="exampleInputImagen" type="file" aria-describedby="emailHelp" placeholder="Imagen">
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                        <div class="form-row">
                          <div class="col-md-6">
                            <label for="Deportista"><?= i18n("Deportista") ?>: </label>
                            <select class="form-control" name="tipo[]" onChange="mostrar(this.value)">
                              <option value="PEF">PEF Ponte en Forma</option>
                              <option value="TDU">TDU Tarjeta Deportista Universitaria</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                        <label for="tarjeta"><?= i18n("Tarjeta")?>: </label>
                            <input class="form-control" type = 'text' name = 'tarjeta' size = '20' required="true" value = ''  onchange="comprobarVacio(this) && comprobarTexto(this,60)">
                        </div>
                      </div>
                    </div>
                     <label id="comentarioLabel" for="comentarioRevision"><?= i18n("Comentario Revisión")?>: </label>
                    <textarea class="form-control" id="textarea" rows="4"  type="text" name="comentarioRevision" placeholder=""></textarea><br>
                  <button type="button" onclick="window.location.href='./index.php?controller=Usuario&amp;action=UsuarioADD'" class="btn btn-default"><?= i18n("Volver") ?></button> 
                  <button type='submit' name='action' form="form1" value='ADD' class="btn btn-primary"><?= i18n("Añadir") ?></button>
                </form>
            </div>
        </div>
    </div>
</div>
</html>