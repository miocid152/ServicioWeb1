<?php
	session_start();
	if(isset($_SESSION['usermail']) ) {
		if($_SESSION['tipoUsuario']==0) Header("Location: cliente.php");
		if($_SESSION['tipoUsuario']==1) Header("Location: admin/index.php");
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Crear usuario</title>
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
	    <nav id="nav">
				<ul id="navigation">
					<li><a href="index.php" class="first">Inicio</a></li>
				</ul>
		</nav>
			<section>
				<article class="loginform cf">
				<h1>Crear usuario</h1>
				<h2> <?php if(isset($_REQUEST['existente'])) {echo "Ya hay un registro con ese correo";} ?></h2>
					<form name="login" action="funciones/registrar.php" method="POST" accept-charset="utf-8">
						<ul>
							<li>
								<label for="usernombre">Nombre completo</label>
								<input type="text" name="nombre" placeholder="Nombre completo" required>
							</li>
							<li>
								<label for="usermail">Email</label>
								<input type="email" name="usermail" placeholder="tucorreo@email.com" required>
							</li>
							<li>
								<label for="userdireccion">Dirección</label>
								<input type="text" name="direccion" placeholder="Escriba su dirección" required>
							</li>
							<li>
								<label for="usernumero">Teléfono</label>
								<input type="number" name="numeroTelefonico" placeholder="Ej. 229271863" required>
							</li>
							<li>
								<label for="password">Contraseña</label>
								<input type="password" name="password" placeholder="contraseña" required></li>
							<li>
								<input type="submit" value="Registrar">
							</li>
						</ul>
					</form>
				</article>
			</section>
		<footer>
			Proyecto SOA by EFI
		</footer>
	</body>
</html>