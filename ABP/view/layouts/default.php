<?php
//file: view/layouts/default.php

$view = ViewManager::getInstance();
$currentuser = $view->getVariable("currentusername");

?><!DOCTYPE html>
<html>
	<head>
		 <title>GYMABP</title>
		<meta charset="utf-8">
			<script src="./index.php?controller=language&action=i18njs"></script>
			<?= $view->getFragment("css") ?>
			<?= $view->getFragment("javascript") ?>
	</head>
	<body>
		<section>
			<header>
			<?php
				include(__DIR__."/Header.php");

			?>
			</header>
			<aside>
				<?php
				require_once("./core/permisos.php");
				$permisos = new Permisos();
				if($permisos->esAdministrador()){
					include(__DIR__."/menuLateral-ADMIN.php");
				}elseif ($permisos->esEntrenador()) {
					include(__DIR__."/menuLateral-ENTRENADOR.php");
				}elseif ($permisos->esDeportista()) {
					include(__DIR__."/menuLateral-DEPORTISTA.php");
				}else{
					include(__DIR__."/menuLateral-INICIO.php");
				}
				if($_SESSION["currentuser"]=="invitado"){				
					include(__DIR__."/menuSuperior2.php");
					include(__DIR__."/language_select_element.php");
				}else{
					include(__DIR__."/notificacionesMenu.php");
					include(__DIR__."/menuSuperior.php");
					include(__DIR__."/language_select_element.php");
				}
				?>

			</aside>

			<main>
					<?= $view->getFragment(ViewManager::DEFAULT_FRAGMENT) ?>

			</main>
		</section>
		<?php
			if(($_GET['action']=='index') && ($_GET['controller']=='main') && ($_SESSION['currentuser']!="invitado")){
				include(__DIR__."/default_cards.php");
			}elseif(($_GET['action']=='index') && ($_GET['controller']=='main') && ($_SESSION['currentuser']=="invitado")){

				include(__DIR__."/default_cards2.php");
			}
			?>
			<?php
			include(__DIR__."/Footer.php");
			?>
	</body>
</html>
