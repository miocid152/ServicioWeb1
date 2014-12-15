
<?php
$cadena ="";
if(isset($_GET['fecha'])){
	$fecha = $_GET['fecha'];
	try{
	 $clienteSOAP = new SoapClient('http://localhost:8080/ServicioWebMenu/ServicioWebMenu?WSDL');
	 $parametros = array('fechaReservacionMenu' => $fecha );
	 $operaciones = $clienteSOAP->ListaMenu($parametros);
	 $cadena = $operaciones->return;
	 
	} catch(SoapFault $e){
	 var_dump($e);
	}
	echo '<br/>Menús: ';
	echo '<select id="menu" name="menu" onchange="showMenu(this.value)">';
	echo "<option value='0'>Ninguno</option>";
	$x=json_decode($cadena);

	for($i=0; $i<sizeof($x); $i++){
		$idMenu = $x[$i]->idMenu;
		$menuDes = $x[$i]->menuDes;
		$nombreCompaniaMenu = $x[$i]->nombreCompaniaMenu;
		$precioMenu = $x[$i]->precioMenu;
		$cantidadPersonas = $x[$i]->cantidadPersonas;
		echo "<option value='".$idMenu."'>".$nombreCompaniaMenu."</option>";
	}
		echo '</select>';
}


?>