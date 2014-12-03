
<?php
$cadena ="";
function PrecioEntretenimiento($idEntretenimiento){
	try{
	 $clienteSOAP = new SoapClient('http://localhost:8080/ServicioWebEntretenimiento/ServicioWebEntretenimiento?WSDL');
	 $parametros = array('idEntretenimiento' => $idEntretenimiento );
	 $prueba = $clienteSOAP->PrecioEntretenimiento($parametros);
	 $cadena = $prueba->return;
	 
	} catch(SoapFault $e){
	 var_dump($e);
	}

	return $cadena;
}


?>