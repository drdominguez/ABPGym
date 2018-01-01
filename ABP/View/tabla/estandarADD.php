<?php
    $view=ViewManager::getInstance();
    $estiramientos = $view->getVariable("estiramientos");
    $cardios = $view->getVariable("cardios");
    $musculares = $view->getVariable("musculares");
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
    cell4.innerHTML = "xd";
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
    cell5.innerHTML = "xd";
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
    cell5.innerHTML = "xd";
    cell6.appendChild(check);
    i3++;
}

</script> 
<script type="text/javascript">
    function mostrarModalEstiramiento(){
          $('#ModalEstiramiento').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget) // Button that triggered the modal
          var recipient = button.data('estiramiento-nombre')
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
            <form name = 'Form' action='./index.php?controller=Tabla&amp;action=estandarADD' method='post' onsubmit='return validarTablaADD()'>
                <div class="card mb-3">
                    <div class="card-header">
                        <i class="fa fa-table"></i><?= i18n("Anadir tabla") ?>
                    </div>
                    <div class="card-body">      
                           
                        <div class="form-group">
                            <div class="form-row">
                                <div class="col-md-6">
                                    <label for="exampleInputNombre">Nombre</label>
                                    <input class="form-control" name="nombre" id="exampleInputNombre" type="TEXT" aria-describedby="emailHelp" placeholder="Nombre" onchange="comprobarVacio(this);comprobarTexto(this,30);">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-row">
                                <label for="exampleInputTiempo">Descripción</label>
                                <textarea class="form-control" name="comentario" rows="10"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mb-3">
                    <div class="card-header">
                        <i class="fa fa-table"></i><?= i18n("Mostrar todos los estiramientos") ?>
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
                                            <a  data-toggle="modal" data-target="#ModalEstiramiento" data-estiramiento-nombre="<?php echo $estiramiento->getNombre(); ?>" data-descripcion="<?php echo $estiramiento->getDescripcion(); ?>" data-imagen="<?php echo $estiramiento->getImagen(); ?>" data-video="<?php echo $estiramiento->getVideo(); ?>" onclick="mostrarModalEstiramiento();" ><img src='./view/Icons/detalle.png'>
                                            </a>
                                        </td>
                                        <td>
                                            <input type="button" value="Seleccionar" onclick="anadirestiramiento('<?php echo $estiramiento->getIdEjercicio();?>','<?php echo $estiramiento->getNombre(); ?>','<?php echo $estiramiento->getDescripcion(); ?>')"/>
                                        </td>
                                    </tr><?php
                                }   
?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>


<!-- Modal -->
<div class="modal fade" id="ModalEstiramiento" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
        <img id="imagen" src="">
        <p id="video"> </p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Send message</button>
      </div>
    </div>
  </div>
</div>



                <div class="card mb-3">
                    <div class="card-header">
                        <i class="fa fa-table"></i><?= i18n("Mostrar todos los cardios") ?>
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
                                            <a target="_blank" onclick="window.open(this.href, this.target, 'width=500,height=400'); return false;" href='./index.php?controller=Tabla&amp;action=TablaADD&amp;idEjercicio=<?php echo $cardio->getIdEjercicio();?>'><img src='./view/Icons/detalle.png'>
                                            </a>
                                        </td>
                                        <td>
                                              <input type="button" value="Seleccionar" onclick="anadircardio('<?php echo $cardio->getIdEjercicio();?>','<?php echo $cardio->getNombre(); ?>','<?php echo $cardio->getDescripcion(); ?>')"/>
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
                        <i class="fa fa-table"></i><?= i18n("Mostrar todos los musculares") ?>
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
                                            <a target="_blank" onclick="window.open(this.href, this.target, 'width=500,height=400'); return false;" href='./index.php?controller=Tabla&amp;action=TablaADD&amp;idEjercicio=<?php echo $muscular->getIdEjercicio();?>'><img src='./view/Icons/detalle.png'>
                                            </a>
                                        </td>
                                        <td>
                                            <input type="button" value="Seleccionar" onclick="anadirmuscular('<?php echo $muscular->getIdEjercicio();?>','<?php echo $muscular->getNombre(); ?>','<?php echo $muscular->getDescripcion(); ?>')"/>
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
                <button  type='submit' name='action' value='TablaADD' class="btn btn-primary"><?= i18n("Añadir") ?></button>
            </form>
        </div>
    </div>
</html>