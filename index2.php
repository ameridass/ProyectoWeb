<?php 

	$conexion=mysqli_connect('localhost:3307','root','abc123**','tn');

 ?>

<!DOCTYPE html>
<html lang="en">


<head>
	<meta charset="utf-8">
	<title>Index</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	
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
							<img src="<?php echo $mostrar['tproimg'] ?>" alt="<?php echo $mostrar['tpronom'] ?>" class="card-img-top"> 
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
	
	</div>

</body>

</html>
