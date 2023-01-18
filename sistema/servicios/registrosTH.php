<?php
include "conexion.php";

$temp = $_GET['temp'];
$hum = $_GET['hum'];
$inv = $_GET['inv'];
$time = time();

$query = "INSERT INTO registros (tiempo,temperatura, humedad, invernadero) VALUES (".$time.", ".$temp.", ".$hum.",".$inv.")";

$result = mysqli_query($conection, $query);
echo 'registrado';

?>