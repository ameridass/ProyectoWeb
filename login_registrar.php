<?php

include("conexion.php");

$nombre = $_POST["usuario"];
$pass   = $_POST["pass"];

//Login
if(isset($_POST["btningresar"]))
{
	$query = mysqli_query($conn,"select ftn_login('$nombre','$pass')");
	$nr = ($query);
	
	if($nr==1)
	{
		echo "<script> alert('Bienvenido $nombre'); window.location='index_producto.html' </script>";
	}else
	{
		echo "<script> alert('Usuario no existe'); window.location='index.html' </script>";
	}
}


?>