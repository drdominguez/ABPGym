<?php

    class Login{


        function __construct($mal){ 
            $this->mal=$mal;
            $this->render();
        }

        function render(){
          include_once '../Functions/Authentication.php';
  if(isset($_SESSION['lang'])){
        if(strcmp($_SESSION['lang'],'ENGLISH')==0)
            include("../Locates/Strings_ENGLISH.php"); 
        else if(strcmp($_SESSION['lang'],'SPANISH')==0)
            include("../Locates/Strings_SPANISH.php");
        else if(strcmp($_SESSION['lang'], 'GALICIAN')==0)
        include("../Locates/Strings_GALICIAN.php"); 
    }else{
        include("../Locates/Strings_GALICIAN.php"); 
    }
?>
    <html>

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>GymApp</title>
        <!-- Bootstrap core CSS-->
        <link href="../View/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <!-- Custom fonts for this template-->
        <link href="../View/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <!-- Custom styles for this template-->
        <link href="../View/css/sb-admin.css" rel="stylesheet">
    </head>

    <body class="bg-dark">
        <div class="container">
            <div class="card card-login mx-auto mt-5">
                <div class="card-header">GymApp</div>
                <div class="card-body">
                    <form name='Form' action='../Controller/Login_Controller.php' class="form-signin" accept-charset="UTF-8" method="POST">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Login</label>
                            <input class="form-control" name="dni" id="exampleInputEmail1" type="TEXT" aria-describedby="emailHelp" placeholder="Introduzca DNI" onblur="esVacio(this)  && comprobarText(this,15)">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Password</label>
                            <input class="form-control" id="exampleInputPassword1" name="contraseña" type="password" placeholder="Password" onblur="esVacio(this)  && comprobarText(this,32)">
                        </div>
                        <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit">ENTRAR</button>
                    </form>
                </div>
            </div>
        </div>
        <!-- Bootstrap core JavaScript-->
        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <!-- Core plugin JavaScript-->
        <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    </body>

    </html>
<?php if($this->mal!=false){
    ?>
<div class="card card-login mx-auto mt-5">
    
    <div class='alert alert-danger'><?php echo $this->mal;?></div>
    
</div>
    <?php
}
        } //fin metodo render

    } //fin Login

    ?>

