
<?php
$cadena ="";
//Lista Salones
function ConfirmarSalon($idSalon, $fecha){
	try{
	 $clienteSOAP = new SoapClient('http://localhost:8080/ServicioWebSalon/ServicioWebSalon?WSDL');
	 $parametros =array('idSalon'=>$idSalon,
	 					'fechaReservacionSalon'=>$fecha);
	 $operacion = $clienteSOAP->ConfirmarReservacionSalon($parametros);
	 $cadena = $operacion->return;
	 
	} catch(SoapFault $e){
	 var_dump($e);
	}

	$x=json_decode($cadena);
	echo $cadena;

	return $x[0]->mensaje;
}


?>