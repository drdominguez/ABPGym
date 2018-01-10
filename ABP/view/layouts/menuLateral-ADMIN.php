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
                            <span class="nav-link-text"><?= i18n("Gestión de Usuarios") ?></span>
                        </a>
                        <ul class="sidenav-second-level collapse" id="collapseUsuarios">
                            <li>
                                <a href="./index.php?controller=Usuario&action=usuarioADD">
                                    <i class="fa fa-fw fa-link"></i><?= i18n("Añadir Usuario") ?>
                                </a>
                            </li>
                            <li>
                                <a href="./index.php?controller=Usuario&amp;action=UsuariosListar">
                                    <i class="fa fa-fw fa-link"></i><?= i18n("Ver Usuarios") ?>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Actividades">
                        <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseActividades" data-parent="#exampleAccordion">
                            <i class="fa fa-fw fa-table"></i>
                            <span class="nav-link-text"><?= i18n("Gestión de Actividades") ?></span>
                        </a>
                        <ul class="sidenav-second-level collapse" id="collapseActividades">
                            <li class="nav-item" data-placement="right" title="AñadirActividad">
                                <a class="nav-link-collapse collapsed" data-toggle="collapse" href="#collapseAñadirActividad">
                                <i class="fa fa-fw fa-wrench"></i>
                                    <span data-toggle="collapse" href="#collapseAñadirActividad"><?= i18n("Añadir Actividad") ?>
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
                    <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Ejercicios">
                        <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseEjercicios" data-parent="#exampleAccordion">
                            <i class="fa fa-fw fa-table"></i>
                            <span class="nav-link-text"><?= i18n("Gestión de Ejercicios") ?></span>
                        </a>
                        <ul class="sidenav-second-level collapse" id="collapseEjercicios">
                            <li>
                                <a href="./index.php?controller=Ejercicio&amp;action=loadAddView"><?= i18n("Añadir Ejercicio") ?></a>
                            </li>
                             <li>
                                <a href="./index.php?controller=Ejercicio&amp;action=loadListView"><?= i18n("Ver Ejercicios") ?></a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Tablas">
                        <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseTablas" data-parent="#exampleAccordion">
                            <i class="fa fa-fw fa-table"></i>
                            <span class="nav-link-text"><?= i18n("Gestión de Tablas") ?></span>
                        </a>
                        <ul class="sidenav-second-level collapse" id="collapseTablas">
                            <li>
                                <a class="nav-link-collapse collapsed" data-toggle="collapse" href="#collapseMulti2"><?= i18n("Añadir Tabla") ?></a>
                                <ul class="sidenav-third-level collapse" id="collapseMulti2">
                                    <li>
                                        <a href="./index.php?controller=Tabla&amp;action=EstandarADD">Estándar</a>
                                    </li>
                                    <li>
                                        <a href="./index.php?controller=Tabla&amp;action=PersonalizadaADD">Personalizada</a>
                                    </li>
                                </ul>
                            </li>
                             <li>
                                <a href="./index.php?controller=Tabla&amp;action=DesasignarTabla"><?= i18n("Desasignar Tabla") ?></a>
                            </li>
                            <li>
                                <a href="./index.php?controller=Tabla&amp;action=TablaListar"><?= i18n("Ver Tablas") ?></a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Sesiones">
                        <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseSesiones" data-parent="#exampleAccordion">
                           <i class="fa fa-fw fa-table"></i>
                            <span class="nav-link-text"><?= i18n("Gestión de Sesiones") ?></span>
                        </a>
                        <ul class="sidenav-second-level collapse" id="collapseSesiones">
                            <li>
                                <a href="./index.php?controller=SesionEntrenamiento&amp;action=TablaListar"><?= i18n("Realizar Sesión") ?></a>
                            </li>
                            <li>
                                <a href="./index.php?controller=SesionEntrenamiento&amp;action=TablaListar"><?= i18n("Consultar Sesiones") ?></a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Instalaciones">
                        <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseInstalaciones" data-parent="#exampleAccordion">
                            <i class="fa fa-fw fa-table"></i>
                            <span class="nav-link-text"><?= i18n("Gestión de Instalaciones") ?></span>
                        </a>
                        <ul class="sidenav-second-level collapse" id="collapseInstalaciones">
                            <li>
                                <a href="./index.php?controller=Recurso&amp;action=recursoADD"><?= i18n("Añadir Instalacion") ?></a>
                            </li>
                            <li>
                                <a href="./index.php?controller=Recurso&amp;action=recursoListar"><?= i18n("Ver Instalaciones") ?></a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Notificaciones">
                        <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseNotificaciones" data-parent="#exampleAccordion">
                            <i class="fa fa-fw fa-table"></i>
                            <span class="nav-link-text"><?= i18n("Gestión de Notificaciones") ?></span>
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
                
        

                   










