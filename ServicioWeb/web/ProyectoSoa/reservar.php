<?php 
include 'funciones/sesionCliente.php';//Verificamos si estas logueado

?>
<!DOCTYPE html>
<html>
	<head>
		<title>Cliente - Reservar eventos</title>
		<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
		<link rel="stylesheet" href="css/normalize.css">
		<link rel="stylesheet" href="css/LoginStyle.css">
		<script language="javascript" src="js/jquery-1.7.2.js"></script>
		<script type="text/javascript" src="js/funcion.js"></script>
		<script src="js/polyfiller.js"></script>
		<script>
    		webshims.setOptions('forms-ext', {types: 'date'});
			webshims.polyfill('forms forms-ext');
		</script>

		<script language="javascript">
			$(document).ready(function() {
				$('form').keypress(function(e){
					if(e == 13){
						return false;
					}
				} );

				$('input').keypress(function(e){
					if(e.which == 13){
						return false;
					}
				} );
			} );
		</script>
	</head>
	<body>
		<header>
	        <figure id="banner">
	            <img src='img/banner_eventos.jpg' alt="Banner" height="200px">
	        </figure>
	    </header>
	    <nav id="nav">
			<ul id="navigation">
				<li><a href="cliente.php" class="first">Menú principal</a></li>
				<li><a href="funciones/logout.php" class="last">Cerrar sesión</a></li>
			</ul>
		</nav>
	    <section>
	    <form name="calcular" action="reservarServicios.php" method="POST" accept-charset="utf-8">
	    	<article class="loginform cf">
					Fecha en que desea reservar el o los servicio(s):
					<input type="date" id="fecha" min="<?php echo date('Y-m-d'); ?>" name="fecha" placeholder="YYYY-MM-dd" onchange="buscarListas(this.value)">
					<br/><br/><br/>
					<b id="slcSalon"></b>
					<b id="slcMenu"></b>
					<b id="slcEntretenimiento"></b>
					<br/><br/><br/>
					<input id="myCheck" type="checkbox" name="opt1" onclick="myFunction()" disabled> Estoy de acuerdo con mi selección<br>
			</article>
			<br>
			<article class="loginform cf">
				
					<div id="txtSalon"><b>Sin seleccionar salón.</b></div>
					<br/><br/>
					<div id="txtMenu"><b>Sin seleccionar menú.</b></div>
					<br/><br/>
					<div id="txtEntretenimiento"><b>Sin seleccionar entretenimiento.</b></div>
					<br/><br/>
					<center><div id="txtSubmit"></div></center>
					<br/><br/>
					<hr/>
					<br/><br/>
					<b id="cotizacion"></b>
			</article>
			</form>
		</section>
		<footer>
			Proyecto SOA by EFI
		</footer>
	</body>
</html>