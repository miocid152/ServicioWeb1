
<?php
$cadena ="";

function ConfirmarSalon($idMenu, $fecha){
	try{
	 $clienteSOAP = new SoapClient('http://localhost:8080/ServicioWebMenu/ServicioWebMenu?WSDL');
	 $parametros =array('idMenu'=>$idMenu,
	 					'fechaReservacionMenu'=>$fecha);
	 $operacion = $clienteSOAP->ConfirmarReservacionMenu($parametros);
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