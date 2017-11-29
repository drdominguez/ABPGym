  <?php /* <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle mr-lg-2" id="alertsDropdown" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-fw fa-bell"></i>

                            <span class="nav-link-text"><?= i18n("Notificaciones") ?></span>
<?php                  
                        require_once './model/NotificacionMapper.php';
                        require_once './model/Notificacion.php';
                          $notificacionMapper = new NotificacionMapper();
                          $numNotificaciones=$notificacionMapper->contarNotificacionesSinVer();
                        if($numNotificaciones[0]>0){
?>
                            <span class="indicator text-warning d-none d-lg-block">
              <i class="fa fa-fw fa-circle"></i>
            </span>
<?php 
            }
            
?>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="alertsDropdown">
                            <h6 class="dropdown-header"><?= i18n("Notificaciones nuevas:") ?> <?php echo $numNotificaciones[0];?></h6>
           <?php 
                            $notificaciones=$notificacionMapper->listarSinVer();
                            $i=0;
                            foreach($notificaciones as $not){
                              if($i<3){
                              ?>
                              <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="./index.php?controller=Notificacion&amp;action=NotificacionView&amp;idNotificacion=<?php echo $not->getIdNotificacion();?>">
                            <span class="text-success">
                            <strong>
                              <i class="fa fa-long"></i><?php echo $not->getAsunto();?></strong>
                              </span>
                               <!--<span class="small float-right text-muted"><?php echo $not->getFecha();?></span>-->
                               <div class="dropdown-message small"><?php echo $not->getFecha();?></div>
                                </a>
                              <?php 
                              $i++;
                            }
                            }
           ?>

                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item small" href="./index.php?controller=Notificacion&amp;action=NotificacionListar"><?= i18n("Ver todas las notificaciones:") ?></a>
                        </div>
                    </li>
                */?>