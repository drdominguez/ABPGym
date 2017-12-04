<?php
    $view=ViewManager::getInstance();

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
                        <i class="fa fa-table"></i><?= i18n(" Añadir Actividad Grupo") ?>
                    <div class="card-body"> 
                            <form name='Form' id="form1" action="index.php?controller=Actividad&amp;action=grupoADD" class="form-signin" accept-charset="UTF-8" method="POST" onsubmit="return validarGrupoADD()">
                            <div class="form-group">
                                <div class="form-row">
                                <div class="col-md-6">
                                    <label for="exampleInputNombre">Nombre</label>
                                    <input class="form-control" name="nombre" id="exampleInputNombre" type="TEXT" aria-describedby="emailHelp" placeholder="Nombre" onchange="comprobarVacio(this)  && comprobarTexto(this,30)">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="exampleInputPrecio">Precio</label>
                                        <input class="form-control" name="precio" id="exampleInputDescripcion" type="TEXT" aria-describedby="emailHelp" placeholder="Precio" onchange="comprobarVacio(this)  && comprobarReal(this,2,0,1000000) && comprobarSolonum(this)">
                                    </div>
                            </div>
                            </div>
                            <div class="form-group">
                                <div class="form-row">
                                    <div class="col-md-6">
                                        <label for="exampleInputNombre">Instalaciones</label>
                                        <select class="form-control" name="tipo">
<?php
                                        foreach($listarecursos as $recurso){
?>
                                        <option value="<?php echo $recurso->getIdRecurso();?>"><?php echo $recurso->getNombreRecurso();?></option>
<?php                                            
                                        }
?>
                                            
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="exampleInputTiempo">Plazas</label>
                                        <input class="form-control" name="plazas" id="exampleInputDescripcion" type="TEXT" aria-describedby="emailHelp" placeholder="Plazas" onchange="comprobarVacio(this)  && comprobarEntero($this, 0, 255)">
                                    </div>
                                </div>
                            </div>
                            </form>
                            <button type="button" onclick="window.location.href='./index.php?controller=actividad&amp;action=actividadListar'" class="btn btn-default">Volver</button>
                            <button type='submit' name='action' form="form1" value='ADD' class="btn btn-primary">Insertar</button>
                    </div>
             </div>
        </div>
    </div>
</html>