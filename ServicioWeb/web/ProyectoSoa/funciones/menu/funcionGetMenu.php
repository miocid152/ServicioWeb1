<?php
/*
$x=json_decode(GetMenu(1));
		$idMenu = $x->idMenu;
		$menuDes = $x->menuDes;
		$nombreCompaniaMenu = $x->nombreCompaniaMenu;
		$precioMenu = $x->precioMenu;
		$cantidadPersonas = $x->cantidadPersonas;
		echo "ID Menu: ". $idMenu.
		"<br>Nombre de la compañia: ".$nombreCompaniaMenu.
		"<br>Precio del Menu ".$precioMenu.
		"<br>Descripcion".$menuDes.
		"<br>Cantidad de personas".$cantidadPersonas;
		echo "<br><br><br>";
*/
$cadena ="";
function GetMenu($idMenu){
	try{
	 $clienteSOAP = new SoapClient('http://localhost:8080/ServicioWebMenu/ServicioWebMenu?WSDL');
	 $parametros = array('idMenu' => $idMenu );
	 $prueba = $clienteSOAP->GetMenu($parametros);
	 $cadena = $prueba->return;
	 
	} catch(SoapFault $e){
	 var_dump($e);
	}

	return $cadena;
}


?>