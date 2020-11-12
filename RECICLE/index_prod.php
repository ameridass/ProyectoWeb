

<?php
include("conexion.php");

$Prodcod = $_POST["Prodcod"];
$ProdNom = $_POST["ProdNom"];
$categoria   = $_POST["categoria"];
$imagen = $_POST["imagen"];
$descripcion   = $_POST["descripcion"];
$fecha = date("Y/m/d");
$imagen2 = 
if(isset($_POST["btnguardar"]))
{
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO tproducto(`tpronom`,`tprocat`,`tprodsc`,
                         `tprofec`,`tprosts`,`tproimg`)
                    VALUES
                    ('$Prodcod','$categoria','$descripcion',$fecha,'A','$imagen');";

if ($conn->query($sql) === TRUE) {
  echo "Dato Ingresado correctamente";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
}
?>