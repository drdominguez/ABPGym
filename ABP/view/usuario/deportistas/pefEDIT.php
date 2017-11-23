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
                <a href=""><?= i18n("Gestión de deportistas") ?></a>
            </li>
            <li class="breadcrumb-item active"><?= i18n("Editar") ?></li>
        </ol>
        <!-- Example DataTables Card-->
        <form name = 'Form' action='./index.php?controller=Deportista&amp;action=PefEDIT' method='post' onsubmit='return validarUsuarioEDIT()'>
            <div class="card mb-3">
                <div class="card-header">
                    <i class="fa fa-table"></i><?= i18n("Editar deportista") ?>
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
                                <label for="tarjeta"><?= i18n("Tarjeta") ?>: </label>
                                <input class="form-control" type = 'text' name = 'nombre' size = '60' value = '<?php echo $usuario->getTarjeta(); ?>'  onchange="comprobarVacio(this)  && comprobarTexto(this,30)" >
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-md-6">
                                <label for="comentario"><?= i18n("Comentario") ?>: </label>
                                <input class="form-control" type = 'text' name = 'comentario' size = '60' value = '<?php echo $usuario->getComentario(); ?>'  onchange="comprobarVacio(this)  && comprobarTexto(this,30)" >
                            </div>
                        </div>
                    </div>
                    <button type="button" onclick="window.location.href='./index.php?controller=Deportista&amp;action=listarPEF'" class="btn btn-default"><?= i18n("Volver") ?></button>
                    <button  type='submit' name='action' value='PefEDIT' class="btn btn-primary"><?= i18n("Editar") ?></button>

        </form>
    </div>
</div>
</html>