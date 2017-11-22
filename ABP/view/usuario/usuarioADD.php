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
                <i class="fa fa-table"></i><?= i18n("Añadir usuario") ?>
            </div>
            <div class="card-body">                  
                <form name = 'Form' action='./index.php?controller=Usuario&amp;action=UsuarioADD' method='post' onsubmit='return validarUsuarioADD()'>
                    <div class="form-group">
                        <div class="form-row">
                          <div class="col-md-6">
                        <label for="dni"><?= i18n("DNI") ?>: </label>
                        <input class="form-control" type = 'text' name = 'dni' size = '9' value = ''  onchange="comprobarVacio(this)  && comprobarDni(this)" >
                        </div>
                        <div class="col-md-6">
                        <label for="nombre"><?= i18n("Nombre") ?>: </label>
                        <input class="form-control" type = 'text' name = 'nombre' size = '30' value = ''  onchange="comprobarVacio(this)  && comprobarTexto(this,30)" >
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                        <div class="form-row">
                          <div class="col-md-6">
                        <label for="apellidos"><?= i18n("Apellidos") ?>: </label>
                        <input class="form-control" type = 'text' name = 'apellidos' size = '30' value = ''  onchange="comprobarVacio(this)  && comprobarTexto(this,30)" >
                        </div>
                        <div class="col-md-6">
                        <label for="edad"><?= i18n("Edad") ?>: </label>
                        <input class="form-control" type = 'text' name = 'edad' size = '4' value = ''  onchange="comprobarVacio(this)  && comprobarSolonum(this) && comprobarEntero(this,0,200)" >
                        </div>
                      </div>
                    </div>
                     <div class="form-group">
                        <div class="form-row">
                          <div class="col-md-6">
                        <label for="contrasena"><?= i18n("Contraseña") ?>: </label>
                        <input class="form-control" type = 'password' name = 'contrasena' size = '30' value = ''  onchange="comprobarVacio(this)  && comprobarTexto(this,30)" >
                        </div>
                        <div class="col-md-6">
                        <label for="email"><?= i18n("Email") ?>: </label>
                        <input class="form-control" type = 'text' name = 'email' size = '100' value = ''  onchange="comprobarVacio(this)  &&  comprobarEmail(this) && comprobarTexto(this,100)" >
                        </div>
                      </div>
                    </div>
                       <div class="form-group">
                        <div class="form-row">
                          <div class="col-md-6">
                        <label for="telefono"><?= i18n("Teléfono") ?>: </label>
                        <input class="form-control" type = 'text' name = 'telefono' size = '20' value = ''  onchange="comprobarVacio(this)  && comprobarTelf(this)" >
                        </div>
                      </div>
                    </div>
                    <br>
                    <button type="button" onclick="window.location.href='./index.php?controller=Usuario&amp;action=UsuariosListar'" class="btn btn-default"><?= i18n("Volver") ?></button> 
                    <button  type='submit' name='action' value='UsuarioADD' class="btn btn-primary"><?= i18n("Añadir") ?></button>
                </form>
            </div>
        </div>
    </div>
</div>
</html>