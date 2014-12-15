<?php 
include 'funciones/sesionCliente.php';//Verificamos si estas logueado
include 'funciones/includeFunciones.php';
$mensaje="<ul>";
$clienteMail=$_SESSION['usermail'] ;
if(isset($_REQUEST['fecha'])){
	$fecha = $_REQUEST['fecha'];
	if(isset($_REQUEST['idSalon'])){
		$idSalon = $_REQUEST['idSalon'];
		$mensaje .= "<li>";
		$mensaje .= ReservarSalon($idSalon, $fecha,$clienteMail); //Correo de reserva debido a que no he agregado sesion editar cuando se agreguen sesiones
		$mensaje .= " del servicio salón<br/>";
		$mensaje .= "</li>";
	}
	if(isset($_REQUEST['idMenu'])){
		$idMenu = $_REQUEST['idMenu'];
		$mensaje .= "<li>";
		$mensaje .= ReservarMenu($idMenu, $fecha,$clienteMail); //Correo de reserva debido a que no he agregado sesion editar cuando se agreguen sesiones
		$mensaje .= " del servicio menú<br/>";
		$mensaje .= "</li>";
	}
	if(isset($_REQUEST['idEntretenimiento'])){
		$idEntretenimiento = $_REQUEST['idEntretenimiento'];
		$mensaje .= "<li>";
		$mensaje .= ReservarEntretenimiento($idEntretenimiento, $fecha,$clienteMail); //Correo de reserva debido a que no he agregado sesion editar cuando se agreguen sesiones
		$mensaje .= " del servicio entretenimiento<br/>";
		$mensaje .= "</li>";
	}
	$mensaje .= "</ul><br/>Pagar al banco y enviar el comprobante por correo electrónico a  tv@tv.com";
}

?>

 <!DOCTYPE html>
<html>
<head>
	<title>Cliente - Servicios de eventos</title>
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
				<li><a href="cliente.php" class="first">Menú principal</a></li>
				<li><a href="funciones/logout.php" class="last">Cerrar sesión</a></li>
			</ul>
		</nav>
	    <section>
			<article id="wb_CssMenu1" class="loginform cf">
				<h1>Resultado de su reservación</h1>
				<h4><?php echo $mensaje; ?></h4>
				<br/>
				<center>
					<a class="prueba" href="cliente.php">Regresar al menú</a>
				</center>
			</article>
		</section>
		<footer>
			Proyecto SOA by EFI
		</footer>
	</body>
</html>