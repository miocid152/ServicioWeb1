
<?php
$cadena ="";
function ReservarEntretenimiento($idEntretenimiento, $fecha,$correoClienteEntretenimiento){
	$correoEmpresa="tv@tv.com";
	try{
	 $clienteSOAP = new SoapClient('http://localhost:8080/ServicioWebEntretenimiento/ServicioWebEntretenimiento?WSDL');
	 $parametros =array('idEntretenimiento'=>$idEntretenimiento,
	 					'fechaReservacionEntretenimiento'=>$fecha,
	 					'correoClienteEntretenimiento'=>$correoClienteEntretenimiento,
	 					'correoEmpresa'=>$correoEmpresa);
	 $operacion = $clienteSOAP->ReservacionEntretenimiento($parametros);
	 $cadena = $operacion->return;
	 
	} catch(SoapFault $e){
	 var_dump($e);
	}

	$x=json_decode($cadena);
	//echo $cadena;

	return $x[0]->mensaje." con fecha: ".$x[0]->fecha;
}


?>