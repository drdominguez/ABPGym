<?php
require_once(__DIR__."/../../core/ViewManager.php");

    $view=ViewManager::getInstance();
    $actividad = $view->getVariable("actividad");
    $usuarios = $view->getVariable("usuarios");
    $currentuser = $view->getVariable("currentusername");
    $listarecursos = $view->getVariable("listarecursos");
    $monitores = $view->getVariable("monitores");
    $monitorAsignado = $view->getVariable("monitorAsignado");


?>
<script type="text/javascript">
    function marcar(source) 
    {
        checkboxes=document.getElementsByTagName('input'); //obtenemos todos los controles del tipo Input
        for(i=0;i<checkboxes.length;i++) //recoremos todos los controles
        {
            if(checkboxes[i].type == "checkbox") //solo si es un checkbox entramos
            {
                checkboxes[i].checked=source.checked; //si es un checkbox le damos el valor del checkbox que lo llamó (Marcar/Desmarcar Todos)
            }
        }
    }

    function dniEntrenador(dni){
        document.getElementById("dni").value=dni;
    }
</script> 
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
                </div>
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
                                        <input class="form-control" name="plazas" id="exampleInputPlazas" type="text" aria-describedby="emailHelp" value="<?php echo $actividad->getPlazas(); ?>"    onchange="comprobarVacio(this)  && comprobarEntero($this, 0, 255)">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="form-row">
                                        <div class="col-md-6">
                                            <label for="exampleInputDia">Dia</label>
                                            <input class="form-control" name="dia" id="exampleInputNombre" type="TEXT" aria-describedby="emailHelp" value="<?php echo $actividad->getHorario()->getDia(); ?>"  onchange="comprobarVacio(this)  && comprobarTexto(this,30)">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="exampleInputHora">Hora</label>
                                            <input class="form-control" name="hora" id="exampleInputDescripcion" type="TEXT" aria-describedby="emailHelp" value="<?php echo $actividad->getHorario()->getHora(); ?>"  onchange="comprobarVacio(this)  && comprobarReal(this,2,0,1000000) && comprobarSolonum(this)">
                                        </div>
                                    </div>
                                </div>
                                 <div class="form-group">
                                    <div class="form-row">
                                        <div class="col-md-6">
                                             <label for="exampleInputMonitor">Monitor</label>
                                            <input class="form-control" readonly="true" name="monitor" id="exampleInputDescripcion" type="TEXT" aria-describedby="emailHelp" value="<?php echo $monitorAsignado[0]['dni']; ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="form-row">
                                        <div class="col-md-6">
                                            <label for="exampleInputFechaInicio">FechaInicio</label>
                                            <input class="tcal" name="fechainicio" id="exampleInputNombre" type="TEXT" aria-describedby="emailHelp" value="<?php echo $actividad->getHorario()->getFechaInicio(); ?>"  onchange="comprobarVacio(this)  && comprobarTexto(this,30)">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="exampleInputFechaFin">FechaFin</label>
                                            <input class="tcal" name="fechafin" id="exampleInputDescripcion" type="TEXT" aria-describedby="emailHelp" value="<?php echo $actividad->getHorario()->getFechaFin(); ?>"  onchange="comprobarVacio(this)  && comprobarReal(this,2,0,1000000) && comprobarSolonum(this)">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> 
                </div>  
            
                <div class="card mb-3">
                    <div class="card-header">
                        <i class="fa fa-table"></i><?= i18n("Cambiar Monitor") ?>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" >
                            <thead>
                                <tr>
                                <th><?= i18n("dniEntrenador") ?></th>
                                <th><?= i18n("Nombre") ?></th>
                                <th><?= i18n("Apellidos") ?></th>
                                <th>Detalle</th>
                                <th>Seleccionar</th>
                                </tr>
                            </thead>
                                <tfoot>
                                <tr>
                                <th><?= i18n("dniEntrenador") ?></th>
                                <th><?= i18n("Nombre") ?></th>
                                <th><?= i18n("Apellidos") ?></th>
                                <th>Detalle</th>
                                <th>Seleccionar</th>
                                </tr>
                                </tfoot>
                            <tbody>
                            <?php foreach($monitores as $monitor){
                                if($monitor->getDni() != $monitorAsignado[0]['dni']){ ?>
                                <tr>
                                <td><?php echo $monitor->getDni(); ?></td>
                                <td><?php echo $monitor->getNombre(); ?></td>
                                <td><?php echo $monitor->getApellidos(); ?></td>
                                <td>
                                <a target="_blank" onclick="window.open(this.href, this.target, 'width=500,height=400'); return false;" href='./index.php?controller=Usuario&amp;action=UsuarioView&amp;dni=<?php echo $monitor->getDni();?>'><img src='./view/Icons/detalle.png'>
                                </a>
                                </td>
                                <td>
                                    <label>
                                        <input type="radio" onclick="dniEntrenador(this.value)" name="monitor" value="<?php echo $monitor->getDni(); ?>">
                                    </label>
                            <?php }?>
                                </td>
                                </tr>
                            <?php } ?>

                            </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="card mb-3">
                    <div class="card-header">
                        <i class="fa fa-table"></i><?= i18n("Asignar Actividad a Usuarios") ?>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <input type="checkbox" onclick="marcar(this);" /> Marcar/Desmarcar Todos
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" >
                                <thead>
                                <tr>
                                <th><?= i18n("DNI") ?></th>
                                <th><?= i18n("Nombre") ?></th>
                                <th><?= i18n("Apellidos") ?></th>
                                <th>Detalle</th>
                                <th>Seleccionar</th>            
                                </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                    <th><?= i18n("DNI") ?></th>
                                    <th><?= i18n("Nombre") ?></th>
                                    <th><?= i18n("Apellidos") ?></th>
                                    <th>Detalle</th>
                                    <th>Seleccionar</th>
                                    </tr>
                                </tfoot>
                                <tbody>
<?php
                        foreach($usuarios as $usuario)
                        {
?>
                                    <tr>
                                    <td><?php echo $usuario->getDni(); ?></td>
                                    <td><?php echo $usuario->getNombre(); ?></td>
                                    <td><?php echo $usuario->getApellidos(); ?></td>
                                    <td>
                                        <a target="_blank" onclick="window.open(this.href, this.target, 'width=500,height=400'); return false;" href='./index.php?controller=Usuario&amp;action=UsuarioView&amp;dni=<?php echo $usuario->getDni();?>'><img src='./view/Icons/detalle.png'>
                                            </a>
                                    </td>
                                    <td>
                                        <input type="checkbox" name="usuarios[]" value="<?php echo $usuario->getDni(); ?>">
                                    </td>
                                    </tr>
<?php
                        }   
?>
                                </tbody>

                            </table>
                    <input type="hidden" name="idActividad" value="<?php echo $actividad->getIdActividad(); ?>">
                    <input type="hidden" name="idHorario" value="<?php echo $actividad->getHorario()->getIdHorario(); ?>">
                    <input type="hidden" id="dni" name="dni" value="<?php echo $monitorAsignado[0]['dni']; ?>">
                    <button type="button" onclick="window.location.href='./index.php?controller=Actividad&amp;  action=actividadListar'" class="btn btn-default"><?= i18n("Volver") ?></button>
                    <button  type='submit' name='action' value='actividadEDIT' class="btn btn-primary"><?= i18n("Editar") ?></button>   
                        </div>
                    </div>
                    
                </div> 
                </form>   
            </div>
        </div>
    </div>
</html>