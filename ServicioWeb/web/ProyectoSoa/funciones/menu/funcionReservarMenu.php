
<?php
$cadena ="";
//Lista Salones
function ReservarMenu($idMenu,$fecha,$correoClienteMenu){
	try{
	 $clienteSOAP = new SoapClient('http://localhost:8080/ServicioWebMenu/ServicioWebMenu?WSDL');
	 $parametros =array('idMenu'=>$idMenu,
	 					'fechaReservacionMenu'=>$fecha,
	 					'correoClienteMenu'=>$correoClienteMenu);
	 $operacion = $clienteSOAP->ReservacionMenu($parametros);
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