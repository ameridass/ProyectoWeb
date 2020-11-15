<?php
    include_once 'database.php';
    
    session_start();

    if(isset($_GET['cerrar_sesion'])){
        session_unset(); 
        header('location: index.php');

        // destroy the session 
        session_destroy(); 
    }
    
    if(isset($_SESSION['rol'])){
        switch($_SESSION['rol']){
            case 1:
                header('location: index_producto1.php');
            break;

            case 2:
            header('location: colab.php');
            break;

            default:
        }
    }

    if(isset($_POST['username']) && isset($_POST['password'])){
        $username = $_POST['username'];
        $password = $_POST['password'];

        $db = new Database();
        $query = $db->connect()->prepare('SELECT * FROM tusuario WHERE tidusuario = :username AND tusupwd = :password');
        $query->execute(['username' => $username, 'password' => $password]);

        $row = $query->fetch(PDO::FETCH_NUM);
        
        if($row == true){
            $rol = $row[3];
            $user = $row[0];
            $_SESSION['user'] = $user;
            
            $_SESSION['rol'] = $rol;
            switch($rol){
                case 1:
                    header('location: index_producto1.php');
                break;

                case 2:
                header('location: colab.php');
                break;

                default: echo("salir");
            
            }
        }else{
            // no existe el usuario
            echo "Nombre de usuario o contraseña incorrecto";
        }
        

    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="estilos.css">
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
            <section>
    <form action="#" method="POST">
        Username: <br/><input type="text" name="username" id = "username" required><br/>
        Password: <br/><input type="password" name="password" required><br/>
        <input type="submit" value="Iniciar sesión">
    </form>
</section>
</body>
</html>

<!--<html>

<head>
<meta charset="UTF-8">
<title>Login usuario</title>
<link rel="stylesheet" href="estilos.css">
</head>

<body>
<form action="#"  method="POST">
<h2>Iniciar sesión</h2>
<input type="text" placeholder="&#128273; Usuario" name="username" id = "username" required>
<input type="password" placeholder="&#128274; Contraseña" name="password" required>
<input type="submit" value="Iniciar sesión">



<br>
<a href="registrar.html" style="float:right">Crear una cuenta</a>

</form>


<script>

    var usuario = document.getElementById("username");
    console.log(usuario);
    
addEventListener("submit",function(e){
    e.preventDefault();
    localStorage.setItem("user", usuario.value);
 
})

</script>
</body>
</html>-->