<?php
$resultado="";
if(isset($_REQUEST['resultado'])){$resultado=$_REQUEST['resultado'];}
 ?>
 <!DOCTYPE html>
<html>
<head>
	<title>Administrador</title>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
	<link rel="stylesheet" href="css/normalize.css">
	<link rel="stylesheet" href="css/LoginStyle.css">
</head>
	<body>
		<header>
	            <figure id="banner">
	                <img src='img/banner_eventos.jpg' alt="Banner" height="200px">
	            </figure>
	    </header>
	    <section>
			<article>
				<nav id="wb_CssMenu1" class="loginform cf">
					<h1>Bienvenido</h1>
					<hr>
					<h3>¿Que desea Realizar?</h3>
					<h2><?php echo $resultado; ?></h2>
					<ul>
						<li><a href="reservar.php">Reservar eventos de servicios</a></li>
						<li><a href="mostrarServiciosReservados.php">Mostrar Servicios Reservados</a></li>
					</ul>
				</nav>
			</article>
		</section>
		<footer>
			Proyecto Soa by EFI
		</footer>
	</body>
</html>