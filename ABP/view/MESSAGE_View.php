
<?php

class MESSAGE{

    private $string; 
    private $volver;

    function __construct($string, $volver){
        $this->string = $string;
        $this->volver = $volver;    
        $this->render();
    }

    function render(){

     
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
            ?> 

            <div class="content-wrapper">
            <div class="container-fluid">
                <!-- Breadcrumbs-->
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="#">Usuarios</a>
                    </li>
                    <li class="breadcrumb-item active">Insertar</li>
                </ol>
                <!-- Example DataTables Card-->
                <div class="card mb-3">
                    <div class="card-header">
                        <i class="fa fa-table"></i> <?php echo $strings[$this->string];?> </div>
                    <div class="card-body">
            <button type="button" onclick="window.location.href='<?php echo $this->volver; ?>'" class="btn btn-primary"><?php echo $strings['Volver']; ?></button> 
            

        </div>
    </div>

    <?php
        include '../view/Footer.php';
    } //fin metodo render

}
