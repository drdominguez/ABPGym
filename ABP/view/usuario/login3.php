<?php
	//file: view/layouts/default.php
	$view = ViewManager::getInstance();
?>
<!DOCTYPE html>
<html>
    <head>
    	<meta charset="utf-8">
        <!-- Bootstrap core CSS-->
        <link href="./View/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <!-- Custom styles for this template-->
        <link href="./View/css/sb-admin.css" rel="stylesheet">
        <!-- Bootstrap core JavaScript-->
        <script src="./index.php?controller=language&action=i18njs"></script>
        <script src="./View/vendor/jquery/jquery.min.js"></script>
        <script type="text/javascript" src="./view/js/validaciones.js"></script> 
        <script src="./View/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <!-- Core plugin JavaScript-->
        <script src="./View/vendor/jquery-easing/jquery.easing.min.js"></script>
        <link href="./View/video/video.css" type="text/css" rel="stylesheet" />
        <script src="./View/video/video-3.js"></script>
    </head>
    <body id="bodyvideo">
        <video id="video-background" autoplay loop preload muted>
			<source src="./View/video/login_video.mp4" type='video/mp4' />
		</video>
        <div id="foo">
                <img src="./View/Icons/logo.png">
                <div class="card-login">
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
    </body>
</html>