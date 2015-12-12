<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="<?php echo $GLOBALS['url_instalacion']; ?>/pago/admin/style.css" type="text/css">
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,400italic,700' rel='stylesheet' type='text/css'>
<title>Generador de botones de pago</title>
<script src="<?php echo $GLOBALS['url_instalacion']; ?>/pago/admin/js/jquery-1.11.1.min.js"></script>
<script src="<?php echo $GLOBALS['url_instalacion']; ?>/pago/admin/js/pagos.js"></script>
<script src="<?php echo $GLOBALS['url_instalacion']; ?>/pago/admin/includes/jquery-validation/lib/jquery.js"></script>
<script src="<?php echo $GLOBALS['url_instalacion']; ?>/pago/admin/includes/jquery-validation/dist/jquery.validate.js"></script>

<style type="text/css">
#psh-generar-boton label.error, #psh-generar-boton input.submit {
	margin-left: 280px;
	color: #fff;
	position: absolute;
	margin-top: -32px;
	background-color: #BC3232;
	border-radius: 6px;
	padding: 4px;
	font-size: 16px;
	font-weight: bold;
	
}

#psh-generar-boton label.error:before{ /* Este es un truco para crear una flechita */
    content: '';
    border-top: 8px solid transparent;
    border-bottom: 8px solid transparent;
    border-right: 8px solid #BC3232;
    border-left: 8px solid transparent;
    left: -15px;
    position: absolute;
    top: 4px;
}
</style>


</head>

<body>
<header id="header-wrapper">	
	<div id="header-content">
		<img src="<?php echo $GLOBALS['url_instalacion']; ?>/pago/admin/img/logo.png" width="160" height="90" alt="Logo" id="logo" />
   	<h2>Administración del sistema de pagos</h2>
   </div>
</header>