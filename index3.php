<?php 

	$conexion=mysqli_connect('localhost:3307','root','abc123**','tn');

 ?>
<!DOCTYPE html>
<html lang="en">
<!-- Primera fase-->
<!--10/10/2020-->

<head>
	<meta charset="utf-8">
	<title>Index</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<!--[if ie]><meta content='IE=8' http-equiv='X-UA-Compatible'/><![endif]-->
	<!-- bootstrap -->
	<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
	<link rel="stylesheet" href="css/bootstrap.min.css"> 

	<link href="themes/css/bootstrappage.css" rel="stylesheet" />

	<!-- global styles -->
	<link href="themes/css/flexslider.css" rel="stylesheet" />
	<link href="themes/css/main.css" rel="stylesheet" />

	<!-- scripts -->
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
						<li><a href="index.php">Mi cuenta</a></li>
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
		<main>
			<div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 my-4 mx-auto text-center">
				<h1 class="display-4 mt-4">Lista de Productos</h1>
				<p class="lead">Selecciona uno de nuestros productos y accede a un descuento</p>
			</div>
			<?php 
				$sql="SELECT idtproducto, tpronom,tprodsc,tproimg from tproducto";
				$result=mysqli_query($conexion,$sql);

				while($mostrar=mysqli_fetch_array($result)){
		 	?>


			<div class="container" id="lista-productos">
				<div class="card-deck mb-3 text-center">
					<div class="card mb-4 shadow-sm">	
						<div class="card-header">
							<h4 class="my-0 font-weight-bold"><?php echo $mostrar['tpronom'] ?></h4>
						</div>
						<div class="card-body">
							<img src="<?php echo $mostrar['tproimg'] ?>" alt="<?php echo $mostrar['tpronom'] ?>" class="card-img-top" style="width:100px;height:100px;> 
							<h1 class="card-title pricing-card-title precio">S/. <span class=""><?php echo $mostrar['tprodsc'] ?></span></h1>
							<ul class="list-unstyled mt-3 mb-4">
								<li></li>
								<li>8 GB RAM</li>
								<li>COLOR PLATEADO</li>
								<li>256 GB DISCO SSD</li>
							</ul>
							<a href="" class="btn btn-block btn-primary agregar-carrito" data-id="<?php echo $mostrar['idtproducto'] ?>">Comprar</a>
						</div>
					</div>
				</div>
			</div>
			<?php 
	}
	 ?>
		</main>	
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
	<script src="Dynamic/carrito.js"></script>
	<script src="Dynamic/vista.js"></script>
	<script src="Dynamic/eventosVistaPrevia.js"></script>
	<script src="themes/js/common.js"></script>
</body>

</html>