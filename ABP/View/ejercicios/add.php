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
                    <li class="breadcrumb-item active">Ejercicios</li>
                </ol>
                <!-- Example DataTables Card-->
                <div class="card mb-3">
                    <div class="card-header">
                        <i class="fa fa-table"></i> Añadir Muscular</div>
                    <div class="card-body">      
                    <div id="flash"><?= $view->popFlash() ?></div>
                    
                        <div class="form-group">
                            <div class="form-row">
                                <div class="col-md-4">
                                    <label for="exampleInputEstiramiento"><h3>Estiramiento</h3></label><br>
                                        <a href="index.php?controller=Ejercicio&amp;action=estiramientoADD"><img src="./view/pictures/estiramiento.png" target="blank">
                                        </a>
                                </div>
                                <div class="col-md-4">
                                    <labe for="exampleInputMuscular"><h3>Muscular</h3></label><br>
                                        <a href="index.php?controller=Ejercicio&amp;action=muscularADD"><img src="./view/pictures/muscular.jpg" target="blank">
                                        </a>
                                </div>
                                <div class="col-md-4">
                                    <label class="target" for="exampleInputCardio"><h3>Cardio</h3></label><br>
                                        <a href="index.php?controller=Ejercicio&amp;action=CardioADD"><img src="./view/pictures/cardio.png" target="blank">
                                        </a>
                                </div>
                            </div>
                         </div>
                    </div>
                </div>
            </div>
    </div>
</html>