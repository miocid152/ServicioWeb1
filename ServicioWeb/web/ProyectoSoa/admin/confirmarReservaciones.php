<!DOCTYPE html>
<?php
	include '../funciones/sesionAdmin.php'; //Verificamos si eres admin
	include '../funciones/includeFunciones.php';
	$servicio="";
	$formulario="";
	//Generar formulario dependiendo de servicio al recibir un POST de la misma pagina
	if(isset($_REQUEST['servicio'])){
		$servicio=$_REQUEST['servicio'];
		if(isset($_REQUEST['idSalon'])){
			$idSalon=$_REQUEST['idSalon'];
			$fechaReservacionSalon=$_REQUEST['fechaReservacionSalon'];
			$x=json_decode(GetSalon($idSalon));
			$retorno=ConfirmarSalon($idSalon, $fechaReservacionSalon);
			$formulario="Salón: ".$x->nombreSalon.
						"<br/>Precio: ".$x->precioSalon.
						"<br/>Dirección: ".$x->direccionSalon.
						"<br/>".$retorno;
		} else if(isset($_REQUEST['idMenu'])){
			$idMenu=$_REQUEST['idMenu'];
			$fechaReservacionMenu=$_REQUEST['fechaReservacionMenu'];
			$x=json_decode(GetMenu($idMenu));
			$retorno=ConfirmarMenu($idMenu, $fechaReservacionMenu);
			$formulario="Menú: ".$x->menuDes.
						"<br/>Precio: ".$x->precioMenu.
						"<br/>Cantidad de personas: ".$x->cantidadPersonas.
						"<br/>".$retorno;

		} else if(isset($_REQUEST['idEntretenimiento'])){
			$idEntretenimiento=$_REQUEST['idEntretenimiento'];
			$fechaReservacionEntretenimiento=$_REQUEST['fechaReservacionEntretenimiento'];
			$x=json_decode(GetEntretenimiento($idEntretenimiento));
			$retorno=ConfirmarEntretenimiento($idEntretenimiento, $fechaReservacionEntretenimiento);
			$formulario="Entretenimiento de: ".$x->nombreCompaniaEntretenimiento.", de ".$x->tipoEntretenimiento.
						"<br/>Precio: ".$x->precioEntretenimiento.
						"<br/>Horas de servicio: ".$x->horasEntretenimiento.
						"<br/>".$retorno;

		} else {
			if($servicio=="Salon"){$formulario=MostrarReservacionesSalones(2);}
			if($servicio=="Menu"){$formulario=MostrarReservacionesMenus(2);}
			if($servicio=="Entretenimiento"){$formulario=MostrarReservacionesEntretenimientos(2);}
		}
	}
?>
<html>
	<head>
		<title>Administrador - Confirmar reservaciones</title>
		<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
		<link rel="stylesheet" href="../css/normalize.css">
		<link rel="stylesheet" href="../css/LoginStyle.css">
		<script language="javascript" type="text/javascript" src="../js/actb.js"></script><!-- External script -->
		<script language="javascript" type="text/javascript" src="../js/tablefilter.js"></script>
	</head>
	<body>
		<header>
	            <figure id="banner">
	                <img src='../img/banner_eventos.jpg' alt="Banner" height="200px">
	            </figure>
	    </header>
	    <nav id="nav">
				<ul id="navigation">
					<li><a href="../admin" class="first">Menú principal</a></li>
					<li><a href="../funciones/logout.php" class="last">Cerrar sesión</a></li>
				</ul>
			</nav>
	    <section>
		    <article class="loginform cf">
		    	<h1>¿Qué servicio desea confirmar?</h1>
			    <form id="" name="fechaReservacion" action="confirmarReservaciones.php" method="POST">
				    <select required name="servicio">
				    	<option value="Salon" <?php if($servicio=="Salon") echo "selected";?>> Salón</option>
				    	<option value="Menu" <?php if($servicio=="Menu") echo "selected";?>> Menú</option>
				    	<option value="Entretenimiento" <?php if($servicio=="Entretenimiento") echo "selected";?>> Entretenimiento</option>
				    </select>
				    <input type="submit" value="Buscar"/>
			    </form>
		    </article>
		    <article class="loginform cf">
		    	<h1><?php echo $servicio; ?></h1>
			 	<?php echo $formulario; ?>
			 	<script language="javascript" type="text/javascript">setFilterGrid( "table1" );</script>
			</article>
	  	</section>
	  
		<footer>
			Proyecto SOA by EFI
		</footer>
	</body>
</html>