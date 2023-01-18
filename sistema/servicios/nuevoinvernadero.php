<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
header("Allow: GET, POST, OPTIONS, PUT, DELETE");

include 'conexion.php';
$cultivo = $_POST['cultivo'];
$min_temp = $_POST['min_temp'];
$max_temp = $_POST['max_temp'];
$min_hum = $_POST['min_hum'];
$max_hum = $_POST['max_hum'];
$creador = $_POST['creador'];


$result = false;

$sqlInsertInvernadero= "INSERT INTO `invernaderos` (`cultivo`, `min_temp`, `max_temp`, `min_hum`, `max_hum`, `creador`) VALUES ('$cultivo', '$min_temp', '$max_temp', '$min_hum', '$max_hum', '$creador');";
if ($mysqli -> query($sqlInsertInvernadero)===TRUE){
    $result = true;
}else{
    echo json_encode ("error ".$sqlinsertar.$mysqli->error);
}

$mysqli->close();
echo $result;
?>