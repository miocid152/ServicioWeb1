<?php

$cadena ="";
$$retorno="";
function MostrarReservacionesMenus($opcion){
	$clienteMail=$_SESSION['usermail'] ;
	/*opciones
		opcion 1= genera tabla formulario para cancelar reservacion
		opcion 2= genera tabla formulario para confirmar reservacion
		opcion 3= genera tabla formulario para mostrar servicios reservados al cliente
	*/
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
 	$retorno ="<TABLE id='table1' class='mytable' BORDER='1' width=99% align=center>";
	$retorno .="<TR align='center'>
					<th>Menú descripción</th>
					<th>Precio del menú</th>
					<th>Cliente</th>
					<th>Cantidad personas</th>
					<th>Fecha reservación</th>
					<th>Función</th>
				</TR>";
	if($opcion==1){
		for($i=0; $i<sizeof($x); $i++){
			$idMenu = $x[$i]->idMenu;
			$menuDes = $x[$i]->menuDes;
			$precioMenu = $x[$i]->precioMenu;
			$correoClienteMenu = $x[$i]->correoClienteMenu;
			$cantidadPersonas = $x[$i]->cantidadPersonas;
			$fechaReservacionMenu = $x[$i]->fechaReservacionMenu;

			$retorno .="<form method ='POST' action='cancelarReservaciones.php'>
						<TR>";
			$retorno.="<TD><input type='hidden' name=idMenu value='".$idMenu."'/>".$menuDes."</TD>";
			$retorno.="<TD>".$precioMenu."</TD>";
			$retorno.="<TD>".$correoClienteMenu."</TD>";
			$retorno.="<TD>".$cantidadPersonas."</TD>";
			$retorno.="<TD><input type='hidden' name=fechaReservacionMenu value='".$fechaReservacionMenu."'/>".$fechaReservacionMenu."</TD>";
			$retorno.="<td><input type='hidden' name='servicio' value='Menu'/>
						   <input type='submit' value='Cancelar reservación' id='nada'/></td></TR></FORM>";
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

			$retorno .="<form method ='POST' action='confirmarReservaciones.php'>
						<TR>";
			$retorno.="<TD><input type='hidden' name=idMenu value='".$idMenu."'/>".$menuDes."</TD>";
			$retorno.="<TD>".$precioMenu."</TD>";
			$retorno.="<TD>".$correoClienteMenu."</TD>";
			$retorno.="<TD>".$cantidadPersonas."</TD>";
			$retorno.="<TD><input type='hidden' name=fechaReservacionMenu value='".$fechaReservacionMenu."'/>".$fechaReservacionMenu."</TD>";
			$retorno.="<td><input type='hidden' name='servicio' value='Menu'/>
						   <input type='submit' value='Confirmar reservación' id='nada'/></td></TR></FORM>";
		}
		$retorno.="</table>";
	}

	if($opcion==3){
	 	$retorno ="<TABLE id='table2' class='mytable' BORDER='1' width=99% align=center>";
		$retorno .="<TR align='center'>
					<th>Menú descripción</th>
					<th>Precio del menú</th>
					<th>Cliente</th>
					<th>Cantidad personas</th>
					<th>Fecha reservación</th>
				</TR>";
		for($i=0; $i<sizeof($x); $i++){
			$idMenu = $x[$i]->idMenu;
			$menuDes = $x[$i]->menuDes;
			$precioMenu = $x[$i]->precioMenu;
			$correoClienteMenu = $x[$i]->correoClienteMenu;
			$cantidadPersonas = $x[$i]->cantidadPersonas;
			$fechaReservacionMenu = $x[$i]->fechaReservacionMenu;
			if($correoClienteMenu==$clienteMail){
				$retorno .="<TR>";
				$retorno.="<TD>".$menuDes."</TD>";
				$retorno.="<TD>".$precioMenu."</TD>";
				$retorno.="<TD>".$correoClienteMenu."</TD>";
				$retorno.="<TD>".$cantidadPersonas."</TD>";
				$retorno.="<TD>".$fechaReservacionMenu."</TD>";
				$retorno.="</TR>";
			}
		}
		$retorno.="</table>";
	}
	if (empty($x)) $retorno="No existen menús reservados";
	return $retorno;
}


?>