<?php
	include '../funciones/sesionAdmin.php'; //Verificamos si eres admin
 ?>
 <!DOCTYPE html>
<html>
<head>
	<title>Administrador - Menú</title>
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
					<h1>Bienvenido <?php echo $_SESSION['nombreCompleto']; ?></h1>
					<ul>
						<li><a href="modificarUsuarios.php">Modificar usuario</a></li>
						<li><a href="cancelarReservaciones.php">Cancelar reservaciones</a></li>
						<li><a href="confirmarReservaciones.php">Confirmar reservaciones</a></li>
						<li><a href="../funciones/logout.php">Cerrar sesión</a></li>
					</ul>
				</nav>
			</article>
		</section>
		<footer>
			Proyecto SOA by EFI
		</footer>
	</body>
</html>