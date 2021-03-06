<?php require_once('includes/config.php');
require_once('includes/functions.php');

if ( comprobar_sesion() ) { //Se comprueba el inicio de sesión

    mantener_sesion();

	if ( isset($_POST['agregarparcialidades']) ) {
		
		//Asignación de variables
		$concepto = $_POST['concepto'];
		$importe = $_POST['importe'];
		$descripcionformapago = $_POST['descripcionformapago'];
		$urlimagendeboton = $_POST['urlimagendeboton'];
		$hide_agregar_parcialidades = true;

	}
	
	if ( isset($_POST['otraparcialidad']) ) {
		
		//Asignación de variables de parcialidades
		$concepto = $_POST['concepto'];
		$importe = $_POST['importe'];
		$descripcionformapago = $_POST['descripcionformapago'];
		$urlimagendeboton = $_POST['urlimagendeboton'];
		$hide_agregar_parcialidades = true;
		
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

	} else if ( isset( $_SESSION['parcialidades_guardadas'] ) ) {
		$_SESSION['parcialidades_guardadas'] = array(); //Resetea lo que esté guardado en $parcialidades_guardadas
	}

	require_once('includes/header.php'); ?>


<script>
$().ready(function() {

	// validate signup form on keyup and submit
	$("#psh-generar-boton").validate({
		rules: {
			concepto: "required",
			importe: "required",
			importeparcialidad: "required",
		},
		messages: {
			concepto: "Ingresa el nombre de tu producto",
			importe: "Ingresa el importe total de tu producto",
			importeparcialidad: "Ingresa el importe para esta parcialidad",
		}
	});
});
</script>


	<div id="content">

        <h1 class="page-name">Generador de botones de pago</h1>
            
            <form action="boton.php" method="post" id="psh-generar-boton" class="psh-form form-box round-corner group">
        
                <h2 class="seccion-name">Datos básicos</h2>
                <span class="description group">Llena los datos y presiona "Generar botón" para generar un botón de pago simple ó presiona "Agregar parcialidades" para crear varias opciones de pago para este botón.</span>
        
                <label for="concepto">Concepto:</label>
                <input type="text" name="concepto" placeholder="El concepto es el nombre de tu producto" value="<?php if (isset($concepto)) { echo $concepto; }; ?>" required /> <span id="ayuda">Escribe el nombre de tu producto o servicio</span>
                
                <label for="importe">Importe (págo único o de contado)</label>
                $<input type="number" name="importe" value="<?php if (isset($importe)) { echo $importe; }; ?>" required/>MNX <span id="ayuda">Escribe solo el importe con números.</span>        
                <label for="descripcionformapago">Descripción de esta opción de pago</label>
                <input type="text" name="descripcionformapago" placeholder="Agrega una descripción" value="<?php if (isset($descripcionformapago)) { echo $descripcionformapago; }; ?>" /> <span id="ayuda">Agrega una breve descripción para esta opción de pago.</span>
                <label for="urlimagendeboton">Imagen personalizada para el botón de pago</label>
                <input type="text" name="urlimagendeboton" placeholder="Agrega una URL (con el http:// incluido)" value="<?php if (isset($descripcionformapago)) { echo $urlimagendeboton; }; ?>" /> <span id="ayuda" class="group">Coloca una url completa para utilizar una imagen personalizada. Muy útil si quieres colocar un banner en lugar del botón por defecto. No olvides incluir http://</span>
                
                <?php if ( isset($_POST['otraparcialidad']) ) { ?>
                    
                    <h2 class="seccion-name">Parcialidades guardadas</h2>
                    
                    <?php $contador = 1 ; ?>
                    <?php foreach ( $parcialidades_guardadas as $parcialidad) { ?>
                        <h3 class="psh-titulo-parcialidad">Parcialidad <?php echo $contador++; ?></h3>
                        
                        <p class="psh-texto-parcialidad"><strong>Periocididad del cobro:</strong>&nbsp;Cada <?php echo $parcialidad['periodicidad'] . ' ' . $parcialidad['periodicidad2']; ?><br />
                        <strong>Parcialidades:</strong>&nbsp;<?php echo $parcialidad['parcialidades']; ?><br />
                        <strong>Importe por cada parcialidad:</strong>&nbsp;<?php echo $parcialidad['importeparcialidad']; ?><br />
                        <strong>Leyenda de la parcialidad:</strong>&nbsp;<?php echo $parcialidad['descripcionformapagoparcial']; ?>
                        </p>
                    <?php } ?>
        
                <?php } ?>
                
                <?php if ( isset($_POST['agregarparcialidades']) || isset($_POST['otraparcialidad']) ) { ?>
        
                    <h2 class="seccion-name">Agregar parcialidades</h2>
        
                    <label for="parcialidades">Número de parcialidades</label>
                    <div class="column-left">
                        <select name="parcialidades">
                            <?php imprime_opciones_parcialidades(); ?>
                        </select><span id="ayuda">Define cuantas veces se generarán los recibos de pago. Elige "Ilimitadas" y los recibos se generarán de forma indefinida.</span></i><br />
                    </div>
                    <label for="periodicidad">¿Cada cuanto se debe de generar un recibo?</label>
                    <div class="column-left">
                        <select name="periodicidad">
                            <?php imprime_opciones_periodicidad(); ?>
                        </select>            
                    </div>
               	 	<div class="column-right">
                        <select name="periodicidad2">
                            <?php imprime_opciones_periodicidad2(); ?>
                        </select> <span id="ayuda">Periodicidad con que se generan los recibos de pago.</span><br />
                    </div>
                    
                    <label for="importeparcialidad">Importe por cada parcialidad</label>
                    $<input type="number" name="importeparcialidad" placeholder="120.00" value="" required />MXN <span id="ayuda">Escribe solo el importe con números.</span><br />
                    <label for="descripcionformapagoparcial">Descripción de esta opción de pago parcial</label>
                    <input type="text" name="descripcionformapagoparcial" placeholder="Agrega una descripción" value="" /> <span id="ayuda">Agrega una breve descripción para esta opción de pago.</span><br />
        
                <?php }	?>
                <div class="column-left">
                <input type="submit" name="boton" value="Generar botón"/>
        		</div>
                <div class="column-right">
					<?php if ( !isset($hide_agregar_parcialidades) ) { ?>
                      
                        <form method="post">
                            <button type="submit" formaction="<?php echo $GLOBALS['url_instalacion'] ?>/pago/admin/generador.php" name="agregarparcialidades" value="Agregar parcialidades" />
                                Agregar parcialidades
                            </button>
                        </form>
                    <?php }	?>
                
					<?php if ( isset($_POST['agregarparcialidades']) || isset($_POST['otraparcialidad']) ) { ?>
                       
                        <form method="post">
                            <button type="submit" formaction="<?php echo $GLOBALS['url_instalacion'] ?>/pago/admin/generador.php" name="otraparcialidad" value="Agregar otra parcialidad" />
                                Agregar otra parcialidad
                            </button>
                        </form>
                    <?php } ?>
        		</div>
            </form>
            
            <div class="form-box round-corner group">
                <div class="column-left">
                	<a href="<?php echo $GLOBALS['url_instalacion'] ?>/pago/admin/generador.php" class="boton-simple">Comenzar de nuevo</a>
                </div>
                <div class="column-right">
                	<form id="logout-form" action="<?php echo $GLOBALS['url_instalacion'] ?>/pago/admin/login.php" method="post"><input type="submit" name="logout" value="Cerrar sesión" ></form>
                </div>
            </div>
        
<?php
} else { //Requerir iniciar sesión
	require_once('includes/header.php')
?>
	<div class="form-box round-corner group">
    
		Debes de <a href="<?php echo $GLOBALS['url_instalacion'] . '/pago/admin/login.php' ?>">iniciar sesión</a> para generar botones de pago
    
<?php } ?>
</div><!-- #psh-content -->
<?php require_once('includes/footer.php'); ?>