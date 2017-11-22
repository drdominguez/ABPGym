<?php
    $view=ViewManager::getInstance();
?>
<!DOCTYPE html>
<html>       
    <div class="content-wrapper">
            <div class="container-fluid">
                <!-- Breadcrumbs-->
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a>Gestión</a>
                    </li>
                    <li class="breadcrumb-item active">Añadir Ejercicios</li>
                </ol>
                <!-- Example DataTables Card-->
                <div class="card mb-3">
                    <div class="card-header">
                    <div class="card-body">
                        <div class="form-group">
                            <div class="form-row">
                                <div class="col-md-4">
                                        <a href="index.php?controller=Ejercicio&amp;action=estiramientoADD"><img src="./view/pictures/ejercicios/estiramiento.png" target="blank">
                                        </a>
                                </div>
                                <div class="col-md-4">
                                        <a href="index.php?controller=Ejercicio&amp;action=muscularADD"><img src="./view/pictures/ejercicios/muscular.png" target="blank">
                                        </a>
                                </div>
                                <div class="col-md-4">
                                        <a href="index.php?controller=Ejercicio&amp;action=CardioADD"><img src="./view/pictures/ejercicios/cardio.png" target="blank">
                                        </a>
                                </div>
                            </div>
                         </div>
                    </div>
                </div>
            </div>
    </div>
</html>