<?php
/*
Aquí se definen las variables para el sistema general
*/
	
	/////RUTAS/////

	global $url_instalacion, $url_principal;
	//Escribe la URL principal a donde serán redirigidos los usuarios si llegan directamente por error a algún paso del proceso de pago
	$url_principal = 'http://localhost/shpagos';
	//Escribe el url donde se instaló el sistema (sin la /)
	$url_instalacion = 'http://localhost/shpagos';


	/////ACCESO ADMIN/////

	global $usuario, $password;
	//Escribe el nombre de usuario para el sistema
	$usuario = 'admin';
	//Escribe la contraseña del usuario
	$password = 'acceso01';

	/////DEPOSITO EN EFECTIVO/////
	
	global $banco, $cuenta, $clabe, $titular;
	//Banco de la cuenta
	$banco = 'xxxx';
	//Número de cuenta
	$cuenta = 'xxxx';
	//CLABE
	$clabe = 'xxxx';
	//Titular de la cuenta
	$titular = 'xxxx';

	/////PAYPAL/////
	
	global $paypalsandbox, $customerpaypalemail, $customerpaypallogo, $paypalreturnurl, $paypalreturnmethod, $paypalreturnbuttontext, $paypalcancelreturn, $paypalbuynowimg, $paypalbuynowimgalt;
	//Define si paypal se utiliza en sandbox
	$paypalsandbox = false;
	//Escribe el email de paypal del cliente
	$customerpaypalemail = 'pagoseltconsultants@gmail.com';
	//Coloca la URL del logo de 150x150 pixeles que aparece en la esquina superior izquierda en la página de pago de paypal
	$customerpaypallogo = '';
	//URL a la que son redirigidos los compradores despues de realizar su pago
	$paypalreturnurl = 'http://localhost/shpagos/pago/graciaspago.php';
	//Método utilizado por el servidor de paypal para regresar al sitio del vendedor. Este script utiliza POST. 2 Espicifica POST y regresa todas las variables.
	$paypalreturnmethod = '2';
	//Define el texto que aparece en el botón "Regresar al sitio del vendedor" despues de que el comprador realizó su pago
	$paypalreturnbuttontext = 'Regresar al sitio del vendedor!!!';
	//Define la URL a la que se redirigirá el comprador si cancela su compra
	$paypalcancelreturn = 'http://localhost/shpagos';
	//URL de la imagen del botón de pago. Puedes reemplazar la imagen por defecto de paypal por una imagen de 107x26 pixeles
	$paypalbuynowimg = 'https://www.paypalobjects.com/en_US/i/btn/btn_buynow_LG.gif';
	//Texto de la imagen del botón de pago. Texto que aparece si la imagen no se carga.
	$paypalbuynowimgalt = 'PayPal - The safer, easier way to pay online';

	/////SISTEMA DE CORREOS/////
	
	global $encabezado_correo, $nombre_comercio, $direccion_comercio, $telefono_comercio, $correo_contacto_comercio, $correo_replyto_comercio, $sitio_comercio, $fb_fanpage_comercio;	
	$encabezado_correo = 'http://localhost/shpagos/pago/admin/img/encabezado-correo.jpg';
	$nombre_comercio = 'ELT Consultants';
	$direccion_comercio = 'Xalapa, Veracruz';
	$telefono_comercio = '';
	$correo_contacto_comercio = 'pagoseltconsultants@gmail.com';
	$correo_replyto_comercio = 'pagoseltconsultants@gmail.com';
	$sitio_comercio = 'http://localhost/shpagos/';
	$fb_fanpage_comercio = 'https://www.facebook.com/pages/Elt-consultants/119379594777570?fref=ts';
	
	/////CREDENCIALES AMAZON SES/////

	global $ses_verified_sender, $ses_iam_username, $ses_smtp_username, $ses_smtp_password;	
	//¡¡¡ALERTA!!! - Es de suma importancia generar un nuevo grupo de credenciales en la consola de Amazon SES y configurar la dirección de notificaciones para rebotes y quejas. De no hacerlo cosas terribles pueden suceder. Los datos siguientes pertenecen a las CREDENCIALES DE PRUEBA y no están vigiladas.
	
	//No olvides borrar este bloque antes de entregar el proyecto
	/*$ses_iam_username = 'ses-smtp-user.pagos';
	$ses_smtp_username = 'AKIAJBXYW7RMDRWVXDBA';
	$ses_smtp_password = 'AnchG5JB7zM4H4DKcUhFbN3ORYo7kpZGK+alqjV3jIVt';*/
	
	$ses_verified_sender = 'pagos@eltconsultants.com.mx';
	$ses_iam_username = 'ses-smtp-user.pagos-eltconsultants';
	$ses_smtp_username = 'AKIAJY753WJWYSCB3W4Q';
	$ses_smtp_password = 'Ahwyz3hscFiN6lXe11DjjBPYIo7sc/r25BDfknVygZQv';
?>