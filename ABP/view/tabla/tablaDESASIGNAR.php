<?php
    require_once(__DIR__."/../../core/ViewManager.php");

    $view = ViewManager::getInstance();
    $tablas = $view->getVariable("tablas");
    $usuarios = $view->getVariable("usuarios");
    $usuario = $view->getVariable("usuario");
    $currentuser = $view->getVariable("currentusername");
    $estiramientos = $view->getVariable("estiramientos");
    $cardios = $view->getVariable("cardios");
    $musculares = $view->getVariable("musculares");
    $errors = $view->getVariable("errors");
    $view->setVariable("title", "Borrar Tabla");
?>

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
<script type="text/javascript">
    function mostrarModalTablas(){
          $('#ModalTabla').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget) // Button that triggered the modal
          var nombre = button.data('nombre');
          var tipo = button.data('tipo');
          var comentario  = button.data('comentario');
// Extract info from data-* attributes
          // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
          // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
          var modal = $(this)
          modal.find('.modal-title').text(nombre)
          modal.find('.modal-body #tipo').text(tipo)
          modal.find('.modal-body #comentario').text(comentario)
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
                <i class="fa fa-table"></i><?= i18n("Desasignar Tabla") ?>
            </div>
            <div class="card-body">
                <form name = 'Form' id="form1" action = './index.php?controller=Tabla&amp;action=DesasignarTabla' method = 'post'>
                    <?php if(!isset($usuario)){?>
                            <div class="table-responsive">
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
                                            <input type="radio" name="usuario" onchange="habilitarAsignar()" value="<?php echo $usuario->getDni();?>"><?= i18n("Seleccionar") ?><br>
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
                    <button  type='submit' name='action' id="btnAsignar" disabled value='DesasignarTabla' class="btn btn-primary"><?= i18n("Continuar") ?></button>

        <!-- Modal -->
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
                    <?php }else{?>
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" >
                        <thead>
                            <tr>
                                <th><?= i18n("Nombre") ?></th>
                                <th><?= i18n("Tipo") ?></th>
                                <th><?= i18n("Comentario") ?></th>
                                <th><?= i18n("Ver") ?></th>
                                <th><?= i18n("Seleccionar") ?></th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th><?= i18n("Nombre") ?></th>
                                <th><?= i18n("Tipo") ?></th>
                                <th><?= i18n("Comentario") ?></th>
                                <th><?= i18n("Ver") ?></th>
                                <th><?= i18n("Seleccionar") ?></th>
                            </tr>
                        </tfoot>
                        <tbody>
<?php
                        foreach($tablas as $tabla)
                        {
?>
                            <tr>
                                    <td><?php echo $tabla->getNombre(); ?></td>
                                    <td><?php echo $tabla->getTipo(); ?></td>
                                    <td><?php echo $tabla->getComentario(); ?></td>
                                    <td>
                                        <a data-toggle="modal" data-target="#ModalTabla" data-nombre="<?php echo $tabla->getNombre(); ?>" data-tipo="<?php echo $tabla->getTipo(); ?>" data-comentario="<?php echo $tabla->getComentario(); ?>" onclick="mostrarModalTablas();" ><span id="icon-ver" class="icon-eye-plus"></span>
                                            </a>
                                    </td>
                                    <td>
                                            <input type="radio" onchange="habilitarAsignar()" name="idTabla" value="<?php echo $tabla->getIdTabla();?>"><?= i18n("Seleccionar") ?><br>

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
                    <input type="hidden" name="borrar" value="ok">
                    <input type="hidden" name="usuario" value="<?php echo $usuario; ?>">
                    <button type="button" onclick="window.location.href='./index.php?controller=Tabla&amp;action=DesasignarTabla'" class="btn btn-default"><?= i18n("Volver") ?></button> 
                    <button  type='submit' name='action' id="btnAsignar" disabled value='DesasignarTabla' class="btn btn-primary"><?= i18n("Borrar") ?></button>
                    <?php } ?>
                </form>
            </div>
        </div>
    </div>
</div>
 <!-- Modal -->
                    <div class="modal fade" id="ModalTabla" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="Nombre Usuario">New message</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <b><?= i18n("Tipo") ?>:</b><p id="tipo"></p>
                            <b><?= i18n("Comentario") ?>: </b><p id="comentario"></p>  
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal"><?= i18n("OK") ?></button>
                          </div>
                        </div>
                      </div>
                    </div>