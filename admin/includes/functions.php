<?php //REALIZA EL INICIO DE SESIÓN
function iniciar_sesion() {

	if ( isset($_POST['logout']) ) {
		session_name('sesion_iniciada');
		session_start();
		session_destroy();
		//echo 'Cerraste sesion correctamente';
	}

	if ( isset($_POST['login']) ) {

		if ( ($_POST['usuario'] == $GLOBALS['usuario']) && ($_POST['password'] == $GLOBALS['password']) ) {

			header("Location: " . $GLOBALS['url_instalacion'] . '/pago/admin/generador.php');
			session_name('sesion_iniciada');
			session_start();
			$_SESSION['sesion_iniciada']  = true;
			
		} else {
			echo 'Usuario o contraseña incorrecta';
		}
	}

}

//MANTIENE VIVA LA SESIÓN
function mantener_sesion() {
	ini_set('session.cache_limiter', 'private');
	header('Cache-Control: private, max-age=1800, pre-check=1800');
}

//COMPRUEBA QUE HAYAS INICIADO SESIÓN
function comprobar_sesion() {
	session_name('sesion_iniciada');
	session_start();
	if ( isset( $_SESSION['sesion_iniciada'] ) ) {
		return true;
	}
}

//IMPRIME OPCIONES PERIODICIDAD
function imprime_opciones_periodicidad() {
	echo '<option value="1">1</option>
		<option value="2">2</option>
		<option value="3">3</option>
		<option value="4">4</option>
		<option value="5">5</option>
		<option value="6">6</option>
		<option value="7">7</option>
		<option value="8">8</option>
		<option value="9">9</option>
		<option value="10">10</option>
		<option value="11">11</option>
		<option value="12">12</option>
		<option value="13">13</option>
		<option value="14">14</option>
		<option value="15">15</option>
		<option value="16">16</option>
		<option value="17">17</option>
		<option value="18">18</option>
		<option value="19">19</option>
		<option value="20">20</option>
		<option value="21">21</option>
		<option value="22">22</option>
		<option value="23">23</option>
		<option value="24">24</option>
		<option value="25">25</option>
		<option value="26">26</option>
		<option value="27">27</option>
		<option value="28">28</option>
		<option value="29">29</option>
		<option value="30">30</option>';
}

//IMPRIME OPCIONES PERIODICIDAD2
function imprime_opciones_periodicidad2() {
	echo '<option value="dia(as)">dia(as)</option>
		<option value="semana(s)">semana(s)</option>
		<option value="mes(es)" selected="selected">mes(es)</option>
		<option value="año(s)">año(s)</option>';
}

//IMPRIME OPCIONES PARCIALIDADES
function imprime_opciones_parcialidades() {
	echo '<option value="nunca">Nunca</option>
        <option value="2" selected="selected">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
        <option value="6">6</option>
        <option value="7">7</option>
        <option value="8">8</option>
        <option value="9">9</option>
        <option value="10">10</option>
        <option value="11">11</option>
        <option value="12">12</option>
        <option value="13">13</option>
        <option value="14">14</option>
        <option value="15">15</option>
        <option value="16">16</option>
        <option value="17">17</option>
        <option value="18">18</option>
        <option value="19">19</option>
        <option value="20">20</option>
        <option value="21">21</option>
        <option value="22">22</option>
        <option value="23">23</option>
        <option value="24">24</option>
        <option value="25">25</option>
        <option value="26">26</option>
        <option value="27">27</option>
        <option value="28">28</option>
        <option value="29">29</option>
        <option value="30">30</option>';
}

//IMPRIME UN ARRAY EN FORMA LEGIBLE PARA HUMANOS
function imprime_array($myarray) {
	echo 'PRINT_R  ';
	echo '<pre>';
	print_r($myarray);
	echo '</pre>';
	
	echo 'VAR_DUMP ';
	echo '<pre>';
	var_dump($myarray);
	echo '</pre>';
	
	echo 'VAR_EXPORT ';
	echo '<pre>';
	var_export($myarray);
	echo '</pre>';
}
?>