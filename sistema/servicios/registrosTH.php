<?php
include "conexion.php";

$temp = $_GET['temp'];
$hum = $_GET['hum'];
$inv = $_GET['inv'];

$query = "INSERT INTO registros (temperatura, humedad, invernadero) VALUES (".$temp.", ".$hum.",".$inv.")";

$result = mysqli_query($conection, $query);
echo 'registrado';

?>