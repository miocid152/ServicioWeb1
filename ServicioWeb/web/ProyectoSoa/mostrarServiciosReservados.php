<?php
include 'funciones/includeFunciones.php';
	$servicio="";
	$salon="";
	$menu="";
	$entretenimiento="";


	$salon=MostrarReservacionesSalones(3);
	$menu=MostrarReservacionesMenus(3);
	$entretenimiento=MostrarReservacionesEntretenimientos(3);

?>

<html>
	<head>
		<title>Servicios Reservados</title>
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
		    	<h1>Servicios Salones Reservados</h1>
			 	<?php echo $salon; ?>
			 	<h1>Servicios Menus Reservados</h1>
			 	<?php echo $menu; ?>
			 	<h1>Servicios Entretenimientos Reservados</h1>
			 	<?php echo $entretenimiento; ?>

			</article>
	  	</section>
	  
		<footer>
			Proyecto Soa by EFI
		</footer>
	</body>
</html>