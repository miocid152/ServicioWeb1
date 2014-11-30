
<?php
$cadena ="";
//Lista Salones
function ListaSalones($fecha){
	try{
	 $clienteSOAP = new SoapClient('http://localhost:8080/ServicioWebSalon/ServicioWebSalon?WSDL');
	 $parametros = array('fechaReservacionSalon' => $fecha );
	 $prueba = $clienteSOAP->ListaSalones($parametros);
	 $cadena = $prueba->return;
	 
	} catch(SoapFault $e){
	 var_dump($e);
	}

	$x=json_decode($cadena);

	for($i=0; $i<sizeof($x); $i++){
		$idSalon = $x[$i]->idSalon;
		$nombreSalon = $x[$i]->nombreSalon;
		$precioSalon = $x[$i]->precioSalon;
		$direccionSalon = $x[$i]->direccionSalon;
		echo "ID Salon: ". $idSalon."<br>Nombre del Salon: ".$nombreSalon."<br>Precio ".$precioSalon."<br>Direccion".$direccionSalon;
		echo "<br><br><br>";

	}
}


?>