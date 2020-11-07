<?php

include("conexion.php");

$nombre = $_POST["usuario"];
$pass   = $_POST["pass"];

//Login
if(isset($_POST["btningresar"]))
{
	$consulta = "select ftn_login('$nombre','$pass')";
	$query = mysqli_query($conn,$consulta);
	if($fila = mysqli_fetch_array($query))
	{
		echo "<script> alert('Bienvenido $nombre'); window.location='index_producto1.php' </script>";
	}else
	{
		echo "<script> alert('Usuario no existe'); window.location='index.html' </script>";
	}

	
}


?>