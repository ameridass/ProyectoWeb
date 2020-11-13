

<?php
include("conexion.php");

$cantidad = $_POST["cantidad"];
$Prodcod = $_POST["procod"];
$cliente = $_post["user"];
if(isset($_POST["añadir"]))
{
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO tordenes(`tpronom`,`tprocat`,`tprodsc`,
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