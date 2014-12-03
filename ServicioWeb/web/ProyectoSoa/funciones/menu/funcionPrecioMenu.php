
<?php
$cadena ="";
function PrecioMenu($idMenu){
	try{
	 $clienteSOAP = new SoapClient('http://localhost:8080/ServicioWebMenu/ServicioWebMenu?WSDL');
	 $parametros = array('idMenu' => $idMenu );
	 $prueba = $clienteSOAP->PrecioMenu($parametros);
	 $cadena = $prueba->return;
	 
	} catch(SoapFault $e){
	 var_dump($e);
	}

	return $cadena;
}


?>