<?php
require_once(__DIR__."/../../core/ViewManager.php");

    $view=ViewManager::getInstance();
    $actividad = $view->getVariable("actividad");
    $currentuser = $view->getVariable("currentusername");
    $listarecursos = $view->getVariable("listarecursos");
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
                        <i class="fa fa-table"></i><?= i18n(" Editar Actividad") ?>
                    <div class="card-body"> 
            <form name = 'Form' action='./index.php?controller=Actividad&amp;action=actividadEDIT' method='post' onsubmit='return validarActividadEDIT()'>
                    <div class="card-body">     
                        <div class="form-group">
                            <div class="form-row">
                                <div class="col-md-6">
                                    <label for="exampleInputNombre">Nombre</label>
                                    <input class="form-control" name="nombre" id="exampleInputNombre" type="text" aria-describedby="emailHelp" value="<?php echo $actividad->getNombre(); ?>"  onchange="comprobarVacio(this)  && comprobarTexto(this,30)">
                                </div>
                                <div class="col-md-6">
                                    <label for="exampleInputPrecio">Precio</label>
                                    <input class="form-control" name="precio" id="exampleInputPrecio" type="text" aria-describedby="emailHelp" value="<?php echo $actividad->getPrecio(); ?>"   onchange="comprobarVacio(this)  && comprobarReal(this,2,0,1000000) && comprobarSolonum(this)">
                                </div>

                                <div class="col-md-6">
                                    <label for="exampleInputInstalaciones">Instalaciones</label>
                                    <select class="form-control" name="idInstalaciones">
<?php
                                        foreach($listarecursos as $recurso){
                                            if($actividad->getIdInstalaciones()==$recurso->getIdRecurso()){
?>
                                        <option selected value="<?php echo $recurso->getIdRecurso();?>"><?php echo $recurso->getNombreRecurso();?></option>
<?php                                            
                                        }else{?> <option selected value="<?php echo $recurso->getIdRecurso();?>"><?php echo $recurso->getNombreRecurso();?></option>
<?php                                            }
                                        }
?>
                                            
                                        </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="exampleInputPlazas">Plazas</label>
                                    <input class="form-control" name="plazas" id="exampleInputPlazas" type="text" aria-describedby="emailHelp" value="<?php echo $actividad->getPlazas(); ?>"   onchange="comprobarVacio(this)  && comprobarEntero($this, 0, 255)">
                                </div>
                                
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