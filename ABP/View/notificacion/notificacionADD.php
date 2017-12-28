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
<div class="content-wrapper">
    <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <div id="flash"><?= $view->popFlash() ?></div>
        </ol>
        <!-- Example DataTables Card-->
        <div class="card mb-3">
            <div class="card-header">
                <i class="fa fa-table"></i><?= i18n("Enviar notificacion") ?>
            </div>
            <div class="card-body">                  
                <form name = 'Form' action='./index.php?controller=Notificacion&amp;action=NotificacionADD' method='post' onsubmit='return validarNotificacionADD()'>
                    <div class="form-group">
                        <div class="form-row">
                        <label for="Asunto"><?= i18n("Asunto") ?>: </label>
                        <input class="form-control" type = 'text' name = 'Asunto' size = '50' value = ''  onchange="comprobarVacio(this)  && comprobarTexto(this, 50)" >
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-row">
                        <label for="contenido"><?= i18n("contenido") ?> : </label>
                        <textarea class="form-control" name = 'contenido' rows="6"  value = ''  onchange="comprobarVacio(this)" ></textarea>
                        </div>
                    </div>
        <div class="card mb-3">
            <div class="card-header">
                <i class="fa fa-table"></i><?= i18n("Seleccionar Usuarios") ?>
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
                                        <a href=''><img src='./view/Icons/detalle.png'>
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
</html>