<?php 

	$conexion=mysqli_connect('localhost:3307','root','abc123**','tn');

 ?>

<?php
 function carrito(&$id,&$nombre,&$nombre) { 
	$sql="insert into tordenes";
}
?>


<!DOCTYPE html>
<html>
<head>
	<title>mostrar datos</title>
	<style>
		
	</style>
</head>
<body>

<br>

	<table border="1" >
		<tr>
			<td>id</td>
			<td>nombre</td>
			<td>apellido</td>
			<td>email</td>
			<td>telefono</td>	
		</tr>

		<?php 
		$sql="SELECT idtproducto, tpronom,tprodsc,tproimg from tproducto";
		$result=mysqli_query($conexion,$sql);

		while($mostrar=mysqli_fetch_array($result)){
		 ?>

		<tr>
			<td><?php echo $mostrar['idtproducto'] ?></td>
			<td><?php echo $mostrar['tpronom'] ?></td>
			<td><img src="<?php echo $mostrar['tproimg'] ?>" alt="<?php echo $mostrar['tpronom'] ?>" style="width:100px;height:100px;"></td>
		</tr>
	<?php 
	}
	 ?>
	</table>

</body>
</html>