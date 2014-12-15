
<?php
$cadena ="";
function ReservarMenu($idMenu,$fecha,$correoClienteMenu){
	$correoEmpresa="tv@tv.com";
	try{
	 $clienteSOAP = new SoapClient('http://localhost:8080/ServicioWebMenu/ServicioWebMenu?WSDL');
	 $parametros =array('idMenu'=>$idMenu,
	 					'fechaReservacionMenu'=>$fecha,
	 					'correoClienteMenu'=>$correoClienteMenu,
	 					'correoEmpresa'=>$correoEmpresa);
	 $operacion = $clienteSOAP->ReservacionMenu($parametros);
	 $cadena = $operacion->return;
	 
	} catch(SoapFault $e){
	 var_dump($e);
	}

	$x=json_decode($cadena);

	return $x[0]->mensaje." con fecha: ".$x[0]->fecha;
}


?>