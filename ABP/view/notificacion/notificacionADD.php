<?php
    $view=ViewManager::getInstance();
?>

<!DOCTYPE html>
<html>    
<div class="content-wrapper">
            <div class="container-fluid">
                <!-- Breadcrumbs-->
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="#">notificacion</a>
                    </li>
                    <li class="breadcrumb-item active">ADD</li>
                </ol>
                <!-- Example DataTables Card-->
                <div class="card mb-3">
                    <div class="card-header">
                        <i class="fa fa-table"></i> Añadir Notificacion</div>
                    <div class="card-body">      
                      <div id="flash"><?= $view->popFlash() ?></div>      
            <form name = 'Form' action='./index.php?controller=Notificacion&amp;action=NotificacionADD' method='post' onsubmit='return comprobar_notificacion()'>
        <div class="form-group">
                <div class="form-row">
                <div class="col-md-6">
                    <label for="dniAdministrador">DNI Administrador: </label>
                    <input class="form-control" type = 'text' name = 'dniAdministrador' size = '10' value = '<?php echo $_SESSION['currentuser']; ?>' required readonly onblur="esVacio(this)  && comprobarText(this, 10)" >

                     </div>
                <div class="col-md-6">
                    <label for="Asunto">Asunto : </label>
                    <input class="form-control" type = 'text' name = 'Asunto' size = '50' value = '' required  onblur="esVacio(this)  && comprobarText(this, 50)" >
                     </div>
            </div>
        </div>
        <div class="form-group">
                <div class="form-row">

                    <label for="contenido">Contenido : </label>
                    <textarea class="form-control" name = 'contenido' rows="6"  value = '' required  onblur="esVacio(this)  && comprobarText(this, 65535)" ></textarea>


                                 </div>
        </div>
        <br>

                                 <button type="button" onclick="window.location.href='./index.php?controller=Notificacion&amp;action=NotificacionListar'" class="btn btn-default">Volver</button> 
                                <button  type='submit' name='action' value='NotificacionADD' class="btn btn-primary">Insertar</button>
                                
                    </div>
                </div>
                </form>
</div>
            </div>
        </div>
    </div>
</html>