<?php
	include '../funciones/sesionAdmin.php'; //Verificamos si eres admin
	include '../funciones/conexion.php';
	error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
	$mensaje="";


	$consulta ="SELECT * FROM usuario";
	if (null !== ($n = mysqli_fetch_assoc($conexion->query($consulta)))){
	 	$mensaje ="<TABLE BORDER='1' width=99% align=center>";
		$mensaje .="<TR align=center>
						<td>Nombre Usuario</td>
						<td>Correo Electronico</td>
						<td>Contreseña</td>
						<td>Direccion</td>
						<td>Numero Telefonico</td>
						<td>Tipo de Usuario</td>						
						<td>Funcion</td>
					</TR>";
		$verificar = mysqli_query($conexion, $consulta);
		while ($fila = $verificar->fetch_assoc()) {
    		$mensaje .="<form method ='POST' action='modificarUser.php'>
						<TR>";
			$mensaje.="<TD><input type='hidden' name='nombreCompleto' value='".$fila['nombreCompleto']."'/>"  .$fila['nombreCompleto'].  "</TD>";
			$mensaje.="<TD><input type='hidden' name='correoElectronico' value='".$fila['correoElectronico']."'/>"  .$fila['correoElectronico'].  "</TD>";
			$mensaje.="<TD><input type='hidden' name='contrasena' value='".$fila['contrasena']."'/>"  .$fila['contrasena'].  "</TD>";
			$mensaje.="<TD><input type='hidden' name='direccion' value='".$fila['direccion']."'/>"  .$fila['direccion'].  "</TD>";
			$mensaje.="<TD><input type='hidden' name='numeroTelefonico' value='".$fila['numeroTelefonico']."'/>"  .$fila['numeroTelefonico'].  "</TD>";
			$mensaje.="<TD><input type='hidden' name='tipoUsuario' value='".$fila['tipoUsuario']."'/>"  .$fila['tipoUsuario'].  "</TD>";

			$mensaje.="<td><input type='hidden' name='idUsuario' value='".$fila['idUsuario']."'/>
						   <input type='submit' value='Modificar' id='nada'/></td></TR></FORM>";
    		//$fila['idUsuario'];
    		//$fila['correoElectronico'];
    		//$fila['contrasena'];
    		//$fila['direccion'];
    		//$fila['numeroTelefonico'];
    		//$fila['tipoUsuario'];

		}
		$mensaje.="</table>";
    	$conexion->close();
	} else{
		$conexion->close();
		$mensaje="No hay usuarios";
	}

 ?>
 <!DOCTYPE html>
<html>
<head>
	<title>Administrador - Modificar Usuarios</title>
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
		<article id="wb_CssMenu1" class="loginform cf">
			<h1>Modificar Usuarios</h1>
			<hr>
			<br>
			<p><?php echo $mensaje; ?></p>
		</article>
		</section>
		<footer>
			Proyecto Soa by EFI
		</footer>
	</body>
</html>