<?php
include 'funciones/sesionCliente.php';//Verificamos si estas logueado
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
		<title>Cliente - Mostrar Servicios Reservados</title>
		<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
		<link rel="stylesheet" href="css/normalize.css">
		<link rel="stylesheet" href="css/LoginStyle.css">
		<script language="javascript" type="text/javascript" src="js/actb.js"></script><!-- External script -->
		<script language="javascript" type="text/javascript" src="js/tablefilter.js"></script>
	</head>
	<body>
		<header>
	            <figure id="banner">
	                <img src='img/banner_eventos.jpg' alt="Banner" height="200px">
	            </figure>
	    </header>
	    <nav id="nav">
			<ul id="navigation">
				<li><a href="cliente.php" class="first">Menu Principal</a></li>
				<li><a href="funciones/logout.php" class="last">Cerrar Sesion</a></li>
			</ul>
		</nav>
	    <section>
		    <article class="loginform cf">
		    	<h1>Servicios Salones Reservados</h1>
			 	<?php echo $salon; ?>
			 	<script language="javascript" type="text/javascript">setFilterGrid( "table1" );</script>
			 	<h1>Servicios Menus Reservados</h1>
			 	<?php echo $menu; ?>
			 	<script language="javascript" type="text/javascript">setFilterGrid( "table2" );</script>
			 	<h1>Servicios Entretenimientos Reservados</h1>
			 	<?php echo $entretenimiento; ?>
			 	<script language="javascript" type="text/javascript">setFilterGrid( "table3" );</script>

			</article>
	  	</section>
	  
		<footer>
			Proyecto Soa by EFI
		</footer>
	</body>
</html>