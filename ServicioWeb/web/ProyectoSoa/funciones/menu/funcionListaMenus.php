
<?php
$cadena ="";
//Lista Salones
function ListaMenus($fecha){
	try{
	 $clienteSOAP = new SoapClient('http://localhost:8080/ServicioWebMenu/ServicioWebMenu?WSDL');
	 $parametros = array('fechaReservacionMenu' => $fecha );
	 $operaciones = $clienteSOAP->ListaMenu($parametros);
	 $cadena = $operaciones->return;
	 
	} catch(SoapFault $e){
	 var_dump($e);
	}

	$x=json_decode($cadena);

	for($i=0; $i<sizeof($x); $i++){
		$idMenu = $x[$i]->idMenu;
		$menuDes = $x[$i]->menuDes;
		$nombreCompaniaMenu = $x[$i]->nombreCompaniaMenu;
		$precioMenu = $x[$i]->precioMenu;
		$cantidadPersonas = $x[$i]->cantidadPersonas;
		echo "ID Menu: ". $idMenu.
		"<br>Nombre de la compañia: ".$nombreCompaniaMenu.
		"<br>Precio del Menu ".$precioMenu.
		"<br>Descripcion".$menuDes.
		"<br>Cantidad de personas".$cantidadPersonas;
		echo "<br><br><br>";

	}
}


?>