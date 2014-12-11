<?php
$clienteMail=$_SESSION['usermail'] ;
$cadena ="";
$retorno="";
function MostrarReservacionesEntretenimientos($opcion){
	$clienteMail=$_SESSION['usermail'] ;
	/*opciones
		opcion 1= genera tabla formulario para cancelar reservacion
		opcion 2= genera tabla formulario para confirmar reservacion
		opcion 3= genera tabla formulario para mostrar servicios reservados al cliente
	*/
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
 	$retorno ="<TABLE class='mytable' BORDER='1' width=99% align=center>";
	$retorno .="<TR align='center'>
					<th>Nombre de la Compañia</th>
					<th>Precio del Entretenimiento</th>
					<th>Cliente</th>
					<th>Tipo de Entretenimiento</th>
					<th>Fecha Reservacion</th>
					<th>Funcion</th>
				</TR>";
	if($opcion==1){
		for($i=0; $i<sizeof($x); $i++){
			$idEntretenimiento = $x[$i]->idEntretenimiento;
			$nombreCompaniaEntretenimiento = $x[$i]->nombreCompaniaEntretenimiento;
			$precioEntretenimiento = $x[$i]->precioEntretenimiento;
			$correoClienteEntretenimiento = $x[$i]->correoClienteEntretenimiento;
			$tipoEntretenimiento = $x[$i]->tipoEntretenimiento;
			$fechaReservacionEntretenimiento = $x[$i]->fechaReservacionEntretenimiento;

			$retorno .="<form method ='POST' action='cancelarReservaciones.php'>
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

			$retorno .="<form method ='POST' action='confirmarReservaciones.php'>
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


	if($opcion==3){
		$retorno ="<TABLE id='table3' class='mytable' BORDER='1' width=99% align=center>";
		$retorno .="<TR align='center'>
					<th>Nombre de la Compañia</th>
					<th>Precio del Entretenimiento</th>
					<th>Cliente</th>
					<th>Tipo de Entretenimiento</th>
					<th>Fecha Reservacion</th>
				</TR>";
		for($i=0; $i<sizeof($x); $i++){
			$idEntretenimiento = $x[$i]->idEntretenimiento;
			$nombreCompaniaEntretenimiento = $x[$i]->nombreCompaniaEntretenimiento;
			$precioEntretenimiento = $x[$i]->precioEntretenimiento;
			$correoClienteEntretenimiento = $x[$i]->correoClienteEntretenimiento;
			$tipoEntretenimiento = $x[$i]->tipoEntretenimiento;
			$fechaReservacionEntretenimiento = $x[$i]->fechaReservacionEntretenimiento;
			if($correoClienteEntretenimiento==$clienteMail){// <--- Correo a editar con session
				$retorno .="<TR>";
				$retorno.="<TD>".$nombreCompaniaEntretenimiento."</TD>";
				$retorno.="<TD>".$precioEntretenimiento."</TD>";
				$retorno.="<TD>".$correoClienteEntretenimiento."</TD>";
				$retorno.="<TD>".$tipoEntretenimiento."</TD>";
				$retorno.="<TD>".$fechaReservacionEntretenimiento."</TD>";
				$retorno.="</TR>";
			}
		}
		$retorno.="</table>";
	}

	if (empty($x)) $retorno="No existen Entretenimientos Reservados";
	return $retorno;
}


?>