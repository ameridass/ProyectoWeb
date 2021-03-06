<?php

    session_start();

    if(!isset($_SESSION['rol'])){
        header('location: loginusr.php');
    }else{
        if($_SESSION['rol'] != 1){
			header('location: index_producto1.php');
			
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>E-commerce Team Nocturno</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="">
		<!--[if ie]><meta content='IE=8' http-equiv='X-UA-Compatible'/><![endif]-->
		<!-- bootstrap -->
		<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">      
		<link href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
		
		<link href="themes/css/bootstrappage.css" rel="stylesheet"/>
		
		<!-- global styles -->
		<link href="themes/css/flexslider.css" rel="stylesheet"/>
		<link href="themes/css/main.css" rel="stylesheet"/>

		<!-- scripts -->
		<script src="themes/js/jquery-1.7.2.min.js"></script>
		<script src="bootstrap/js/bootstrap.min.js"></script>				
		<script src="themes/js/superfish.js"></script>	
		<script src="themes/js/jquery.scrolltotop.js"></script>
		<script src="themes\js\JSprod.js"></script>
		<!--[if lt IE 9]>			
			<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
			<script src="js/respond.min.js"></script>
		<![endif]-->
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
							<li><a href="loginusr.php?cerrar_sesion=1" >CERRAR SESION, <?php echo ($_SESSION['user']);?></a></li>		
						</ul>
					</div>
				</div>
			</div>
		</div>
		<div id="wrapper" class="container">
			<section class="navbar main-menu">
				<div class="navbar-inner main-menu">				
					<a href="index.html" class="logo pull-left"><img src="themes/images/logo_01.png " class="site_logo" alt=""></a>
					<nav id="menu" class="pull-right">
						<ul>
							<li><a href="#form_producto">Registrar producto cardex</a></li>															
							<li><a href="#">Ingresar producto a inventario</a></li>			
						</ul>
					</nav>
				</div>
			</section>
			<section id='form_producto'>
				<h2>Ingrese los datos de su producto a registrar:</h2>

				<tr>
				<td>	
				<form action="index_producto.php" method="POST" enctype="multipart/form-data">
					<div class="form-row">
						<div class="form-group col-md-6">
							<label >Codigo de producto</label>
							<input type="text" class="form-control" id="Prodcod" placeholder="codigo de producto" name="Prodcod" >
						</div>	
					  <div class="form-group col-md-6">
						<label >Nombre producto:</label>
						<input type="text" class="form-control" id="ProdNom" placeholder="Nombre de producto" name="ProdNom">
					  </div>
					  <div class="form-group col-md-6">
						<label >cantidad de producto:</label>
						<input type="text" class="form-control" id="Prodcant" placeholder="Nombre de producto" name="prodcant">
					  </div>
					  <div class="form-group col-md-6">
						<label >precio de producto</label>
						<input type="text" class="form-control" id="Prodamt" placeholder="Nombre de producto" name="prodamt">
					  </div>
					  <div class="form-group col-md-6">
						<label >Categoria</label>
						<select name="categoria" >							
							<option value = "" selected="true" disabled="disabled">seleccione la categoría</option>
							<option value="Blusas dama">Blusa Dama</option>							
							<option value = "Pantalon dama">Pantalon dama</option>							
							<option Value = "Pijama dama">Pijama dama</option>
							<option value="Camisa Caballero">Camisa Caballero</option>							
							<option value = "pantalon caballero">Pantalon dama</option>							
							<option value ="Accesorios">Accesorios</option>							
						</select>
					  </div>
					</div>
					<div class="form-group">
					<label>Cargue una imagen del producto</label>	
					<input id= "file" type="file" name="imagen"/>
					</div>
					<hr>
					<div id="preview"></div>
					<div class="form-group">
						<label>Descripcion</label>
						<textarea name="descripcion" rows="10" cols="40">Escribe aquí una descripcion del producto</textarea>
					  </div>
					<button type="submit" class="btn btn-primary" name="btnguardar">Registrar producto en kardex</button>
					</td>
					</tr>
				  </form>
				  <hr>
				  <hr>

			</section >
			<section>
			<h2>eliminar producto</h2>
			<select name="select1">
   
       <?php
            
                 $consulta="SELECT concat(idtproducto," - ",tpronom)as id FROM tn.tproducto;";
                 $resultado=mysqli_query($conn,$consulta);
                       
                        while($lista=mysqli_fetch_array($resultado))
 
	    ?>
                   <option  value="<? $lista['id']?> ">
    	                       <? $lista['curidso']?>
                   </option>
   
</select> 
			</section>
		
			<section class="our_client">
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
							<li><a href="login.html">Login</a></li>							
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
						<br/>
						
					</div>					
				</div>	
			</section>
		
			<section id="copyright">
				<span>Proyecto de programacion web de "Alvaro Sosa, Geizer Posadas y Josue Noriega"</span>
			</section>
		</div>

		<script src="themes/js/common.js"></script>
		<script src="themes/js/jquery.flexslider-min.js"></script>
		<script type="text/javascript">
			$(function() {
				$(document).ready(function() {
					$('.flexslider').flexslider({
						animation: "fade",
						
						controlNav: false,
						directionNav: true,
						controlsContainer: ".flex-container" // the container that holds the flexslider
					});
				});
			});
		</script>
    </body>
</html>
