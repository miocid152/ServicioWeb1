
<?php
$cadena ="";
function MostrarReservacionesMenu($fecha){
	try{
	 $clienteSOAP = new SoapClient('http://localhost:8080/ServicioWebMenu/ServicioWebMenu?WSDL');
	 $correoEmpresa="tv@tv.com";
	 $parametros = array('fechaReservacionMenu' => $fecha,
	  					 'correoEmpresa' => $correoEmpresa);
	 $prueba = $clienteSOAP->MostrarReservacionesMenu($parametros);
	 $cadena = $prueba->return;
	 
	} catch(SoapFault $e){
	 var_dump($e);
	}

	$x=json_decode($cadena);

	for($i=0; $i<sizeof($x); $i++){
		$idMenu = $x[$i]->idMenu;
		$menuDes = $x[$i]->menuDes;
		$precioMenu = $x[$i]->precioMenu;
		$correoClienteMenu = $x[$i]->correoClienteMenu;
		$cantidadPersonas = $x[$i]->cantidadPersonas;
		echo "ID Menu: ". $idMenu.
		"<br>Descripcion del menu: ".$menuDes.
		"<br>Precio ".$precioMenu.
		"<br>correoClienteMenu ".$correoClienteMenu.
		"<br>cantidadPersonas".$cantidadPersonas;
		echo "<br><br><br>";

	}
}


?>