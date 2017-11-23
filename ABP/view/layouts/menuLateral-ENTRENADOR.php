  <!-- Navigation-->
<meta http-equiv="Content-Type" content="text/html"; charset="utf-8"/> 
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
            <a class="navbar-brand" href="./index.php?controller=main&action=index"><?= i18n("GymApp") ?></a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
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
                                <a href="./index.php?controller=Tabla&amp;action=TablaADD"><?= i18n("Añadir Tabla") ?></a>
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
                </ul>
                <ul class="navbar-nav sidenav-toggler">
                    <li class="nav-item">
                        <a class="nav-link text-center" id="sidenavToggler">
                            <i class="fa fa-fw fa-angle-left"></i>
                        </a>
                    </li>
                </ul>

            
                <ul class="navbar-nav ml-auto"> 