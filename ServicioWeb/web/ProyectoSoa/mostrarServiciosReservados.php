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
		<title>Cliente - Mostrar servicios reservados</title>
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
				<li><a href="cliente.php" class="first">Menú principal</a></li>
				<li><a href="funciones/logout.php" class="last">Cerrar sesión</a></li>
			</ul>
		</nav>
	    <section>
		    <article class="loginform cf">
		    	<h1>Servicios salones reservados</h1>
			 	<?php echo $salon; ?>
			 	<script language="javascript" type="text/javascript">setFilterGrid( "table1" );</script>
			 	<h1>Servicios Menús reservados</h1>
			 	<?php echo $menu; ?>
			 	<script language="javascript" type="text/javascript">setFilterGrid( "table2" );</script>
			 	<h1>Servicios entretenimientos reservados</h1>
			 	<?php echo $entretenimiento; ?>
			 	<script language="javascript" type="text/javascript">setFilterGrid( "table3" );</script>

			</article>
	  	</section>
	  
		<footer>
			Proyecto SOA by EFI
		</footer>
	</body>
</html>