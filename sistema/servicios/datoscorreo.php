<?php
include 'conexion.php';

$usuario = $_POST['creador'];

$sqlCorreo = "SELECT correo FROM usuarios WHERE usuario = '$usuario'";
$respuesta = $conection -> query ($sqlCorreo);
$result = array ();


if ( $respuesta -> num_rows > 0 ){
    while ( $fila = $respuesta-> fetch_assoc()){
        array_push($result, $fila);
    }
}else {
    $result = null;
}

$resultJSON = json_encode($result);
$obj = json_decode($resultJSON);
$val = json_decode(json_encode($obj),true);
//echo $val[0]['correo'];
$correo = $val[0]['correo'];
//echo $correo;

?>