<?php
require_once(__DIR__."</../../../core/ViewManager.php");

$view = ViewManager::getInstance();
$deportista = $view->getVariable("deportista");
$currentuser = $view->getVariable("currentusername");
$errors = $view->getVariable("errors");
$view->setVariable("title", "Borrar Deportista PEF");
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
                <i class="fa fa-table"></i><?= i18n("Borrar deportista") ?>
            </div>
            <div class="card-body">
                <form name = 'Form' id="form1" action = './index.php?controller=Deportista&amp;action=pefDELETE' method = 'post' onsubmit = 'comprobar()'>
                       <b><?= i18n("DNI") ?>:</b> <?php echo $deportista["dni"]; ?><br>
                <b><?= i18n("Nombre") ?>:</b> <?php echo $deportista["nombre"]; ?><br>
                <b><?= i18n("Apellidos") ?>:</b> <?php echo $deportista["apellidos"]; ?><br>
                <b><?= i18n("Edad") ?>:</b> <?php echo $deportista["edad"]; ?><br>
                <b><?= i18n("Email") ?>:</b> <?php echo $deportista["email"]; ?><br>
                <b><?= i18n("Telefono") ?>:</b> <?php echo $deportista["telefono"]; ?><br>
                <b><?= i18n("Fecha Alta") ?>:</b> <?php echo $deportista["fechaAlta"]; ?><br>
                <b><?= i18n("Tarjeta") ?>:</b> <?php echo $deportista["tarjeta"]; ?><br>
                <b><?= i18n("Comentario") ?>:</b> <?php echo $deportista["comentarioRevision"]; ?><br>

                    <input type="hidden" name="dni" value="<?php echo $deportista["dni"]; ?>">
                    <input type="hidden" name="borrar" value="ok">
                    <button type="button" onclick="window.location.href='./index.php?controller=Deportista&amp;action=pefDELETE'" class="btn btn-default">Volver</button>
                    <button  type='submit' name='action' value='pefDELETE' class="btn btn-primary"><?= i18n("Borrar") ?></button>
                </form>
            </div>
        </div>
    </div>
</div>
