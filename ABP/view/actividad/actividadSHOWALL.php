<?php 

require_once(__DIR__."/../../core/ViewManager.php");

$view = ViewManager::getInstance();
$actividades = $view->getVariable("actividades");
$currentuser = $view->getVariable("currentusername");
$view->setVariable("title", "Actividades");
?>
<header>
    <meta charset="UTF-8">
    <title>Iconos</title>
    <link rel="stylesheet" type="text/css" href="./view/Icons/icomoon/style.css">
    <link rel="stylesheet" type="text/css" href="./view/Icons/icomoon/modifyIcon.css">
</header>
<div class="content-wrapper">
    <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <div id="flash"><?= $view->popFlash() ?></div>
        </ol>
    <!-- Example DataTables Card-->
            <div class="card mb-3">
            <div class="card-header">
                <i class="fa fa-table"></i><?= i18n("Mostrar todas las Actividades") ?>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" >
                        <thead>
                            <tr>
                            <th><?= i18n("Nombre") ?></th>
                            <th><?= i18n("Precio") ?></th> 
                                <th><?= i18n("Editar") ?></th>
                                <th><?= i18n("Borrar") ?></th>
                                <th><?= i18n("Ver") ?></th>
                                <th><?= i18n("Asignar") ?></th>
                        </tr>
                        </thead>
                            <tfoot>
                            <tr>
                                <th><?= i18n("Nombre") ?></th>
                                <th><?= i18n("Precio") ?></th>
                                <th><?= i18n("Editar") ?></th>
                                <th><?= i18n("Borrar") ?></th>
                                <th><?= i18n("Ver") ?></th>
                                <th><?= i18n("Asignar") ?></th>
                            </tr>
                            </tfoot>
            <tbody>

<?php
                foreach($actividades as $actividad){
?>

                    <tr>
                        <td><?php echo $actividad->getNombre(); ?></td>
                        <td><?php echo $actividad->getPrecio(); ?></td> 
                        <td>
                        <a href='./index.php?controller=Actividad&amp;action=actividadEDIT&amp;idActividad=<?php echo $actividad->getIdActividad();?>'><span id="icon-editar" class="icon-pencil22"></span>
                            </a>
                        </td>
                        <td>
                         <a href='./index.php?controller=Actividad&amp;action=actividadDELETE&amp;idActividad=<?php echo $actividad->getIdActividad();?>'><span id="icon-eliminar" class=" icon-bin"></span>
                            </a>
                        </td>
                        <td>
                        <a href='./index.php?controller=Actividad&amp;action=actividadView&amp;idActividad=<?php echo $actividad->getIdActividad();?>'><span id="icon-ver" class="icon-eye-plus"></span>
                        </a>
                        </td>
                        <td>
                        <a href='./index.php?controller=Actividad&amp;action=actividadAsignar&amp;idActividad=<?php echo $actividad->getIdActividad();?>'><span id="icon-ver" class="icon-address-book"></span>
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
        <button type="button" onclick="window.location.href='./index.php?controller=main&action=index'" class="btn btn-primary"><?= i18n("Volver") ?></button>
    </div>
</div>
<?php
                  
?>