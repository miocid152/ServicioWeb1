<?php
include 'salon/funcionGetSalon.php';
include 'menu/funcionGetMenu.php';
include 'entretenimiento/funcionGetEntretenimiento.php';
$x="";
$cadena="";
if(isset($_GET['servicio'])){
	$id = intval($_GET['id']);
	$servicio = $_GET['servicio'];
	if($servicio=="Salon"){
		if($id!=0){
			$x=json_decode(GetSalon($id));
			$cadena.="Nombre Salon: ".$x->nombreSalon;
			$cadena.="<br/>Precio: ".$precio=$x->precioSalon;
			$cadena.="<br/>Direccion: ".$x->direccionSalon;
		}
		else $cadena.="";
	}
	if($servicio=="Menu"){
		if($id!=0){
			$x=json_decode(GetMenu($id));
			$cadena.="Descripcion del Menu: ".$x->menuDes;
			$cadena.="<br/>Nombre de la compañia: ".$x->nombreCompaniaMenu;
			$cadena.="<br/>Precio: ".$precio=$x->precioMenu;
			$cadena.="<br/>Cantidad de Personas: ".$x->cantidadPersonas;
		}
		else $cadena.="";
	}
	if($servicio=="Entretenimiento"){
		if($id!=0){
			$x=json_decode(GetEntretenimiento($id));
			$cadena.="Tipo de Entretenimiento: ".$x->tipoEntretenimiento;
			$cadena.="<br/>Nombre de la compañia: ".$x->nombreCompaniaEntretenimiento;
			$cadena.="<br/>Precio: ".$precio=$x->precioEntretenimiento;
			$cadena.="<br/>Horas de Entretenimiento: ".$x->horasEntretenimiento;
		}
		else $cadena.="";
	}
	echo $cadena;
	if($id!=0){
		echo "<input id='precio".$servicio."' type='hidden' name='precio".$servicio."' value='".$precio."'/>";
		echo "<input id='id".$servicio."' type='hidden' name='id".$servicio."' value='".$id."'/>";
	}
}

?>