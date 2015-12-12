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
		$urlimagendeboton = $_POST['urlimagendeboton'];
		
		if ( isset( $_POST['parcialidades'] ) ) {
			
			//Asignación de variables de botón de suscripción
			$periodicidad = $_POST['periodicidad'];
			$periodicidad2 = $_POST['periodicidad2'];
			$parcialidades = $_POST['parcialidades'];
			$importeparcialidad = $_POST['importeparcialidad'];
			$descripcionformapagoparcial = $_POST['descripcionformapagoparcial'];

			//Recuperación de parcialidades guardadas
			$parcialidades_guardadas = array();
			if ( isset( $_SESSION['parcialidades_guardadas'] ) ) {
				$parcialidades_guardadas = $_SESSION['parcialidades_guardadas'];
			}
			
			//Construcción del array de parcialidad
			$parcialidad = array (
				'periodicidad' => $periodicidad,
				'periodicidad2' => $periodicidad2,
				'parcialidades' => $parcialidades,
				'importeparcialidad' => $importeparcialidad,
				'descripcionformapagoparcial' => $descripcionformapagoparcial,
			);
			
			//Construcción de array de parcialidades guardadas
			array_push($parcialidades_guardadas, $parcialidad);
			$_SESSION['parcialidades_guardadas'] = $parcialidades_guardadas;

		}
		
		$parcialidades_guardadas = '';

		//Serializa y concatena las parcialidades guardadas
		if ( isset($_POST['parcialidades']) ) {
			$parcialidades_guardadas = '<input type="hidden" name="parcialidades_guardadas" value=\'' . serialize( $_SESSION['parcialidades_guardadas'] ) . '\'>';
		}
	
	require_once('includes/header.php');
?>
    
	<div id="content">
    	<h1 class="page-name">Botón generado con éxito</h1>
       <div class="form-box round-corner group">
            <!-- Muestra el código del botón generado -->
            <div id="codigo-boton" class="psh-form">
            <h2 class="seccion-name group">Copia el código del botón y pégalo donde desees.</h2>
            
            <?php // Se agregan los estilos para la apariencia del botón
            if ($urlimagendeboton == '' ) {	$urlimagendeboton =  $GLOBALS['url_instalacion'] .'/pago/admin/img/pago-default.png'; }		
            list($width_img, $height_img, $imgtype, $imgattr) = getimagesize($urlimagendeboton);		
            $estilo_boton = 'style="background: none; ' .
            $estilo_boton = 'background-image: url('.$urlimagendeboton.'); ' .
            $estilo_boton =				'background-repeat: no-repeat; ' .
            $estilo_boton =				'width: '.$width_img.'px; ' .
            $estilo_boton =				'height: '.$height_img.'px; ' .
            $estilo_boton =				'margin: 20px auto;"';	
            ?>
            
            <?php $boton = '<form action="' . $GLOBALS['url_instalacion'] . '/pago/paso1.php" method="post"> ' .
            '<input type="submit" name="boton" value="" '. $estilo_boton .'> ' .
            '<input type="hidden" name="concepto" value="' . $concepto . '"> ' .
            '<input type="hidden" name="importe" value="' . $importe . '"> ' .
            '<input type="hidden" name="descripcionformapago" value="' . $descripcionformapago . '"> ' .
            $parcialidades_guardadas .
            '<p style="font-weight: bold; text-align: center; font-size: .9em;">Si ya realizaste tu dep&oacute;sito, reg&iacute;stralo <a href="' . $url_instalacion . '/pago/registrar-pago.php">aqu&iacute;</a></p>'.
            '</form>';
            
            $boton_mail = '<form action="' . $GLOBALS['url_instalacion'] . '/pago/admin/boton-mail.php" method="post">' .
            '<label>Agrega las direcciones de correo que desees separadas por coma.</label>' .
            '<input type="text" placeholder="ejemplo@dominio.com, ejemplo2@dominio.com" name="correos" />' .
            '<label>Agrega un mensaje personalizado.</label>' .
            '<textarea placeholder="Escribe tu mensaje" name="mensaje_p" rows="6"></textarea>' .
            '<input type="submit" name="boton" value="Enviar botón" />' .
            '<input type="hidden" name="concepto" value="' . $concepto . '"> ' .
            '<input type="hidden" name="importe" value="' . $importe . '"> ' .
            '<input type="hidden" name="descripcionformapago" value="' . $descripcionformapago . '"> ' .
            $parcialidades_guardadas .
            '</form>';
    ?>
            
            <div id="codigo-boton">
                <textarea name="texto-boton" cols="" rows="10"><?php echo htmlentities(utf8_decode($boton)); ?></textarea><br />
                <p class="description">Luego de copiar el código puedes probar el botón.</p>
                <?php echo $boton; ?>
            </div>
            <div class="spacer"></div><!-- división -->
            <div id="codigo-boton">
                <h2 class="seccion-name group">También puedes enviar el botón por correo.</h2>
                <?php echo $boton_mail; ?>
                
            </div>
            
            </div>
            
            </div>
            
            
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
        
                Primero debes de <a href="<?php echo $GLOBALS['url_instalacion'] . '/pago/admin/generador.php' ?>">generar un botón</a> para copiarlo.
            </div>
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