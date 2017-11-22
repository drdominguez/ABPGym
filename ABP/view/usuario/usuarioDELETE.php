<?php
    require_once(__DIR__."/../../core/ViewManager.php");

    $view = ViewManager::getInstance();
    $usuario = $view->getVariable("usuario");
    $currentuser = $view->getVariable("currentusername");
    $errors = $view->getVariable("errors");
    $view->setVariable("title", "Borrar Usuario");
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
                <i class="fa fa-table"></i><?= i18n("Borrar usuario") ?>
            </div>
            <div class="card-body">
                <form name = 'Form' id="form1" action = './index.php?controller=Usuario&amp;action=UsuarioDELETE' method = 'post' onsubmit = 'comprobar()'>
                    <b><?= i18n("DNI") ?>:</b> <?php echo $usuario->getDni(); ?><br>
                    <b><?= i18n("Nombre") ?>:</b> <?php echo $usuario->getNombre(); ?><br>
                    <b><?= i18n("Apellidos") ?>:</b> <?php echo $usuario->getApellidos(); ?><br>
                    <b><?= i18n("Edad") ?>:</b> <?php echo $usuario->getEdad(); ?><br>
                    <b><?= i18n("Email") ?>: </b> <?php echo $usuario->getEmail(); ?><br>
                    <b><?= i18n("Teléfono") ?>: </b> <?php echo $usuario->getTelefono(); ?><br>  
                    <b><?= i18n("Fecha de Alta") ?>: </b> <?php echo $usuario->getFecha(); ?><br>    
                    <input type="hidden" name="dni" value="<?php echo $usuario->getDni(); ?>">
                    <input type="hidden" name="borrar" value="ok">
                    <button type="button" onclick="window.location.href='./index.php?controller=Usuario&amp;action=UsuarioDELETE'" class="btn btn-default">Volver</button> 
                    <button  type='submit' name='action' value='UsuarioDELETE' class="btn btn-primary"><?= i18n("Borrar") ?></button>
                </form>
            </div>
        </div>
    </div>
</div>