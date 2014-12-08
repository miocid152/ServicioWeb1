
<?php
$cadena ="";
if(isset($_GET['fecha'])){
	$fecha = $_GET['fecha'];
	try{
	 $clienteSOAP = new SoapClient('http://localhost:8080/ServicioWebEntretenimiento/ServicioWebEntretenimiento?WSDL');
	 $parametros = array('fechaReservacionEntretenimiento' => $fecha );
	 $operaciones = $clienteSOAP->ListaEntretenimiento($parametros);
	 $cadena = $operaciones->return;
	 
	} catch(SoapFault $e){
	 var_dump($e);
	}
	echo '<br/>Entretenimiento: ';
	echo '<select id="entretenimiento" name="entretenimiento" onchange="showEntretenimiento(this.value)">';
	echo "<option value='0'>Ninguno</option>";
	$x=json_decode($cadena);

	for($i=0; $i<sizeof($x); $i++){
		$idEntretenimiento = $x[$i]->idEntretenimiento;
		$tipoEntretenimiento = $x[$i]->tipoEntretenimiento;
		$nombreCompaniaEntretenimiento = $x[$i]->nombreCompaniaEntretenimiento;
		$horasEntretenimiento = $x[$i]->horasEntretenimiento;
		$precioEntretenimiento = $x[$i]->precioEntretenimiento;
		echo "<option value='".$idEntretenimiento."'>".$nombreCompaniaEntretenimiento."</option>";
	}
	echo '</select>';
}


?>