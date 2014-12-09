<?php 
	include 'funciones/includeFunciones.php';
	$listaSalones="";
	$listaEntretenimientos="";
	$listaMenu="";

?>
<!DOCTYPE html>
<html>
	<head>
		<title>Login Eventos</title>
		<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
		<link rel="stylesheet" href="css/normalize.css">
		<link rel="stylesheet" href="css/LoginStyle.css">
		<script type="text/javascript" src="js/funcion.js"></script>
	</head>
	<body>
		<header>
	        <figure id="banner">
	            <img src='img/banner_eventos.jpg' alt="Banner" height="200px">
	        </figure>
	    </header>
	    <section>
	    	<article class="loginform cf">
				<form>
					Fecha que desee Reservar servicio:<input type="date" id="fecha" name="fecha" placeholder="YYYY-MM-dd" onblur="buscarListas(this.value)">
					
					<br/><br/><br/>
					<select name="salon" onchange="showSalon(this.value)">
						<option value="">Select a person:</option>
						<option value="1">Salon 1</option>
						<option value="2">Salon 2</option>
						<option value="3">Salon 3</option>
						<option value="4">Salon 4</option>
					</select>
					<select name="menu" onchange="showMenu(this.value)">
						<option value="">Select a person:</option>
						<option value="1">Menu 1</option>
						<option value="2">Menu 2</option>
						<option value="3">Menu 3</option>
						<option value="4">Menu 4</option>
					</select>
					<select name="entretenimiento" onchange="showEntretenimiento(this.value)">
						<option value="">Select a person:</option>
						<option value="1">Entretenimiento 1</option>
						<option value="2">Entretenimiento 2</option>
						<option value="3">Entretenimiento 3</option>
						<option value="4">Entretenimiento 4</option>
					</select>
					<br/><br/><br/>
					<input id="myCheck" type="checkbox" name="opt1" onclick="myFunction()"> Estoy de acuerdo con mi seleccion deseo Calcular<br>
				</form>
			</article>
			<br>
			<article class="loginform cf">
				<form name="calcular" action="funciones/calcular.php" method="get" accept-charset="utf-8">
					<div id="txtSalon"><b>Sin seleccionar Salon.</b></div>
					<div id="txtMenu"><b>Sin seleccionar Menu.</b></div>
					<div id="txtEntretenimiento"><b>Sin seleccionar Entretenimiento.</b></div>
					<div id="txtSubmit"></div>
				</form>
			</article>
		</section>
	</body>
</html>