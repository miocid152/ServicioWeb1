<?php
$error="";
	session_start();
	if(isset($_SESSION['usermail']) ) {
		if($_SESSION['tipoUsuario']==0) Header("Location: cliente.php");
		if($_SESSION['tipoUsuario']==1) Header("Location: admin/index.php");
	}
	if(isset($_SESSION['error']) ) {
		$error=$_SESSION['error'];
		session_destroy();
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Loguear</title>
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
					<h1>Bienvenido</h1>
					<h2><?php echo $error; ?></h2>
					<form name="login" action="funciones/verificar.php" method="POST" accept-charset="utf-8">
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