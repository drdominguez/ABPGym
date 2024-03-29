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
<script type="text/javascript">
    function mostrarModalUsuarios(){
          $('#ModalUsuarios').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget) // Button that triggered the modal
          var nombre = button.data('usuario-nombre')
          var apellidos = button.data('usuario-apellidos')
          var dni = button.data('dni')
          var edad = button.data('usuario-edad')
          var email = button.data('usuario-email')
          var telefono = button.data('usuario-telefono')
          var fechaalta = button.data('usuario-fechaalta')
          var imagen = button.data('usuario-imagen')
// Extract info from data-* attributes
          // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
          // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
          var modal = $(this)
          modal.find('.modal-title').text(nombre + ' ' + apellidos)
          modal.find('.modal-body #dni').text(dni)
          modal.find('.modal-body #edad').text(edad)
          modal.find('.modal-body #email').text(email)
          modal.find('.modal-body #telefono').text(telefono)
          modal.find('.modal-body #fechaalta').text(fechaalta)
          modal.find('.modal-body #imagen').attr('src', imagen)

        })

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
                        <i class="fa fa-table"></i><?= i18n(" Añadir Actividad Grupo") ?>
                    <div class="card-body"> 
                    <form name='Form' id="form1" action="index.php?controller=Actividad&amp;action=grupoADD" class="form-signin" accept-charset="UTF-8" method="POST" onsubmit="return validarGrupoADD()">
                        <div class="form-group">
                            <div class="form-row">
                                <div class="col-md-6">
                                    <label for="exampleInputNombre"><?= i18n("Nombre") ?>: </label>
                                    <input class="form-control" name="nombre" id="exampleInputNombre" type="TEXT" aria-describedby="emailHelp" placeholder="Nombre" onchange="comprobarVacio(this)  && comprobarTexto(this,50)">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="exampleInputPrecio"><?= i18n("Precio") ?>: </label>
                                        <input class="form-control" name="precio" id="exampleInputDescripcion" type="TEXT" aria-describedby="emailHelp" placeholder="Precio" onchange="comprobarVacio(this)  && comprobarReal(this,2,0,1000000) && comprobarSolonum(this)">
                                    </div>
                            </div>
                        </div> 
                        <div class="form-group">
                                <div class="form-row">
                                    <div class="col-md-6">
                                        <label for="exampleInputNombre"><?= i18n("Instalaciones") ?>: </label>
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
                                        <label for="exampleInputTiempo"><?= i18n("Plazas") ?>: </label>
                                        <input class="form-control" name="plazas" id="exampleInputDescripcion" type="TEXT" aria-describedby="emailHelp" placeholder="Plazas" onchange="comprobarVacio(this)  && comprobarEntero(this, 0, 100000)">
                                    </div>
                                </div>
                            </div>
                        <div class="form-group">
                                <div class="form-row">
                                <div class="col-md-6">
                                    <label for="exampleInputNombre"><?= i18n("Dia") ?>: </label>
                                    <input class="form-control" name="dia" id="exampleInputNombre" type="TEXT" aria-describedby="emailHelp" placeholder="Dia" onchange="comprobarVacio(this)  && comprobarTexto(this,25)">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="exampleInputPrecio"><?= i18n("Hora") ?>: </label>
                                        <input class="form-control" name="hora" id="exampleInputDescripcion" type="TEXT" aria-describedby="emailHelp" placeholder="Hora" onchange="comprobarVacio(this)  &&  comprobarTexto(this,25)">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-row">
                                <div class="col-md-6">
                                    <label for="exampleInputNombre"><?= i18n("FechaInicio") ?>: </label>
                                    <input class="tcal" name="fechainicio" id="exampleInputNombre" type="TEXT" aria-describedby="emailHelp" placeholder="fechainicio" >
                                    </div>
                                    <div class="col-md-6">
                                        <label for="exampleInputPrecio"><?= i18n("FechaFin") ?>: </label>
                                        <input class="tcal" name="fechafin" id="exampleInputDescripcion" type="TEXT" aria-describedby="emailHelp" placeholder="fechafin" >
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
                                    <th><?= i18n("Detalle") ?></th>
                                    <th><?= i18n("Seleccionar") ?></th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                    <th><?= i18n("dniEntrenador") ?></th>
                                    <th><?= i18n("Nombre") ?></th>
                                    <th><?= i18n("Apellidos") ?></th>
                                    <th><?= i18n("Detalle") ?></th>
                                    <th><?= i18n("Seleccionar") ?></th>
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
                                             <a data-toggle="modal" data-target="#ModalUsuarios" data-dni="<?php echo $monitor->getDni(); ?>" data-usuario-nombre="<?php echo $monitor->getNombre(); ?>" data-usuario-email="<?php echo $monitor->getEmail(); ?>" data-usuario-telefono="<?php echo $monitor->getTelefono(); ?>" data-usuario-fechaalta="<?php echo $monitor->getFecha(); ?>" data-usuario-imagen="<?php echo $monitor->getFotoPerfil(); ?>" data-usuario-apellidos="<?php echo $monitor->getApellidos(); ?>" data-usuario-edad="<?php echo $monitor->getEdad(); ?>" onclick="mostrarModalUsuarios();" ><span id="icon-ver" class="icon-eye-plus"></span>
                                            </a>
                                        </td>
                                        <td>
                                            <input type="radio" name="monitor" onchange="habilitarAsignar()" value="<?php echo $monitor->getDni();?>" required><?= i18n("Seleccionar") ?> <br>
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
                            <button type='submit' name='action' id="btnAsignar" disabled form="form1" value='ADD' class="btn btn-primary">Insertar</button>
                    </div>
                </div>
            </div>
        </div>
         <div class="modal fade" id="ModalUsuarios" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="Nombre Usuario">New message</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <b><?= i18n("DNI") ?>:</b> <p id="dni"></p>
                            <b><?= i18n("Edad") ?>:</b><p id="edad"></p>
                            <b><?= i18n("Email") ?>: </b><p id="email"></p>
                            <b><?= i18n("Teléfono") ?>: </b><p id="telefono"></p>  
                            <b><?= i18n("Fecha de Alta") ?>: </b><p id="fechaalta"></p>   
                            <b><?= i18n("Foto de Perfil") ?>: </b> <img id="imagen" width="300" height="300" src="">  
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal"><?= i18n("OK") ?></button>
                          </div>
                        </div>
                      </div>
                    </div>
                    
</html>