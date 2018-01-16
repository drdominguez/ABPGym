<div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <div> 
        <li class="breadcrumb-item"><marquee><?= i18n("Bienvenido a GymApp!") ?></marquee></li>
      </div>
      </ol>
      <!-- Icon Cards-->
      <div class="row">
        <div class="col-xl-6 col-sm-6 mb-3">
          <div class="card text-white bg-primary o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-comments"></i>
              </div>
              <div class="mr-5 mt-3"><?= i18n("Nuestras Instalaciones!") ?> </div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="./index.php?controller=Recurso&amp;action=recurso2Listar">
              <span class="float-left"><?= i18n("Ver Instalaciones") ?></span>
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
              <div class="mr-5 mt-3"><?= i18n("Nuestras Actividades!") ?> </div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="./index.php?controller=Actividad&amp;action=actividad2Listar">
              <span class="float-left"><?= i18n("Ver Actividades") ?></span>
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
              <div class="mr-5 mt-3"><?= i18n("¿Dónde estamos?") ?></div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="./index.php?controller=Localizacion&amp;action=localizacionListar">
              <span class="float-left"><?= i18n("Ver Localización") ?></span>
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
              <div class="mr-5 mt-3"><?= i18n("Contacta con Nosotros!") ?></div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="./index.php?controller=Contacto&amp;action=contactoListar">
              <span class="float-left"><?= i18n("Mira cómo puedes contactar") ?></span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>
      </div>
  </div>