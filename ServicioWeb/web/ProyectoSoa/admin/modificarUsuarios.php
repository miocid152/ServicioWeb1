<?php
	include '../funciones/sesionAdmin.php'; //Verificamos si eres admin
	include '../funciones/conexion.php';
	error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
	$mensaje="";


	$consulta ="SELECT * FROM usuario";
	if (null !== ($n = mysqli_fetch_assoc($conexion->query($consulta)))){
	 	$mensaje ="<TABLE id='table1' class='mytable' BORDER='1' width=99% align=center>";
		$mensaje .="<TR align=center>
						<th>Nombre usuario</th>
						<th>Correo electrónico</th>
						<th>Contreseña</th>
						<th>Dirección</th>
						<th>Número telefónico</th>
						<th>Tipo de usuario</th>						
						<th>Función</th>
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

		}
		$mensaje.='</table>
		<script language="javascript" type="text/javascript">setFilterGrid( "table1" );</script>';
    	$conexion->close();
	} else{
		$conexion->close();
		$mensaje="No hay usuarios";
	}

 ?>
 <!DOCTYPE html>
<html>
<head>
	<title>Administrador - Modificar usuarios</title>
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
		<article id="wb_CssMenu1" class="loginform cf">
			<h1>Modificar usuarios</h1>
			<hr>
			<br>
			<p><?php echo $mensaje; ?></p>
		</article>
		</section>
		<footer>
			Proyecto SOA by EFI
		</footer>
	</body>
</html>