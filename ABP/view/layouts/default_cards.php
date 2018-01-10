<div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">Bienvenido a GymApp!</li>
      </ol>
      <!-- Icon Cards-->
      <div class="row">
        <div class="col-xl-6 col-sm-6 mb-3">
          <div class="card text-white bg-primary o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-comments"></i>
              </div>
              <?php                  
                        require_once './model/NotificacionMapper.php';
                          $notificacionMapper = new NotificacionMapper();
                          $numNotificaciones=$notificacionMapper->contarNotificacionesSinVer();?>


              <div class="mr-5 mt-3"><?php echo $numNotificaciones[0];?> <?= i18n("Nuevas Notificaciones!") ?> </div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="./index.php?controller=Notificacion&action=NotificacionListar">
              <span class="float-left"><?= i18n("Ver Notificaciones") ?></span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>
        <div class="col-xl-6 col-sm-6 mb-3">
          <div class="card text-white bg-warning o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-list"></i>
              </div>
              <?php                  
                        require_once './model/TablaMapper.php';
                          $tablaMapper = new TablaMapper();
                          $numTablas=$tablaMapper->contarTablas();?>
              <div class="mr-5 mt-3"><?php echo $numTablas[0];?> <?= i18n("Tablas de Ejercicios!") ?> </div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="./index.php?controller=Tabla&action=TablaListar">
              <span class="float-left"><?= i18n("Ver Tablas") ?></span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>
        </div>
         <div class="row">
        <div class="col-xl-6 col-sm-6 mb-3">
          <div class="card text-white bg-success o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-shopping-cart"></i>
              </div>
               <?php                  
                        require_once './model/PagoMapper.php';
                          $pagoMapper = new PagoMapper();
                          $numPagos=$pagoMapper->contarPagos();?>
              <div class="mr-5 mt-3"><?php echo $numPagos[0];?> <?= i18n("Pagos!") ?></div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="./index.php?controller=Pago&action=PagoListar">
              <span class="float-left"><?= i18n("Ver Pagos") ?></span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>
        <div class="col-xl-6 col-sm-6 mb-3">
          <div class="card text-white bg-danger o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-support"></i>
              </div>
              <?php                  
                        require_once './model/SesionEntrenamientoMapper.php';
                          $sesionMapper = new SesionEntrenamientoMapper();
                          $numSesiones=$sesionMapper->contarSesiones();?>
              <div class="mr-5 mt-3"><?php echo $numSesiones[0];?> <?= i18n("Sesiones de Entrenamiento!") ?></div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="./index.php?controller=SesionEntrenamiento&action=TablaListar">
              <span class="float-left"><?= i18n("Ver Sesiones") ?></span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>
      </div>
  </div>