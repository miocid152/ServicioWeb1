<?php 
	function conectarse()
	{
		$servidor ="localhost";
		$usuario="root";
		$password="root";
		$bd="logueosoa";
		$conectar = new mysqli($servidor,$usuario,$password,$bd);
		return $conectar;
	}
	
	$conexion = conectarse();
?>