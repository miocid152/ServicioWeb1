
<?php
$cadena ="";
$$retorno="";
function MostrarReservacionesMenus($opcion){
	try{
	 $clienteSOAP = new SoapClient('http://localhost:8080/ServicioWebMenu/ServicioWebMenu?WSDL');
	 $correoEmpresa="tv@tv.com";
	 $parametros = array('correoEmpresa' => $correoEmpresa);
	 $prueba = $clienteSOAP->MostrarReservacionesMenu($parametros);
	 $cadena = $prueba->return;
	 
	} catch(SoapFault $e){
	 var_dump($e);
	}

	$x=json_decode($cadena);
 	$retorno ="<TABLE BORDER='1' width=99% align=center>";
	$retorno .="<TR align='center'>
					<td>Menu Descripcion</td>
					<td>Precio del Menu</td>
					<td>Cliente</td>
					<td>Cantidad Personas</td>
					<td>Fecha Reservacion</td>
					<td>Funcion</td>
				</TR>";
	if($opcion==1){
		for($i=0; $i<sizeof($x); $i++){
			$idMenu = $x[$i]->idMenu;
			$menuDes = $x[$i]->menuDes;
			$precioMenu = $x[$i]->precioMenu;
			$correoClienteMenu = $x[$i]->correoClienteMenu;
			$cantidadPersonas = $x[$i]->cantidadPersonas;
			$fechaReservacionMenu = $x[$i]->fechaReservacionMenu;

			$retorno .="<form method ='GET' action='cancelarReservaciones.php'>
						<TR>";
			$retorno.="<TD><input type='hidden' name=idMenu value='".$idMenu."'/>".$menuDes."</TD>";
			$retorno.="<TD>".$precioMenu."</TD>";
			$retorno.="<TD>".$correoClienteMenu."</TD>";
			$retorno.="<TD>".$cantidadPersonas."</TD>";
			$retorno.="<TD><input type='hidden' name=fechaReservacionMenu value='".$fechaReservacionMenu."'/>".$fechaReservacionMenu."</TD>";
			$retorno.="<td><input type='hidden' name='servicio' value='Menu'/>
						   <input type='submit' value='Cancelar Reservacion' id='nada'/></td></TR></FORM>";
		}
		$retorno.="</table>";
	}
	if($opcion==2){
		for($i=0; $i<sizeof($x); $i++){
			$idMenu = $x[$i]->idMenu;
			$menuDes = $x[$i]->menuDes;
			$precioMenu = $x[$i]->precioMenu;
			$correoClienteMenu = $x[$i]->correoClienteMenu;
			$cantidadPersonas = $x[$i]->cantidadPersonas;
			$fechaReservacionMenu = $x[$i]->fechaReservacionMenu;

			$retorno .="<form method ='GET' action='confirmarReservaciones.php'>
						<TR>";
			$retorno.="<TD><input type='hidden' name=idMenu value='".$idMenu."'/>".$menuDes."</TD>";
			$retorno.="<TD>".$precioMenu."</TD>";
			$retorno.="<TD>".$correoClienteMenu."</TD>";
			$retorno.="<TD>".$cantidadPersonas."</TD>";
			$retorno.="<TD><input type='hidden' name=fechaReservacionMenu value='".$fechaReservacionMenu."'/>".$fechaReservacionMenu."</TD>";
			$retorno.="<td><input type='hidden' name='servicio' value='Menu'/>
						   <input type='submit' value='Confirmar Reservacion' id='nada'/></td></TR></FORM>";
		}
		$retorno.="</table>";
	}
	if (empty($x)) $retorno="No existen Menus Reservados";
	return $retorno;
}


?>