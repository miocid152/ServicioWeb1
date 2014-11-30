
<?php
$cadena ="";
function CancelarSalon($idSalon, $fecha){
	try{
	 $clienteSOAP = new SoapClient('http://localhost:8080/ServicioWebSalon/ServicioWebSalon?WSDL');
	 $parametros =array('idSalon'=>$idSalon,
	 					'fechaReservacionSalon'=>$fecha);
	 $operacion = $clienteSOAP->CancelarReservacionSalon($parametros);
	 $cadena = $operacion->return;
	 
	} catch(SoapFault $e){
	 var_dump($e);
	}

	$x=json_decode($cadena);
	echo $cadena;

	echo $x[0]->mensaje;
	echo $x[0]->fecha;
}


?>