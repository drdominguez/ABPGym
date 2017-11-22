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
                        <a class="nav-link" href="./index.php?controller=actividad&amp;action=actividadListar">
                            <i class="fa fa-fw fa-link"></i>
                            <span class="nav-link-text"> <?= i18n("Actividades");?></span>
                        </a>
                    </li>
                    <li class="nav-item" data-toggle="tooltip">
                        <a class="nav-link" href="./index.php?controller=Tabla&amp;action=TablaListar">
                            <i class="fa fa-fw fa-link"></i>
                            <span class="nav-link-text"> <?= i18n("Tablas");?></span>
                        </a>
                    </li> 
                      <li class="nav-item" data-toggle="tooltip">
                        <a class="nav-link" href="./index.php?controller=Pago&amp;action=PagoListar">
                            <i class="fa fa-fw fa-link"></i>
                            <span class="nav-link-text"> <?= i18n("Pagos");?></span>
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
                   










