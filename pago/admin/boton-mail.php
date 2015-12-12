<?php require_once('includes/config.php');
require_once('includes/functions.php');
//Sesión iniciada exitosamente
if ( comprobar_sesion() ) {	

	mantener_sesion();

	if ( isset($_POST['boton']) ) {
		
		//Asignación de variables de botón de pago
		$concepto = $_POST['concepto'];
		$importe = $_POST['importe'];
		$descripcionformapago = $_POST['descripcionformapago'];
		$correos = $_POST['correos'];
		$correos = explode(",", $correos);
		$mensaje_p = $_POST['mensaje_p'];
		
		$parcialidades_guardadas = '';
		//Serializa y concatena las parcialidades guardadas
		if ( isset( $_POST['parcialidades_guardadas'] ) ) {
			$parcialidades_guardadas = '&amp;parcialidades_guardadas=' . rawurlencode( $_POST['parcialidades_guardadas'] );
		}
	
	require_once('includes/header.php');
?>
        
	<div id="content">
    	<h1 class="page-name">Confirmación envio de correos</h1>
        <!-- Muestra el código del botón generado -->
        <div class="form-box round-corner">
        
        <?php // Se preparan las variables
        
        $url_get = $GLOBALS['url_instalacion'] . '/pago/paso1.php?'.
		'boton=boton' .
		'&amp;concepto=' . $concepto .
		'&amp;importe=' . $importe .
		'&amp;descripcionformapago=' . $descripcionformapago .
		$parcialidades_guardadas;
		
		$cuerpo_mensaje = '<table style="font-family:Arial, Helvetica, sans-serif; font-size:14px; color:#403732;" align="center" border="0" cellpadding="0" cellspacing="0" width="600">
        <tbody>
        
            <!-- Encabezado del mail -->
            <tr>
                <td style="background-color:#F4F3ED;" align="center" valign="top">
                    <img src="' . $GLOBALS['url_instalacion'] . '/pago/admin/img/encabezado-correo.jpg" style="display: block;" height="160" width="600">
                </td>
            </tr>
        
            <!-- Mensaje para el comprador -->
            <tr>
                <td style="background-color:#F4F3ED;" align="left" valign="top">
                    <table border="0" cellpadding="10" cellspacing="0" width="100%">
                    <tbody>
        
                        <tr>
                            <td align="left" valign="top">
                               <p> ' . $mensaje_p . '</p>
                            </td>
                        </tr>

                        <tr>
                            <td align="left" valign="top">
                                <h2>Detalles para realizar tu pago</h2>
                                
                                <h3>Datos del producto o servicio</h3>
                                <p>
                                    <strong>Concepto: </strong>' . $concepto . '<br />
                                    <strong>Importe: </strong>$' . $importe . ' MXN<br /><br />
                                    <strong>Haz click en el siguiente enlace para iniciar el proceso de compra:</strong>
                                </p>
                                
                                <a style="color:#761711; text-align: center;" href="' . $url_get . '"><h2>Iniciar compra</h2></a>
                            </td>
                        </tr>
        
                    </tbody>
                    </table>
                </td>
            </tr>
        
            <!-- Pié de página del correo -->
            <tr>
                <td style="background-color:#3F3631; color:#fff" align="left" valign="top">
                    <table border="0" cellpadding="15" cellspacing="0" width="100%">
                    <tbody>
                    <tr>
                        <td style="color:#fff;" align="left" valign="top">
                            <strong><span>' . $GLOBALS['nombre_comercio'] . '</span><br>
                            <span>' . $GLOBALS['direccion_comercio'] . '</span><br>
                            <span>Email: <a style="color:#fff; text-decoration: none;" href="mailto:' . $GLOBALS['correo_contacto_comercio'] . '" style="color: #fff; text-decoration: none;">' . $GLOBALS['correo_contacto_comercio'] . '</a></span><br>
                            <span>Website: <a style="color:#fff; text-decoration: none;" href="http://' . $GLOBALS['sitio_comercio'] . '/" target="_blank" style="color: #fff; text-decoration: none;">' . $GLOBALS['sitio_comercio'] . '</a></span></strong>
                        </td>
                        <td style="color:#fff; font-family:Arial, Helvetica, sans-serif; font-size:13px;" align="right" valign="top">
                            <p>
                                 <strong>Visitanos en Facebook</strong>
                            </p>
                             <a href="' . $GLOBALS['fb_fanpage_comercio'] . '"><img src="' . $GLOBALS['url_instalacion'] . '/pago/admin/img/logo-facebook.png"></a>
                        </td>
                    </tr>
                    </tbody>
                    </table>
                </td>
            </tr>
        
        </tbody>
        </table>';
		
		
		
		
		if ( isset($_POST['boton']) ) {
	
			require '../PHPMailer/PHPMailerAutoload.php';
			
			$mail = new PHPMailer;
			
			$mail->isSMTP();                                      // Set mailer to use SMTP
			$mail->Host = 'ssl://email-smtp.us-east-1.amazonaws.com';  // Specify main and backup SMTP servers
			$mail->SMTPAuth = true;                               // Enable SMTP authentication
			$mail->Username = $GLOBALS['ses_smtp_username'];                 // SMTP username
			$mail->Password = $GLOBALS['ses_smtp_password'];                           // SMTP password
			$mail->SMTPSecure = 'ssl';                           	// Enable encryption, 'ssl' or 'tls' also accepted
			$mail->Port = '465';									//Select port to stablish connection , 'ssl' (465) or 'tls' (587).
			
			$mail->From = $GLOBALS['ses_verified_sender'];
			$mail->FromName = 'ELT Consultants';
			foreach ($correos as $correo) :
				$mail->addAddress(trim($correo));     // Add a recipient
			endforeach;
			//$mail->addAddress('ellen@example.com');               // Name is optional
			$mail->addReplyTo($GLOBALS['correo_contacto_comercio']);
			//$mail->addCC('cc@example.com');
			//$mail->addBCC('bcc@example.com');
			
			//$mail->WordWrap = 50;                                 // Set word wrap to 50 characters
			//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
			//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
			//$mail->AddAttachment("admin/img/encabezado-correo.jpg");      // attachment
			$mail->isHTML(true);                                  // Set email format to HTML
			
			$mail->Subject = 'Solicitud de compra: ' . $concepto;
			$mail->Body    = $cuerpo_mensaje;
			//$mail->AltBody = 'Cuerpo del mensaje ¡Ñú!';
			//$mail->Encoding = 'base64';
			$mail->CharSet = 'utf8';								//Defines charset to utf8 to display latin characters
			
			if(!$mail->send()) {
				echo 'Message could not be sent.';
				echo 'Mailer Error: ' . $mail->ErrorInfo;
			} else {
				echo '<label class=" group">El mensaje sen envió exitosamente a las siguientes direcciones:</label>';
				echo '<p>';
				foreach ($correos as $correo) :
					echo trim($correo) . '<br />';     // Add a recipient
				endforeach;
				echo '</p>';
				//echo $url_get;
			}
		}
		?>
        </div><!--#psh-codigo-boton-->
        <div class="form-box round-corner group">
                <div class="column-left">
                	<a href="<?php echo $GLOBALS['url_instalacion'] ?>/pago/admin/generador.php" class="boton-simple">Comenzar de nuevo</a>
                </div>
                <div class="column-right">
                	<form id="logout-form" action="<?php echo $GLOBALS['url_instalacion'] ?>/pago/admin/login.php" method="post"><input type="submit" name="logout" value="Cerrar sesión" ></form>
                </div>
            </div>
    <?php
    } else {

	require_once('includes/header.php');?>
        <div class="form-box round-corner group">
    
            Primero debes de <a href="<?php echo $GLOBALS['url_instalacion'] . '/pago/admin/generador.php' ?>">generar un botón</a> para enviarlo.
    
<?php
	}
} else {
//Requerir iniciar sesión
?>
    
	<div id="psh-content">
        Debes de <a href="<?php echo $GLOBALS['url_instalacion'] . '/pago/admin/login.php' ?>">iniciar sesión</a> para generar botones de pago
    
    <?php
    }
    ?>
</div><!-- #psh-content -->
<?php require_once('includes/footer.php'); ?>