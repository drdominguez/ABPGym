<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <link href="./View/video/video.css" type="text/css" rel="stylesheet" />
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <script src="./View/video/video-3.js"></script>
    </head>
    <body>
        <video id="video-background" width="560" height="315" autoplay preload muted>
			<source src="./View/video/login_video.mp4" type='video/mp4; codecs="avc1,mp4a"' />
		</video>
        <div id="foo">
            <div class="ui-column span4"><div class="ui--custom-login ui--pass"><img src="./view/Icons/logo.png"><div id="login-form-container" class="ui--custom-login login-form-container">
        	<form name='Form' action="index.php?controller=Login&amp;action=login" class="form-signin" accept-charset="UTF-8" method="POST" onsubmit="return validarLogin()">
        	<div class="form-group">
        		<label for="exampleInputEmail1">Login</label>
        		<input class="form-control" name="dni" id="exampleInputEmail1" type="TEXT" aria-describedby="emailHelp" placeholder="   Introduzca DNI" onchange="comprobarVacio(this)  && comprobarDni(this)">
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
        </div>
    </body>
</html>