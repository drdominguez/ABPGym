<?php

const IDIOMA="lang";

//Guarda el lenguaje en una variable de sesión .
function setLanguage($language) {       
	$_SESSION[IDIOMA] = $language;
}

//Asigna el lenguaje seleccionado.
setLanguage($_REQUEST["lang"]);

//Vuelve a la página anterior.
echo $_SERVER["HTTP_REFERER"];
header("Location: ".$_SERVER["HTTP_REFERER"]);
die();

?>