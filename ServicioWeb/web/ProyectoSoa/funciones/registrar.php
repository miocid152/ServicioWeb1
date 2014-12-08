<?php
	$conexion = new mysqli('localhost','root','root','logueosoa');
	error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);

	if(isset($_REQUEST['usermail'])){
		$nombre=$_REQUEST['nombre'];
		$usermail=$_REQUEST['usermail'];
		$direccion=$_REQUEST['direccion'];
		$numeroTelefonico=$_REQUEST['numeroTelefonico'];
		$password=$_REQUEST['password'];

		$consulta ="select * from usuario where correoElectronico='".$usermail."'";
		$registro = $conexion->query($consulta)->fetch_assoc();
		if ($registro['correoElectronico']!=$usermail){
			$consulta ="INSERT INTO usuario(nombreCompleto,correoElectronico,contrasena,direccion,numeroTelefonico,tipoUsuario) 
						VALUE ('".$nombre."','".$usermail."','".$password."','".$direccion."','".$numeroTelefonico."',0)";
			$conexion->query($consulta);
			mysqli_close($conexion);
			echo '<br><br><br><br><br><br><br><br><h1><p align="center">Usuario Registrado Exitosamente</p></h1>';
			echo '<html>
					<head>
						<meta http-equiv="REFRESH" content="0;url=../login.php">
					</head>
			  </html>'; //
		}else{
			mysqli_close($conexion);
			echo '<html>
					<head>
						<meta http-equiv="REFRESH" content="0;url=../registrar.php?existente=1">
					</head>
			  </html>'; //
		}
	}
	

?>