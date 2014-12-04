
<?php
$cadena ="";
$retorno="";
function MostrarReservacionesEntretenimientos($fecha,$opcion){
	try{
	 $clienteSOAP = new SoapClient('http://localhost:8080/ServicioWebEntretenimiento/ServicioWebEntretenimiento?WSDL');
	 $correoEmpresa="tv@tv.com";
	 $parametros = array('fechaReservacionEntretenimiento' => $fecha,
	  					 'correoEmpresa' => $correoEmpresa);
	 $prueba = $clienteSOAP->MostrarReservacionesEntretenimiento($parametros);
	 $cadena = $prueba->return;
	 
	} catch(SoapFault $e){
	 var_dump($e);
	}

	$x=json_decode($cadena);
	if($opcion==1){
		for($i=0; $i<sizeof($x); $i++){
			$idEntretenimiento = $x[$i]->idEntretenimiento;
			$nombreCompaniaEntretenimiento = $x[$i]->nombreCompaniaEntretenimiento;
			$precioEntretenimiento = $x[$i]->precioEntretenimiento;
			$correoClienteEntretenimiento = $x[$i]->correoClienteEntretenimiento;
			$tipoEntretenimiento = $x[$i]->tipoEntretenimiento;
			$retorno="<br/>Entretenimiento Reservado: ".$nombreCompaniaEntretenimiento.
			"<br/>Precio $".$precioEntretenimiento.
			"<br/>Tipo: ".$tipoEntretenimiento;
		}
		if (empty($x)) $retorno="Fecha no encontrada en Entretenimiento";
		return $retorno;
	}else{
		for($i=0; $i<sizeof($x); $i++){
			$idEntretenimiento = $x[$i]->idEntretenimiento;
			return $idEntretenimiento;
		}
	}
}


?>