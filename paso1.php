<?php require_once('header.php'); ?>

<div id="psh-content">

<h1 align="center" id="psh-titulo-pagina">Paso 1 - Llena la siguiente información</h1>

<?php //Se reciben y asignan variables

	if ( isset($_POST['boton']) ) {
		$concepto = $_POST['concepto'];
		$importe = $_POST['importe'];
		$descripcionformapago = $_POST['descripcionformapago'];
		$parcialidades = '';
		if ( isset( $_POST['parcialidades_guardadas'] ) ) {
			$parcialidades_guardadas = unserialize( $_POST['parcialidades_guardadas'] );
		}

		//Bloque de seguridad (en progreso)
		$_SESSION['security_code_2j7hFmd9']  = true;
?>
<div id="psh-general-container">
    <h2 class="psh-nombre-seccion">Detalles de tu pedido</h2>
    <div class="psh-grey-box psh-round-corner">
        <p>Concepto a pagar: <strong><?php echo $concepto; ?></strong></p>
        <?php if ( !isset( $_POST['parcialidades_guardadas'] ) ) { ?>
            <p>Importe: <strong>$<?php echo $importe; ?> MXN </strong></p>
            <p class="psh-descripcion"><?php echo $descripcionformapago; ?></p>
        <?php }?>
    </div>
    

<script>
$().ready(function() {

	// validate signup form on keyup and submit
	$(".psh-form").validate({
		rules: {
			nombre: "required",
			apellido: "required",
			email: "required",
			formapago: "required",
		},
		messages: {
			nombre: "Ingresa tu nombre",
			apellido: "Ingresa tu apellido",
			email: "Ingresa tu dirección de correo",
			formapago: "Elige tu forma de pago",
		}
	});
});
</script>
    
    
    <form action="<?php echo $GLOBALS['url_instalacion']; ?>/pago/paso2.php" method="post" class="psh-form">
    
        <h2 class="psh-nombre-seccion">Ingresa tus datos</h2>
        <label for="nombre">Nombre(s)</label>
        <input type="text" name="nombre" placeholder="Escribe tu nombre" value="" required />
        <label for="apellido">Apellido(s)</label>
        <input type="text" name="apellido" placeholder="Escribe tu apellido" value="" required/>
        <label for="correo">Correo electrónico</label>
        <input type="email" name="correo" placeholder="ejemplo@ejemplo.com" value="" required/>
    
        <?php if ( isset( $_POST['parcialidades_guardadas'] ) ) { ?>
    
            <h2 class="psh-nombre-seccion">Escoge tu forma de pago</h2>
        
            <label>
                <input type="radio" name="formapago" value="contado" required /><strong>De contado: $<?php echo $importe; ?></strong>
            </label>
                <p class="psh-descripcion"><?php echo $descripcionformapago; ?></p>
           
        
            <h3>Pago en parcialidades</h3>
    
            <?php $contador = 1 ; ?>
            <?php foreach ( $parcialidades_guardadas as $parcialidad) {
                $parcialidadserializada = serialize( $parcialidad );
//echo '<pre style="display:block;">'; print_r($parcialidadserializada); echo '</pre>'; // PRINT_R
            ?>
                <label>
                    <input type="radio" name="formapago" value='<?php echo $parcialidadserializada; ?>' /><?php echo $parcialidad['parcialidades']; ?><strong> pagos de $<?php echo $parcialidad['importeparcialidad']; ?></strong>
                </label>
                    <p class="psh-descripcion">
                    <?php echo $parcialidad['parcialidades']; ?> pagos de $<?php echo $parcialidad['importeparcialidad']; ?> cada <?php echo $parcialidad['periodicidad'] . ' ' . $parcialidad['periodicidad2']; ?><br />
                    <?php echo $parcialidad['descripcionformapagoparcial']; ?>
                    </p>
                
            <?php } ?>
    
        <?php } ?>
        <!--El número de transacción ayudará a asegurar el proceso de pago guardandolo en una sesión y comparandolo en siguiente paso con el valor recuperado del post-->
        <input type="hidden" name="concepto" value="<?php echo $concepto; ?>">
        <input type="hidden" name="importe" value="<?php echo $importe; ?>">
        <input type="hidden" name="descripcionformapago" value="<?php echo $descripcionformapago; ?>">
        <?php if ( !isset( $_POST['parcialidades_guardadas'] ) ) { ?>
            <input type="hidden" name="formapago" value="contado">
        <?php } ?>
        <input type="hidden" name="transaccion" value="">
        <input type="submit" name="boton" value="Continuar">
    
    </form>
    
    
    <?php
        } else {
    ?>
    
            No deberías de estar aquí. Si llegaste directamente aquí por error, te sugerimos que regreses al <a href="<?php echo $GLOBALS['url_principal']; ?>">inicio de nuestro sitio web</a>
    
    <?php } ?>

</div><!-- #psh-general-container -->
</div><!-- #psh-content -->
<?php
require_once('footer.php');
?>