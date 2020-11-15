<?php
include_once 'user.php';
include_once 'user_session.php';
include("conexion.php");


$userSession = new UserSession();
$user = new User();

if(isset($_SESSION['user'])){
    //echo "hay sesion";
    $user->setUser($userSession->getCurrentUser());
    include_once 'home.php';
}else{
    include_once 'index1.php';

}

    
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport"
		content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
	<link href="themes/css/style.css" rel="stylesheet" />
	<script src="js/popper.min.js"></script>

	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css"
		integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
	<link rel="stylesheet" href="css/sweetalert2.min.css">


	<title>INICIO</title>
</head>

<body>
	<!-- Barra de navegacion -->
	<header>
		<div class="container">
			<div class="row align-items-stretch justify-content-between">
				<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
					<a class="navbar-brand" href="#">THE VINTAGE STORE</a>
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse"
						aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
					</button>
					<div class="collapse navbar-collapse" id="navbarCollapse">
						<ul class="navbar-nav mr-auto">
							<li class="nav-item dropdown">
								<img src="themes/images/cart.png" class="nav-link dropdown-toggle img-fluid" height="70px" width="70px"
									href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true"
									aria-expanded="false"></img>
								<div id="carrito" class="dropdown-menu" aria-labelledby="navbarCollapse">
									<table id="lista-carrito" class="table">
										<thead>
											<tr>
												<th>Imagen</th>
												<th>Nombre</th>
												<th>Precio</th>
												<th></th>
											</tr>
										</thead>
										<tbody></tbody>
									</table>
									<a href="#" id="vaciar-carrito" class="btn btn-primary btn-block">Vaciar Carrito</a>
									<a href="#" id="procesar-pedido" class="btn btn-danger btn-block">Procesar
										Compra</a>
								</div>
							</li>
						</ul>
					</div>
					<a class="navbar-brand" href="logout.php">Cerrar Sesion <?php $_SESSION['user']?></a>
				</nav>
			</div>
		</div>
	</header>
	

	<main>
	<section>
			<div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 my-4 mx-auto text-center">
				<h1 class="display-4 mt-4">Lista de Prendas</h1>
				<p class="lead">Hecha un vistazo y si algo te gusta agregalo al carrito</p>
			</div>
			
			
			<div class="container" id="lista-productos" >
				
			<?php 
                       	$sql="SELECT * from tproducto";
                       	$result=mysqli_query($conn,$sql);
        
                       	while($mostrar=mysqli_fetch_array($result)){
        
                		?>
						
                
                		<div class="card-deck mb-3 text-center" >
                    		<div class="card mb-4 shadow-sm">	
                            
                                <div class="card-header">
                                    <h4 class="my-0 font-weight-bold"><?php echo $mostrar['tpronom'] ?></h4>
                                </div>
                                <div class="card-body">
                                    <img src="<?php echo $mostrar['tproimg'] ?>" alt="<?php echo $mostrar['tpronom'] ?>" class="card-img-top" style="width:200px;height:200px";> 
                                    <h1 class="card-title pricing-card-title precio">Q. <span><?php echo $mostrar['tproamt'] ?></span></h1>
                                    <ul class="list-unstyled mt-3 mb-4">
                                        <li>id: <?php echo $mostrar['idtproducto'] ?></li>
                                        <li><?php echo $mostrar['tprodsc'] ?></li>
                                        <li><?php echo $mostrar['tprocat'] ?></li>
                                        <li><?php echo $mostrar['tprosts'] ?></li>
                                    </ul>
                                    <a href="" class="btn btn-block btn-primary agregar-carrito" data-id="<?php echo $mostrar['idtproducto'] ?>">Comprar</a>
								</div>
						   </div>
						</div>   	
						
                
                 
						<?php 
		}
		?>
           
			</div>
		
		</section>
	
	
	</main>	
	<footer>
		<div class="footer-top">
			<div class="container">
				<div class="row">
					<div class="col-md-4 col-lg-4 footer-about wow fadeInUp">
						<img class="logo-footer" src="themes/images/logo_01.png" alt="logo-footer"
							data-at2x="assets/img/logo.png">
						<p>
							Innovar, liderar, mejorar, proporcionar productos y servicios de mejor valor a clientes
							globales. Para marcar la diferencia a través de nuestra marca y estar a la vanguardia de las
							tendencias de la moda, los cambios del mercado y la última tecnología.
						</p>
						
						<p><a href="loginusr.php">LOGIN</a><i class="fas fa-sign-in-alt"></i></p>
					</div>
					<div class="col-md-4 col-lg-4 offset-lg-1 footer-contact wow fadeInDown">
						<h3>Contacto</h3>
						<p><i class="fas fa-map-marker-alt"></i> Guatemala,Guatemala</p>
						<p><i class="fas fa-phone"></i> +502 5544-3322</p>
						<p><i class="fas fa-envelope"></i><a href="mailto:hello@domain.com">estudiantes@udv.edu.gt</a>
						</p>
					</div>
					<div class="col-md-4 col-lg-3 footer-social wow fadeInUp">
						<h3>Siguenos</h3>
						<p>
							<a href="#"><i class="fab fa-facebook"></i></a>
							<a href="#"><i class="fab fa-twitter"></i></a>
							<a href="#"><i class="fab fa-google-plus-g"></i></a>
							<a href="#"><i class="fab fa-instagram"></i></a>
							<a href="#"><i class="fab fa-pinterest"></i></a>
						</p>
					</div>
				</div>
			</div>
		</div>
		<div class="footer-bottom">
			<div class="container">
				<div class="row">
					<div class="col-md-5 footer-copyright">
						<p>&copy; Proyecto web Grupo 1</p>
					</div>
					<div class="col-md-7 footer-menu">
						<nav class="navbar navbar-dark navbar-expand-md">
							<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
								aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
								<span class="navbar-toggler-icon"></span>
							</button>
						</nav>
					</div>
				</div>
			</div>
		</div>
	</footer>
	
	
	<script src="Dynamic/jquery-3.4.1.min.js"></script>
	<script src="Dynamic/bootstrap.bundle.min.js"></script>
	<script src="Dynamic/sweetalert2.min.js"></script>
	<script src="Dynamic/pedido.js"></script>
	<script src="Dynamic/pedido.js"></script>
	<script src="js/carrito.js"></script>
    <script src="js/pedido.js"></script>
</body>

</html>