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
                <b><?= i18n("DNI") ?>:</b> <?php echo $usuario->getDni(); ?><br>
                <b><?= i18n("Nombre") ?>:</b> <?php echo $usuario->getNombre(); ?><br>
                <b><?= i18n("Apellidos") ?>:</b> <?php echo $usuario->getApellidos(); ?><br>
                <b><?= i18n("Edad") ?>:</b> <?php echo $usuario->getEdad(); ?><br>
                <b><?= i18n("Email") ?>: </b> <?php echo $usuario->getEmail(); ?><br>
                <b><?= i18n("Teléfono") ?>: </b> <?php echo $usuario->getTelefono(); ?><br>  
                <b><?= i18n("Fecha de Alta") ?>: </b> <?php echo $usuario->getFecha(); ?><br><br>    
                <b><?= i18n("Foto de Perfil") ?>: </b><img src="<?php echo $usuario->getFotoPerfil(); ?>" height="300" width="300"><br>  

                <button type="button" onclick="window.location.href='./index.php?controller=Usuario&amp;action=UsuariosListar'" class="btn btn-primary">Volver</button> 
            </div>
        </div>
    </div>
</div>