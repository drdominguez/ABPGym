<?php
    $view=ViewManager::getInstance();
    $estiramientos = $view->getVariable("estiramientos");
    $cardios = $view->getVariable("cardios");
    $musculares = $view->getVariable("musculares");
    $usuarios = $view->getVariable("usuarios");
    $currentuser = $view->getVariable("currentusername");
?>

<!DOCTYPE html>
<html>    

<script type="text/javascript">
    function toggle(checkboxID, toggleID) {
     var checkbox = document.getElementById(checkboxID);
     var toggle = document.getElementById(toggleID);
     updateToggle = checkbox.checked ? toggle.disabled=false : toggle.disabled=true;
}
</script>  
<script type="text/javascript">
   function toggle2(checkboxID, toggleID1,toggleID2) {
     var checkbox = document.getElementById(checkboxID);
     var toggle1 = document.getElementById(toggleID1);
     var toggle2 = document.getElementById(toggleID2);

     updateToggle1 = checkbox.checked ? toggle1.disabled=false : toggle1.disabled=true;
     updateToggle2 = checkbox.checked ? toggle2.disabled=false : toggle2.disabled=true;

}

</script>
<script type="text/javascript">
     var i1 = 0; 

   function anadirestiramiento(id,nombre,descripcion) {  

   

    var table = document.getElementById("dataTableEstiramientos");
    var row = table.insertRow(table.rows.length-1);
    var cell1 = row.insertCell(0);
    var cell2 = row.insertCell(1);
    var cell3 = row.insertCell(2);
    var cell4 = row.insertCell(3);
    var cell5 = row.insertCell(4);

    var input = document.createElement("input");
     input.setAttribute('type', 'text');
     input.setAttribute('class','form-control');
     input.setAttribute('name', 'estiramientotiempo_' + id + "_" + i1);
     input.setAttribute('id', 'estiramientotiempo_' + id + "_" + i1);


      var input2 = document.createElement("input");
     input2.setAttribute('type', 'hidden');
     input2.setAttribute('class','form-control');
     input2.setAttribute('name', 'idEstiramiento_' + id + "_" + i1);
     input2.setAttribute('value', id);

     var check = document.createElement("input");
     check.setAttribute('type', 'checkbox');
     check.setAttribute('class','form-control');
     check.setAttribute('id','checkestiramiento_' + id + "_" + i1);
     check.setAttribute('name', 'estiramientos[]');
     check.setAttribute('value', id + "_" + i1);
     check.setAttribute('checked','');
     check.setAttribute('onClick','toggle(\'checkestiramiento_' + id + "_" + i1 + '\',\'estiramientotiempo_' + id + "_" + i1 + '\');');

    cell1.innerHTML = nombre;
    cell2.innerHTML = descripcion;
    cell3.appendChild(input);
    cell3.appendChild(input2);
    cell5.appendChild(check);
    i1++;
}

</script>  
<script type="text/javascript">

    var i2 = 0;
   function anadircardio(id,nombre,descripcion) {    

    var table = document.getElementById("dataTableCardios");
    var row = table.insertRow(table.rows.length-1);
    var cell1 = row.insertCell(0);
    var cell2 = row.insertCell(1);
    var cell3 = row.insertCell(2);
    var cell4 = row.insertCell(3);
    var cell5 = row.insertCell(4);
    var cell6 = row.insertCell(5);

     var input = document.createElement("input");
     input.setAttribute('type', 'text');
     input.setAttribute('class','form-control');
     input.setAttribute('name', 'cardiotiempo_' + id + "_" + i2);
     input.setAttribute('id', 'cardiotiempo_' + id + "_" + i2);


     var input2 = document.createElement("input");
     input2.setAttribute('type', 'text');
     input2.setAttribute('class','form-control');
     input2.setAttribute('name', 'cardiodistancia_' + id + "_" + i2);
     input2.setAttribute('id', 'cardiodistancia_' + id + "_" + i2);


     var input3 = document.createElement("input");
     input3.setAttribute('type', 'hidden');
     input3.setAttribute('class','form-control');
     input3.setAttribute('name', 'idCardio_' + id + "_" + i2);
     input3.setAttribute('value', id);


     var check = document.createElement("input");
     check.setAttribute('type', 'checkbox');
     check.setAttribute('class','form-control');
     check.setAttribute('id','checkcardio_' + id + "_" + i2);
     check.setAttribute('name', 'cardios[]');
     check.setAttribute('value', id + "_" + i2);
     check.setAttribute('checked','');
     check.setAttribute('onClick','toggle2(\'checkcardio_' + id + "_" + i2 + '\',\'cardiotiempo_' + id + "_" + i2 + '\', \'cardiodistancia_' + id + "_" + i2 + '\');');

    cell1.innerHTML = nombre;
    cell2.innerHTML = descripcion;
    cell3.appendChild(input);
    cell4.appendChild(input2);
    cell4.appendChild(input3);
    cell6.appendChild(check);
    i2++;
}

</script>  
<script type="text/javascript">

    var i3 = 0;

   function anadirmuscular(id,nombre,descripcion) {    

    var table = document.getElementById("dataTableMusculares");
    var row = table.insertRow(table.rows.length-1);
    var cell1 = row.insertCell(0);
    var cell2 = row.insertCell(1);
    var cell3 = row.insertCell(2);
    var cell4 = row.insertCell(3);
    var cell5 = row.insertCell(4);
    var cell6 = row.insertCell(5);

     var input = document.createElement("input");
     input.setAttribute('type', 'text');
     input.setAttribute('class','form-control');
     input.setAttribute('name', 'muscularcarga_' + id + "_" + i3);
     input.setAttribute('id', 'muscularcarga_' + id + "_" + i3);


     var input2 = document.createElement("input");
     input2.setAttribute('type', 'text');
     input2.setAttribute('class','form-control');
     input2.setAttribute('name', 'muscularrepeticiones_' + id + "_" + i3);
     input2.setAttribute('id', 'muscularrepeticiones_' + id + "_" + i3);

      var input3 = document.createElement("input");
     input3.setAttribute('type', 'hidden');
     input3.setAttribute('class','form-control');
     input3.setAttribute('name', 'idMuscular_' + id + "_" + i3);
     input3.setAttribute('value', id);

     var check = document.createElement("input");
     check.setAttribute('type', 'checkbox');
     check.setAttribute('class','form-control');
     check.setAttribute('id','checkmuscular_' + id + "_" + i3);
     check.setAttribute('name', 'musculares[]');
     check.setAttribute('value', id + "_" + i3);
     check.setAttribute('checked','');
     check.setAttribute('onClick','toggle2(\'checkmuscular_' + id + "_" + i3 + '\',\'muscularcarga_' + id + "_" + i3 + '\',\'muscularrepeticiones_' + id + "_" + i3 + '\');');

    cell1.innerHTML = nombre;
    cell2.innerHTML = descripcion;
    cell3.appendChild(input);
    cell4.appendChild(input2);
    cell4.appendChild(input3);
    cell6.appendChild(check);
    i3++;
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
            <form name = 'Form' action='./index.php?controller=Tabla&amp;action=personalizadaADD' method='post' onsubmit='return validarPersonalizadaADD()'>
                <div class="card mb-3">
                    <div class="card-header">
                        <i class="fa fa-table"></i><?= i18n("Añadir Tabla Personalizada") ?>
                    </div>
                    <div class="card-body">   
                        <div class="form-group">
                            <div class="form-row">
                                <div class="col-md-6">
                                    <label for="exampleInputNombre"><?= i18n("Nombre") ?>:</label>
                                    <input class="form-control" name="nombre" id="exampleInputNombre" type="TEXT" aria-describedby="emailHelp" placeholder="Nombre" onchange="comprobarVacio(this);comprobarTexto(this,50);">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-row">
                                <label for="exampleInputTiempo"><?= i18n("Descripción") ?>:</label>
                                <textarea class="form-control" name="comentario" rows="10"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mb-3">
                    <div class="card-header">
                        <i class="fa fa-table"></i><?= i18n("Asignar a Deportista") ?>
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
                                            <input type="radio" name="usuario" onchange="habilitarAsignar()" value="<?php echo $usuario->getDni();?>">
                                        <?= i18n("Seleccionar") ?><br>
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
                <div class="card mb-3">
                    <div class="card-header">
                        <i class="fa fa-table"></i><?= i18n("Estiramientos") ?>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTableEstiramientos" width="100%" cellspacing="0" >
                                <thead>
                                    <tr>
                                        <th><?= i18n("Nombre") ?></th>
                                        <th><?= i18n("Descripción") ?></th>
                                        <th><?= i18n("Tiempo") ?></th>
                                        <th><?= i18n("Ver") ?></th>
                                        <th><?= i18n("Seleccionar") ?></th>
                                    </tr>
                                </thead>
                                <tfoot>
                                     <tr>
                                        <th><?= i18n("Nombre") ?></th>
                                        <th><?= i18n("Descripción") ?></th>
                                        <th><?= i18n("Tiempo") ?></th>
                                        <th><?= i18n("Ver") ?></th>
                                        <th><?= i18n("Seleccionar") ?></th>
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
                                        <td><input type="text" disabled id="estiramientotiempo_<?php echo $estiramiento->getIdEjercicio();?>" class="form-control" name="estiramientotiempo_<?php echo $estiramiento->getIdEjercicio();?>"></td>
                                        <td>
                                             <a  data-toggle="modal" data-target="#ModalEjercicio" data-ejercicio-nombre="<?php echo $estiramiento->getNombre(); ?>" data-descripcion="<?php echo $estiramiento->getDescripcion(); ?>" data-imagen="<?php echo $estiramiento->getImagen(); ?>" data-video="<?php echo $estiramiento->getVideo(); ?>" onclick="mostrarModalEjercicio();" ><span id="icon-ver" class="icon-eye-plus"></span>
                                            </a>
                                        </td>
                                        <td>
                                            <input type="button" class="btn btn-primary" value="Seleccionar" onclick="anadirestiramiento('<?php echo $estiramiento->getIdEjercicio();?>','<?php echo $estiramiento->getNombre(); ?>','<?php echo $estiramiento->getDescripcion(); ?>')"/>
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
                  <!-- Modal -->
                <div class="modal fade" id="ModalEjercicio" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="EstiramientoTitle"></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <p id="descripcion"> </p><br>
                        <p><iframe width="280" id="video" height="155" allowfullscreen frameborder="0" ></iframe></p>
                        <p> <img id="imagen" width="300" height="300" src=""></p>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"><?= i18n("OK") ?></button>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="card mb-3">
                    <div class="card-header">
                        <i class="fa fa-table"></i><?= i18n("Ejercicios Cardio") ?>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTableCardios" width="100%" cellspacing="0" >
                                <thead>
                                    <tr>
                                        <th><?= i18n("Nombre") ?></th>
                                        <th><?= i18n("Descripción") ?></th>
                                        <th><?= i18n("Tiempo") ?></th>
                                        <th><?= i18n("Distancia") ?></th>
                                        <th><?= i18n("Ver") ?></th>
                                        <th><?= i18n("Seleccionar") ?></th>
                                    </tr>
                                </thead>
                                <tfoot>
                                     <tr>
                                        <th><?= i18n("Nombre") ?></th>
                                        <th><?= i18n("Descripción") ?></th>
                                        <th><?= i18n("Tiempo") ?></th>
                                        <th><?= i18n("Distancia") ?></th>
                                        <th><?= i18n("Ver") ?></th>
                                        <th><?= i18n("Seleccionar") ?></th>
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
                                        <td><input type="text" disabled id="cardiotiempo_<?php echo $cardio->getIdEjercicio();?>" class="form-control" name="cardiotiempo_<?php echo $cardio->getIdEjercicio();?>"></td>
                                        <td><input type="text" disabled id="cardiodistancia_<?php echo $cardio->getIdEjercicio();?>" class="form-control" name="cardiodistancia_<?php echo $cardio->getIdEjercicio();?>" ></td>  
                                        <td>
                                            <a  data-toggle="modal" data-target="#ModalEjercicio" data-ejercicio-nombre="<?php echo $cardio->getNombre(); ?>" data-descripcion="<?php echo $cardio->getDescripcion(); ?>" data-imagen="<?php echo $cardio->getImagen(); ?>" data-video="<?php echo $cardio->getVideo(); ?>" onclick="mostrarModalEjercicio();" ><span id="icon-ver" class="icon-eye-plus"></span>
                                            </a>
                                        </td>
                                        <td>
                                            <input type="button" class="btn btn-primary" value="Seleccionar" onclick="anadircardio('<?php echo $cardio->getIdEjercicio();?>','<?php echo $cardio->getNombre(); ?>','<?php echo $cardio->getDescripcion(); ?>')"/>
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
                            <table class="table table-bordered" id="dataTableMusculares" width="100%" cellspacing="0" >
                                <thead>
                                    <tr>
                                        <th><?= i18n("Nombre") ?></th>
                                        <th><?= i18n("Descripción") ?></th>
                                        <th><?= i18n("Carga") ?></th>
                                        <th><?= i18n("Repeticiones") ?></th>
                                        <th><?= i18n("Ver") ?></th>
                                        <th><?= i18n("Seleccionar") ?></th>
                                    </tr>
                                </thead>
                                <tfoot>
                                     <tr>
                                        <th><?= i18n("Nombre") ?></th>
                                        <th><?= i18n("Descripción") ?></th>
                                        <th><?= i18n("Carga") ?></th>
                                        <th><?= i18n("Repeticiones") ?></th>
                                        <th><?= i18n("Ver") ?></th>
                                        <th><?= i18n("Seleccionar") ?></th>
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
                                        <td><input type="text" disabled id="muscularcarga_<?php echo $muscular->getIdEjercicio();?>" class="form-control" name="muscularcarga_<?php echo $muscular->getIdEjercicio();?>"></td>
                                        <td><input type="text" disabled id="muscularrepeticiones_<?php echo $muscular->getIdEjercicio();?>" class="form-control" name="muscularrepeticiones_<?php echo $muscular->getIdEjercicio();?>" ></td> 
                                        <td>
                                            <a  data-toggle="modal" data-target="#ModalEjercicio" data-ejercicio-nombre="<?php echo $muscular->getNombre(); ?>" data-descripcion="<?php echo $muscular->getDescripcion(); ?>" data-imagen="<?php echo $muscular->getImagen(); ?>" data-video="<?php echo $muscular->getVideo(); ?>" onclick="mostrarModalEjercicio();" ><span id="icon-ver" class="icon-eye-plus"></span>
                                            </a>
                                        </td>
                                        <td>
                                             <input type="button" class="btn btn-primary" value="Seleccionar" onclick="anadirmuscular('<?php echo $muscular->getIdEjercicio();?>','<?php echo $muscular->getNombre(); ?>','<?php echo $muscular->getDescripcion(); ?>')"/>
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
                <button  type='submit' name='action' id="btnAsignar" disabled value='TablaADD' class="btn btn-primary"><?= i18n("Añadir") ?></button>
            </form>
        </div>
    </div>
</html>