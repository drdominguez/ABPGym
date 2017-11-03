 
<?php /*
  <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle mr-lg-2" id="alertsDropdown" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-fw fa-bell"></i>
                            <span class="nav-link-text">Notificaciones</span>
                            <span class="d-lg-none">Alertas
              <span class="badge badge-pill badge-warning"></span>
                            </span>
<?php                   
                        include_once '../Model/notificacion_Model.php';
                        include_once '../Model/usuarios_Model.php';
                        $usuario= new usuarios_Model('','',$_SESSION['login'],'');
                        if(strtoupper($_SESSION['login'])=='ADMIN'){
                          $notificacion = new notificacion_Model('','','','');

                          $numNotificaciones=$notificacion->contarNotificaciones();
                        }else{
                          
                          $notificacion = new notificacion_Model('','','','');
                          
                          $numNotificaciones=$notificacion->contarNotificacionesUsuario($usuario);
                        }

                        if($numNotificaciones['COUNT(*)']>0){
?>
                            <span class="indicator text-warning d-none d-lg-block">
              <i class="fa fa-fw fa-circle"></i>
            </span>
<?php
            }
            ////////////////////////////BUSCAR MANERA DE CONTROLAR QUE NOTIFICACIONES FUERON LEIDAS Y CUALES NO////////////////////////////
?>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="alertsDropdown">
                            <h6 class="dropdown-header">Notificaciones nuevas: <?php echo $numNotificaciones['COUNT(*)']; ?></h6>
           <?php             if(strtoupper($_SESSION['login'])=='ADMIN'){
                            $notificaciones=$notificacion->rellenaDatosAdmin();
                          }else{
                            $notificaciones=$notificacion->rellenaDatos($usuario);
                          }
                            $i=0;
                            foreach($notificaciones as $not){
                              if($i<3){
                                $notificacion = new notificacion_Model($not['id'],'','','');
                                $visto=$notificacion->comprobarVisto($usuario);
                              ?>
                              <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="../Controller/notificacion_Controller.php?usuario=<?php echo $usuario->usuario;?>&id=<?php echo $not['id']; ?>&action=SHOWCURRENT">
                              <?php 
                              if($visto==0){?>
                            <span class="text-success">
                          <?php }else{ ?>
                          <span class="text">
                       <?php } ?>
                            <strong>
                              <i class="fa fa-long"></i><?php echo $not['asunto'];?></strong>
                              </span>
                               <span class="small float-right text-muted"><?php echo $not['diayhora'];?></span>
                               <div class="dropdown-message small"><?php echo $not['mensaje'];?></div>
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
             */?>     