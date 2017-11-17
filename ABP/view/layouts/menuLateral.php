  <!-- Navigation-->
<meta http-equiv="Content-Type" content="text/html"; charset="utf-8"/> 
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
            <a class="navbar-brand" href="Index_Controller.php"><?= i18n("GymApp") ?></a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
                    <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
                        <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseUsuarios" data-parent="#exampleAccordion">
                            <i class="fa fa-fw fa-table"></i>
                            <span class="nav-link-text"><?= i18n("Gestión de usuario") ?></span>
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
                    <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Actividades">
                        <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseActividades" data-parent="#exampleAccordion">
                            <i class="fa fa-fw fa-table"></i>
                            <span class="nav-link-text"><?= i18n("Gestión de Actividad") ?></span>
                        </a>
                        <ul class="sidenav-second-level collapse" id="collapseActividades">
                            <li class="nav-item" data-placement="right" title="AñadirActividad">
                                <a class="nav-link-collapse collapsed" data-toggle="collapse" href="#collapseAñadirActividad">
                                <i class="fa fa-fw fa-wrench"></i>
                                    <span data-toggle="collapse" href="#collapseAñadirActividad">Añadir 
                                    </span>
                                </a>
                                 <ul class="sidenav-third-level collapse" id="collapseAñadirActividad">
                                    <li>
                                        <a href="./index.php?controller=Actividad&amp;action=individualADD">
                                            <i class="fa fa-fw fa-link"></i> Individual
                                        </a>
                                    </li>
                                    <li>
                                        <a href="./index.php?controller=Actividad&amp;action=grupoADD">
                                            <i class="fa fa-fw fa-link"></i> Grupo
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item" data-placement="right" title="Eliminar">
                                <a class="nav-link-collapse collapsed" data-toggle="collapse" href="#collapseEliminarActividad">
                                <i class="fa fa-fw fa-wrench"></i>
                                    <span data-toggle="collapse" href="#collapseEliminarActividad">Eliminar 
                                    </span>
                                </a>
                                 <ul class="sidenav-third-level collapse" id="collapseEliminarActividad">
                                    <li>
                                        <a href="../controller/EActividadController.php?action=delete">
                                            <i class="fa fa-fw fa-link"></i> Individual
                                        </a>
                                    </li>
                                    <li>
                                        <a href="../controller/ActividadController.php?action=delete">
                                            <i class="fa fa-fw fa-link"></i> Grupo
                                        </a>
                                    </li>

                                </ul>
                            </li>
                            <li class="nav-item" data-placement="right" title="EditarActividad">
                                <a class="nav-link-collapse collapsed" data-toggle="collapse" href="#collapseEditarActividad">
                                <i class="fa fa-fw fa-wrench"></i>
                                    <span data-toggle="collapse" href="#collapseEditarActividad">Editar
                                    </span>
                                </a>
                                 <ul class="sidenav-third-level collapse" id="collapseEditarActividad">
                                    <li>
                                        <a href="../controller/ActividadController.php?action=edit">
                                            <i class="fa fa-fw fa-link"></i> Individual
                                        </a>
                                    </li>
                                    <li>
                                        <a href="../controller/ActividadController.php?action=edit∫">
                                            <i class="fa fa-fw fa-link"></i> Grupo
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="./index.php?controller=actividad&amp;action=actividadListar"><i class="fa fa-fw fa-link"></i><?= i18n("Ver actividades") ?></a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Charts">
                        <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseEntrenadores" data-parent="#exampleAccordion">
                            <i class="fa fa-fw fa-table"></i>
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
                            <i class="fa fa-fw fa-table"></i>
                            <span class="nav-link-text"><?= i18n("Gestión de tablas") ?></span>
                        </a>
                        <ul class="sidenav-second-level collapse" id="collapseTablas">
                            <li>
                                <a href="../controller/TablaController.php?action=ADD"><?= i18n("Añadir tabla") ?></a>
                            </li>
                            <li>
                                <a href="../controller/TablaController.php"><?= i18n("Ver tablas") ?></a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Ejercicios">
                        <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseEjercicios" data-parent="#exampleAccordion">
                            <i class="fa fa-fw fa-table"></i>
                            <span class="nav-link-text">Gestión de ejercicios</span>
                        </a>
                        <ul class="sidenav-second-level collapse" id="collapseEjercicios">
                            <li class="nav-item" data-placement="right" title="Añadir">
                                <a class="nav-link-collapse collapsed" data-toggle="collapse" href="#collapseAñadir">
                                <i class="fa fa-fw fa-wrench"></i>
                                    <span data-toggle="collapse" href="#collapseAñadir">Añadir 
                                    </span>
                                </a>
                                 <ul class="sidenav-third-level collapse" id="collapseAñadir">
	                            	<li>
                                        <a href="./index.php?controller=Ejercicio&amp;action=EstiramientoADD">
                                            <i class="fa fa-fw fa-link"></i> Estiramiento
                                        </a>
                           			</li>
                           			<li>
	                            		<a href="../controller/EjercicioController.php?action=ADD">
                                            <i class="fa fa-fw fa-link"></i> Cardio
                                        </a>
                           			</li>
                           			<li>
	                            		<a href="../controller/EjercicioController.php?action=ADD">
                                            <i class="fa fa-fw fa-link"></i> Muscular
                                        </a>         
                                        
                           			</li>
	                            </ul>
                            </li>
                            <li class="nav-item" data-placement="right" title="Eliminar">
                                <a class="nav-link-collapse collapsed" data-toggle="collapse" href="#collapseEliminar">
                                <i class="fa fa-fw fa-wrench"></i>
                                    <span data-toggle="collapse" href="#collapseEliminar">Eliminar 
                                    </span>
                                </a>
                                 <ul class="sidenav-third-level collapse" id="collapseEliminar">
                                    <li>
                                        <a href="../controller/EjercicioController.php?action=ADD">
                                            <i class="fa fa-fw fa-link"></i> Estiramiento
                                        </a>
                                    </li>
                                    <li>
                                        <a href="../controller/EjercicioController.php?action=ADD">
                                            <i class="fa fa-fw fa-link"></i> Cardio
                                        </a>
                                    </li>
                                    <li>
                                        <a href="../controller/EjercicioController.php?action=ADD">
                                            <i class="fa fa-fw fa-link"></i> Muscular
                                        </a>         
                                        
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item" data-placement="right" title="Editar">
                                <a class="nav-link-collapse collapsed" data-toggle="collapse" href="#collapseEditar">
                                <i class="fa fa-fw fa-wrench"></i>
                                    <span data-toggle="collapse" href="#collapseEditar">Editar
                                    </span>
                                </a>
                                 <ul class="sidenav-third-level collapse" id="collapseEditar">
                                    <li>
                                        <a href="../controller/EjercicioController.php?action=ADD">
                                            <i class="fa fa-fw fa-link"></i> Estiramiento
                                        </a>
                                    </li>
                                    <li>
                                        <a href="../controller/EjercicioController.php?action=ADD">
                                            <i class="fa fa-fw fa-link"></i> Cardio
                                        </a>
                                    </li>
                                    <li>
                                        <a href="../controller/EjercicioController.php?action=ADD">
                                            <i class="fa fa-fw fa-link"></i> Muscular
                                        </a>         
                                        
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item" data-placement="right" title="VerEjercicios">
                                <a class="nav-link-collapse collapsed" data-toggle="collapse" href="#collapseVerEjercicios">
                                <i class="fa fa-fw fa-wrench"></i>
                                    <span data-toggle="collapse" href="#collapseAñadir">Ver Ejercicios 
                                    </span>
                                </a>
                                 <ul class="sidenav-third-level collapse" id="collapseVerEjercicios">
                                    <li>
                                        <a href="../controller/EjercicioController.php?action=ADD">
                                            <i class="fa fa-fw fa-link"></i> Estiramiento
                                        </a>
                                    </li>
                                    <li>
                                        <a href="../controller/EjercicioController.php?action=ADD">
                                            <i class="fa fa-fw fa-link"></i> Cardio
                                        </a>
                                    </li>
                                    <li>
                                        <a href="../controller/EjercicioController.php?action=ADD">
                                            <i class="fa fa-fw fa-link"></i> Muscular
                                        </a>         
                                        
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Notificaciones">
                        <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseNotificaciones" data-parent="#exampleAccordion">
                            <i class="fa fa-fw fa-table"></i>
                            <span class="nav-link-text"><?= i18n("Gestión de notificaciones") ?></span>
                        </a>
                        <ul class="sidenav-second-level collapse" id="collapseNotificaciones">
                            <li>
                                <a href="./index.php?controller=Notificacion&amp;action=NotificacionADD"><?= i18n("Enviar notificacion") ?></a>
                            </li>
                            <li>
                                <a href="./index.php?controller=Notificacion&amp;action=NotificacionListar"><?= i18n("Ver notificaciones") ?></a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Deportistas">
                        <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseDeportistas" data-parent="#exampleAccordion">
                            <i class="fa fa-fw fa-table"></i>
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
                        <a class="nav-link" href="../controller/UsuarioController.php?dni=<?php echo $_SESSION['currentuser']; ?>&action=SHOWCURRENT">
                            <i class="fa fa-fw fa-link"></i>
                            <span class="nav-link-text"><?= i18n("Cuenta") ?></span>
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
                   










