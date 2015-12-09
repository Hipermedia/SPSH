<?php
/*
Aquí se definen las variables para el sistema general
*/
	
	//DEFINE GLOBALES GENERALES

	global $url, $url_principal;
	
	//Escribe la URL principal a donde serán redirigidos los usuarios si llegan directamente por error a algún paso del proceso de pago
	$url_principal = 'http://localhost';
	//Escribe el url donde se instaló el sistema (sin la /)
	$url_instalacion = 'http://localhost';


	//DEFINE GLOBALES DEL ADMIN
	
	global $usuario, $password;

	//Escribe el nombre de usuario para el sistema
	$usuario = 'admin';
	//Escribe la contraseña del usuario
	$password = 'acceso01';


	//DEFINE GLOBALES DE PAYPAL
	
	global $customerpaypalemail, $customerpaypallogo, $paypalreturnurl, $paypalreturnmethod, $paypalreturnbuttontext, $paypalcancelreturn, $paypalbuynowimg, $paypalbuynowimgalt;

	//Escribe el email de paypal del cliente
	$customerpaypalemail = 'solhipermedia@gmail.com';
	//Coloca la URL del logo de 150x150 pixeles que aparece en la esquina superior izquierda en la página de pago de paypal
	$customerpaypallogo = '';
	//URL a la que son redirigidos los compradores despues de realizar su pago
	$paypalreturnurl = '';
	//Método utilizado por el servidor de paypal para regresar al sitio del vendedor. Este script utiliza POST. 2 Espicifica POST y regresa todas las variables.
	$paypalreturnmethod = '2';
	//Define el texto que aparece en el botón "Regresar al sitio del vendedor" despues de que el comprador realizó su pago
	$paypalreturnbuttontext = 'Regresar al sitio del vendedor!!!';
	//Define la URL a la que se redirigirá el comprador si cancela su compra
	$paypalcancelreturn = 'http://solucioneshipermedia.com';
	//URL de la imagen del botón de pago. Puedes reemplazar la imagen por defecto de paypal por una imagen de 107x26 pixeles
	$paypalbuynowimg = 'https://www.paypalobjects.com/en_US/i/btn/btn_buynow_LG.gif';
	//Texto de la imagen del botón de pago. Texto que aparece si la imagen no se carga.
	$paypalbuynowimgalt = 'PayPal - The safer, easier way to pay online';
	
	//DEFINE GLOBALES DEL SISTEMA DE CORREOS
	
	global $encabezado_correo, $nombre_comercio, $direccion_comercio, $telefono_comercio, $correo_contacto_comercio, $sitio_comercio, $fb_fanpage_comercio;
	
	$encabezado_correo = 'http://www.icobelli.com/wp-content/uploads/encabezado.jpg';
	$nombre_comercio = 'Soluciones Hipermedia';
	$direccion_comercio = 'Chopin No. 47, Col. Indeco Animas, C.P. 91190, Xalapa, Veracruz.';
	$telefono_comercio = '(228) 812-6937';
	$correo_contacto_comercio = 'info@solucioneshipermedia.com';
	$sitio_comercio = 'www.solucioneshipermedia.com';
	$fb_fanpage_comercio = 'http://facebook.com/';
	
	//DEFINE GLOBALES PARA CREDENCIALES DE SENDY
	global $ses_verified_sender, $ses_iam_username, $ses_smtp_username, $ses_smtp_password;
	
	//¡¡¡ALERTA!!! - Es de suma importancia generar un nuevo grupo de credenciales en la consola de Amazon SES y configurar la dirección de notificaciones para rebotes y quejas. De no hacerlo cosas terribles pueden suceder. Los datos siguientes pertenecen a las CREDENCIALES DE PRUEBA y no están vigiladas.
	
	//No olvides borrar este bloque antes de entregar el proyecto
	/*$ses_iam_username = 'ses-smtp-user.pagos';
	$ses_smtp_username = 'AKIAJBXYW7RMDRWVXDBA';
	$ses_smtp_password = 'AnchG5JB7zM4H4DKcUhFbN3ORYo7kpZGK+alqjV3jIVt';*/
	
	$ses_verified_sender = 'servicio.de.correo@solucioneshipermedia.com';
	$ses_iam_username = 'ses-smtp-user.pagos';
	$ses_smtp_username = 'AKIAJBXYW7RMDRWVXDBA';
	$ses_smtp_password = 'AnchG5JB7zM4H4DKcUhFbN3ORYo7kpZGK+alqjV3jIVt';

?>