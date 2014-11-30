
<?php
$cadena ="";
//Lista Salones
function ListaEntretenimientos($fecha){
	try{
	 $clienteSOAP = new SoapClient('http://localhost:8080/ServicioWebEntretenimiento/ServicioWebEntretenimiento?WSDL');
	 $parametros = array('fechaReservacionEntretenimiento' => $fecha );
	 $operaciones = $clienteSOAP->ListaEntretenimiento($parametros);
	 $cadena = $operaciones->return;
	 
	} catch(SoapFault $e){
	 var_dump($e);
	}

	$x=json_decode($cadena);

	for($i=0; $i<sizeof($x); $i++){
		$idEntretenimiento = $x[$i]->idEntretenimiento;
		$tipoEntretenimiento = $x[$i]->tipoEntretenimiento;
		$nombreCompaniaEntretenimiento = $x[$i]->nombreCompaniaEntretenimiento;
		$horasEntretenimiento = $x[$i]->horasEntretenimiento;
		$precioEntretenimiento = $x[$i]->precioEntretenimiento;
		echo "ID Entretenimiento: ". $idEntretenimiento.
		"<br>Tipo de Entretenimiento: ".$tipoEntretenimiento.
		"<br>Nombre de la Compañia: ".$nombreCompaniaEntretenimiento.
		"<br>Goras de Entretenimiento".$horasEntretenimiento.
		"<br>Precio: ".$precioEntretenimiento;
		echo "<br><br><br>";

	}
}


?>