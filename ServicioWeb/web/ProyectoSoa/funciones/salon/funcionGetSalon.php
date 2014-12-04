
<?php
/*
Estructura
$x=json_decode(GetSalon(2));
$idSalon = $x->idSalon;
$nombreSalon = $x->nombreSalon;
$precioSalon = $x->precioSalon;
$direccionSalon = $x->direccionSalon;
echo "ID Salon: ". $idSalon."<br>Nombre del Salon: ".$nombreSalon."<br>Precio ".$precioSalon."<br>Direccion".$direccionSalon;
*/
$cadena ="";
function GetSalon($idSalon){
	try{
	 $clienteSOAP = new SoapClient('http://localhost:8080/ServicioWebSalon/ServicioWebSalon?WSDL');
	 $parametros = array('idSalon' => $idSalon );
	 $prueba = $clienteSOAP->GetSalon($parametros);
	 $cadena = $prueba->return;
	 
	} catch(SoapFault $e){
	 var_dump($e);
	}
	return $cadena;
}
?>