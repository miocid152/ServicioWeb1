
<?php
$cadena ="";
function MostrarReservacionesEntretenimiento($fecha){
	try{
	 $clienteSOAP = new SoapClient('http://localhost:8080/ServicioWebEntretenimiento/ServicioWebEntretenimiento?WSDL');
	 $correoEmpresa="tv@tv.com";
	 $parametros = array('fechaReservacionEntretenimiento' => $fecha,
	  					 'correoEmpresa' => $correoEmpresa);
	 $prueba = $clienteSOAP->MostrarReservacionesEntretenimiento($parametros);
	 $cadena = $prueba->return;
	 
	} catch(SoapFault $e){
	 var_dump($e);
	}

	$x=json_decode($cadena);

	for($i=0; $i<sizeof($x); $i++){
		$idEntretenimiento = $x[$i]->idEntretenimiento;
		$nombreCompaniaEntretenimiento = $x[$i]->nombreCompaniaEntretenimiento;
		$precioEntretenimiento = $x[$i]->precioEntretenimiento;
		$correoClienteEntretenimiento = $x[$i]->correoClienteEntretenimiento;
		$tipoEntretenimiento = $x[$i]->tipoEntretenimiento;
		echo "ID Entretenimiento: ". $idEntretenimiento.
		"<br>Nombre Compañia Entretenimiento: ".$nombreCompaniaEntretenimiento.
		"<br>Precio ".$precioEntretenimiento.
		"<br>correoClienteEntretenimiento ".$correoClienteEntretenimiento.
		"<br>tipoEntretenimiento".$tipoEntretenimiento;
		echo "<br><br><br>";

	}
}


?>