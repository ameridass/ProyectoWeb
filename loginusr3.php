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
    <script src="js/popper.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css"
        integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">

  
</head>
<body>
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
    <form action="#" method="POST">
        Username: <br/><input type="text" name="username" id = "username" required><br/>
        Password: <br/><input type="password" name="password" required><br/>
        <input type="submit" value="Iniciar sesión">
    </form>
    </main>
    
   
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