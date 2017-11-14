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
            include("../Locates/Strings_ENGLISH.php"); 
        else if(strcmp($_SESSION['lang'],'SPANISH')==0)
            include("../Locates/Strings_SPANISH.php");
        else if(strcmp($_SESSION['lang'], 'GALICIAN')==0)
        include("../Locates/Strings_GALICIAN.php"); 
    }else{
        include("../Locates/Strings_GALICIAN.php"); 
    }
 include '../layaouts/Header.php';
                include '../layaouts/menuLateral.php';
                include '../layaouts/notificacionesMenu.php';
                include '../layaouts/menuSuperior.php';
                include '../layaouts/Footer.php';
            }

        }

?>