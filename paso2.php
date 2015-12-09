<?php require_once('header.php'); ?>
<div id="psh-content">
<h1 align="center" id="psh-titulo-pagina">Paso 2 - Verifica la información</h1>

<?php //Se rompe el corazón de los crackers

if ($_SESSION['security_code_2j7hFmd9']) {

	//Se reciben y asignan variables

	if ( isset($_POST['boton']) ) {
		$nombre = $_POST['nombre'];
		$apellido = $_POST['apellido'];
		$correo = $_POST['correo'];
		$concepto = $_POST['concepto'];
			$formapago = $_POST['formapago'];
		if ($formapago == 'contado') {
			$tipopago = 'contado';
			$importe = $_POST['importe'];
			$descripcionformapago = $_POST['descripcionformapago'];
		} else {
			$tipopago = 'suscripcion';
			$formapago = unserialize( $_POST['formapago'] );
//echo '<pre style="display:block;">'; print_r($formapago); echo '</pre>'; // PRINT_R
			$periodicidad = $formapago['periodicidad'];
			$periodicidad2 = $formapago['periodicidad2'];
			$parcialidades = $formapago['parcialidades'];
			$importeparcialidad = $formapago['importeparcialidad'];
			$descripcionformapagoparcial = $formapago['descripcionformapagoparcial'];
		}

	} ?>
<div id="psh-general-container">
	<h2 class="psh-nombre-seccion">Tus datos</h2>
	<div class="psh-grey-box psh-round-corner"> 
    	<p>Nombre(s): <strong><?php echo $nombre; ?></strong><br />
		Apellido: <strong><?php echo $apellido; ?></strong><br />
		Tu correo: <strong><?php echo $correo; ?></strong></p>
	</div>
	<h2 class="psh-nombre-seccion">Detalles de tu pedido</h2>
    <div class="psh-grey-box psh-round-corner"> 
	    <p>Concepto a pagar: <strong><?php echo $concepto; ?></strong></p>
	</div>
    
	<h2 class="psh-nombre-seccion">Detalles de tu forma de pago</h2>
            
	<?php if ($tipopago == 'contado') { ?>
    	<div class="psh-grey-box psh-round-corner">  
        	<p><strong>Tu pagó será de contado</strong><br />
        	Importe:<strong> $<?php echo $importe; ?> MNX</strong></p>
			<p class="psh-descripcion">Nota: <?php echo $descripcionformapago; ?></p>
 		</div>
	<?php }; ?>

	<?php if ($tipopago == 'suscripcion') { ?>
		<div class="psh-grey-box psh-round-corner">  
			<p><strong>Pagarás en periodicidades</strong><br />
			<p>Detalles: <strong><?php echo $parcialidades; ?> pagos en total de $<?php echo $importeparcialidad; ?> cada <?php echo $periodicidad . ' ' . $periodicidad2; ?></strong></p>
  			<p class="psh-descripcion">Nota: <?php echo $descripcionformapagoparcial; ?><br />
        	Total: $<?php echo $importeparcialidad * $parcialidades; ?> MXN<p>
        </div>    
        
	<?php }; ?>
    
	<form action="<?php echo $GLOBALS['url_instalacion'] . '/pago/procesasolicitud.php'; ?>" method="post" class="psh-form">
        
        <input type="hidden" name="nombre" value="<?php echo $nombre; ?>">
        <input type="hidden" name="apellido" value="<?php echo $apellido; ?>">
        <input type="hidden" name="correo" value="<?php echo $correo; ?>">
        <input type="hidden" name="concepto" value="<?php echo $concepto; ?>">
        <input type="hidden" name="tipopago" value="<?php echo $tipopago; ?>">
		<?php if ($formapago == 'contado') { ?>
	        <input type="hidden" name="importe" value="<?php echo $importe; ?>">
	        <input type="hidden" name="descripcionformapago" value="<?php echo $descripcionformapago; ?>">
        <?php } else { ?>
			<input type="hidden" name="importe" value="<?php echo $importeparcialidad; ?>">
	        <input type="hidden" name="descripcionformapago" value="<?php echo $descripcionformapagoparcial; ?>">
			<input type="hidden" name="periodicidad" value="<?php echo $periodicidad; ?>">
			<input type="hidden" name="periodicidad2" value="<?php echo $periodicidad2; ?>">
			<input type="hidden" name="parcialidades" value="<?php echo $parcialidades; ?>">
        <?php } ?>

		<input type="submit" name="boton" value="Realizar pago">

	</form>


<?php //session_destroy();
	
} else { ?>

	No deberías de estar aquí. Si llegaste por error, te sugerimos que regreses al <a href="<?php echo $GLOBALS['url_principal']; ?>">inicio de nuestro sitio web</a>

<?php } ?>
</div><!-- #psh-general-container -->
</div><!-- #psh-content -->

<?php
require_once('footer.php');
?>