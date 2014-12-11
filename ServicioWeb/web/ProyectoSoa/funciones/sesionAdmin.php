<?php 
 	session_start();
 	if (!isset($_SESSION["tipoUsuario"])) {
 		header("Location: ../funciones/logout.php");
 	}else if($_SESSION["tipoUsuario"]==0){
		header("Location: ../cliente.php");
	}
 	
?>