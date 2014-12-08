
<?php
$cadena ="";
function CancelarMenu($idMenu, $fecha){
	try{
	 $clienteSOAP = new SoapClient('http://localhost:8080/ServicioWebMenu/ServicioWebMenu?WSDL');
	 $parametros =array('idMenu'=>$idMenu,
	 					'fechaReservacionMenu'=>$fecha);
	 $operacion = $clienteSOAP->CancelarReservacionMenu($parametros);
	 $cadena = $operacion->return;
	 
	} catch(SoapFault $e){
	 var_dump($e);
	}

	$x=json_decode($cadena);
	return $x[0]->mensaje;
}


?>