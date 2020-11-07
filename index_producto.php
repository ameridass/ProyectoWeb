<?php

$mysqli = new mysqli("localhost:3307","root","abc123**","tn");


$Prodcod = $_POST["Prodcod"];
$ProdNom = $_POST["ProdNom"];
$categoria   = $_POST["categoria"];
$imagen = $_FILES["imagen"]["name"];
$descripcion   = $_POST["descripcion"];
$ruta_base   = "images/";
$archivo     = $ruta_base . basename( $_FILES["imagen"]["name"] );
$Ok          = 1;
$tipo_imagen = pathinfo( $archivo, PATHINFO_EXTENSION );


$action = 'I';
$Prodcod = "0";

if(isset($_POST["btnguardar"]))
{
	$res = $mysqli->multi_query("CALL mant_prod('$action','$Prodcod', '$ProdNom','$categoria','$descripcion','$archivo', @menssage); select @menssage");
	

	echo $res;


	
	
	
	
}




//comprueba que es una imagen
if ( isset( $_POST["btnguardar"] ) ) {
    $check = getimagesize( $_FILES["imagen"]["tmp_name"] );
    if ( $check !== false ) {
        echo "Es una imagen - " . $check["mime"] . ".";
        $Ok = 1;
    } else {
        echo "No es una imagen.";
        $Ok = 0;
    }
}

//comprueba si existe
if ( file_exists( $archivo ) ) {
    echo "El archivo ya existe.";
    $Ok = 0;
}

//valida la extensión
if ( $tipo_imagen != "jpg" && $tipo_imagen != "PNG" && $tipo_imagen != "jpeg" && $tipo_imagen != "gif" ) {
    echo "Solo aceptamos extensiones JPG, JPEG, PNG & GIF.";
    $Ok = 0;
}

//Sube el archivo, si se ha recibido un archivo válido
if ( $Ok == 0 ) {
    echo "El archivo no ha sido subido, lo sentimos.";
} else {
    if ( move_uploaded_file( $_FILES["imagen"]["tmp_name"], $archivo ) ) {
        echo "El archivo " . basename( $_FILES["imagen"]["name"] ) . " ha sido subido.";
    } else {
        echo "Lo sentimos, ha habido un error subiendo el archivo.";
    }
}

?>