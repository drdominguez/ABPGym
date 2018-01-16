  <!-- Navigation-->
<meta http-equiv="Content-Type" content="text/html"; charset="utf-8"/> 
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
            <a class="navbar-brand" href="./index.php?controller=main&action=index"><?= i18n("GymApp") ?></a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
                    <li class="nav-item" data-toggle="tooltip">
                        <a class="nav-link" href="./index.php?controller=Recurso&amp;action=recurso2Listar">
                            <i class="fa fa-fw fa-table"></i>
                            <span class="nav-link-text"> <?= i18n("Ver Instalaciones");?></span>
                        </a>
                    </li>
                    <li class="nav-item" data-toggle="tooltip">
                        <a class="nav-link" href="./index.php?controller=Actividad&amp;action=actividad2Listar">
                            <i class="fa fa-fw fa-table"></i>
                            <span class="nav-link-text"> <?= i18n("Ver Actividades");?></span>
                        </a>
                    </li>
                    <li class="nav-item" data-toggle="tooltip">
                        <a class="nav-link" href="ABP/view/localizacion/localizacion.php">
                            <i class="fa fa-fw fa-table"></i>
                            <span class="nav-link-text"> <?= i18n("Localización");?></span>
                        </a>
                    </li>
                    <li class="nav-item" data-toggle="tooltip">
                        <a class="nav-link" href="./index.php?controller=Pago&amp;action=PagoListar">
                            <i class="icon-money"></i> <span class="nav-link-text"><?= i18n("Pagos");?></span>
                        </a>
                    </li>
                </ul>
                <ul class="navbar-nav ml-auto"> 
                   










