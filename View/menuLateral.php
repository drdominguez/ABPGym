  <!-- Navigation-->

        <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
            <a class="navbar-brand" href="Index_Controller.php">GymApp</a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
                    <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
                        <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseDeportistas" data-parent="#exampleAccordion">
                            <i class="fa fa-fw fa-wrench"></i>
                            <span class="nav-link-text">Gestión Usuarios</span>
                        </a>
                        <ul class="sidenav-second-level collapse" id="collapseDeportistas">
                            <li>
                                <a href="../Controller/usuario_Controller.php?action=ADD">Añadir Usuarios</a>
                            </li>
                            <li>
                                <a href="../Controller/usuario_Controller.php">Ver Usuarios</a>
                            </li>
                            
                        </ul>
                    </li>
                    <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Charts">
                        <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseEntrenadores" data-parent="#exampleAccordion">
                            <i class="fa fa-fw fa-wrench"></i>
                            <span class="nav-link-text">Gestión Entrenadores</span>
                        </a>
                        <ul class="sidenav-second-level collapse" id="collapseEntrenadores">
                            <li>
                                <a href="navbar.html">Añadir Entrenador</a>
                            </li>
                            <li>
                                <a href="cards.html">Eliminar Entrenador</a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Tablas">
                        <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseTablas" data-parent="#exampleAccordion">
                            <i class="fa fa-fw fa-wrench"></i>
                            <span class="nav-link-text">Gestión Tablas</span>
                        </a>
                        <ul class="sidenav-second-level collapse" id="collapseTablas">
                            <li>
                                <a href="navbar.html">Añadir Tabla</a>
                            </li>
                            <li>
                                <a href="cards.html">Eliminar Tabla</a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Ejercicios">
                        <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseEjercicios" data-parent="#exampleAccordion">
                            <i class="fa fa-fw fa-wrench"></i>
                            <span class="nav-link-text">Gestión Ejercicios</span>
                        </a>
                        <ul class="sidenav-second-level collapse" id="collapseEjercicios">
                            <li>
                                <a href="navbar.html">Añadir Ejercicio</a>
                            </li>
                            <li>
                                <a href="cards.html">Eliminar Ejercicio</a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Notificaciones">
                        <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseNotificaciones" data-parent="#exampleAccordion">
                            <i class="fa fa-fw fa-wrench"></i>
                            <span class="nav-link-text">Gestión Notificaciones</span>
                        </a>
                        <ul class="sidenav-second-level collapse" id="collapseNotificaciones">
                            <li>
                                <a href="../Controller/notificacion_Controller.php?action=ADD">Enviar Notificación</a>
                            </li>
                            <li>
                                <a href="../Controller/notificacion_Controller.php">Ver Notificaciones</a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Link">
                        <a class="nav-link" href="">
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
                   










