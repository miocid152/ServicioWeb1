
<?php
$cadena ="";
$$retorno="";
function MostrarReservacionesMenus($fecha,$opcion){
	try{
	 $clienteSOAP = new SoapClient('http://localhost:8080/ServicioWebMenu/ServicioWebMenu?WSDL');
	 $correoEmpresa="tv@tv.com";
	 $parametros = array('fechaReservacionMenu' => $fecha,
	  					 'correoEmpresa' => $correoEmpresa);
	 $prueba = $clienteSOAP->MostrarReservacionesMenu($parametros);
	 $cadena = $prueba->return;
	 
	} catch(SoapFault $e){
	 var_dump($e);
	}

	$x=json_decode($cadena);
	if($opcion==1){
		for($i=0; $i<sizeof($x); $i++){
			$idMenu = $x[$i]->idMenu;
			$menuDes = $x[$i]->menuDes;
			$precioMenu = $x[$i]->precioMenu;
			$correoClienteMenu = $x[$i]->correoClienteMenu;
			$cantidadPersonas = $x[$i]->cantidadPersonas;
			$retorno= "Menu Reservado:  ".$menuDes.
			"<br/>Precio $".$precioMenu.
			"<br/>Cantidad Peronas: ".$cantidadPersonas;

		}
		if (empty($x)) $retorno="Fecha no encontrada en Menu";
		return $retorno;
	}else{
		for($i=0; $i<sizeof($x); $i++){
			$idMenu = $x[$i]->idMenu;
			return $idMenu;
		}
	}
}


?>