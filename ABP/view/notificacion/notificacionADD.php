<?php
    $view=ViewManager::getInstance();
    $usuarios = $view->getVariable("usuarios");
?>

<!DOCTYPE html>
<html> 
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
<div class="content-wrapper">
    <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <div id="flash"><?= $view->popFlash() ?></div>
        </ol>
        <!-- Example DataTables Card-->
        <div class="card mb-3">
            <div class="card-header">
                <i class="fa fa-table"></i><?= i18n("Enviar Notificación") ?>
            </div>
            <div class="card-body">                  
                <form name = 'Form' action='./index.php?controller=Notificacion&amp;action=NotificacionADD' method='post' onsubmit='return validarNotificacionADD()'>
                    <div class="form-group">
                        <div class="form-row">
                        <label for="Asunto"><?= i18n("Asunto") ?>: </label>
                        <input class="form-control" type = 'text' name = 'Asunto' onchange="comprobarVacio(this)  && comprobarTexto(this, 200)" >
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-row">
                        <label for="contenido"><?= i18n("Contenido") ?>: </label>
                        <textarea class="form-control" name = 'contenido' rows="6"  value = ''  onchange="comprobarVacio(this)" ></textarea>
                        </div>
                    </div>
        <div class="card mb-3">
            <div class="card-header">
                <i class="fa fa-table"></i><?= i18n("Seleccionar Usuarios") ?>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <input type="checkbox" onclick="marcar(this);" /><?= i18n("Marcar/Desmarcar Todos") ?> 
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" >
                        <thead>
                            <tr>
                                <th><?= i18n("DNI") ?></th>
                                <th><?= i18n("Nombre") ?></th>
                                <th><?= i18n("Apellidos") ?></th>
                                        <th><?= i18n("Ver") ?></th>
                                <th><?= i18n("Seleccionar") ?></th>

                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th><?= i18n("DNI") ?></th>
                                <th><?= i18n("Nombre") ?></th>
                                <th><?= i18n("Apellidos") ?></th>
                                        <th><?= i18n("Ver") ?></th>
                                <th><?= i18n("Seleccionar") ?></th>

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
                                        <a data-toggle="modal" data-target="#ModalUsuarios" data-dni="<?php echo $usuario->getDni(); ?>" data-usuario-nombre="<?php echo $usuario->getNombre(); ?>" data-usuario-email="<?php echo $usuario->getEmail(); ?>" data-usuario-telefono="<?php echo $usuario->getTelefono(); ?>" data-usuario-fechaalta="<?php echo $usuario->getFecha(); ?>" data-usuario-imagen="<?php echo $usuario->getFotoPerfil(); ?>" data-usuario-apellidos="<?php echo $usuario->getApellidos(); ?>" data-usuario-edad="<?php echo $usuario->getEdad(); ?>" onclick="mostrarModalUsuarios();" ><span id="icon-ver" class="icon-eye-plus"></span>
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
                    <input type="hidden" name="idTabla" value="<?php echo $_GET['idTabla']; ?>">
                    <br>
                    <button type="button" onclick="window.location.href='./index.php?controller=Notificacion&amp;action=NotificacionListar'" class="btn btn-default"><?= i18n("Volver") ?></button> 
                    <button  type='submit' name='action' value='NotificacionADD' class="btn btn-primary"><?= i18n("Enviar") ?></button>
                </form>
            </div>
        </div>
    </div>
</div>

 <!-- Modal -->
                    <div class="modal fade" id="ModalUsuarios" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="Nombre Usuario"></h5>
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
                            <b><?= i18n("Foto de Perfil") ?>: </b> <p><img id="imagen" width="300" height="300" src=""> </p> 
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal"><?= i18n("OK") ?></button>
                          </div>
                        </div>
                      </div>
                    </div>
</html>