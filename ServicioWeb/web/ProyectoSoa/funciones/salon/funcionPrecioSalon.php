
<?php
$cadena ="";
//Lista Salones
function PrecioSalon($idSalon){
	try{
	 $clienteSOAP = new SoapClient('http://localhost:8080/ServicioWebSalon/ServicioWebSalon?WSDL');
	 $parametros = array('idSalon' => $idSalon );
	 $prueba = $clienteSOAP->PrecioSalon($parametros);
	 $cadena = $prueba->return;
	 
	} catch(SoapFault $e){
	 var_dump($e);
	}

	return $cadena;
}


?>