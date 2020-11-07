<?php

$mysqli = new mysqli("localhost:3307","root","abc123**","tn");


$Prodcod = $_POST["Prodcod"];
$ProdNom = $_POST["ProdNom"];
$categoria   = $_POST["categoria"];
$imagen = $_POST["imagen"];
$descripcion   = $_POST["descripcion"];

$imagen = "abc";
$action = "I";
$Prodcod = "0";

if(isset($_POST["btnguardar"]))
{
	$res = $mysqli->multi_query("CALL mant_prod($action,$Prodcod, $ProdNom,$categoria,$descripcion,$imagen, @menssage); select @menssage");
	if( $res ) {
		$results = 0;
		do {
		  // STORE
		  if ($result = $mysqli->store_result()) {
			printf( "Result #%u:", ++$results );
			echo nl2br("\n");
			// FETCH
			while( $row = $result->fetch_row() ) {
			  foreach( $row as $cell ) echo $cell, " ";
			}
			// CLOSE
			$result->close();
			if( $mysqli->more_results() ) echo nl2br("\n");
		  }
		// NEXT
		} while( $mysqli->next_result() );
	  }
	  $mysqli->close();

	
	
	echo "<script> alert('Bienvenido $res'); window.location='index_producto.html' </script>";
	
}
?>