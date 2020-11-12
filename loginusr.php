<?php
    include_once 'database.php';
    
    session_start();

    if(isset($_GET['cerrar_sesion'])){
        session_unset(); 

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
    <title>Login usuario</title>
</head>
<body>
    <form action="#" method="POST">
        Username: <br/><input type="text" name="username" id = "username" required><br/>
        Password: <br/><input type="password" name="password" required><br/>
        <input type="submit" value="Iniciar sesión">
    </form>
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