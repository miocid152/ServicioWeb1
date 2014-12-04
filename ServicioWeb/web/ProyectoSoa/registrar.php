<!DOCTYPE html>
<html>
<head>
	<title>Registro Usuario</title>
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
			<section class="loginform cf">
			<h1>Registro usuario</h1>
				<form name="login" action="funciones/registrar.php" method="get" accept-charset="utf-8">
					<ul>
						<li>
							<label for="usernombre">Nombre</label>
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
			</section>
		<footer>
			Proyecto Soa by EFI
		</footer>
	</body>
</html>