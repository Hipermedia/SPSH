<?php require_once('includes/config.php');
require_once('includes/functions.php');
iniciar_sesion(); ?>
<?php require_once('includes/header.php'); ?>
<div id="content">
    <h1 class="page-name" align="center">Inicia sesión para generar un boton de pago</h1>
    
    <form action="" method="post" id="form-login" class="form-box round-corner group">
        <label for="usuario">Usuario</label>
        <input type="text" name="usuario" />
        <label for="password">Contraseña</label>
        <input type="password" name="password" />
        <input type="submit" name="login" value="Iniciar sesión" />
    </form>

</div><!-- #psh-content -->

<?php require_once('includes/footer.php'); ?>