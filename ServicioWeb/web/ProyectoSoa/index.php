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
		<title>Servicios de Entretenimiento EFI</title>
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
		<script type="text/javascript" src="js/jquery.easing.1.3.js"></script>
		<script type="text/javascript" src="js/atooltip.jquery.js"></script>
		<!--[if lt IE 9]>
		<script type="text/javascript" src="js/html5.js"></script>
		<link rel="stylesheet" href="css/ie.css" type="text/css" media="all">
		<![endif]-->
		<!--[if lt IE 7]>
			<div style=' clear: both; text-align:center; position: relative;'>
				<a href="http://windows.microsoft.com/en-US/internet-explorer/products/ie/home?ocid=ie6_countdown_bannercode"><img src="http://storage.ie6countdown.com/assets/100/images/banners/warning_bar_0000_us.jpg" border="0" height="42" width="820" alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today." /></a>
			</div>
		<![endif]-->
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
						<li class="last"><a href="Contacts.php"><span>Contactanos</span></a></li>
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
			<article id="content"><div class="ic">More Website Templates @ TemplateMonster.com - November 14, 2011!</div>
				<div class="wrapper">
					<div class="col1 marg_right1">
						<h2>Eventos Sociales</h2>
						<p>Ofrecemos todos los servivios para la organizacion de un evento de calidad, esto incluye
						reservacion de salon, comida y entretenimiento.</p>
					</div>
					<div class="col1 marg_right1">
						<h2>Afiliate</h2>
						<p>Si eres provedor de servivios puedes contactarnos para adquirir una membrecia y publicar tu servicio. No esperes mas esta es una gran oportunidad
						para anunciarte.</p>
					</div>
					<div class="col1 marg_right1">
						<h2>Calidad</h2>
						<p>
						Solo ofrecemos servicios de calidad para que ese momento especial sea memorable. Nadie mas te ofrece un seguro de eventos, no debes preocuparte nosotros
						te aseguramos que todo estara en tiempo y forma para ese dia especial.
						 
						</p>
					</div>
					<div class="col1">
						<h2>Servicios</h2>
						<p>Estas son algunas de las empresas que actualmente ofrecen sus servicios.
						</p>
						<ul class="list1">
							<li><a href="http://www.porton.com.mx/">El porton</a></li>
							<li><a href="http://www.salonjardinlafinca.com/">Jardin De Eventos La Finca</a></li>
							<li><a href="http://servicios-eventos.vivanuncios.com.mx/organizador-eventos+ciudad-veracruz/producciones-cya---audio-e-iluminacion-profesional/93362416">Sonido e iluminacion Cya.</a></li>
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
								<p>Organiza tus eventos con nostros de una manera rápida y agil, comprueba porque miles nos prefieren. Si no estas registrado que esperas no te toma mas de 5 minutos y es totalmente gratis.</p>
							</div>
							<p>Nuestros servicios web te ofrecen servicio de salon para eventos, menu de comida y entretenimiento, lo indispensable para que esos momentos sean especiales. Si eres un provedor y deseas formar parte del repositorio contactanos para afilarte. No esperes mas es una gran oportunidad de ofrecer tus servicios en la web.</p>
						</div>
						<div class="col1">
							<h3>Publicaciones.</h3>
							<ul class="list2">
								<li><a href="#">PR Management</a><br>
								Dalesuad asorbi nunra vida- sea atcurs usecuctu.</li>
								<li><a href="#">Global solutions</a><br>Naser maellus pore qus ese- dasese dusce.</li>
								<li><a href="#">Progressive Research</a><br>Atcurs usuctu aecenas ttique  maellrase qus esedasese.</li>
								<li><a href="#">New Technologies</a><br>Merts maellrase qus esedias dusceer lrurtasfeugiat.</li>
							</ul>
						</div>
					</div>
				</article>
			</div>
		</div>
		<div class="main">
<!--content end-->
<!--footer -->
			<footer>
				<ul id="icons">
					<li class="first">Follow Us:</li>
					<li><a href="#" class="normaltip" title="Facebook"><img src="images/icon1.jpg" alt=""></a></li>
					<li><a href="#" class="normaltip" title="Twitter"><img src="images/icon2.jpg" alt=""></a></li>
					<li><a href="#" class="normaltip" title="Picasa"><img src="images/icon3.jpg" alt=""></a></li>
					<li><a href="#" class="normaltip" title="YouTube"><img src="images/icon4.jpg" alt=""></a></li>
				</ul>
				I.T.M. Veracruz 2014
				<br>
				Varios colaboradores.<br>
				<!-- {%FOOTER_LINK} -->
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