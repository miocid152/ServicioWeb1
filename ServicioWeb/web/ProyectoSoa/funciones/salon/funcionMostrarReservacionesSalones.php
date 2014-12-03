
<?php
$cadena ="";
//Lista Salones
function MostrarReservacionesSalones($fecha){
	try{
	 $clienteSOAP = new SoapClient('http://localhost:8080/ServicioWebSalon/ServicioWebSalon?WSDL');
	 $correoEmpresa="tv@tv.com";
	 $parametros = array('fechaReservacionSalon' => $fecha,
	  					 'correoEmpresa' => $correoEmpresa);
	 $prueba = $clienteSOAP->MostrarReservacionesSalones($parametros);
	 $cadena = $prueba->return;
	 
	} catch(SoapFault $e){
	 var_dump($e);
	}

	$x=json_decode($cadena);

	for($i=0; $i<sizeof($x); $i++){
		$idSalon = $x[$i]->idSalon;
		$nombreSalon = $x[$i]->nombreSalon;
		$precioSalon = $x[$i]->precioSalon;
		$correoClienteSalon = $x[$i]->correoClienteSalon;
		$direccionSalon = $x[$i]->direccionSalon;
		echo "ID Salon: ". $idSalon.
		"<br>Nombre del Salon: ".$nombreSalon.
		"<br>Precio ".$precioSalon.
		"<br>correoClienteSalon ".$correoClienteSalon.
		"<br>Direccion".$direccionSalon;
		echo "<br><br><br>";

	}
}


?>