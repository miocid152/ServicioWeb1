<?php
	include '../funciones/sesionAdmin.php'; //Verificamos si eres admin
 ?>
 <!DOCTYPE html>
<html>
<head>
	<title>Administrador - Menu</title>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
	<link rel="stylesheet" href="../css/normalize.css">
	<link rel="stylesheet" href="../css/LoginStyle.css">
</head>
	<body>
		<header>
	            <figure id="banner">
	                <img src='../img/banner_eventos.jpg' alt="Banner" height="200px">
	            </figure>
	    </header>
	    <section>
			<article>
				<nav id="wb_CssMenu1" class="loginform cf">
					<h1>Bienvenido</h1>
					<ul>
						<li><a href="modificarUsuarios.php">Modificar Usuario</a></li>
						<li><a href="cancelarReservaciones.php">Cancelar Reservaciones</a></li>
						<li><a href="confirmarReservaciones.php">Confirmar Reservaciones</a></li>
						<li><a href="../funciones/logout.php">Cerrar Sesion</a></li>
					</ul>
				</nav>
			</article>
		</section>
		<footer>
			Proyecto Soa by EFI
		</footer>
	</body>
</html>