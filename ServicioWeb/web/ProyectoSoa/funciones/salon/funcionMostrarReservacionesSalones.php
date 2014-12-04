
<?php
$cadena ="";
$retorno="";
//Lista Salones
function MostrarReservacionesSalones($fecha,$opcion){
	
	try{
		 $clienteSOAP = new SoapClient('http://localhost:8080/ServicioWebSalon/ServicioWebSalon?WSDL');
		 $correoEmpresa="tv@tv.com";
		 $parametros = array('fechaReservacionSalon' => $fecha,
		  					 'correoEmpresa' => $correoEmpresa);
		 $prueba = $clienteSOAP->MostrarReservacionesSalones($parametros);
		 $cadena = $prueba->return;
		 
	} catch(SoapFault $e){
		 var_dump($e);
	}

	$x=json_decode($cadena);
	if($opcion==1){
		for($i=0; $i<sizeof($x); $i++){
			$idSalon = $x[$i]->idSalon;
			$nombreSalon = $x[$i]->nombreSalon;
			$precioSalon = $x[$i]->precioSalon;
			$correoClienteSalon = $x[$i]->correoClienteSalon;
			$direccionSalon = $x[$i]->direccionSalon;
			$retorno="<br/>Salon Reservado: ".$nombreSalon.
			"<br/>Precio $".$precioSalon.
			"<br/>Direccion: ".$direccionSalon;
		}
		if (empty($x)) $retorno="Fecha No encontrada en salones";
			return $retorno;
	}else{
		for($i=0; $i<sizeof($x); $i++){
			$idSalon = $x[$i]->idSalon;
			return $idSalon;
		}
	}
}



?>