<?php
include 'funciones/sesionCliente.php';//Verificamos si estas logueado
$resultado="";
if(isset($_REQUEST['resultado'])){$resultado=$_REQUEST['resultado'];}
 ?>
 <!DOCTYPE html>
<html>
<head>
	<title>Cliente - Menú</title>
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
					<h1>Bienvenido <?php echo $_SESSION['nombreCompleto']; ?></h1>
					<hr>
					<h3>¿Qué desea realizar?</h3>
					<h2><?php echo $resultado; ?></h2>
					<ul>
						<li><a href="reservar.php">Reservar eventos de servicios</a></li>
						<li><a href="mostrarServiciosReservados.php">Mostrar servicios reservados</a></li>
						<li><a href="funciones/logout.php">Cerrar sesión</a></li>
					</ul>
				</nav>
			</article>
		</section>
		<footer>
			Proyecto SOA by EFI
		</footer>
	</body>
</html>