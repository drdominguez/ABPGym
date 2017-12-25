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
    <div class="content-wrapper">
        <div class="container-fluid">
            <!-- Breadcrumbs-->
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href=""><?= i18n("Gestión de tablas") ?></a>
                </li>
                <li class="breadcrumb-item active"><?= i18n("Añadir") ?></li>
            </ol>
            <!-- Example DataTables Card-->
            <form name = 'Form' action='./index.php?controller=Tabla&amp;action=personalizadaADD' method='post' onsubmit='return validarTablaADD()'>
                <div class="card mb-3">
                    <div class="card-header">
                        <i class="fa fa-table"></i><?= i18n("Anadir tabla") ?>
                    </div>
                    <div class="card-body">      
                        <div id="flash"><?= $view->popFlash() ?></div>      
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
                        <i class="fa fa-table"></i><?= i18n("Mostrar todos los usuarios") ?>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
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
                                            <a target="_blank" onclick="window.open(this.href, this.target, 'width=500,height=400'); return false;" href='./index.php?controller=Tabla&amp;action=TablaADD&amp;idEjercicio=<?php echo $usuario->getDni();?>'><img src='./view/Icons/detalle.png'>
                                            </a>
                                        </td>
                                        <td>
                                            <input type="radio" name="usuario" value="<?php echo $usuario->getDni();?>">Seleccionar<br>
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
                        <i class="fa fa-table"></i><?= i18n("Mostrar todos los estiramientos") ?>
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
                                            <a target="_blank" onclick="window.open(this.href, this.target, 'width=500,height=400'); return false;" href='./index.php?controller=Tabla&amp;action=TablaADD&amp;idEjercicio=<?php echo $estiramiento->getIdEjercicio();?>'><img src='./view/Icons/detalle.png'>
                                            </a>
                                        </td>
                                        <td>
                                            <input type="checkbox" id="estiramiento_<?php echo $estiramiento->getIdEjercicio();?>" onClick="toggle('estiramiento_<?php echo $estiramiento->getIdEjercicio();?>', 'estiramientotiempo_<?php echo $estiramiento->getIdEjercicio();?>')" name="estiramientos[]" value="<?php echo $estiramiento->getIdEjercicio();?>">Añadir<br>
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
                        <i class="fa fa-table"></i><?= i18n("Mostrar todos los cardios") ?>
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
                                            <input type="checkbox" id="cardio_<?php echo $cardio->getIdEjercicio();?>" onClick="toggle2('cardio_<?php echo $cardio->getIdEjercicio();?>', 'cardiotiempo_<?php echo $cardio->getIdEjercicio();?>', 'cardiodistancia_<?php echo $cardio->getIdEjercicio();?>' )" name="cardios[]" value="<?php echo $cardio->getIdEjercicio();?>">Añadir<br>
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
                            <table class="table table-bordered" id="dataTable3" width="100%" cellspacing="0" >
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
                                            <input type="checkbox" id="muscular_<?php echo $muscular->getIdEjercicio();?>" name="musculares[]" onClick="toggle2('muscular_<?php echo $muscular->getIdEjercicio();?>', 'muscularcarga_<?php echo $muscular->getIdEjercicio();?>', 'muscularrepeticiones_<?php echo $muscular->getIdEjercicio();?>' )" value="<?php echo $muscular->getIdEjercicio();?>">Añadir<br>
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