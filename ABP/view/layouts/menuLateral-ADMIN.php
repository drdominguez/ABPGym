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
                            <i class="icon-users"></i>
                            <span class="nav-link-text"><?= i18n("Gestión de Usuarios") ?></span>
                        </a>
                        <ul class="sidenav-second-level collapse" id="collapseUsuarios">
                            <li>
                                <a href="./index.php?controller=Usuario&action=usuarioADD">
                                    <i class="icon-user-plus"></i> <?= i18n("Añadir Usuario") ?>
                                </a>
                            </li>
                            <li>
                                <a href="./index.php?controller=Usuario&amp;action=UsuariosListar">
                                    <i class="icon-id-card-o"></i> <?= i18n("Ver Usuarios") ?>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Actividades">
                        <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseActividades" data-parent="#exampleAccordion">
                            <i class="icon-dribbble2"></i>
                            <span class="nav-link-text"><?= i18n("Gestión de Actividades") ?></span>
                        </a>
                        <ul class="sidenav-second-level collapse" id="collapseActividades">
                            <li class="nav-item" data-placement="right" title="AñadirActividad">
                                <a class="nav-link-collapse collapsed" data-toggle="collapse" href="#collapseAñadirActividad">
                                <i class="icon-add_box"></i>
                                    <span data-toggle="collapse" href="#collapseAñadirActividad"><?= i18n("Añadir Actividad") ?>
                                    </span>
                                </a>
                                 <ul class="sidenav-third-level collapse" id="collapseAñadirActividad">
                                    <li>
                                        <a href="./index.php?controller=Actividad&amp;action=individualADD">
                                            <i class="icon-user"></i> <?= i18n("Individual") ?> 
                                        </a>
                                    </li>
                                    <li>
                                        <a href="./index.php?controller=Actividad&amp;action=grupoADD">
                                            <i class="icon-users2"> </i><?= i18n("Grupo") ?>  
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="./index.php?controller=actividad&amp;action=actividadListar"><i class="icon-list-ol"></i> <?= i18n("Ver Actividades") ?></a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Ejercicios">
                        <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseEjercicios" data-parent="#exampleAccordion">
                            <i class="icon-linode"></i>
                            <span class="nav-link-text"><?= i18n("Gestión de Ejercicios") ?></span>
                        </a>
                        <ul class="sidenav-second-level collapse" id="collapseEjercicios">
                            <li>
                                <a href="./index.php?controller=Ejercicio&amp;action=loadAddView">
                                    <i class="icon-add_box"></i> <?= i18n("Añadir Ejercicio") ?>
                                </a>
                            </li>
                             <li>
                                <a href="./index.php?controller=Ejercicio&amp;action=loadListView">
                                    <i class="icon-list-ol"> </i> <?= i18n("Ver Ejercicios") ?>
                                </a>
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
                                <a class="nav-link-collapse collapsed" data-toggle="collapse" href="#collapseMulti2"> 
                                    <i class="icon-add_box"></i> <?= i18n("Añadir Tabla") ?>
                                </a>
                                <ul class="sidenav-third-level collapse" id="collapseMulti2">
                                    <li>
                                        <a href="./index.php?controller=Tabla&amp;action=EstandarADD">
                                           <i class="icon-address-book-o"></i> <?= i18n("Estándar")?> 
                                        </a>
                                    </li>
                                    <li>
                                        <a href="./index.php?controller=Tabla&amp;action=PersonalizadaADD">
                                            <i class="icon-address-book"></i> <?= i18n("Personalizada")?>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                             <li>
                                <a href="./index.php?controller=Tabla&amp;action=DesasignarTabla">
                                    <i class="icon-document-stroke"> </i><?= i18n("Desasignar Tabla") ?>
                                </a>
                            </li>
                            <li>
                                <a href="./index.php?controller=Tabla&amp;action=TablaListar">
                                    <i class="icon-list-ol"> </i><?= i18n("Ver Tablas") ?>
                                        
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Sesiones">
                        <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseSesiones" data-parent="#exampleAccordion">
                           <i class="icon-clock3"></i>
                            <span class="nav-link-text"><?= i18n("Gestión de Sesiones") ?></span>
                        </a>
                        <ul class="sidenav-second-level collapse" id="collapseSesiones">
                            <li>
                                <a class="nav-link" href="./index.php?controller=Estadistica&amp;action=Listar">
                                    <i class="icon-graph"></i> <?= i18n("Consultar Estadisticas") ?>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Instalaciones">
                        <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseInstalaciones" data-parent="#exampleAccordion">
                            <i class="icon-home4"></i>
                            <span class="nav-link-text"><?= i18n("Gestión de Instalaciones") ?></span>
                        </a>
                        <ul class="sidenav-second-level collapse" id="collapseInstalaciones">
                            <li>
                                <a href="./index.php?controller=Recurso&amp;action=recursoADD">
                                <i class="icon-add_box"></i> <?= i18n("Añadir Instalacion") ?></a>
                            </li>
                            <li>
                                <a href="./index.php?controller=Recurso&amp;action=recursoListar">
                                <i class="icon-list-ol"> </i> <?= i18n("Ver Instalaciones") ?></a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Notificaciones">
                        <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseNotificaciones" data-parent="#exampleAccordion">
                            <i class="icon-bell-o"></i>
                            <span class="nav-link-text"><?= i18n("Gestión de Notificaciones") ?></span>
                        </a>
                        <ul class="sidenav-second-level collapse" id="collapseNotificaciones">
                            <li>
                                <a href="./index.php?controller=Notificacion&amp;action=NotificacionADD">
                                <i class="icon-megaphone"></i> <?= i18n("Enviar notificacion") ?></a>
                            </li>
                            <li>
                                <a href="./index.php?controller=Notificacion&amp;action=NotificacionListar">
                                <i class="icon-mail-read"></i> <?= i18n("Ver notificaciones") ?></a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Pagos">
                        <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapsePagos" data-parent="#exampleAccordion">
                            <i class="icon-money"></i>
                            <span class="nav-link-text"><?= i18n("Gestión de Pagos") ?></span>
                        </a>
                        <ul class="sidenav-second-level collapse" id="collapsePagos">
                            <li>
                                <a href="./index.php?controller=Pago&amp;action=PagoADD">
                                <i class="icon-payment"></i> <?= i18n("Añadir Pago") ?></a>
                            </li>
                            <li>
                                <a href="./index.php?controller=Pago&amp;action=PagoListar">
                                <i class="icon-bank"></i> <?= i18n("Ver Pagos") ?></a>
                            </li>

                        </ul>
                    </li>
                    
                </ul>
                <ul class="navbar-nav ml-auto"> 
                
        

                   










