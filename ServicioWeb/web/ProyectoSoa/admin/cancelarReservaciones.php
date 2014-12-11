<!DOCTYPE html>
<?php
	include '../funciones/sesionAdmin.php'; //Verificamos si eres admin
	include '../funciones/includeFunciones.php';
	$servicio="";
	$formulario="";
	
	if(isset($_REQUEST['servicio'])){
		$servicio=$_REQUEST['servicio'];
		if(isset($_REQUEST['idSalon'])){
			$idSalon=$_REQUEST['idSalon'];
			$fechaReservacionSalon=$_REQUEST['fechaReservacionSalon'];
			$x=json_decode(GetSalon($idSalon));
			$retorno=CancelarSalon($idSalon, $fechaReservacionSalon);
			$formulario="El salon: ".$x->nombreSalon.
						"<br/>Con Precion: ".$x->precioSalon.
						"<br/>Direccion: ".$x->direccionSalon.
						"<br/>".$retorno;
		} else if(isset($_REQUEST['idMenu'])){
			$idMenu=$_REQUEST['idMenu'];
			$fechaReservacionMenu=$_REQUEST['fechaReservacionMenu'];
			$x=json_decode(GetMenu($idMenu));
			$retorno=CancelarMenu($idMenu, $fechaReservacionMenu);
			$formulario="El menu: ".$x->menuDes.
						"<br/>Con Precion: ".$x->precioMenu.
						"<br/>Cantidad de personas: ".$x->cantidadPersonas.
						"<br/>".$retorno;

		} else if(isset($_REQUEST['idEntretenimiento'])){
			$idEntretenimiento=$_REQUEST['idEntretenimiento'];
			$fechaReservacionEntretenimiento=$_REQUEST['fechaReservacionEntretenimiento'];
			$x=json_decode(GetEntretenimiento($idEntretenimiento));
			$retorno=CancelarEntretenimiento($idEntretenimiento, $fechaReservacionEntretenimiento);
			$formulario="El Entretenimiento de : ".$x->nombreCompaniaEntretenimiento.", de ".$x->tipoEntretenimiento.
						"<br/>Con Precion: ".$x->precioEntretenimiento.
						"<br/>Horas de entretenimiento: ".$x->horasEntretenimiento.
						"<br/>".$retorno;

		} else {
			if($servicio=="Salon"){$formulario=MostrarReservacionesSalones(1);}
			if($servicio=="Menu"){$formulario=MostrarReservacionesMenus(1);}
			if($servicio=="Entretenimiento"){$formulario=MostrarReservacionesEntretenimientos(1);}
		}
	}
?>
<html>
	<head>
		<title>Administrador - Cancelar Reservaciones</title>
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
	    <nav id="nav">
				<ul id="navigation">
					<li><a href="../admin" class="first">Menu Principal</a></li>
					<li><a href="../funciones/logout.php" class="last">Cerrar Sesion</a></li>
				</ul>
			</nav>
	    <section>
		    <article class="loginform cf">
			    <form id="" name="fechaReservacion" action="cancelarReservaciones.php" method="POST">
				    <select required name="servicio">
				    	<option value="Salon" <?php if($servicio=="Salon") echo "selected";?>> Salon</option>
				    	<option value="Menu" <?php if($servicio=="Menu") echo "selected";?>> Menu</option>
				    	<option value="Entretenimiento" <?php if($servicio=="Entretenimiento") echo "selected";?>> Entretenimiento</option>
				    </select>
				    <input type="submit" value="Buscar"/>
			    </form>
		    </article>
		    <article class="loginform cf">
		    	<h1><?php echo $servicio; ?></h1>
			 	<?php echo $formulario; ?>
			</article>
	  	</section>
	  
		<footer>
			Proyecto Soa by EFI
		</footer>
	</body>
</html>