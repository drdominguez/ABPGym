<?php
require_once(__DIR__."/../../core/ViewManager.php");

    $view = ViewManager::getInstance();
    $tabla = $view->getVariable("tabla");
    $estiramientos = $view->getVariable("estiramientos");
    $cardios = $view->getVariable("cardios");
    $usuarios = $view->getVariable("usuarios");
    $musculares = $view->getVariable("musculares");
    $tipoUsuario = $view->getVariable("tipoUsuario");
    $currentuser = $view->getVariable("currentusername");
?>
<script type="text/javascript">
    function mostrarModalEjercicio(){
          $('#ModalEjercicio').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget) // Button that triggered the modal
          var recipient = button.data('ejercicio-nombre')
          var descripcion = button.data('descripcion')
          var imagen = button.data('imagen') 
          var video = button.data('video')// Extract info from data-* attributes
          // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
          // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
          var modal = $(this)
          modal.find('.modal-title').text(recipient)
          modal.find('.modal-body #descripcion').text(descripcion)
          modal.find('.modal-body #imagen').attr('src', imagen)
          modal.find('.modal-body #video').attr('src', video)

        })

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
                <i class="fa fa-table"></i><?= i18n("Ver Tabla") ?>
            </div>
            <div class="card-body">
                <?php if($tipoUsuario == 'administrador'){?>
                <b><?= i18n("ID de Tabla") ?>:</b>  <p><?php echo $tabla->getIdTabla(); ?></p>
                <?php } ?>
                <b><?= i18n("Nombre") ?>:</b> <p><?php echo $tabla->getNombre(); ?></p>
                <b><?= i18n("Tipo") ?>:</b> <p><?php echo $tabla->getTipo(); ?></p>
                <b><?= i18n("Comentario") ?>:</b><p> <?php echo $tabla->getComentario(); ?></p>
            </div>
        </div>
         <div class="card mb-3">
                    <div class="card-header">
                        <i class="fa fa-table"></i><?= i18n("Estiramientos") ?>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable1" width="100%" cellspacing="0" >
                                <thead>
                                    <tr>
                                        <th><?= i18n("Nombre") ?></th>
                                        <th><?= i18n("Descripción") ?></th>
                                        <th><?= i18n("Tiempo") ?></th>
                                        <th><?= i18n("Ver") ?></th>
                                    </tr>
                                </thead>
                                <tfoot>
                                     <tr>
                                        <th><?= i18n("Nombre") ?></th>
                                        <th><?= i18n("Descripción") ?></th>
                                        <th><?= i18n("Tiempo") ?></th>
                                        <th><?= i18n("Ver") ?></th>
                                    </tr>
                                </tfoot>
                                <tbody>
<?php
                                foreach($estiramientos as $estiramiento)
                                {
?>
                                    <tr>
                                        <td><?php echo $estiramiento->getNombre(); ?></td>
                                        <td><?php echo $estiramiento->getDescripcion(); ?></td>
                                        <td><?php echo $estiramiento->getTiempo(); ?></td>
                                        <td>
                                           <a  data-toggle="modal" data-target="#ModalEjercicio" data-ejercicio-nombre="<?php echo $estiramiento->getNombre(); ?>" data-descripcion="<?php echo $estiramiento->getDescripcion(); ?>" data-imagen="<?php echo $estiramiento->getImagen(); ?>" data-video="<?php echo $estiramiento->getVideo(); ?>" onclick="mostrarModalEjercicio();" ><span id="icon-ver" class="icon-eye-plus"></span>
                                            </a>
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
                        <i class="fa fa-table"></i><?= i18n("Ejercicios Cardio") ?>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable2" width="100%" cellspacing="0" >
                                <thead>
                                    <tr>
                                        <th><?= i18n("Nombre") ?></th>
                                        <th><?= i18n("Descripción") ?></th>
                                        <th><?= i18n("Tiempo") ?></th>
                                        <th><?= i18n("Distancia") ?></th>
                                        <th><?= i18n("Ver") ?></th>
                                    </tr>
                                </thead>
                                <tfoot>
                                     <tr>
                                        <th><?= i18n("Nombre") ?></th>
                                        <th><?= i18n("Descripción") ?></th>
                                        <th><?= i18n("Tiempo") ?></th>
                                        <th><?= i18n("Distancia") ?></th>
                                        <th><?= i18n("Ver") ?></th>
                                    </tr>
                                </tfoot>
                                <tbody>
<?php
                                foreach($cardios as $cardio)
                                {
?>
                                    <tr>
                                        <td><?php echo $cardio->getNombre(); ?></td>
                                        <td><?php echo $cardio->getDescripcion(); ?></td>
                                        <td><?php echo $cardio->getTiempo(); ?></td>
                                        <td><?php echo $cardio->getDistancia(); ?></td>  
                                        <td>
                                             <a  data-toggle="modal" data-target="#ModalEjercicio" data-ejercicio-nombre="<?php echo $cardio->getNombre(); ?>" data-descripcion="<?php echo $cardio->getDescripcion(); ?>" data-imagen="<?php echo $cardio->getImagen(); ?>" data-video="<?php echo $cardio->getVideo(); ?>" onclick="mostrarModalEjercicio();" ><span id="icon-ver" class="icon-eye-plus"></span>
                                            </a>
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
                        <i class="fa fa-table"></i><?= i18n("Ejercicios Musculares") ?>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable3" width="100%" cellspacing="0" >
                                <thead>
                                    <tr>
                                        <th><?= i18n("Nombre") ?></th>
                                        <th><?= i18n("Descripción") ?></th>
                                        <th><?= i18n("Carga") ?></th>
                                        <th><?= i18n("Repeticiones") ?></th>
                                        <th><?= i18n("Ver") ?></th>
                                    </tr>
                                </thead>
                                <tfoot>
                                     <tr>
                                        <th><?= i18n("Nombre") ?></th>
                                        <th><?= i18n("Descripción") ?></th>
                                        <th><?= i18n("Carga") ?></th>
                                        <th><?= i18n("Repeticiones") ?></th>
                                        <th><?= i18n("Ver") ?></th>
                                    </tr>
                                </tfoot>
                                <tbody>
<?php
                                foreach($musculares as $muscular)
                                {
?>
                                    <tr>
                                        <td><?php echo $muscular->getNombre(); ?></td>
                                        <td><?php echo $muscular->getDescripcion(); ?></td>
                                        <td><?php echo $muscular->getCarga(); ?></td>
                                        <td><?php echo $muscular->getRepeticiones(); ?></td> 
                                        <td>
                                            <a  data-toggle="modal" data-target="#ModalEjercicio" data-ejercicio-nombre="<?php echo $muscular->getNombre(); ?>" data-descripcion="<?php echo $muscular->getDescripcion(); ?>" data-imagen="<?php echo $muscular->getImagen(); ?>" data-video="<?php echo $muscular->getVideo(); ?>" onclick="mostrarModalEjercicio();" ><span id="icon-ver" class="icon-eye-plus"></span>
                                            </a>
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

                <?php if($tipoUsuario == 'administrador'){?>
                                       <div class="card mb-3">
                    <div class="card-header">
                        <i class="fa fa-table"></i><?= i18n("Deportistas con esta Tabla") ?>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" >
                                <thead>
                                    <tr>
                                    <th><?= i18n("DNI") ?></th>
                                <th><?= i18n("Nombre") ?></th>
                                <th><?= i18n("Apellidos") ?></th>
                                        <th><?= i18n("Ver") ?></th>
                                    </tr>
                                </thead>
                                <tfoot>
                                     <tr>
                                      <th><?= i18n("DNI") ?></th>
                                <th><?= i18n("Nombre") ?></th>
                                <th><?= i18n("Apellidos") ?></th>
                                        <th><?= i18n("Ver") ?></th>
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
                                    </tr>
<?php
                                }   
?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <?php } ?>
        <button type="button" onclick="window.location.href='./index.php?controller=Tabla&amp;action=TablaListar'" class="btn btn-primary"><?= i18n("Volver") ?></button> 
    </div>
</div>
       
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
<!-- Modal -->
                <div class="modal fade" id="ModalEjercicio" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="EstiramientoTitle">New message</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <p id="descripcion"> </p><br>
                        <img id="imagen" width="300" height="300" src="">
                        <p id="video"> </p>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"><?= i18n("OK") ?></button>
                      </div>
                    </div>
                  </div>
                </div>