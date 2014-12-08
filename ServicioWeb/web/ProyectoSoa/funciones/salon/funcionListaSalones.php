
<?php
$cadena ="";
if(isset($_GET['fecha'])){
	$fecha = $_GET['fecha'];
	try{
	 $clienteSOAP = new SoapClient('http://localhost:8080/ServicioWebSalon/ServicioWebSalon?WSDL');
	 $parametros = array('fechaReservacionSalon' => $fecha );
	 $prueba = $clienteSOAP->ListaSalones($parametros);
	 $cadena = $prueba->return;
	 
	} catch(SoapFault $e){
	 var_dump($e);
	}
	echo '<br/>Salones: ';
	echo '<select id="salon" name="salon" onchange="showSalon(this.value)">';
	echo "<option value='0'>Ninguno</option>";
	$x=json_decode($cadena);
	for($i=0; $i<sizeof($x); $i++){
		$idSalon = $x[$i]->idSalon;
		$nombreSalon = $x[$i]->nombreSalon;
		$precioSalon = $x[$i]->precioSalon;
		$direccionSalon = $x[$i]->direccionSalon;		
			echo "<option value='".$idSalon."'>".$nombreSalon."</option>";
	}
	echo '</select>';
}


?>