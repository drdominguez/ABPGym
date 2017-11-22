  <!-- Navigation-->
<meta http-equiv="Content-Type" content="text/html"; charset="utf-8"/> 
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
            <a class="navbar-brand" href="./index.php?controller=main&action=index"><?= i18n("GymApp") ?></a>
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
                                <a href="./index.php?controller=Usuario&action=usuarioADD">Añadir Usuario</a>
                            </li>
                            <li>
                                <a href="./index.php?controller=Usuario&amp;action=UsuariosListar">Ver Usuarios</a>
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
                                    <span data-toggle="collapse" href="#collapseAñadirActividad"><?= i18n("Añadir") ?> 
                                    </span>
                                </a>
                                 <ul class="sidenav-third-level collapse" id="collapseAñadirActividad">
                                    <li>
                                        <a href="./index.php?controller=Actividad&amp;action=individualADD">
                                            <i class="fa fa-fw fa-link"></i><?= i18n("Individual") ?> 
                                        </a>
                                    </li>
                                    <li>
                                        <a href="./index.php?controller=Actividad&amp;action=grupoADD">
                                            <i class="fa fa-fw fa-link"></i><?= i18n("Grupo") ?>  
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            
                            <li>
                                <a href="./index.php?controller=actividad&amp;action=actividadListar"><i class="fa fa-fw fa-link"></i><?= i18n("Ver Actividades") ?></a>
                            </li>
                        </ul>
                    </li>
                     <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Entrenadores">
                        <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseEntrenadores" data-parent="#exampleAccordion">
                            <i class="fa fa-fw fa-table"></i>
                            <span class="nav-link-text"><?= i18n("Gestión de Entrenadores") ?></span>
                        </a>
                        <ul class="sidenav-second-level collapse" id="collapseEntrenadores">
                            <li>
                                <a href="./index.php?controller=entrenador&amp;action=entrenadorADD"><i class="fa fa-fw fa-link"></i><?= i18n("Añadir Entrenadores") ?></a>
                            </li>
                            <li>
                                <a href="./index.php?controller=entrenador&amp;action=entrenadorListar"><i class="fa fa-fw fa-link"></i><?= i18n("Ver Entrenadores") ?></a>
                            </li>
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
                                <a href="./index.php?controller=Tabla&amp;action=TablaADD"><?= i18n("Añadir Tabla") ?></a>
                            </li>
                            <li>
                                <a href="./index.php?controller=Tabla&amp;action=TablaListar"><?= i18n("Ver Tablas") ?></a>
                            </li>
                        </ul>
                    </li>
                   <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Ejercicios">
                        <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseEjercicios" data-parent="#exampleAccordion">
                            <i class="fa fa-fw fa-table"></i>
                            <span class="nav-link-text"><?= i18n("Gestión de Ejercicios") ?></span>
                        </a>
                        <ul class="sidenav-second-level collapse" id="collapseEjercicios">
                            <li>
                                <a href="./index.php?controller=Ejercicio&amp;action=loadAddView"><?= i18n("Añadir") ?></a>
                            </li>
                            <li>
                                <a href="./index.php?controller=Ejercicio&amp;action=loadRemoveView"><?= i18n("Eliminar") ?></a>
                            </li>
                             <li>
                                <a href="./index.php?controller=Ejercicio&amp;action=loadEditView"><?= i18n("Editar") ?></a>
                            </li>
                             <li>
                                <a href="./index.php?controller=Ejercicio&amp;action=loadListView"><?= i18n("Listar") ?></a>
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
                            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Deportistas">
                                <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseDeportistas" data-parent="#exampleAccordion">
                                    <i class="fa fa-fw fa-table"></i>
                                    <span class="nav-link-text">Gestión de deportista</span>
                                </a>
                                <ul class="sidenav-second-level collapse" id="collapseDeportistas">
                                    <li>
                                        <a href="../controller/DeportistasController.php?action=DeportistaADD">Añadir deportista</a>
                                    </li>
                                    <li>
                                        <a href="../controller/NotificacionController.php?action=DeportistaEDIT">Editar deportista</a>
                                    </li>
                                    <li>
                                        <a href="../controller/DeportistasController.php?action=DeportistaREMOVE">Eliminar deportista</a>
                                    </li>
                                    <li>
                                        <a href="../controller/NotificacionController.php?action=listar">Ver deportistas</a>
                                    </li>
                                </ul>
                            </li>

                            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Pagos">
                                <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapsePagos" data-parent="#exampleAccordion">
                                    <i class="fa fa-fw fa-table"></i>
                                    <span class="nav-link-text"><?= i18n("Gestión de Pagos") ?></span>
                                </a>
                                <ul class="sidenav-second-level collapse" id="collapsePagos">
                                    <li>
                                        <a href="./index.php?controller=Pago&amp;action=PagoADD"><?= i18n("Añadir Pago") ?></a>
                                    </li>
                                    <li>
                                        <a href="./index.php?controller=Pago&amp;action=EDIT"><?= i18n("Modificar Pago") ?></a>
                                    </li>
                                    <li>
                                        <a href="./index.php?controller=Pago&amp;action=PagoListar"><?= i18n("Ver Pagos") ?></a>
                                    </li>

                                </ul>
                            </li>

                        </ul>
                    </li>

                    <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Pagos">
                        <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapsePagos" data-parent="#exampleAccordion">
                            <i class="fa fa-fw fa-table"></i>
                            <span class="nav-link-text"><?= i18n("Gestión de Pagos") ?></span>
                        </a>
                        <ul class="sidenav-second-level collapse" id="collapsePagos">
                            <li>
                                <a href="./index.php?controller=Pago&amp;action=PagoADD"><?= i18n("Añadir Pago") ?></a>
                            </li>
                            <li>
                                <a href="./index.php?controller=Pago&amp;action=EDIT"><?= i18n("Modificar Pago") ?></a>
                            </li>
                            <li>
                                <a href="./index.php?controller=Pago&amp;action=PagoListar"><?= i18n("Ver Pagos") ?></a>
                            </li>

                        </ul>
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
                   










