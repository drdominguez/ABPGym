<?php
    $view=ViewManager::getInstance();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Añadir Ejercicio</title>
        <!-- Bootstrap core CSS-->
        <link href="../../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <!-- Custom fonts for this template-->
        <link href="../../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <!-- Custom styles for this template-->
        <link href="../../css/sb-admin.css" rel="stylesheet">
        <!-- Bootstrap core JavaScript-->
        <script src="../../vendor/jquery/jquery.min.js"></script>
        <script src="../../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <!-- Core plugin JavaScript-->
        <script src="../../vendor/jquery-easing/jquery.easing.min.js"></script>
    </head>
    <body class="bg-dark">
        <div class="container">
            <div class="card card-login mx-auto mt-5">
                <div class="card-header">Añadir Actividad</div>
                <div class="card-body">
                    <div id="flash"><?= $view->popFlash() ?></div>
                    <form name='Form' action="index.php?controller=Login&amp;action=login" class="form-signin" accept-charset="UTF-8" method="POST">
                        <div class="form-group">
                            <label for="exampleInputNombre">Nombre</label>
                            <input class="form-control" name="nombre" id="exampleInputNombre" type="TEXT" aria-describedby="emailHelp" placeholder="Nombre" onblur="esVacio(this)  && comprobarText(this,15)">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputTiempo">Precio</label>
                            <input class="form-control" name="descripcion" id="exampleInputDescripcion" type="TEXT" aria-describedby="emailHelp" placeholder="Descripción" onblur="esVacio(this)  && comprobarText(this,15)">
                        <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit">Añadir</button>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>
