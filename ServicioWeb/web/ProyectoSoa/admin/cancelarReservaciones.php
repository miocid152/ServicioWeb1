<!DOCTYPE html>
<?php
	$fecha="";
	$tabla1="";
	$tabla2="";
	$tabla3="";
	$formulario="";
	$resultado="";
	include '../funciones/includeFunciones.php';
	if(isset($_REQUEST['fecha'])){
		$fecha=$_REQUEST['fecha'];
		$tabla1=MostrarReservacionesSalones($fecha,1);
		$tabla2=MostrarReservacionesMenus($fecha,1);
		$tabla3=MostrarReservacionesEntretenimientos($fecha,1);

		$formulario='<input name="idSalon" type="hidden" value="'.MostrarReservacionesSalones($fecha,0).'"/>'.
					'<input name="idMenu" type="hidden" value="'.MostrarReservacionesMenus($fecha,0).'"/>'.
					'<input name="idEntretenimiento" type="hidden" value="'.MostrarReservacionesEntretenimientos($fecha,0).'"/>'.
					'<input type="submit" value"Cancelar"/>';
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
	    <section class="loginform cf">
		    <form id="" name="fechaReservacion" action="cancelarReservaciones.php" method="get">
			    <fieldset>
				    <input type="date" name="fecha" placeholder="YYYY-mm-dd" value="<?php echo $fecha; ?>" required />
				    <input type="submit" value="Buscar"/>
			    </fieldset>
		    </form>
	    </section>
	    <section class="loginform cf">
	      	<aside>
	      		<p><?php echo $tabla1; ?></p>
	      		<p><?php echo $tabla2; ?></p>
	      		<p><?php echo $tabla3; ?></p>
			</aside>
			 <form id="" name="cancelarReservacion" action="cancelarReservaciones.php" method="get">
			 	<?php echo $formulario;
			 		echo '<input type="hidden" name="fecha" value="'.$fecha.'"/>'; ?>
			 </form>
		</section>
		    <?php echo $resultado; ?>
		    
	  
	  
		<footer>
			Proyecto Soa by EFI
		</footer>
	</body>
</html>