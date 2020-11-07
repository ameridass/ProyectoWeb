<?php
include(conexion.php);


function tabular ($datos){
//Abrimos la etiqueta table una sola vez:
$codigo = '<table border="1" cellpadding="3">';

//Vamos acumulando de a una fila "tr" por vuelta:
while ($fila = @mysql_fetch_array($datos) ) {

$codigo .= '<tr>';

//vamos acumulando tantos "td" como sea necesario:
$codigo .= '<td>'.utf8_encode($fila["id"]).'</td>';

$codigo .= '<td>'.utf8_encode($fila["nombre"]).'</
td>';
$codigo .= '<td>'.utf8_encode($fila["apellido"]).'</
td>';
$codigo .= '<td>'.utf8_encode($fila["edad"]) .'</
td>';
$codigo .= '<td>'.utf8_encode($fila["pais"]) .'</
td>';
$codigo .= '<td>'.utf8_encode($fila
["especialidad"]).'</td>';

//cerramos un "tr":
$codigo .= '</tr>';
}
//finalizandoell bucle, cerramos por unica vez la tabla:
$codigo .='</table>';

return $codigo;
}