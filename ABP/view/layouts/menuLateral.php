  <!-- Navigation-->
<meta http-equiv="Content-Type" content="text/html"; charset="utf-8"/> 
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
            <a class="navbar-brand" href="Index_Controller.php">GymApp</a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
                    <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
                        <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseUsuarios" data-parent="#exampleAccordion">
                            <i class="fa fa-fw fa-wrench"></i>
                            <span class="nav-link-text">Gestión de usuario</span>
                        </a>
                        <ul class="sidenav-second-level collapse" id="collapseUsuarios">
                            <li>
                                <a href="../controller/UsuarioController.php?action=ADD">Añadir Usuario</a>
                            </li>
                            <li>
                                <a href="../controller/UsuarioController.php">Ver Usuarios</a>
                            </li>
                            
                        </ul>
                    </li>
                    <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Charts">
                        <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseEntrenadores" data-parent="#exampleAccordion">
                            <i class="fa fa-fw fa-wrench"></i>
                            <span class="nav-link-text">Gestión de entrenadores</span>
                        </a>
                        <ul class="sidenav-second-level collapse" id="collapseEntrenadores">
                            <li>
                                <a href="../controller/EntrenadorController.php?action=ADD">Añadir entrenador</a>
                            </li>
                            <li>
                                <a href="../controller/EntrenadorController.php">Ver entrenadores</a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Tablas">
                        <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseTablas" data-parent="#exampleAccordion">
                            <i class="fa fa-fw fa-wrench"></i>
                            <span class="nav-link-text">Gestión de tablas</span>
                        </a>
                        <ul class="sidenav-second-level collapse" id="collapseTablas">
                            <li>
                                <a href="../controller/TablaController.php?action=ADD">Añadir tabla</a>
                            </li>
                            <li>
                                <a href="../controller/TablaController.php">Ver tablas</a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Ejercicios">
                        <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseEjercicios" data-parent="#exampleAccordion">
                            <i class="fa fa-fw fa-wrench"></i>
                            <span class="nav-link-text">Gestión de ejercicios</span>
                        </a>
                        <ul class="sidenav-second-level collapse" id="collapseEjercicios">
                            <li>
                                <a href="../controller/EjercicioController.php?action=ADD">Añadir</a>
                                 <ul class="sidenav-second-level collapse" id="collapseEjercicios">
	                            	<li>
	                            		<a href="../controller/EjercicioController.php?action=ADD">Estiramiento</a>
                           			</li>
                           			<li>
	                            		<a href="../controller/EjercicioController.php?action=ADD">Cardio</a>
                           			</li>
                           			<li>
	                            		<a href="../controller/EjercicioController.php?action=ADD">Muscular</a>
                           			</li>
	                            </ul>
                            </li>
                            <li>
                                <a href="../controller/EjercicioController.php?action=ADD">Eliminar</a>
                                 <ul class="sidenav-second-level collapse" id="collapseEjercicios">
	                            	<li>
	                            		<a href="../controller/EjercicioController.php?action=ADD">Estiramiento</a>
                           			</li>
                           			<li>
	                            		<a href="../controller/EjercicioController.php?action=ADD">Cardio</a>
                           			</li>
                           			<li>
	                            		<a href="../controller/EjercicioController.php?action=ADD">Muscular</a>
                           			</li>
	                            </ul>
                            </li>
                            <li>
                                <a href="../controller/ejercicio_Controller.php">Editar</a>
                                 <ul class="sidenav-second-level collapse" id="collapseEjercicios">
	                            	<li>
	                            		<a href="../controller/EjercicioController.php?action=ADD">Estiramiento</a>
                           			</li>
                           			<li>
	                            		<a href="../controller/EjercicioController.php?action=ADD">Cardio</a>
                           			</li>
                           			<li>
	                            		<a href="../controller/EjercicioController.php?action=ADD">Muscular</a>
                           			</li>
	                            </ul>
                            </li>
                            <li>
                                <a href="../controller/EjercicioController.php">Ver ejercicios</a>
                                 <ul class="sidenav-second-level collapse" id="collapseEjercicios">
	                            	<li>
	                            		<a href="../controller/EjercicioController.php?action=ADD">Estiramiento</a>
                           			</li>
                           			<li>
	                            		<a href="../controller/EjercicioController.php?action=ADD">Cardio</a>
                           			</li>
                           			<li>
	                            		<a href="../controller/EjercicioController.php?action=ADD">Muscular</a>
                           			</li>
	                            </ul>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Notificaciones">
                        <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseNotificaciones" data-parent="#exampleAccordion">
                            <i class="fa fa-fw fa-wrench"></i>
                            <span class="nav-link-text">Gestión de notificaciones</span>
                        </a>
                        <ul class="sidenav-second-level collapse" id="collapseNotificaciones">
                            <li>
                                <a href="../controller/NotificacionController.php?action=ADD">Enviar notificacion</a>
                            </li>
                            <li>
                                <a href="../controller/NotificacionController.php">Ver notificaciones</a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Deportistas">
                        <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseDeportistas" data-parent="#exampleAccordion">
                            <i class="fa fa-fw fa-wrench"></i>
                            <span class="nav-link-text">Gestión de deportista</span>
                        </a>
                        <ul class="sidenav-second-level collapse" id="collapseDeportistas">
                            <li>
                                <a href="../controller/DeportistasController.php?action=ADD">Enviar notificacion</a>
                            </li>
                            <li>
                                <a href="../controller/NotificacionController.php">Ver notificaciones</a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Link">
                        <a class="nav-link" href="../controller/UsuarioController.php?dni=<?php echo $_SESSION['login']; ?>&action=SHOWCURRENT">
                            <i class="fa fa-fw fa-link"></i>
                            <span class="nav-link-text">Cuenta</span>
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
                   










