<?php
require_once(__DIR__."/../../core/ViewManager.php");

    $view = ViewManager::getInstance();

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
                <i class="fa fa-table"></i><?= i18n("Ver Contacto") ?>
            </div>
            <div class="card-body">
                <b><?= i18n("Teléfono atención al cliente") ?>:</b> <p><?php echo "902231267"; ?></p>
                <b><?= i18n("WhatsApp") ?>:</b> <p><?php echo "623789836"; ?></p>
                <td>
                        <a href='www.facebook.com'><span id="icon-face" class="icon-face"></span>
                        </a>
                </td>
                <b><?= i18n("Fcebook") ?>:</b> <p><?php echo "facebook.com/GymApp"; ?></p>
                <td>
                        <a href='www.twitter.com'><span id="icon-face" class="icon-face"></span>
                        </a>
                </td>
                
                <b><?= i18n("Twitter") ?>:</b><p> <?php echo "@GymApp"; ?></p>
                <b><?= i18n("Correo") ?>: </b><p> <?php echo "atencionGymapp@gmail.com"; ?></p> 
                

                <button type="button" onclick="window.location.href='./index.php?controller=main&action=index'" class="btn btn-primary"><?= i18n("Volver") ?></button> 
            </div>
        </div>
    </div>
</div>