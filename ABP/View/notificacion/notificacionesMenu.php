 

  <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle mr-lg-2" id="alertsDropdown" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-fw fa-bell"></i>
                            <span class="nav-link-text"><?php echo $strings['Notificaciones']; ?></span>
<?php                   
                        include_once '../Model/notificacion_Model.php';
                        include_once '../Model/usuario_Model.php';
                        $usuario= new usuario_Model($_SESSION['login'],'','','','','','','');
                        if(strtoupper($_SESSION['login'])=='44497121X'){
                          $notificacion = new notificacion_Model('','','','','');

                          $numNotificaciones=$notificacion->contarNotificaciones();
                        }else{
                          $notificacion = new notificacion_Model('','','','','');
                          
                          $numNotificaciones=$notificacion->contarNotificacionesUsuario($usuario);
                        }

                        if($numNotificaciones['COUNT(*)']>0){
?>
                            <span class="indicator text-warning d-none d-lg-block">
              <i class="fa fa-fw fa-circle"></i>
            </span>
<?php
            }
?>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="alertsDropdown">
                            <h6 class="dropdown-header">Notificaciones nuevas: <?php echo $numNotificaciones['COUNT(*)']; ?></h6>
           <?php             if(strtoupper($_SESSION['login'])=='44497121X'){
                            $notificaciones=$notificacion->rellenaDatosAdmin();

                          }else{
                            $notificaciones=$notificacion->rellenaDatos($usuario);
                            
                          }
                            $i=0;
                            foreach($notificaciones as $not){
                              if($i<3){
                                $notificacion = new notificacion_Model($not['idNotificacion'],'','','','');
                                $visto=$notificacion->comprobarVisto($usuario);
                              ?>
                              <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="../Controller/notificacion_Controller.php?dni=<?php echo $usuario->dni;?>&idNotificacion=<?php echo $not['idNotificacion']; ?>&action=SHOWCURRENT">
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
                              <?php
                              $i++;
                            }
                            }
           ?>

                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item small" href="../Controller/notificacion_Controller.php">Ver todas las notificaciones:</a>
                        </div>
                    </li>
                