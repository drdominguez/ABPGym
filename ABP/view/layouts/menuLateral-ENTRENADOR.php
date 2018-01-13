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
                </ul>
                <ul class="navbar-nav sidenav-toggler">
                    <li class="nav-item">
                        <a class="nav-link text-center" id="sidenavToggler">
                            <i class="fa fa-fw fa-angle-left"></i>
                        </a>
                    </li>
                </ul>
                <ul class="navbar-nav ml-auto"> 