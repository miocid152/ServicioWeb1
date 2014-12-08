
<?php
$cadena ="";

function ConfirmarEntretenimiento($idEntretenimiento, $fecha){
	try{
	 $clienteSOAP = new SoapClient('http://localhost:8080/ServicioWebEntretenimiento/ServicioWebEntretenimiento?WSDL');
	 $parametros =array('idEntretenimiento'=>$idEntretenimiento,
	 					'fechaReservacionEntretenimiento'=>$fecha);
	 $operacion = $clienteSOAP->ConfirmarReservacionEntretenimiento($parametros);
	 $cadena = $operacion->return;
	 
	} catch(SoapFault $e){
	 var_dump($e);
	}

	$x=json_decode($cadena);
	echo $cadena;

	return $x[0]->mensaje;
}


?>