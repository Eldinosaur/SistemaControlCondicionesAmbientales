<?php
$user = "root";
$password = "";
$server = "localhost";
$database = "proyecto";

$temp = $_GET['temp'];
$hum = $_GET['hum'];
$inv = $_GET['inv'];
$time = time();

$conection = mysqli_connect($server,$user,$password) or die ("Can't reach the server");

$db = mysqli_select_db($conection, $database) or die ("Can't select database");

$query = "INSERT INTO registros (tiempo,temperatura, humedad, invernadero) VALUES (".$time.", ".$temp.", ".$hum.",".$inv.")";

$result = mysqli_query($conection, $query);

echo "Temperatura: ".$temp;
echo "<br> Humedad: ".$hum;
echo "<br> Invernadero: ".$inv;

?>