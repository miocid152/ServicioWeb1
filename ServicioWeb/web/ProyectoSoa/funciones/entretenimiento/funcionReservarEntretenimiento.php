
<?php
$cadena ="";
function ReservarEntretenimiento($idEntretenimiento, $fecha,$correoClienteEntretenimiento){
	try{
	 $clienteSOAP = new SoapClient('http://localhost:8080/ServicioWebEntretenimiento/ServicioWebEntretenimiento?WSDL');
	 $parametros =array('idEntretenimiento'=>$idEntretenimiento,
	 					'fechaReservacionEntretenimiento'=>$fecha,
	 					'correoClienteEntretenimiento'=>$correoClienteEntretenimiento);
	 $operacion = $clienteSOAP->ReservacionEntretenimiento($parametros);
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