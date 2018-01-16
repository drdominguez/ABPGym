<?php
require_once(__DIR__."/../../core/ViewManager.php");

    $view = ViewManager::getInstance();

?>
<style>
       #map {
        height: 400px;
        width: 100%;
       }
    </style>
<div class="content-wrapper">
    <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <div id="flash"><?= $view->popFlash() ?></div>
        </ol>
        <!-- Example DataTables Card-->
        <div class="card mb-3">
            <div class="card-header">
                <i class="fa fa-table"></i><?= i18n("Ver Localización") ?>
            </div>
            <div class="card-body">
                <b><?= i18n("Calle") ?>:</b> <p><?php echo "Avenida de Marín"; ?></p>
                <b><?= i18n("Número") ?>:</b> <p><?php echo "9"; ?></p>
                <b><?= i18n("Provincia") ?>:</b> <p><?php echo "Ourense"; ?></p>
                <b><?= i18n("Comunidad Autónoma") ?>:</b> <p><?php echo "Galicia"; ?></p>
                <b><?= i18n("Pais") ?>:</b><p> <?php echo "España"; ?></p>
                <div id="map"></div>
                    <script>
                      function initMap() {
                        var uluru = {lat: 42.349800, lng: -7.867945};
                        var map = new google.maps.Map(document.getElementById('map'), {
                          zoom: 18,
                          center: uluru
                        });
                        var marker = new google.maps.Marker({
                          position: uluru,
                          map: map
                        });
                      }
                    </script>
                    <script async defer
                    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDsMVGju9TEG4_TayY9J193rGeOdAPI0vI &callback=initMap">
                    </script>
                <button type="button" onclick="window.location.href='./index.php?controller=main&action=index'" class="btn btn-primary"><?= i18n("Volver") ?></button> 
            </div>
        </div>
    </div>
</div>