<meta http-equiv="Content-Type" content="text/html"; charset="utf-8"/> 

<?php

        class Index {

            function __construct(){
                $this->render();
            }

            function render(){
            
                //Carga el idioma guardado en la variable de sesión o el Español por defecto
            include_once '../Functions/Authentication.php';
  if(isset($_SESSION['lang'])){
        if(strcmp($_SESSION['lang'],'ENGLISH')==0)
            include("../locates/Strings_ENGLISH.php");
        else if(strcmp($_SESSION['lang'],'SPANISH')==0)
            include("../locates/Strings_SPANISH.php");
        else if(strcmp($_SESSION['lang'], 'GALICIAN')==0)
        include("../locates/Strings_GALICIAN.php");
    }else{
        include("../locates/Strings_GALICIAN.php");
    }
 include '../view/Header.php';
                include '../view/menuLateral.php';
                include '../view/notificacionesMenu.php';
                include '../view/menuSuperior.php';
                include '../view/Footer.php';
            }

        }

?>