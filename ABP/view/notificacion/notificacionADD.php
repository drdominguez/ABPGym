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
                        <i class="fa fa-table"></i><?= i18n("Enviar notificacion") ?></div>
                    <div class="card-body">      
                            
            <form name = 'Form' action='./index.php?controller=Notificacion&amp;action=NotificacionADD' method='post' onsubmit='return comprobar_notificacion()'>
        <div class="form-group">
                <div class="form-row">

                    <label for="Asunto"><?= i18n("Asunto") ?>: </label>
                    <input class="form-control" type = 'text' name = 'Asunto' size = '50' value = '' required  onblur="esVacio(this)  && comprobarText(this, 50)" >
                     </div>
        </div>
        <div class="form-group">
                <div class="form-row">

                    <label for="contenido"><?= i18n("contenido") ?> : </label>
                    <textarea class="form-control" name = 'contenido' rows="6"  value = '' required  onblur="esVacio(this)  && comprobarText(this, 65535)" ></textarea>


                                 </div>
        </div>
        <br>

                                 <button type="button" onclick="window.location.href='./index.php?controller=Notificacion&amp;action=NotificacionListar'" class="btn btn-default"><?= i18n("Volver") ?></button> 
                                <button  type='submit' name='action' value='NotificacionADD' class="btn btn-primary"><?= i18n("Enviar") ?></button>
                                
                    </div>
                </div>
                </form>
</div>
            </div>
        </div>
    </div>
</html>