<?php
	session_start();
	if(isset($_SESSION['usermail']) ) {
		if($_SESSION['tipoUsuario']==0) Header("Location: cliente.php");
		if($_SESSION['tipoUsuario']==1) Header("Location: admin/index.php");
	}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Concactanos</title>
		<meta charset="utf-8">
		<link rel="stylesheet" href="css/reset.css" type="text/css" media="all">
		<link rel="stylesheet" href="css/layout.css" type="text/css" media="all">
		<link rel="stylesheet" href="css/style.css" type="text/css" media="all">
		<link rel="stylesheet" href="css/normalize.css">
		<link rel="stylesheet" href="css/LoginStyle.css">

		<script type="text/javascript" src="js/jquery-1.6.js" ></script>
		<script type="text/javascript" src="js/cufon-yui.js"></script>
		<script type="text/javascript" src="js/cufon-replace.js"></script>  
		<script type="text/javascript" src="js/Vegur_300.font.js"></script>
		<script type="text/javascript" src="js/PT_Sans_700.font.js"></script>
		<script type="text/javascript" src="js/PT_Sans_400.font.js"></script>
		<script type="text/javascript" src="js/atooltip.jquery.js"></script>
		<!--[if lt IE 9]>
		<script type="text/javascript" src="js/html5.js"></script>
		<link rel="stylesheet" href="css/ie.css" type="text/css" media="all">
		<![endif]-->
		<!--[if lt IE 7]>
			<div style=' clear: both; text-align:center; position: relative;'>
				<a href="http://windows.microsoft.com/en-US/internet-explorer/products/ie/home?ocid=ie6_countdown_bannercode"><img src="http://storage.ie6countdown.com/assets/100/images/banners/warning_bar_0000_us.jpg" border="0" height="42" width="820" alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today." /></a>
			</div>
		<![endif]-->
	</head>
	<body id="page4">
		<header>
            <figure id="banner">
                <img src='img/banner_eventos.jpg' alt="Banner" height="200px">
            </figure>
    	</header>
		<div class="main">
<!--header -->
			<header tyle="margin-top: 0px; height: 590px;">
			  <nav>
				  <ul id="menu">
						<li><a href="index.php"><span>Inicio</span></a></li>
						<li><a href="registrar.php"><span>Registrate</span></a></li>
						<li><a href="login.php"><span>Login</span></a></li>
						<li class="last active"><a href="Contacts.php"><span>Contactanos</span></a></li>
					</ul>
				</nav>
			</header>
<!--header end-->
<!--content -->
		</div>
		<div class="bg1">
			<div class="main">
				<article id="content2">
					<div class="wrapper">
						<h3>Telefonos:</h3>
					  <div class="col1 marg_right1">
							<p class="address"><span class="color2">Contactos:</span><br>
							<br>
									<span>Ing.Aguilar:</span>+1 229 916 8514<br>
									<span>Ing.Carrasco:</span>+1 229 1302417<br>
					    <span>Email:</span>eventservice@gmail.com</p>
						</div>
					</div>
				</article>
			</div>
		</div>
	<footer>
		Proyecto Soa by EFI
	</footer>

	</body>
</html>