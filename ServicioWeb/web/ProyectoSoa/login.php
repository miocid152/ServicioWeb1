<!DOCTYPE html>
<html>
	<head>
		<title>Login Eventos</title>
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
				<article class="loginform cf">
					<h1>Bienvenido</h1>
					<form name="login" action="funciones/verificar.php" method="get" accept-charset="utf-8">
						<ul>
							<li>
								<label for="usermail">Email</label>
								<input type="email" name="usermail" placeholder="yourname@email.com" required>
							</li>
							<li>
								<label for="password">Password</label>
								<input type="password" name="password" placeholder="password" required></li>
							<li>
								<input type="submit" value="Login">
							</li>
						</ul>
					</form>
					<br/><br/><br/><br/><br/>
					<h3><a href="registrar.php">Si no tiene cuenta click aqui</a></h3>
				</article>
			</section>
		
		<footer>
			Proyecto Soa by EFI
		</footer>
	</body>
</html>