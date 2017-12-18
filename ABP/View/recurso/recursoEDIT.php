<?php
require_once(__DIR__."/../../core/ViewManager.php");

    $view=ViewManager::getInstance();
    $recurso = $view->getVariable("recurso");
    $currentuser = $view->getVariable("currentusername");
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
                        <i class="fa fa-table"></i><?= i18n(" Editar Recurso") ?>
                    <div class="card-body"> 
            <form name = 'Form' action='./index.php?controller=Recurso&amp;action=recursoEDIT' method='post' onsubmit='return validarRecursoEDIT()'>
                    <div class="card-body">     
                        <div class="form-group">
                            <div class="form-row">
                                <div class="col-md-6">
                                    <label for="exampleInputNombre">Nombre</label>
                                    <input class="form-control" name="nombreRecurso" id="exampleInputNombre" type="text" aria-describedby="emailHelp" value="<?php echo $recurso->getNombreRecurso(); ?>"  onchange="comprobarVacio(this)  && comprobarTexto(this,30)">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-row">                               
                                <label for="exampleInputObservacion">Observaciones</label>
                                <textarea name="observaciones" class="form-control" ><?php echo $recurso->getObservaciones(); ?></textarea>           
                            </div>
                        </div>  
                    </div>
                </div>   

                <input type="hidden" name="idRecurso" value="<?php echo $recurso->getIdRecurso(); ?>">
                <button type="button" onclick="window.location.href='./index.php?controller=Recurso&amp;action=recursoListar'" class="btn btn-default"><?= i18n("Volver") ?></button> 
                <button  type='submit' name='action' value='recursoEDIT' class="btn btn-primary"><?= i18n("Editar") ?></button>

            </form>
        </div>
    </div>
</html>