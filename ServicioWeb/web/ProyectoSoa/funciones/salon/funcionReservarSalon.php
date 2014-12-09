
<?php
$cadena ="";
//Lista Salones
function ReservarSalon($idSalon, $fecha,$correoClienteSalon){
	$correoEmpresa="tv@tv.com";
	try{
	 $clienteSOAP = new SoapClient('http://localhost:8080/ServicioWebSalon/ServicioWebSalon?WSDL');
	 $parametros =array('idSalon'=>$idSalon,
	 					'fechaReservacionSalon'=>$fecha,
	 					'correoClienteSalon'=>$correoClienteSalon,
	 					'correoEmpresa'=>$correoEmpresa);
	 $operacion = $clienteSOAP->ReservacionSalon($parametros);
	 $cadena = $operacion->return;
	 
	} catch(SoapFault $e){
	 var_dump($e);
	}

	$x=json_decode($cadena);

	return $x[0]->mensaje." con fecha: ".$x[0]->fecha;
}


?>