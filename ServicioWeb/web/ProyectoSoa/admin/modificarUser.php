<?php
	include '../funciones/sesionAdmin.php'; //Verificamos si eres admin
	$nombreCompleto="";
	$correoElectronico="";
	$contrasena="";
	$direccion="";
	$numeroTelefonico="";
	$tipoUsuario="";
	$idUsuario="";
	$mensaje="";

	if(isset($_REQUEST['nombreCompleto'])){
		$nombreCompleto=$_REQUEST['nombreCompleto'];
		$correoElectronico=$_REQUEST['correoElectronico'];
		$contrasena=$_REQUEST['contrasena'];
		$direccion=$_REQUEST['direccion'];
		$numeroTelefonico=$_REQUEST['numeroTelefonico'];
		$tipoUsuario=$_REQUEST['tipoUsuario'];
		$idUsuario=$_REQUEST['idUsuario'];
	}

	if(isset($_REQUEST['modificar'])){
		include '../funciones/conexion.php';
		error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
		$consulta ="select * from usuario where correoElectronico='".$correoElectronico."' and idUsuario!=".$idUsuario;
		if (null === ($n = mysqli_fetch_assoc($conexion->query($consulta)))){
				$sql = "UPDATE usuario SET
					nombreCompleto='".$nombreCompleto."',
					correoElectronico='".$correoElectronico."',
					contrasena='".$contrasena."',
					direccion='".$direccion."',
					numeroTelefonico='".$numeroTelefonico."',
					tipoUsuario=".$tipoUsuario.
					" where idUsuario=".$idUsuario;
					
			if (mysqli_query($conexion, $sql)) {
	    			$mensaje="Modificado con éxito";
				} else {
		    		$mensaje.="Error en la modificación: " . mysqli_error($conexion);
				}
		}else{
				$mensaje="Ya existe un usuario con el mismo correo";
		}
		mysqli_close($conexion);
	}
		
		

?>
<!DOCTYPE html>
<html>
<head>
	<title>Administrador - Modificar usuario</title>
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
					<li><a href="../admin" class="first">Menú principal</a></li>
					<li><a href="../funciones/logout.php" class="last">Cerrar sesión</a></li>
				</ul>
			</nav>
			<section>
				<article class="loginform cf">
				<h1>Registro usuario</h1>
				<h2> <?php echo $mensaje; ?></h2>
					<form name="login" method="POST" accept-charset="utf-8">
						<ul>
							<li>
								<label for="usernombre">Nombre completo</label>
								<input type="text" name="nombreCompleto" value="<?php echo $nombreCompleto; ?>" required>
							</li>
							<li>
								<label for="usermail">E-mail</label>
								<input type="email" name="correoElectronico" value="<?php echo $correoElectronico; ?>" required>
							</li>
							<li>
								<label for="userdireccion">Dirección</label>
								<input type="text" name="direccion" value="<?php echo $direccion; ?>" required>
							</li>
							<li>
								<label for="usernumero">Teléfono</label>
								<input type="number" name="numeroTelefonico" value="<?php echo $numeroTelefonico; ?>" required>
							</li>
							<li>
								<label for="password">Contraseña</label>
								<input type="text" name="contrasena" value="<?php echo $contrasena; ?>" required></li>
							<li>
								<input type="hidden" name="idUsuario" value="<?php echo $idUsuario; ?>" >
								<select name="tipoUsuario">
									<option value='0' <?php if($tipoUsuario==0) echo "selected"; ?> >Usuario silvestre</option>
									<option value='1' <?php if($tipoUsuario==1) echo "selected"; ?> >Administrador</option>
								</select>

								<input type="hidden" name="modificar" value="0" required>
								<input type="submit" value="Modificar">
							</li>
						</ul>
					</form>
				</article>
			</section>
		<footer>
			Proyecto SOA by EFI
		</footer>
	</body>
</html>