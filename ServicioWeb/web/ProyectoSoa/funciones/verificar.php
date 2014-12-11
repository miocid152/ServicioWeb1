<?php
	session_start();
	session_destroy();
	session_start();
	include 'conexion.php';
	error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
	if( isset($_REQUEST['usermail']) && isset($_REQUEST['password'])){
		$usermail=$_REQUEST['usermail'];
		$password=$_REQUEST['password'];
		$consulta ="SELECT * FROM usuario where correoElectronico='".$usermail."' and contrasena='".$password."'";
		if (null !== ($n = mysqli_fetch_assoc($conexion->query($consulta)))){
			$verificar = mysqli_query($conexion, $consulta);
			while ($fila = $verificar->fetch_assoc()) {
        		$_SESSION['tipoUsuario'] = $fila["tipoUsuario"];
        		$_SESSION['nombreCompleto'] = $fila["nombreCompleto"];
				$_SESSION['usermail'] = $usermail;
				$_SESSION['password'] = $password;
				$_SESSION['error']="";
    		}

		    $conexion->close();
			Header("Location: ../index.php");
		} else{
			$conexion->close();
			$_SESSION['error']='Usuario o contraseña incorrectos';
			Header("Location: ../login.php");
		}
	}
	//session_destroy();
?>