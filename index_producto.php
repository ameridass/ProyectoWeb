<?php

include("conexion.php");



$ProdNom = $_POST["ProdNom"];
$categoría   = $_POST["categoría"];
$cantidad = $_POST["cantidad"];
$imagen = $_POST["imagen"];
$descripcion   = $_POST["descripcion"];



if(isset($_POST["btnguardar"]))
{
	$query = mysqli_query($conn,"select ftn_login('$nombre','$pass')");
	$nr = ($query);
	echo "<script> alert('$nr'); window.location='index_producto.html' </script>";
}
?>