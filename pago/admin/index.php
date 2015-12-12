<?php
	require_once('includes/config.php');
	require_once('includes/functions.php');

if ( comprobar_sesion() ) {
	header("Location: " . $GLOBALS['url_instalacion'] . '/pago/admin/generador.php');
} else {
	header("Location: " . $GLOBALS['url_instalacion'] . '/pago/admin/login.php');
} ?>

<?php //El siguiente código no alcanza a ejecutarse. Sí el header se imprime antes de la redirección se genera un error de cabecerás.
require_once('includes/header.php');
require_once('includes/footer.php');
?>