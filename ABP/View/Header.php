<meta http-equiv="Content-Type" content="text/html"; charset=utf-8"/> 

<?php
  
  include_once '../Functions/Authentication.php';
  if(isset($_SESSION['lang'])){
        if(strcmp($_SESSION['lang'],'ENGLISH')==0)
            include("../Locates/Strings_ENGLISH.php"); 
        else if(strcmp($_SESSION['lang'],'SPANISH')==0)
            include("../Locates/Strings_SPANISH.php"); 
    }else{
        include("../Locates/Strings_SPANISH.php"); 
    }
?>
    <html>

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <title> <?php echo $strings['GymApp']; ?></title>
        <!-- Bootstrap core CSS-->
        <link href="../View/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <!-- Custom fonts for this template-->
        <link href="../View/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <!-- Page level plugin CSS-->
        <?php if(substr($_SERVER['REQUEST_URI'], -27)=='notificacion_Controller.php'){?>
            <link href="../View/vendor/datatables/dataTables.bootstrap4-2.css" rel="stylesheet">
        <?php }else{ ?>
            <link href="../View/vendor/datatables/dataTables.bootstrap4-2.css" rel="stylesheet">
        <?php }
        ?>
        <!-- Custom styles for this template-->
        <link href="../View/css/sb-admin.css" rel="stylesheet">
    </head>

    <body class="fixed-nav sticky-footer bg-dark" id="page-top">


      