<?php
require_once(__DIR__."/../../core/ViewManager.php");

    $view = ViewManager::getInstance();
    $usuario = $view->getVariable("usuario");
    $currentuser = $view->getVariable("currentusername");
    $errors = $view->getVariable("errors");
    $view->setVariable("title", "Ver Usuario");
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
                <i class="fa fa-table"></i><?= i18n("Mostrar usuario") ?>
            </div>
            <div class="card-body">
                <b><?= i18n("DNI") ?>:</b> <p><?php echo $usuario->getDni(); ?></p><br>
                <b><?= i18n("Nombre") ?>:</b> <p><?php echo $usuario->getNombre(); ?></p><br>
                <b><?= i18n("Apellidos") ?>:</b> <p><?php echo $usuario->getApellidos(); ?></p><br>
                <b><?= i18n("Edad") ?>:</b> <p><?php echo $usuario->getEdad(); ?></p><br>
                <b><?= i18n("Email") ?>: </b> <p><?php echo $usuario->getEmail(); ?></p><br>
                <b><?= i18n("Teléfono") ?>: </b> <p><?php echo $usuario->getTelefono(); ?></p><br>  
                <b><?= i18n("Fecha de Alta") ?>: </b> <p><?php echo $usuario->getFecha(); ?></p><br>    
                <b><?= i18n("Foto de Perfil") ?>: </b><p><img src="<?php echo $usuario->getFotoPerfil(); ?>" height="300" width="300"></p><br>  

                <button type="button" onclick="window.location.href='./index.php?controller=Usuario&amp;action=UsuariosListar'" class="btn btn-primary">Volver</button> 
            </div>
        </div>
    </div>
</div>