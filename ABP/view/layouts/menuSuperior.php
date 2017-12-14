<html>
<header>
    <meta charset="UTF-8">
    <title>Iconos</title>
    <link rel="stylesheet" type="text/css" href="./view/Icons/icomoon/style.css">
    <link rel="stylesheet" type="text/css" href="./view/Icons/icomoon/modifyIcon.css">
</header>
                    <li class="nav-item" data-toggle="tooltip">
                        <a class="nav-link" href="./index.php?controller=Usuario&amp;action=UsuarioView&amp;dni=<?php echo $_SESSION['currentuser'];?>">
                           <span id="icon-eliminar" class="icon-user-circle"></span>
                            <span class="nav-link-text"> <?= i18n("Usuario");?>: <?php echo $_SESSION['currentuser']; ?></span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="modal" data-target="#exampleModal">
                            <i class="fa fa-fw fa-sign-out"></i><?= i18n("Desconectar") ?>
                        </a>
                    </li>
<html>               