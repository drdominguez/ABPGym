<?php
    $view=ViewManager::getInstance();
    
    $monitores = $view->getVariable("monitores");
    $usuarios = $view->getVariable("usuarios");
    $listarecursos = $view->getVariable("listarecursos");
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
                        <i class="fa fa-table"></i><?= i18n(" Añadir Actividad Individual") ?>
                    <div class="card-body"> 
                    <form name='Form' id="form1" action="index.php?controller=Actividad&amp;action=individualADD" class="form-signin" accept-charset="UTF-8" method="POST" onsubmit="return validarIndividualADD()">
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
                                        <select class="form-control" name="idInstalaciones">
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
                        <div class="form-group">
                                <div class="form-row">
                                <div class="col-md-6">
                                    <label for="exampleInputNombre">Dia</label>
                                    <input class="form-control" name="dia" id="exampleInputNombre" type="TEXT" aria-describedby="emailHelp" placeholder="Dia" onchange="comprobarVacio(this)  && comprobarTexto(this,30)">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="exampleInputPrecio">Hora</label>
                                        <input class="form-control" name="hora" id="exampleInputDescripcion" type="TEXT" aria-describedby="emailHelp" placeholder="Hora" onchange="comprobarVacio(this)  && comprobarReal(this,2,0,1000000) && comprobarSolonum(this)">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-row">
                                <div class="col-md-6">
                                    <label for="exampleInputNombre">FechaInicio</label>
                                    <input class="tcal" name="fechainicio" id="exampleInputNombre" type="TEXT" aria-describedby="emailHelp" placeholder="fechainicio" onchange="comprobarVacio(this)  && comprobarTexto(this,30)">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="exampleInputPrecio">FechaFin</label>
                                        <input class="tcal" name="fechafin" id="exampleInputDescripcion" type="TEXT" aria-describedby="emailHelp" placeholder="fechafin" onchange="comprobarVacio(this)  && comprobarReal(this,2,0,1000000) && comprobarSolonum(this)">
                                    </div>
                                </div>
                            </div> 
                            <div class="card mb-3">
                                <div class="card-header">
                                <i class="fa fa-table"></i><?= i18n("Mostrar todos los monitores") ?>
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
<?php
                                foreach($monitores as $monitor)
                                {
?>
                                    <tr>
                                        <td><?php echo $monitor->getDni(); ?></td>
                                        <td><?php echo $monitor->getNombre(); ?></td>
                                        <td><?php echo $monitor->getApellidos(); ?></td>
                                        <td>
                                            <a target="_blank" onclick="window.open(this.href, this.target, 'width=500,height=400'); return false;" href='./index.php?controller=Usuario&amp;action=UsuarioView&amp;dni=<?php echo $monitor->getDni();?>'><img src='./view/Icons/detalle.png'>
                                            </a>
                                        </td>
                                        <td>
                                            <input type="radio" name="monitor" value="<?php echo $monitor->getDni();?>">Seleccionar<br>
                                        </td>
                                    </tr>
<?php
                                }   
?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div> 
                <div class="card mb-3">
            <div class="card-header">
                <i class="fa fa-table"></i><?= i18n("Asignar Tabla") ?>
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
                </div>
            </div>
        </div>      
                    </form>
                     <button type="button" onclick="window.location.href='./index.php?controller=Actividad&amp;action=actividadListar'" class="btn btn-default">Volver</button>
                            <button type='submit' name='action' form="form1" value='ADD' class="btn btn-primary">Insertar</button>
                    </div>
                </div>
            </div>
        </div>
</html>