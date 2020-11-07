<?php
include("conexion.php");

function consultar ($consulta){
    include("conexion.php");
    if (!$datos = mysqli_query($conn,$consulta)){
    return false;// si fue rechazada la consulta por errores de sintaxis, o ningún registro coincide con lo buscado, devolvemos false
    } else {
    return $datos;// si se obtuvieron datos, los devolvemos al punto que fue llamada la función
    }
    }

    function tabular ($datos){
        //Abrimos la etiqueta table una sola vez:
        $codigo = '<table border="1" cellpadding="3">';
        
        //Vamos acumulando de a una fila "tr" por vuelta:
        while ($fila = @mysqli_fetch_array($datos) ) {
        
        $codigo .= '<tr>';
        
        //vamos acumulando tantos "td" como sea necesario:
        $codigo .= '<td>'.utf8_encode($fila["tpronom"]).'</td>';
        /*
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
        */
        //cerramos un "tr":
        $codigo .= '</tr>';
        }
        //finalizandoell bucle, cerramos por unica vez la tabla:
        $codigo .='</table>';
        
        return $codigo;
    }
    
?>