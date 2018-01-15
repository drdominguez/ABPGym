<?php
$view=ViewManager::getInstance();
$usuario = $view->getVariable("usuario");
$currentuser = $view->getVariable("currentusername");
?>

<!DOCTYPE html>
<html>    
    <div class="content-wrapper">
        <div class="container-fluid">
            <!-- Breadcrumbs-->
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href=""><?= i18n("Gestión de usuarios") ?></a>
                </li>
                <li class="breadcrumb-item active"><?= i18n("Editar") ?></li>
            </ol>
            <!-- Example DataTables Card-->
            <form name = 'Form' action='./index.php?controller=Usuario&amp;action=UsuarioEDIT' enctype="multipart/form-data" method='post' onsubmit="return validarUsuarioEDIT();">
                <div class="card mb-3">
                    <div class="card-header">
                        <i class="fa fa-table"></i><?= i18n("Editar usuario") ?>
                    </div>
                    <div class="card-body">      
                        <div id="flash"><?= $view->popFlash() ?></div>      
                       <div class="form-group">
                        <div class="form-row">
                          <div class="col-md-6">
                        <label for="dni"><?= i18n("DNI") ?>: </label>
                        <input class="form-control" type = 'text' name = 'dni' size = '9' readonly value = '<?php echo $usuario->getDni(); ?>'  onchange="comprobarVacio(this)  && comprobarDni(this)" >
                        </div>
                        <div class="col-md-6">
                        <label for="nombre"><?= i18n("Nombre") ?>: </label>
                        <input class="form-control" type = 'text' name = 'nombre' size = '30' value = '<?php echo $usuario->getNombre(); ?>'  onchange="comprobarVacio(this)  && comprobarTexto(this,50)" >
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                        <div class="form-row">
                          <div class="col-md-6">
                        <label for="apellidos"><?= i18n("Apellidos") ?>: </label>
                        <input class="form-control" type = 'text' name = 'apellidos' size = '30' value = '<?php echo $usuario->getApellidos(); ?>'  onchange="comprobarVacio(this)  && comprobarTexto(this,50)" >
                        </div>
                        <div class="col-md-6">
                        <label for="edad"><?= i18n("Edad") ?>: </label>
                        <input class="form-control" type = 'text' name = 'edad' size = '4' value = '<?php echo $usuario->getEdad(); ?>'  onchange="comprobarVacio(this)  && comprobarSolonum(this) && comprobarEntero(this,0,200)" >
                        </div>
                      </div>
                    </div>
                     <div class="form-group">
                        <div class="form-row">
                        <div class="col-md-6">
                        <label for="email"><?= i18n("Email") ?>: </label>
                        <input class="form-control" type = 'text' name = 'email' size = '100' value = '<?php echo $usuario->getEmail(); ?>'  onchange="comprobarVacio(this)  &&  comprobarEmail(this) && comprobarTexto(this,100)" >
                        </div>
                         <div class="col-md-6">
                        <label for="telefono"><?= i18n("Teléfono") ?>: </label>
                        <input class="form-control" type = 'text' name = 'telefono' size = '20' value = '<?php echo $usuario->getTelefono(); ?>'  onchange="comprobarVacio(this)  && comprobarTelf(this)" >
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                        <div class="form-row">
                          <div class="col-md-6">
                        <label for="contrasena"><?= i18n("Contraseña") ?>: </label>
                        <input class="form-control" type = 'password' name = 'contrasena' size = '30' onchange="comprobarTexto(this,30)" value = ''>
                        </div>
                      </div>
                    </div>
                     <div class="form-group">
                        <div class="form-row">
                         <div class="col-md-6">
                        <label for="exampleInputTiempo"><?= i18n("Imagen") ?>: </label>
                        <input class="form-control" name="fotoperfil" accept=".jpg, .jpeg, .png" id="exampleInputImagen" type="file" aria-describedby="emailHelp" placeholder="Imagen" >
                        </div>
                          <div class="col-md-6">
                                <img src="<?php echo $usuario->getFotoPerfil(); ?>" height="300" width="300">   
                        </div>
                      </div>
                    </div>
                    <input type="hidden" name="imagenvieja" value="<?php echo $usuario->getFotoPerfil(); ?>">
                <button type="button" onclick="window.location.href='./index.php?controller=Usuario&amp;action=UsuariosListar'" class="btn btn-default"><?= i18n("Volver") ?></button> 
                <button  type='submit' name='action' value='UsuarioEDIT' class="btn btn-primary"><?= i18n("Editar") ?></button>

            </form>
        </div>
    </div>
</html>