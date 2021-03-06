<?php
include_once 'user.php';
include_once 'user_session.php';


$userSession = new UserSession();
$user = new User();

if(isset($_SESSION['user'])){
    //echo "hay sesion";
	$user->setUser($userSession->getCurrentUser());
	//include_once 'home.php';
    header('location: home.php');

}else if(isset($_POST['username']) && isset($_POST['password'])){
    
    $userForm = $_POST['username'];
    $passForm = $_POST['password'];

    $user = new User();
    if($user->userExists($userForm, $passForm)){
        //echo "Existe el usuario";
        $userSession->setCurrentUser($userForm);
        $user->setUser($userForm);
		header('location: home.php');
        //include_once 'home.php';
    }else{
        //echo "No existe el usuario";
        $errorLogin = "Nombre de usuario y/o password incorrecto";
        include_once 'vistas/login.php';
    }
}else{
    //echo "login";
    include_once 'vistas/login.php';
}



?>

<!--
<!DOCTYPE html>
<html lang="en">


<head>
	<meta charset="utf-8">
	<title>Index</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	
	<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">

	<link href="themes/css/bootstrappage.css" rel="stylesheet" />

	
	<link href="themes/css/flexslider.css" rel="stylesheet" />
	<link href="themes/css/main.css" rel="stylesheet" />

	
	<script src="themes/js/jquery-1.7.2.min.js"></script>
	<script src="bootstrap/js/bootstrap.min.js"></script>
	<script src="themes/js/superfish.js"></script>
	<script src="themes/js/jquery.scrolltotop.js"></script>
	
</head>

<body>
	<div id="top-bar" class="container">
		<div class="row">
			<div class="span4">
				<form method="POST" class="search_form">
					<input type="text" class="input-block-level search-query" Placeholder="Categoria, Marca">
				</form>
			</div>
			<div class="span8">
				<div class="account pull-right">
					<ul class="user-menu">
						<li><a href="logincli.html">Mi cuenta</a></li>
						<li><a href="cart.html">Carrito</a></li>
						<li><a href="loginusr.php">Login</a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<div id="wrapper" class="container">
		<section class="navbar main-menu">
			<div class="navbar-inner main-menu">
				<a href="index.html" class="logo pull-left"><img src="themes/images/logo_01.png " class="site_logo"
						alt=""></a>
				<nav id="menu" class="pull-right">
					<ul>
						<li><a href="./products.html">Mujeres</a>
						</li>
						<li><a href="#">Hombres</a></li>
						<li><a href="#">Sport</a>
						</li>
						<li><a href="#">Niños</a></li>
						<li><a href="#">Mas vendido</a></li>
						<li><a href="#">Mejor vendido</a></li>
					</ul>
				</nav>
			</div>
		</section>
		<section class="homepage-slider" id="home-slider">
			<div class="flexslider">
				<ul class="slides">
					<li>
						<img src="themes/images/carousel/bannerSlide-1.JPG" style="height: 400px;" alt="" />
					</li>
					<li>
						<img src="themes/images/carousel/bannerSlide-2.JPG" style="height: 400px;" alt="" />
						<div class="intro">
							<h1>Temporada fin de año</h1>
							<p><span>Hasta 50% de descuento</span></p>
							<p><span>En nuestro productos seleccionados</span></p>
						</div>
					</li>
				</ul>
			</div>
		</section>
		<section class="header_text">
			Sobre nosotros
			<br />Sobre nosotros 1000
		</section>
		<section class="main-content">
			<div class="row">
				<div class="span12">
					<div class="row">
						<div class="span12">
							<h4 class="title">
								<span class="pull-left"><span class="text"><span class="line">Nuestros
											<strong>Productos</strong></span></span></span>
								<span class="pull-right">
									<a class="left button" href="#myCarousel" data-slide="prev"></a><a
										class="right button" href="#myCarousel" data-slide="next"></a>
								</span>
							</h4>
							<div id="myCarousel" class="myCarousel carousel slide">
								<div class="carousel-inner" id="seccion">
									<div class="active item" id="art">
										<ul class="thumbnails" >
											<li class="span3">
												<div class="product-box" >
													<span class="sale_tag"></span>
													<p><a href="product_detail.html">
														<img src="themes/images/ladies/1.jpg" alt=""> </a></p>
													<a href="product_detail.html" class="title">Blusa Azul y
														pants</a><br />
													<a href="products.html" class="category">pijama</a>
													<p class="price">Q20.00</p>
												</div>
											</li>
											<li class="span3">
												<div class="product-box" >
													<span class="sale_tag"></span>
													<p><a href="product_detail.html"><img
																src="themes/images/ladies/2.jpg" alt="" /></a></p>
													<a href="product_detail.html" class="title">Blusa aqua y
														pants</a><br />
													<a href="products.html" class="category">pijama</a>
													<p class="price">Q20.00</p>
												</div>
											</li>
											<li class="span3">
												<div class="product-box">
													<p><a href="product_detail.html"><img
																src="themes/images/ladies/3.jpg" alt="" /></a></p>
													<a href="product_detail.html" class="title">Pijama cuadricula
														fina</a><br />
													<a href="products.html" class="category">Pantalon pijama</a>
													<p class="price">Q20.00</p>
												</div>
											</li>
											<li class="span3">
												<div class="product-box">
													<p><a href="product_detail.html"><img
																src="themes/images/ladies/4.jpg" alt="" /></a></p>
													<a href="product_detail.html" class="title">Pantalon cuadricula semi
														fina</a><br />
													<a href="products.html" class="category">Pantalon pijama</a>
													<p class="price">Q20.00</p>
												</div>
											</li>
										</ul>
									</div>
									<div class="item">
										<ul class="thumbnails">
											<li class="span3">
												<div class="product-box">
													<p><a href="product_detail.html"><img
																src="themes/images/ladies/5.jpg" alt="" /></a></p>
													<a href="product_detail.html" class="title">Pantalon pijama rayado
														verde y azul</a><br />
													<a href="products.html" class="category">Pantalon pijama</a>
													<p class="price">Q20.00</p>
												</div>
											</li>
											<li class="span3">
												<div class="product-box">
													<p><a href="product_detail.html"><img
																src="themes/images/ladies/6.jpg" alt="" /></a></p>
													<a href="product_detail.html" class="title">Blusa rosa
														liviana</a><br />
													<a href="products.html" class="category">Basic</a>
													<p class="price">Q20.00</p>
												</div>
											</li>
											<li class="span3">
												<div class="product-box">
													<p><a href="product_detail.html"><img
																src="themes/images/ladies/7.jpg" alt="" /></a></p>
													<a href="product_detail.html" class="title">Verde amí</a><br />
													<a href="products.html" class="category">Basic</a>
													<p class="price">Q20.00</p>
												</div>
											</li>
											<li class="span3">
												<div class="product-box">
													<p><a href="product_detail.html"><img
																src="themes/images/ladies/8.jpg" alt="" /></a></p>
													<a href="product_detail.html" class="title">Wet Seal</a><br />
													<a href="products.html" class="category">Vestidos</a>
													<p class="price">Q20.00</p>
												</div>
											</li>
										</ul>
									</div>
								</div>
							</div>
						</div>
					</div>
					<br />
					<div class="row">
						<div class="span12">
							<class class="title">
								<span class="pull-left"><span class="text"><span class="line">Ultimos
											<strong>Ingresos</strong></span></span></span>
							</class>
						</div>
					</div>
				</div>
				<div class="row feature_box">
				</div>
			</div>
		</section>
		<section id="footer-bar">
			<div class="row">
				<div class="span3">
					<h4>Navegacion</h4>
					<ul class="nav">
						<li><a href="#">Inicio</a></li>
						<li><a href="#">Sobre nosotros</a></li>
						<li><a href="#">Contacto</a></li>
						<li><a href="#">Tu carrio</a></li>
						<li><a href="#">Login</a></li>
					</ul>
				</div>
				<div class="span4">
					<h4>Mi cuenta</h4>
					<ul class="nav">
						<li><a href="#">Ajustes</a></li>
						<li><a href="#">Historial de ordenes</a></li>
					</ul>
				</div>
				<div class="span5">
					<p class="logo"><img src="themes/images/logo_01.png" class="site_logo" alt=""></p>
					<p>Nos reservamos los derechos.</p>
					<br />
					<span class="social_icons">
						<a class="facebook" href="#">Facebook</a>
						<a class="twitter" href="#">Twitter</a>
						<a class="skype" href="#">Skype</a>
						<a class="vimeo" href="#">Vimeo</a>
					</span>
				</div>
			</div>
		</section>
		<section id="copyright">
			<span>Proyecto de programacion web de "Alvaro Sosa, Geizer Posadas y Josue Noriega"</span>
		</section>
	</div>

	<script src="Dynamic/vista.js"></script>
	<script src="Dynamic/eventosVistaPrevia.js"></script>
	<script src="themes/js/common.js"></script>
	<script>
		$(function () {
			$(document).ready(function () {
				$('.flexslider').flexslider({
					animation: "fade",
					slideshowSpeed: 4000,
					animationSpeed: 600,
					controlNav: false,
					directionNav: true,
					controlsContainer: ".flex-container" // the container that holds the flexslider
				});
			});
		});
	</script>
</body>

</html>
	-->