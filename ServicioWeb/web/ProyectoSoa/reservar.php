<?php 


?>
<!DOCTYPE html>
<html>
	<head>
		<title>Login Eventos</title>
		<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
		<link rel="stylesheet" href="css/normalize.css">
		<link rel="stylesheet" href="css/LoginStyle.css">
		<script type="text/javascript" src="js/funcion.js"></script>
		<script language="javascript" src="js/jquery-1.6.js"></script>

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
	    <section>
	    <form name="calcular" action="reservarServicios.php" method="get" accept-charset="utf-8">
	    	<article class="loginform cf">
					Fecha que desee Reservar servicio:<input type="date" id="fecha" name="fecha" placeholder="YYYY-MM-dd" onchange="buscarListas(this.value)">
					<br/><br/><br/>
					<b id="slcSalon"></b>
					<b id="slcMenu"></b>
					<b id="slcEntretenimiento"></b>
					<br/><br/><br/>
					<input id="myCheck" type="checkbox" name="opt1" onclick="myFunction()" disabled> Estoy de acuerdo con mi seleccion deseo Calcular<br>
			</article>
			<br>
			<article class="loginform cf">
				
					<div id="txtSalon"><b>Sin seleccionar Salon.</b></div>
					<br/><br/>
					<div id="txtMenu"><b>Sin seleccionar Menu.</b></div>
					<br/><br/>
					<div id="txtEntretenimiento"><b>Sin seleccionar Entretenimiento.</b></div>
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
			Proyecto Soa by EFI
		</footer>
	</body>
</html>