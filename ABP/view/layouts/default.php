<?php
//file: view/layouts/default.php

$view = ViewManager::getInstance();
$currentuser = $view->getVariable("currentusername");

?><!DOCTYPE html>
<html>
	<head>
		 <title>GYMABP</title>
		<meta charset="utf-8">
			<script src="index.php?controller=language&amp;action=i18njs"></script>
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
				include(__DIR__."/menuLateral.php");
				?>
			</aside>
			<main>
					<?= $view->getFragment(ViewManager::DEFAULT_FRAGMENT) ?>
			</main>
		</section>
		<footer>
			<?php
			include(__DIR__."/Footer.php");
			?>
		</footer>
	</body>
</html>
