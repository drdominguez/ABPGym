<?php
require_once(__DIR__."/../../core/ViewManager.php");

$view = ViewManager::getInstance();
$estadisticas = $view->getVariable("estadistica");
$tipoUsuario = $view->getVariable("tipoUsuario");
$currentuser = $view->getVariable("currentusername");
$view->setVariable("title", "Estadísticas");

if (isset($_POST["grafica"]))
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
                <i class="fa fa-table"></i><?= i18n("Mostrar estadísticas") ?>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" >
                        <thead>
                        <tr>
                            <th><?= i18n("nombre") ?></th>
                            <th><?= i18n("tipo") ?></th>
                            <th><?= i18n("descripción") ?></th>
                            <th><?= i18n("comentario") ?></th>
                            <th><?= i18n("duración") ?></th>
                            <th><?= i18n("fecha") ?></th>
                            <th><?= i18n("Ver") ?></th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th><?= i18n("nombre") ?></th>
                            <th><?= i18n("tipo") ?></th>
                            <th><?= i18n("descripción") ?></th>
                            <th><?= i18n("comentario") ?></th>
                            <th><?= i18n("duración") ?></th>
                            <th><?= i18n("fecha") ?></th>
                            <th><?= i18n("Ver") ?></th>
                        </tr>
                        </tfoot>
                        <tbody>
                        <?php
                        $arrayPHP = array();
                        foreach($estadisticas as $estadistica)
                        {
                            ?>
                            <tr>
                                <td><?php echo $estadistica->getNombre(); ?></td>
                                <td><?php echo $estadistica->getTipo(); ?></td>
                                <td><?php echo $estadistica->getDescripcion(); ?></td>
                                <td><?php echo $estadistica->getComentario(); ?></td>
                                <td><?php echo $estadistica->getDuracion(); ?></td>
                                <td><?php echo $estadistica->getFecha();
                                $arrayP = array($estadistica->getDuracion(),$estadistica->getFecha(),$estadistica->getDuracion()+3);
                                array_push($arrayPHP, $arrayP)?></td>
                                <td>
                                    <!--<a href='./index.php?controller=Estadistica&amp;action=EstadisticaView&amp;idTabla=<//  ?php echo $tabla->getIdTabla();?>'><span id="icon-ver" class="icon-eye-plus"></span>
                                    </a>-->
                                </td>
                            </tr>
                            <?php
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div id="graph" style="height: 250px;">
            </div>
        </div>
    </div>
</div>

<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>

<script type="text/javascript">

    // obtenemos el array de valores mediante la conversion a json del
    // array de php
    var arrayJS=<?php echo json_encode($arrayPHP);?>;

    var morrisData = [];

    for(var i = 0; i < arrayJS.length; i++){
        morrisData.push({'Fecha': arrayJS[i][1], 'Duracion': arrayJS[i][0]});
    }
    new Morris.Line({
        // ID of the element in which to draw the chart.
        element: 'graph',
        // Chart data records -- each entry in this array corresponds to a point on
        // the chart.
        data: morrisData,
        // The name of the data record attribute that contains x-values.
        xkey: 'Fecha',
        // A list of names of data record attributes that contain y-values.
        ykeys: ['Duracion'],
        // Labels for the ykeys -- will be displayed when you hover over the
        // chart.
        labels: ['Duracion'],
        resize: true,
        dateFormat: function (x) { return new Date(x).toDateString();}
    });
</script>
