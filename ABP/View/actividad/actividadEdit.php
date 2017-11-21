<?php
    $view=ViewManager::getInstance();
    $actividad = $view->getVariable("actividad");
    $currentuser = $view->getVariable("currentusername");
?>

<!DOCTYPE html>
<html>    
    <div class="content-wrapper">
        <div class="container-fluid">
            <!-- Breadcrumbs-->
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href=""><?= i18n("Gestión de Actividades") ?></a>
                </li>
                <li class="breadcrumb-item active"><?= i18n("Editar") ?></li>
            </ol>
            <!-- Example DataTables Card-->
            <form name = 'Form' action='./index.php?controller=Actividad&amp;action=actividadEDIT' method='post' onsubmit='return comprobar_notificacion()'>
                <div class="card mb-3">
                    <div class="card-header">
                        <i class="fa fa-table"></i><?= i18n("Editar actividad") ?>
                    </div>
                    <div class="card-body">      
                        <div id="flash"><?= $view->popFlash() ?></div>      
                        <div class="form-group">
                            <div class="form-row">
                                <div class="col-md-6">
                                    <label for="exampleInputNombre">Nombre</label>
                                    <input class="form-control" name="nombre" id="exampleInputNombre" type="text" aria-describedby="emailHelp" value="<?php echo $actividad->getNombre(); ?>"  required onblur="esVacio(this)  && comprobarText(this,15)">
                                </div>
                                <div class="col-md-6">
                                    <label for="exampleInputPrecio">Precio</label>
                                    <input class="form-control" name="precio" id="exampleInputPrecio" type="text" aria-describedby="emailHelp" value="<?php echo $actividad->getPrecio(); ?>"  required onblur="esVacio(this)  && comprobarText(this,15)">
                                </div>
<?php if($actividad->getInstalaciones()!=null){?>
                                <div class="col-md-6">
                                    <label for="exampleInputInstalaciones">Instalaciones</label>
                                    <input class="form-control" name="instalaciones" id="exampleInputInstalacioneso" type="text" aria-describedby="emailHelp" value="<?php echo $actividad->getInstalacionies(); ?>"  required onblur="esVacio(this)  && comprobarText(this,15)">
                                </div>
                                <div class="col-md-6">
                                    <label for="exampleInputPlazas">Plazas</label>
                                    <input class="form-control" name="plazas" id="exampleInputPlazas" type="text" aria-describedby="emailHelp" value="<?php echo $actividad->getPlazas(); ?>"  required onblur="esVacio(this)  && comprobarText(this,15)">
                                </div>
<?php } ?>
                            </div>
                        </div>
                    </div>
                </div>      
                <input type="hidden" name="idActividad" value="<?php echo $actividad->getIdActividad(); ?>">
                <button type="button" onclick="window.location.href='./index.php?controller=Actividad&amp;action=actividadListar'" class="btn btn-default"><?= i18n("Volver") ?></button> 
                <button  type='submit' name='action' value='actividadEDIT' class="btn btn-primary"><?= i18n("Editar") ?></button>

            </form>
        </div>
    </div>
</html>