<?php
$cadena ="";
$retorno="";

function MostrarReservacionesSalones($opcion){
	$clienteMail=$_SESSION['usermail'] ;
	/*opciones
		opcion 1= genera tabla formulario para cancelar reservacion
		opcion 2= genera tabla formulario para confirmar reservacion
		opcion 3= genera tabla formulario para mostrar servicios reservados al cliente
	*/
	
	try{
		 $clienteSOAP = new SoapClient('http://localhost:8080/ServicioWebSalon/ServicioWebSalon?WSDL');
		 $correoEmpresa="tv@tv.com";
		 $parametros = array('correoEmpresa' => $correoEmpresa);
		 $prueba = $clienteSOAP->MostrarReservacionesSalones($parametros);
		 $cadena = $prueba->return;
		 
	} catch(SoapFault $e){
		 var_dump($e);
	}

	$x=json_decode($cadena);
 	$retorno ="<TABLE id='table1' class='mytable' BORDER='1' width=99% align=center>";
	$retorno .="<TR align=center>
						<th>Nombre salón</th>
						<th>Precio del salón</th>
						<th>Cliente</th>
						<th>Dirección salón</th>
						<th>Fecha reservación</th>
						<th>Función</th>
					</TR>";
	if($opcion==1){
		for($i=0; $i<sizeof($x); $i++){
			$idSalon = $x[$i]->idSalon;
			$fechaReservacionSalon = $x[$i]->fechaReservacionSalon;
			$nombreSalon = $x[$i]->nombreSalon;
			$precioSalon = $x[$i]->precioSalon;
			$correoClienteSalon = $x[$i]->correoClienteSalon;
			$direccionSalon = $x[$i]->direccionSalon;
			$retorno .="<form method ='POST' action='cancelarReservaciones.php'>
						<TR>";
			$retorno.="<TD><input type='hidden' name='idSalon' value='".$idSalon."'/>".$nombreSalon."</TD>";
			$retorno.="<TD>".$precioSalon."</TD>";
			$retorno.="<TD>".$correoClienteSalon."</TD>";
			$retorno.="<TD>".$direccionSalon."</TD>";
			$retorno.="<TD><input type='hidden' name='fechaReservacionSalon' value='".$fechaReservacionSalon."'/>".$fechaReservacionSalon."</TD>";
			$retorno.="<td><input type='hidden' name='servicio' value='salon'/>
						   <input type='submit' value='Cancelar reservación' id='nada'/></td></TR></FORM>";
		}
		$retorno.="</table>";
	}
	if($opcion==2){
		for($i=0; $i<sizeof($x); $i++){
			$idSalon = $x[$i]->idSalon;
			$fechaReservacionSalon = $x[$i]->fechaReservacionSalon;
			$nombreSalon = $x[$i]->nombreSalon;
			$precioSalon = $x[$i]->precioSalon;
			$correoClienteSalon = $x[$i]->correoClienteSalon;
			$direccionSalon = $x[$i]->direccionSalon;
			$retorno .="<form method ='POST' action='confirmarReservaciones.php'>
						<TR>";
			$retorno.="<TD><input type='hidden' name='idSalon' value='".$idSalon."'/>".$nombreSalon."</TD>";
			$retorno.="<TD>".$precioSalon."</TD>";
			$retorno.="<TD>".$correoClienteSalon."</TD>";
			$retorno.="<TD>".$direccionSalon."</TD>";
			$retorno.="<TD><input type='hidden' name='fechaReservacionSalon' value='".$fechaReservacionSalon."'/>".$fechaReservacionSalon."</TD>";
			$retorno.="<td><input type='hidden' name='servicio' value='salon'/>
						   <input type='submit' value='Confirmar reservación' id='nada'/></td></TR></FORM>";
		}
		$retorno.="</table>";
	}
	
	if($opcion==3){
		 	$retorno ="<TABLE id='table1' class='mytable' BORDER='1' width=99% align=center>";
			$retorno .="<TR align=center>
						<th>Nombre salón</th>
						<th>Precio del salón</th>
						<th>Cliente</th>
						<th>Dirección salón</th>
						<th>Fecha reservación</th>
					</TR>";
		for($i=0; $i<sizeof($x); $i++){
			$idSalon = $x[$i]->idSalon;
			$fechaReservacionSalon = $x[$i]->fechaReservacionSalon;
			$nombreSalon = $x[$i]->nombreSalon;
			$precioSalon = $x[$i]->precioSalon;
			$correoClienteSalon = $x[$i]->correoClienteSalon;
			$direccionSalon = $x[$i]->direccionSalon;
			if($correoClienteSalon==$clienteMail){
				$retorno .="<TR>";
				$retorno.="<TD>".$nombreSalon."</TD>";
				$retorno.="<TD>".$precioSalon."</TD>";
				$retorno.="<TD>".$correoClienteSalon."</TD>";
				$retorno.="<TD>".$direccionSalon."</TD>";
				$retorno.="<TD>".$fechaReservacionSalon."</TD>";
				$retorno.="</TR>";
			}
		}
		$retorno.="</table>";
	}
	if (empty($x)) $retorno="No existen salones reservados";
	return $retorno;
}



?>