<?php
    $view=ViewManager::getInstance();
?>
<!DOCTYPE html>
<html>       
    <div class="content-wrapper">
            <div class="container-fluid">
                <!-- Example DataTables Card-->
                <div class="card mb-3">
                    <div class="card-header">
                    <div class="card-body">
                        <div class="form-group">
                            <div class="form-row">
                                <div class="col-md-4">
                                        <a href="index.php?controller=usuario&amp;action=administradorADD"><img src="./view/pictures/usuarios/Administrador.jpg" target="blank">
                                        </a>
                                </div>
                                <div class="col-md-4">
                                        <a href="index.php?controller=usuario&amp;action=entrenadorADD"><img src="./view/pictures/usuarios/Entrenador.png" target="blank">
                                        </a>
                                </div>
                                <div class="col-md-4">
                                        <a href="index.php?controller=deportista&amp;action=loadDeportistaAddView"><img src="./view/pictures/usuarios/Deportista.png" target="blank">
                                        </a>
                                </div>
                            </div>
                         </div>
                    </div>
                </div>
            </div>
    </div>
</html>