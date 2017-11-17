  <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle mr-lg-2" id="alertsDropdown" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-fw fa-bell"></i>
                            <span class="nav-link-text">Notificaciones</span>
<?php                  
                        require_once './model/NotificacionMapper.php';
                        require_once './model/Notificacion.php';
                          $notificacionMapper = new NotificacionMapper();
                          $numNotificaciones=$notificacionMapper->contarNotificaciones();
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
                            <h6 class="dropdown-header">Notificaciones nuevas:</h6>
           <?php /*
                            $notificaciones=$notificacionMapper->listar();
                            $i=0;
                            foreach($notificaciones as $not){
                              if($i<3){
                                $visto=$notificacionMapper->comprobarVisto($not);
                              ?>
                              <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="../controller/NotificacionController.php?dni=<?php echo $usuario->dni;?>&idNotificacion=<?php echo $not['idNotificacion']; ?>&action=SHOWCURRENT">
                              <?php 
                              if($visto==0){?>
                            <span class="text-success">
                          <?php }else{ ?>
                          <span class="text">
                       <?php } ?>
                            <strong>
                              <i class="fa fa-long"></i><?php echo $not['Asunto'];?></strong>
                              </span>
                               <span class="small float-right text-muted"><?php echo $not['fecha'];?></span>
                               <div class="dropdown-message small"><?php echo $not['contenido'];?></div>
                                </a>
                              <?php /*
                              $i++;
                            }
                            }*/
           ?>

                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item small" href="./index.php?controller=Notificacion&amp;action=NotificacionListar">Ver todas las notificaciones:</a>
                        </div>
                    </li>
                