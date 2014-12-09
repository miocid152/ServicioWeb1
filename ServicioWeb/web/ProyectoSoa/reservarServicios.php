<?php 
include 'funciones/includeFunciones.php';
$mensaje="<ul>";
if(isset($_REQUEST['fecha'])){
	$fecha = $_REQUEST['fecha'];
	//if($_SESSION['usermail']==)
	if(isset($_REQUEST['idSalon'])){
		$idSalon = $_REQUEST['idSalon'];
		$mensaje .= "<li>";
		$mensaje .= ReservarSalon($idSalon, $fecha,"prueba@prueba.com"); //Correo de reserva debido a que no he agregado sesion editar cuando se agreguen sesiones
		$mensaje .= " del servicio Salón<br/>";
		$mensaje .= "</li>";
	}
	if(isset($_REQUEST['idMenu'])){
		$idMenu = $_REQUEST['idMenu'];
		$mensaje .= "<li>";
		$mensaje .= ReservarMenu($idMenu, $fecha,"prueba@prueba.com"); //Correo de reserva debido a que no he agregado sesion editar cuando se agreguen sesiones
		$mensaje .= " del servicio Menu<br/>";
		$mensaje .= "</li>";
	}
	if(isset($_REQUEST['idEntretenimiento'])){
		$idEntretenimiento = $_REQUEST['idEntretenimiento'];
		$mensaje .= "<li>";
		$mensaje .= ReservarEntretenimiento($idEntretenimiento, $fecha,"prueba@prueba.com"); //Correo de reserva debido a que no he agregado sesion editar cuando se agreguen sesiones
		$mensaje .= " del servicio Entretenimiento<br/>";
		$mensaje .= "</li>";
	}
	$mensaje .= "</ul><br/>Pagar al banco y enviar el comprobante por correo electronico a  tv@tv.com";
}

?>

 <!DOCTYPE html>
<html>
<head>
	<title>Administrador</title>
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
			<article id="wb_CssMenu1" class="loginform cf">
				<h1>Resultado de su Reservacion</h1>
				<h4><?php echo $mensaje; ?></h4>
				<br/>
				<center>
					<a class="prueba" href="cliente.php">Regresar al Menu</a>
				</center>
			</article>
		</section>
		<footer>
			Proyecto Soa by EFI
		</footer>
	</body>
</html>