<?php
    require_once(__DIR__."/../../core/ViewManager.php");

    $view = ViewManager::getInstance();
    $tabla = $view->getVariable("tabla");    
    $estiramientos = $view->getVariable("estiramientos");
    $tipoUsuario = $view->getVariable("tipoUsuario");
    $cardios = $view->getVariable("cardios");
    $musculares = $view->getVariable("musculares");
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
<div class="content-wrapper">
    <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <div id="flash"><?= $view->popFlash() ?></div>
        </ol>
        <!-- Example DataTables Card-->
        <form name = 'Form' id="form1" action = './index.php?controller=Tabla&amp;action=TablaDelete' method = 'post' onsubmit = 'comprobar()'>
        <div class="card mb-3">
            <div class="card-header">
                <i class="fa fa-table"></i><?= i18n("Borrar Tabla") ?>
            </div>
             
            <div class="card-body">
                 <?php if($tipoUsuario == 'administrador'){?>
                    <b><?= i18n("idTabla") ?>:</b> <p><?php echo $tabla->getIdTabla(); ?></p>
                    <?php } ?>
                    <input type="hidden" name="idTabla" value="<?php echo $tabla->getIdTabla(); ?>">
                    <b><?= i18n("nombre") ?>:</b> <p><?php echo $tabla->getNombre(); ?></p>
                    <b><?= i18n("tipo") ?>:</b> <p><?php echo $tabla->getTipo(); ?></p>
                    <b><?= i18n("comentario") ?>:</b> <p><?php echo $tabla->getComentario(); ?></p>
                    <input type="hidden" name="borrar" value="ok">
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
                    <button type="button" onclick="window.location.href='./index.php?controller=Tabla&amp;action=TablaListar'" class="btn btn-default"><?= i18n("Volver") ?></button> 
                    <button  type='submit' name='action' value='TablaDelete' class="btn btn-primary"><?= i18n("Borrar") ?></button>
                </form>
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