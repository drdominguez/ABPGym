                    <li class="nav-item" data-toggle="tooltip">
                        <a class="nav-link" href="../controller/UsuarioController.php?dni=<?php echo $_SESSION['currentuser']; ?>&action=SHOWCURRENT">
                            <i class="fa fa-fw fa-link"></i>
                            <span class="nav-link-text"> <?= i18n("Usuario");?>: <?php echo $_SESSION['currentuser']; ?></span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="modal" data-target="#exampleModal">
                            <i class="fa fa-fw fa-sign-out"></i>Desconectar</a>
                    </li>
                 