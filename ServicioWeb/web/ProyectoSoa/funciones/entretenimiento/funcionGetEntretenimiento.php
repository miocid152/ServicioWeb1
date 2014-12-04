<?php
/*
	$x=json_decode(GetEntretenimiento(1));
		$idEntretenimiento = $x->idEntretenimiento;
		$tipoEntretenimiento = $x->tipoEntretenimiento;
		$nombreCompaniaEntretenimiento = $x->nombreCompaniaEntretenimiento;
		$horasEntretenimiento = $x->horasEntretenimiento;
		$precioEntretenimiento = $x->precioEntretenimiento;
		echo "ID Entretenimiento: ". $idEntretenimiento.
		"<br>Tipo de Entretenimiento: ".$tipoEntretenimiento.
		"<br>Nombre de la Compañia: ".$nombreCompaniaEntretenimiento.
		"<br>Goras de Entretenimiento".$horasEntretenimiento.
		"<br>Precio: ".$precioEntretenimiento;
		echo "<br><br><br>";
*/
$cadena ="";
function GetEntretenimiento($idEntretenimiento){
	try{
	 $clienteSOAP = new SoapClient('http://localhost:8080/ServicioWebEntretenimiento/ServicioWebEntretenimiento?WSDL');
	 $parametros = array('idEntretenimiento' => $idEntretenimiento );
	 $prueba = $clienteSOAP->GetEntretenimiento($parametros);
	 $cadena = $prueba->return;
	 
	} catch(SoapFault $e){
	 var_dump($e);
	}

	return $cadena;
}


?>