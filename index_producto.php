<?php

include("conexion.php");



$ProdNom = $_POST["ProdNom"];
$categoría   = $_POST["categoría"];
$cantidad = $_POST["cantidad"];
$descripcion   = $_POST["descripcion"];


//Login
if(isset($_POST["btnguardar"]))
{
	$query = mysqli_query($conn,"select ftn_login('$nombre','$pass')");
	$nr = ($query);
	
	if($nr==1)
	{
		echo "<script> alert('Bienvenido $nombre'); window.location='index.html' </script>";
	}else
	{
		echo "<script> alert('Usuario no existe'); window.location='index.html' </script>";
	}
}

?>