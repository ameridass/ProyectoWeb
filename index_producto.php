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
$ok = 1;


if(isset($_POST["btnguardar"]))
{
if ($action = "I") {
	$check = getimagesize( $_FILES["imagen"]["tmp_name"] );
    if ( $check !== false ) {  
        $isimage = 1;//si es una imagen
    } else {
        $isimage = 0;//no es una imagen
	}
	if ( $tipo_imagen != "jpg" && $tipo_imagen != "PNG" && $tipo_imagen != "jpeg" && $tipo_imagen != "JPEG"  && $tipo_imagen != "gif" 
	&& $tipo_imagen != "png" && $tipo_imagen != "JPG") {
		//echo "Solo aceptamos extensiones JPG, JPEG, PNG & GIF.";
		$Ok = 0;
	}
	if ( $isimage == 1 && $Ok = 1) {  //comprueba si es un a imagen
		/*if ( file_exists( $archivo ) ) {//comprueba si la imagen ya existe*/
			if ( move_uploaded_file( $_FILES["imagen"]["tmp_name"], $archivo ) ) {
				$res = $mysqli->multi_query("CALL mant_prod('$action','$Prodcod', '$ProdNom','$categoria','$descripcion','$archivo', @menssage); select @menssage");
					echo "<script> alert('producto $ProdNom, creado correctamente'); window.location='index_producto.html' </script>";
			}else{
				echo "<script> alert('error el archivo no pudo ser cargado, producto no ingresado'); window.location='index_producto.html' </script>";
			}	
		/*}else{
			echo "<script> alert('el archivo cargado ya existe, cambie el nombre'); window.location='index_producto.html' </script>";
		}*/	
	}else{
		echo "<script> alert('el archivo cargado no es una imagen o no es un formato valido'); window.location='index_producto1.php' </script>";
	}	
}
echo "<script> alert('actualizar'); window.location='index_producto.html' </script>";
}


/*comprueba que es una imagen
if ( isset( $_POST["btnguardar"] ) ) {
   
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
*/
?>