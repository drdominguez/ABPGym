<?php
//file: view/layouts/default.php
$view = ViewManager::getInstance();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>GymApp</title>
        <!-- Bootstrap core CSS-->
        <link href="./view/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <!-- Custom fonts for this template-->
        <link href="./view/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <!-- Custom styles for this template-->
        <link href="./view/css/sb-admin.css" rel="stylesheet">
        <!-- Bootstrap core JavaScript-->
        <script src="./index.php?controller=language&action=i18njs"></script>
        <script src="./view/vendor/jquery/jquery.min.js"></script>
        <script type="text/javascript" src="./view/js/validaciones.js"></script> 
        <script src="./view/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <!-- Core plugin JavaScript-->
        <script src="./view/vendor/jquery-easing/jquery.easing.min.js"></script>
    </head>
    <body class="bg-dark">
        <div class="container">
            <div class="card card-login mx-auto mt-5">
                <div class="card-header">GymApp</div>
                <img src="./view/Icons/logo.png">
                <div class="card-body">
                    <ol class="breadcrumb">
                    <div id="flash"><?= $view->popFlash()?></div>
                </ol>
                    <form name='Form' action="index.php?controller=Login&amp;action=login" class="form-signin" accept-charset="UTF-8" method="POST" onsubmit="return validarLogin()">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Login</label>
                            <input class="form-control" name="dni" id="exampleInputEmail1" type="TEXT" aria-describedby="emailHelp" placeholder="Introduzca DNI" onchange="comprobarVacio(this)  && comprobarDni(this)">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Password</label>
                            <input class="form-control" id="exampleInputPassword1" name="contraseña" type="password" placeholder="Password" onchange="comprobarVacio(this)">
                        </div>
                        <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit">ENTRAR</button>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>

