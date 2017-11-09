  <!-- Navigation-->
<meta http-equiv="Content-Type" content="text/html"; charset="utf-8"/> 

<?php
  
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
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
            <a class="navbar-brand" href="Index_Controller.php"><?php echo $strings['GymApp']; ?></a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
                    <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
                        <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseUsuarios" data-parent="#exampleAccordion">
                            <i class="fa fa-fw fa-wrench"></i>
                            <span class="nav-link-text"><?php echo $strings['Gestión de usuario']; ?></span>
                        </a>
                        <ul class="sidenav-second-level collapse" id="collapseUsuarios">
                            <li>
                                <a href="../Controller/usuario_Controller.php?action=ADD"><?php echo $strings['Anadir Usuario']; ?></a>
                            </li>
                            <li>
                                <a href="../Controller/usuario_Controller.php"><?php echo $strings['Ver Usuarios']; ?></a>
                            </li>
                            
                        </ul>
                    </li>
                    <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Charts">
                        <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseEntrenadores" data-parent="#exampleAccordion">
                            <i class="fa fa-fw fa-wrench"></i>
                            <span class="nav-link-text"><?php echo $strings['Gestión de entrenadores']; ?></span>
                        </a>
                        <ul class="sidenav-second-level collapse" id="collapseEntrenadores">
                            <li>
                                <a href="../Controller/entrenador_Controller.php?action=ADD"><?php echo $strings['Anadir entrenador']; ?></a>
                            </li>
                            <li>
                                <a href="../Controller/entrenador_Controller.php"><?php echo $strings['Ver entrenadores']; ?></a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Tablas">
                        <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseTablas" data-parent="#exampleAccordion">
                            <i class="fa fa-fw fa-wrench"></i>
                            <span class="nav-link-text"><?php echo $strings['Gestión de tablas']; ?></span>
                        </a>
                        <ul class="sidenav-second-level collapse" id="collapseTablas">
                            <li>
                                <a href="../Controller/tabla_Controller.php?action=ADD"><?php echo $strings['Anadir tabla']; ?></a>
                            </li>
                            <li>
                                <a href="../Controller/tabla_Controller.php"><?php echo $strings['Ver tablas']; ?></a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Ejercicios">
                        <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseEjercicios" data-parent="#exampleAccordion">
                            <i class="fa fa-fw fa-wrench"></i>
                            <span class="nav-link-text"><?php echo $strings['Gestión de ejercicios']; ?></span>
                        </a>
                        <ul class="sidenav-second-level collapse" id="collapseEjercicios">
                            <li>
                                <a href="../Controller/ejercicio_Controller.php?action=ADD"><?php echo $strings['Anadir ejercicio']; ?></a>
                            </li>
                            <li>
                                <a href="../Controller/ejercicio_Controller.php"><?php echo $strings['Ver ejercicios']; ?></a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Notificaciones">
                        <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseNotificaciones" data-parent="#exampleAccordion">
                            <i class="fa fa-fw fa-wrench"></i>
                            <span class="nav-link-text"><?php echo $strings['Gestión de notificaciones']; ?></span>
                        </a>
                        <ul class="sidenav-second-level collapse" id="collapseNotificaciones">
                            <li>
                                <a href="../Controller/notificacion_Controller.php?action=ADD"><?php echo $strings['Enviar notificacion']; ?></a>
                            </li>
                            <li>
                                <a href="../Controller/notificacion_Controller.php"><?php echo $strings['Ver notificaciones']; ?></a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Deportistas">
                        <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseDeportistas" data-parent="#exampleAccordion">
                            <i class="fa fa-fw fa-wrench"></i>
                            <span class="nav-link-text"><?php echo $strings['Gestión de deportista']; ?></span>
                        </a>
                        <ul class="sidenav-second-level collapse" id="collapseDeportistas">
                            <li>
                                <a href="../Controller/deportistas_Controller.php?action=ADD"><?php echo $strings['Enviar notificacion']; ?></a>
                            </li>
                            <li>
                                <a href="../Controller/notificacion_Controller.php"><?php echo $strings['Ver notificaciones']; ?></a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Link">
                        <a class="nav-link" href="../Controller/usuario_Controller.php?dni=<?php echo $_SESSION['login']; ?>&action=SHOWCURRENT">
                            <i class="fa fa-fw fa-link"></i>
                            <span class="nav-link-text"><?php echo $strings['Cuenta']; ?></span>
                        </a>
                    </li>
                </ul>
                <ul class="navbar-nav sidenav-toggler">
                    <li class="nav-item">
                        <a class="nav-link text-center" id="sidenavToggler">
                            <i class="fa fa-fw fa-angle-left"></i>
                        </a>
                    </li>
                </ul>

            
                <ul class="navbar-nav ml-auto"> 
                   










