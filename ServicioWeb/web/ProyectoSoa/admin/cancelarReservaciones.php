<!DOCTYPE html>
<?php
	include '../funciones/includeFunciones.php';
	$fecha="";
	$servicios="";
	$formulario="";
	$resultado="";
	
	if(isset($_REQUEST['fecha'])){
		$fecha=$_REQUEST['fecha'];
		if(!(isset($_REQUEST['idSalon']) || isset($_REQUEST['idMenu']) || isset($_REQUEST['idEntretenimiento']))){
			$servicios=MostrarReservacionesSalones($fecha,1)."<br/><br/>".
					   MostrarReservacionesMenus($fecha,1)."<br/>".
					   MostrarReservacionesEntretenimientos($fecha,1);

			$formulario='<input name="idSalon" type="hidden" value="'.MostrarReservacionesSalones($fecha,0).'"/>'.
			'<input name="idMenu" type="hidden" value="'.MostrarReservacionesMenus($fecha,0).'"/>'.
			'<input name="idEntretenimiento" type="hidden" value="'.MostrarReservacionesEntretenimientos($fecha,0).'"/>'.
			'<input type="submit" value="Cancelar Reservacion"/>';
		}else{
			$idSalon=$_REQUEST['idSalon'];
			$idMenu=$_REQUEST['idMenu'];
			$idEntretenimiento=$_REQUEST['idEntretenimiento'];
			$salon=json_decode(GetSalon($idSalon));
			$menu=json_decode(GetMenu($idMenu));
			$entretenimiento=json_decode(GetEntretenimiento($idEntretenimiento));

			$formulario="<h3>El salon: ". $salon->nombreSalon.
						"<br/><br/>Menu: ". $menu->menuDes.
						"<br/><br/>Entretenimiento: ". $entretenimiento->nombreCompaniaEntretenimiento.
					"<br/><br/></h3><h1> Fue Cancelada con Exito</h1>";
		}

	}
?>
<html>
	<head>
		<title>Administrador</title>
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
	    <section>
		    <article class="loginform cf">
			    <form id="" name="fechaReservacion" action="cancelarReservaciones.php" method="get">
				    <fieldset>
					    <input type="date" name="fecha" placeholder="YYYY-mm-dd" value="<?php echo $fecha; ?>" required />
					    <input type="submit" value="Buscar"/>
				    </fieldset>
			    </form>
		    </article>
		    <article class="loginform cf">
		      	<aside>
		      		<p><?php echo $servicios; ?></p>
				</aside>
				 <form id="" name="cancelarReservacion" action="cancelarReservaciones.php" method="get">
				 	<?php echo $formulario;
				 		echo '<input type="hidden" name="fecha" value="'.$fecha.'"/>';
			 		 ?>
				 </form>
			</article>
	  	</section>
	  
		<footer>
			Proyecto Soa by EFI
		</footer>
	</body>
</html>