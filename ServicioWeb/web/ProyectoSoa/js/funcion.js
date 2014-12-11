function showSalon(str) {
	if (str == "") {
		document.getElementById("txtSalon").innerHTML = "";
		return;
	} else { 
		if (window.XMLHttpRequest) {
		// code for IE7+, Firefox, Chrome, Opera, Safari
			xmlhttp = new XMLHttpRequest();
		} else {
			// code for IE6, IE5
			xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		}
		xmlhttp.onreadystatechange = function() {
			if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				document.getElementById("txtSalon").innerHTML = xmlhttp.responseText;

			}
		}
		xmlhttp.open("GET","funciones/obtenerDatosServicio.php?id="+str+"&servicio=Salon",true);
		xmlhttp.send();
	}
}

function showMenu(str) {
	if (str == "") {
		document.getElementById("txtMenu").innerHTML = "";
		return;
	} else { 
		if (window.XMLHttpRequest) {
		// code for IE7+, Firefox, Chrome, Opera, Safari
			xmlhttp = new XMLHttpRequest();
		} else {
			// code for IE6, IE5
			xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		}
		xmlhttp.onreadystatechange = function() {
			if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				document.getElementById("txtMenu").innerHTML = xmlhttp.responseText;
			}
		}
		xmlhttp.open("GET","funciones/obtenerDatosServicio.php?id="+str+"&servicio=Menu",true);
		xmlhttp.send();
	}
}

function showEntretenimiento(str) {
	if (str == "") {
		document.getElementById("txtEntretenimiento").innerHTML = "";
		return;
	} else { 
		if (window.XMLHttpRequest) {
		// code for IE7+, Firefox, Chrome, Opera, Safari
			xmlhttp = new XMLHttpRequest();
		} else {
			// code for IE6, IE5
			xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		}
		xmlhttp.onreadystatechange = function() {
			if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				document.getElementById("txtEntretenimiento").innerHTML = xmlhttp.responseText;
			}
		}
		xmlhttp.open("GET","funciones/obtenerDatosServicio.php?id="+str+"&servicio=Entretenimiento",true);
		xmlhttp.send();
	}
}

function myFunction() {
    if(document.getElementById("myCheck").checked==true){
    	document.getElementById("txtSubmit").innerHTML = "<b onclick='pCotizacion()' class='prueba'>Procesar Cotizacion</b>";
    }else{
    	document.getElementById("txtSubmit").innerHTML = "";
    }
}

function buscarListas(valor) {
	document.getElementById("txtMenu").innerHTML = "";
	document.getElementById("txtSalon").innerHTML = "";
	document.getElementById("txtEntretenimiento").innerHTML = "";
	document.getElementById("cotizacion").innerHTML="";
	document.getElementById("myCheck").checked=false;
	if(valor==""){
		document.getElementById("slcSalon").innerHTML = "";
		document.getElementById("slcMenu").innerHTML = "";
		document.getElementById("slcEntretenimiento").innerHTML = "";
	}else{

		if (window.XMLHttpRequest) {
			salonCon = new XMLHttpRequest();
			menuCon = new XMLHttpRequest();
			entretenimientoCon = new XMLHttpRequest();
		} else {
			salonCon = new ActiveXObject("Microsoft.XMLHTTP");
			menuCon = new ActiveXObject("Microsoft.XMLHTTP");
			entretenimientoCon = new ActiveXObject("Microsoft.XMLHTTP");
		}
		salonCon.onreadystatechange = function() {
			if (salonCon.readyState == 4 && salonCon.status == 200) {
				document.getElementById("slcSalon").innerHTML = salonCon.responseText;
			}
		}
		menuCon.onreadystatechange = function() {
			if (menuCon.readyState == 4 && menuCon.status == 200) {
				document.getElementById("slcMenu").innerHTML = menuCon.responseText;
			}
		}
		entretenimientoCon.onreadystatechange = function() {
			if (entretenimientoCon.readyState == 4 && entretenimientoCon.status == 200) {
				document.getElementById("slcEntretenimiento").innerHTML = entretenimientoCon.responseText;
			}
		}

		salonCon.open("GET","funciones/salon/funcionListaSalones.php?fecha="+valor,true);
		salonCon.send();
		menuCon.open("GET","funciones/menu/funcionListaMenus.php?fecha="+valor,true);
		menuCon.send();
		entretenimientoCon.open("GET","funciones/entretenimiento/funcionListaEntretenimientos.php?fecha="+valor,true);
		entretenimientoCon.send();
        document.getElementById("myCheck").disabled=false;
        if(document.getElementById("salon")){document.getElementById("salon").disabled=false;}
		if(document.getElementById("menu")){document.getElementById("menu").disabled=false;}
		if(document.getElementById("entretenimiento")){document.getElementById("entretenimiento").disabled=false;}
    }
}

function pCotizacion(){
	document.getElementById("myCheck").disabled=true;
	document.getElementById("salon").disabled=true;
	document.getElementById("menu").disabled=true;
	document.getElementById("entretenimiento").disabled=true;
	document.getElementById("txtSubmit").innerHTML ="";
	var totalCotizacion =parseFloat(0.0);
	var mensaje="";
	if(document.getElementById("precioSalon")){var precioSalon= document.getElementById("precioSalon").value;  totalCotizacion +=parseFloat(precioSalon);}
	if(document.getElementById("precioMenu")) {var precioMenu= document.getElementById("precioMenu").value;  totalCotizacion +=parseFloat(precioMenu);}
	if(document.getElementById("precioEntretenimiento")){var precioEntretenimiento= document.getElementById("precioEntretenimiento").value;  totalCotizacion +=parseFloat(precioEntretenimiento);}
	if(totalCotizacion==0){var mensaje = "No ha seleccionado nada";}
	else{
		var mensaje = "<br/><h2>Precio Total: "+totalCotizacion+"</h2><br/><p>Si esta conforme con el precio de los servicios y desea reservarlos continuar y oprimir  Reservar Servicios</p>	<input type='submit' value='Reservar Servicios'>";
	}
	document.getElementById("cotizacion").innerHTML = mensaje;
}

/*
function cargarSelect2(valor) {
    if(valor==0) {
        document.getElementById("select2").disabled=true;
    }else{
        document.getElementById("select2").options.length=0;									// eliminamos todos los posibles valores que contenga el select2
        document.getElementById("select2").options[0]=new Option("Seleccionar Salon", "0"); 	// añadimos los nuevos valores al select2

        document.getElementById("select2").disabled=false;
    }
}
*/