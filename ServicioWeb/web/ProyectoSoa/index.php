<?php
	session_start();
	if(isset($_SESSION['tipoUsuario']) ) {
		if($_SESSION['tipoUsuario']==0) Header("Location: cliente.php");
		if($_SESSION['tipoUsuario']==1) Header("Location: admin/index.php");
	}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Servicios de eventos EFI</title>
		<meta charset="utf-8">
		<link rel="stylesheet" href="css/reset.css" type="text/css" media="all">
		<link rel="stylesheet" href="css/layout.css" type="text/css" media="all">
		<link rel="stylesheet" href="css/style.css" type="text/css" media="all">
		<script type="text/javascript" src="js/jquery-1.6.js" ></script>
		<script type="text/javascript" src="js/cufon-yui.js"></script>
		<script type="text/javascript" src="js/cufon-replace.js"></script>  
		<script type="text/javascript" src="js/Vegur_300.font.js"></script>
		<script type="text/javascript" src="js/PT_Sans_700.font.js"></script>
		<script type="text/javascript" src="js/PT_Sans_400.font.js"></script>
		<script type="text/javascript" src="js/tms-0.3.js"></script>
		<script type="text/javascript" src="js/tms_presets.js"></script> 
	</head>
	<body id="page1">
		<div class="main">
<!--header -->
			<header style="margin-top: 0px; height: 590px;">
				<nav>
					<ul id="menu">
						<li class="active"><a href="index.php"><span>Inicio</span></a></li>						
						<li><a href="registrar.php"><span>Registrate</span></a></li>
						<li><a href="login.php"><span>Login</span></a></li>
					</ul>
				</nav>
				<div id="slider" style="overflow: hidden;top: 130px;">
					<ul class="items">
						<li>
							<img src="images/slide1.jpg" alt="">
							<div class="banner">
								<span class="title"><span class="color1">Somos proveedores de soluciones.</span>
								
								<a href="registrar.php" class="button1">Registrate</a>
							</div>
						</li>
					</ul>
				</div>
			</header>
<!--header end-->
<!--content -->
			<article id="content">
				<div class="wrapper">
					<div class="col1 marg_right1">
						<h2>Eventos sociales</h2>
						<p>Ofrecemos todos los servivios para la organización de un evento de calidad, esto incluye
						reservación de salón, comida y entretenimiento.</p>
					</div>
					<div class="col1 marg_right1">
						<h2>Afiliate</h2>
						<p>Si eres proveedor de servivios puedes contactarnos para adquirir una membresía y publicar tu servicio. No esperes más esta es una gran oportunidad
						para anunciarte.</p>
					</div>
					<div class="col1 marg_right1">
						<h2>Calidad</h2>
						<p>
						Solo ofrecemos servicios de calidad para que ese momento especial sea memorable. Nadie más te ofrece un seguro de eventos, no debes preocuparte, nosotros
						te aseguramos que todo estará en tiempo y forma para ese día especial.
						 
						</p>
					</div>
					<div class="col1">
						<h2>Servicios</h2>
						<p>Estas son algunas de las empresas que actualmente ofrecen sus servicios.
						</p>
						<ul class="list1">
							<li><a href="http://www.porton.com.mx/">El portón</a></li>
							<li><a href="http://www.salonjardinlafinca.com/">Jardín de eventos la finca</a></li>
							<li><a href="http://servicios-eventos.vivanuncios.com.mx/organizador-eventos+ciudad-veracruz/producciones-cya---audio-e-iluminacion-profesional/93362416">Sonido e iluminación Cya.</a></li>
							<li></li>
						</ul>
					</div>
				</div>
			</article>
		</div>
		<div class="bg1">
			<div class="main">
				<article id="content2">
					<div class="wrapper">
						<div class="col2 marg_right1">
							<h3></h3>
							<div class="wrapper">
								<figure class="left marg_right1"><img src="images/organizacion.png" alt="" width="344" height="217"></figure>
								<p class="color2 pad_bot1">Una nueva forma de organizar tus eventos.</p>
								<p>Organiza tus eventos con nostros de una manera rápida y agil, comprueba porque miles nos prefieren. Si no estas registrado que esperas no te toma más de 5 minutos y es totalmente gratis.</p>
							</div>
							<p>Ofrecemos servicios web de salón para eventos, menú de comida y entretenimiento, lo indispensable para que esos momentos sean especiales. Si eres un proveedor y deseas formar parte del repositorio contactanos para afilarte. No esperes más es una gran oportunidad de ofrecer tus servicios en la web.</p>
						</div>
						<div class="col1">
						</div>
					</div>
				</article>
			</div>
		</div>
		<div class="main">
<!--content end-->
<!--footer -->
			<footer>
				I.T.M. Veracruz 2014
				<br>
				Varios colaboradores.<br>
			</footer>
<!--footer end-->
		</div>
		<script type="text/javascript"> Cufon.now(); </script>
		<script>
			$(window).load(function(){
				$('#slider')._TMS({
					banners:true,
					waitBannerAnimation:false,
					preset:'diagonalFade',
					easing:'easeOutQuad',
					pagination:true,
					duration:400,
					slideshow:8000,
					bannerShow:function(banner){
						banner.css({marginRight:-500}).stop().animate({marginRight:0}, 600)
					},
					bannerHide:function(banner){
						banner.stop().animate({marginRight:-500}, 600)
					}
					})
			})
		</script>
	</body>
</html>