
<?php
$cadena ="";
$retorno="";
function MostrarReservacionesEntretenimientos($opcion){
	try{
	 $clienteSOAP = new SoapClient('http://localhost:8080/ServicioWebEntretenimiento/ServicioWebEntretenimiento?WSDL');
	 $correoEmpresa="tv@tv.com";
	 $parametros = array('correoEmpresa' => $correoEmpresa);
	 $prueba = $clienteSOAP->MostrarReservacionesEntretenimiento($parametros);
	 $cadena = $prueba->return;
	 
	} catch(SoapFault $e){
	 var_dump($e);
	}

	$x=json_decode($cadena);
 	$retorno ="<TABLE BORDER='1' width=99% align=center>";
	$retorno .="<TR align='center'>
					<td>Nombre de la Compañia</td>
					<td>Precio del Entretenimiento</td>
					<td>Cliente</td>
					<td>Tipo de Entretenimiento</td>
					<td>Fecha Reservacion</td>
					<td>Funcion</td>
				</TR>";
	if($opcion==1){
		for($i=0; $i<sizeof($x); $i++){
			$idEntretenimiento = $x[$i]->idEntretenimiento;
			$nombreCompaniaEntretenimiento = $x[$i]->nombreCompaniaEntretenimiento;
			$precioEntretenimiento = $x[$i]->precioEntretenimiento;
			$correoClienteEntretenimiento = $x[$i]->correoClienteEntretenimiento;
			$tipoEntretenimiento = $x[$i]->tipoEntretenimiento;
			$fechaReservacionEntretenimiento = $x[$i]->fechaReservacionEntretenimiento;

			$retorno .="<form method ='GET' action='cancelarReservaciones.php'>
						<TR>";
			$retorno.="<TD><input type='hidden' name=idEntretenimiento value='".$idEntretenimiento."'/>".$nombreCompaniaEntretenimiento."</TD>";
			$retorno.="<TD>".$precioEntretenimiento."</TD>";
			$retorno.="<TD>".$correoClienteEntretenimiento."</TD>";
			$retorno.="<TD>".$tipoEntretenimiento."</TD>";
			$retorno.="<TD><input type='hidden' name=fechaReservacionEntretenimiento value='".$fechaReservacionEntretenimiento."'/>".$fechaReservacionEntretenimiento."</TD>";
			$retorno.="<td><input type='hidden' name='servicio' value='Entretenimiento'/>
						   <input type='submit' value='Cancelar Reservacion' id='nada'/></td></TR></FORM>";

		}
		$retorno.="</table>";
	}
	if($opcion==2){
		for($i=0; $i<sizeof($x); $i++){
			$idEntretenimiento = $x[$i]->idEntretenimiento;
			$nombreCompaniaEntretenimiento = $x[$i]->nombreCompaniaEntretenimiento;
			$precioEntretenimiento = $x[$i]->precioEntretenimiento;
			$correoClienteEntretenimiento = $x[$i]->correoClienteEntretenimiento;
			$tipoEntretenimiento = $x[$i]->tipoEntretenimiento;
			$fechaReservacionEntretenimiento = $x[$i]->fechaReservacionEntretenimiento;

			$retorno .="<form method ='GET' action='confirmarReservaciones.php'>
						<TR>";
			$retorno.="<TD><input type='hidden' name=idEntretenimiento value='".$idEntretenimiento."'/>".$nombreCompaniaEntretenimiento."</TD>";
			$retorno.="<TD>".$precioEntretenimiento."</TD>";
			$retorno.="<TD>".$correoClienteEntretenimiento."</TD>";
			$retorno.="<TD>".$tipoEntretenimiento."</TD>";
			$retorno.="<TD><input type='hidden' name=fechaReservacionEntretenimiento value='".$fechaReservacionEntretenimiento."'/>".$fechaReservacionEntretenimiento."</TD>";
			$retorno.="<td><input type='hidden' name='servicio' value='Entretenimiento'/>
						   <input type='submit' value='Confirmar Reservacion' id='nada'/></td></TR></FORM>";
		}
		$retorno.="</table>";
	}
	if (empty($x)) $retorno="No existen Entretenimientos Reservados";
	return $retorno;
}


?>